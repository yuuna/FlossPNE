<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * openpneActionListTask
 *
 * @package    OpenPNE
 * @subpackage task
 * @author     Kousuke Ebihara <ebihara@php.net>
 */
class openpneActionListTask extends sfBaseTask
{
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('application', sfCommandArgument::REQUIRED, 'The application name'),
    ));

    $this->addOptions(array(
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('component', null, sfCommandOption::PARAMETER_NONE, 'Is component?', null),
    ));

    $this->namespace        = 'openpne';
    $this->name             = 'action-list';
    $this->briefDescription = 'action list wo haku';
    $this->detailedDescription = <<<EOF
ganbare

component ga hoshii baai ha --component tukeroyo
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    $actionList = array();

    $app = $arguments['application'];
    $moduleBaseDirs = array();
    foreach ($this->configuration->getPluginPaths() as $path)
    {
      $moduleBaseDirs[] = $path.'/modules';
      $moduleBaseDirs[] = $path.'/apps/'.$app.'/modules';
    }
    $moduleBaseDirs[] = $this->configuration->getSymfonyLibDir().'/controller';
    $moduleBaseDirs[] = sfConfig::get('sf_app_module_dir');

    $moduleDirs = sfFinder::type('dir')->maxdepth(0)->in($moduleBaseDirs);
    $actionDirs = array();
    foreach ($moduleDirs as $moduleDir)
    {
      $actionDirs[] = $moduleDir.'/actions';
    }

    $actions = $this->getActionsDirectories($actionDirs, $options['component']);
    foreach ($actions as $action)
    {
      $className = preg_replace('/[^a-zA-Z1-9]/', '_', $action);
      $classString = file_get_contents($action);

      eval('?>'.preg_replace('/class [^ ]+/', 'class '.$className, $classString, 1));

      if (preg_match('#.*modules/([^/]+)/.*?$#', $action, $matches))
      {
        $module = $matches[1];
      }
      else
      {
        $module = 'default';
      }

      $r = new ReflectionClass($className);
      if ($this->isSingleAction($r, $options['component']))  // single action
      {
        $actionList[] = array(
          $action,
          $module.'/'.$this->getActionNameFromFilePath($action, $options['component']),
        );
      }
      else
      {
        $methods = $r->getMethods(ReflectionMethod::IS_PUBLIC);
        foreach ($methods as $key => $method)
        {
          if ('execute' !== $method->name && 0 === strpos($method->name, 'execute'))
          {
            $prefix = ($options['component']) ? '_' : '';
            $actionName = substr($method->name, strlen('execute'));
            $actionName[0] = strtolower($actionName[0]);
            $actionList[] = array(
              $action,
              $module.'/'.$prefix.$actionName,
            );
          }
        }
      }
    }

    $i = 0;
    foreach ($actionList as $item)
    {
      if (preg_match('#.*plugins/([^/]+Plugin)/.*?$#', $item[0], $matches))
      {
        $plugin = $matches[1];
      }
      else
      {
        $plugin = 'core';
      }

      $params = array();
      list($params['module'], $params['action']) = explode('/', $item[1]);
      $routes = $this->getRouteThatMatchesParameters($params);

      if ($routes)
      {
        foreach ($routes as $name => $route)
        {
          $pattern = $route->getPattern();

          $requirements = $route->getRequirements();
          $method = isset($requirements['sf_method']) ? strtoupper(is_array($requirements['sf_method']) ? implode(', ', $requirements['sf_method']) : $requirements['sf_method']) : 'ANY';

          echo implode("\t", array($i, $item[1], $plugin, $name, $pattern, $method)).PHP_EOL;
        }
      }
      else
      {
        echo implode("\t", array($i, $item[1], $plugin)).PHP_EOL;
      }
      $i++;
    }
  }

  protected function mergeArrays($arr1, $arr2)
  {
    foreach ($arr2 as $key => $value)
    {
      $arr1[$key] = $value;
    }

    return $arr1;
  }

  private function getRouteThatMatchesParameters($parameters)
  {
    static $routes  = null;

    if (null === $routes)
    {
      $routes  = $this->getRouting()->getRoutes();
    }

    $results = array();

    foreach ($routes as $name => $route)
    {
      $defaults = $this->mergeArrays($route->getDefaultParameters(), $route->getDefaults());

      if ($defaults['module'] === $parameters['module']
          && $defaults['action'] === $parameters['action'])
      {
        $results[$name] = $route;
      }
    }

    return $results;
  }

  protected function getActionsDirectories($dirs, $isComponent = false)
  {
    if ($isComponent)
    {
      $targets = array('components.class.php', '*Component.class.php');
    }
    else
    {
      $targets = array('actions.class.php', '*Action.class.php');
    }

    return sfFinder::type('file')->name($targets)->maxdepth(0)->in($dirs);
  }

  protected function getActionNameFromFilePath($filepath, $isComponent = false)
  {
    $prefix = '';
    if ($isComponent)
    {
      $prefix = '_';
      $suffix = 'Component.class.php';
    }
    else
    {
      $suffix = 'Action.class.php';
    }

    return $prefix.substr(basename($filepath), 0, -strlen($suffix));
  }

  protected function isSingleAction(ReflectionClass $r, $isComponent = false)
  {
    return ($isComponent) ? ($r->isSubclassOf('sfComponent') && !$r->isSubclassOf('sfAction') && !$r->isSubclassOf('sfComponents')) : !$r->isSubclassOf('sfActions');
  }
}
