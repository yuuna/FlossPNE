<?php

/**
 * message actions.
 *
 * @package    OpenPNE
 * @subpackage message
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class messageActions extends opMessagePluginMessageActions
{
 /**
  * Executes send to frind action
  *
  * @param sfWebRequest A request object
  */
  public function executeSendToFriend(sfWebRequest $request)
  {
    $result = parent::executeSendToFriend($request);
#   $this->setFriendNav($this->sendMember->getId());
    return $result;
  }
}
