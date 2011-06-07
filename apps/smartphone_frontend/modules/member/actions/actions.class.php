<?php

/**
 * member actions.
 *
 * @package    OpenPNE
 * @subpackage member
 * @author     Naoya Tozuka
 */
class memberActions extends opMemberAction
{
 /**
  * Executes login action
  *
  * @param sfRequest $request A request object
  */
  public function executeHome($request)
  {
    $this->memberId = $this->getUser()->getMemberId();
    $this->setLayout('layout0');

    return parent::executeHome($request);
  }

  public function executeLogin($request)
  {
    if (opConfig::get('external_smartphone_login_url') && $request->isMethod(sfWebRequest::GET))
    {
      $this->redirect(opConfig::get('external_smartphone_login_url'));
    }

#    $gadgets = Doctrine::getTable('Gadget')->retrieveGadgetsByTypesName('mobileLogin');
#    $this->mobileLoginContentsGadgets = $gadgets['mobileLoginContents'];

    return parent::executeLogin($request);
  }

  public function executeProfile($request)
  {
    return parent::executeProfile($request);
  }
}
