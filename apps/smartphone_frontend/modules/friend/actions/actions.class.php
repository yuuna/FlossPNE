<?php

/**
 * friend actions.
 *
 * @package    OpenPNE
 * @subpackage friend
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class friendActions extends opFriendAction
{
/*
  public function preExecute()
  {
    parent::preExecute();

    if ($this->id == $this->getUser()->getMemberId())
    {
      sfConfig::set('sf_nav_type', 'default');
    }
  }
*/

  public function executeList(sfWebRequest $request)
  {
    $this->size = 50;

    return parent::executeList($request);
  }

#  public function executeShowActivity(sfWebRequest $request)
#  {
#  }
}