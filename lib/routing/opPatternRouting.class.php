<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opPatternRouting
 *
 * @package    OpenPNE
 * @subpackage routing
 * @author     Naoya Tozuka <tozuka@tejimaya.com>
 */
class opPatternRouting extends sfPatternRouting {

  protected function fixGeneratedUrl($url, $absolute = false)
  {
    if (isset($this->options['context']['prefix']))
    {
      if (0 === strpos($url, 'http'))
      {
        $url = preg_replace('#https?\://[^/]+#', '$0'.$this->options['context']['prefix'], $url);
      }
      else
      {
        $url = $this->options['context']['prefix'].$url;
      }
    }

    if ($absolute && isset($this->options['context']['host']) && 0 !== strpos($url, 'http'))
    {
      if (isset($this->options['context']['port']) && 80 !== $this->options['context']['port'])
      {
        $port = ':'.$this->options['context']['port'];
      }
      else
      {
        $port = '';
      }

      $url = 'http'.(isset($this->options['context']['is_secure']) && $this->options['context']['is_secure'] ? 's' : '').'://'.$this->options['context']['host'].$port.$url;
    }

    return $url;
  }
}
