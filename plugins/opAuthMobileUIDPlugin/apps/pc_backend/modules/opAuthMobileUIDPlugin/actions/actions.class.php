<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opAuthMobileUIDPlugin actions.
 *
 * @package    OpenPNE
 * @subpackage opAuthMobileUIDPluginActions
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class opAuthMobileUIDPluginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $adapter = new opAuthAdapterMobileUID('MobileUID');
    $this->form = $adapter->getAuthConfigForm();
    if ($request->isMethod(sfWebRequest::POST))
    {
      $this->form->bind($request->getParameter('auth'.$adapter->getAuthModeName()));
      if ($this->form->isValid())
      {
        $this->form->save();
        $this->redirect('opAuthMobileUIDPlugin/index');
      }
    }
  }
}
