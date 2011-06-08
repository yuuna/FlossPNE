<?php

/**
 * community actions.
 *
 * @package    OpenPNE
 * @subpackage community
 * @author     Your name here
 */
class communityActions extends opCommunityAction
{
 /**
  * Executes joinlist action
  *
  * @param sfRequest $request A request object
  */
  public function executeJoinlist($request)
  {
    sfConfig::set('sf_nav_type', 'default');

    if ($request->hasParameter('id') && $request->getParameter('id') != $this->getUser()->getMemberId())
    {
      sfConfig::set('sf_nav_type', 'friend');
    }

    return parent::executeJoinlist($request);
  }
}
