<?php
/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * introfriend actions.
 *
 * @package    OpenPNE
 * @subpackage introfriend
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class opIntroFriendPluginIntroFriendActions extends sfActions
{
 /**
  * Executes first time
  */
  public function preExecute()
  {
    if (is_callable(array($this->getRoute(), 'getObject')))
    {
      $object = $this->getRoute()->getObject();
      if ($object instanceof Member)
      {
        $this->member = $object;
        $this->relation = Doctrine::getTable('MemberRelationship')->retrieveByFromAndTo($this->getUser()->getMemberId(), $this->member->getId());
      }
    }

    if (empty($this->member))
    {
      $this->member = $this->getUser()->getMember();
    }

    $this->id = $this->member->id;

    if ($this->id != $this->getUser()->getMemberId())
    {
      sfConfig::set('sf_nav_type', 'friend');
    }

  }

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex($request)
  {
    if (!$this->friendCheck())
    {
      return sfView::ERROR;
    }

    $this->introFriend = Doctrine::getTable('IntroFriend')->getByFromAndTo($this->getUser()->getMemberId(), $this->id);
    $this->form = new IntroFriendForm($this->introFriend);
    if ($request->isMethod('post'))
    {
      $array = $request->getParameter('intro_friend');
      $this->form->bind($array);
      if ($this->form->isValid())
      {
        if (!$this->introFriend)
        {
          $this->introFriend = new IntroFriend();
          $this->introFriend->setMemberIdFrom($this->getUser()->getMemberId());
          $this->introFriend->setMemberIdTo($this->id);
        }
        $this->introFriend->setContent($array['content']);
        $this->introFriend->save();

        $this->redirect('member/profile?id=' . $this->id);
        return sfView::SUCCESS;
      }
    }
    $this->member = Doctrine::getTable('Member')->find($this->id);
    return sfView::INPUT;
  }

 /**
  * Executes list action
  *
  * @param sfRequest $request A request object
  */
  public function executeList($request)
  {
    $this->pager = Doctrine::getTable('IntroFriend')->getListPager($this->id, $request->getParameter('page', 1));
    if (!$this->pager->getNbResults()) return sfView::ERROR;
  }

 /**
  * Executes delete action
  *
  * @param sfRequest $request A request object
  */
  public function executeDelete($request)
  {
    switch ($request->getParameter('target'))
    {
    case 'friend':
      $fromId = $this->id;
      $toId = $this->getUser()->getMemberId();
      break;
    case 'my':
    default:
      $fromId = $this->getUser()->getMemberId();
      $toId = $this->id;
      break;
    }
    $this->introFriend = Doctrine::getTable('IntroFriend')->getByFromAndTo($fromId, $toId);
    $this->forward404Unless($this->introFriend);

    // return uri
    switch ($request->getParameter('from'))
    {
    case 'list':
      $this->uri = $this->getController()->genUrl('@obj_introfriend?id='.$toId);
      break;
    case 'manage':
    default:
      $this->uri = $this->getController()->genUrl('@friend_manage');
    }

    // delete
    if ($request->isMethod('post'))
    {
      $request->checkCSRFProtection();
      $this->introFriend->delete();
      $this->getUser()->setFlash('notice', 'The introductory essay was deleted.');
      $this->redirect($this->uri);
    }
  }

 /**
  * Executes friend check
  */
  public function friendCheck()
  {
    // friend check
    $relation = Doctrine::getTable('MemberRelationship')->retrieveByFromAndTo($this->getUser()->getMemberId(), $this->id);
    if ($relation==null)
    {
      return false;
    }
    if(!$relation->getIsFriend())
    {
      return false;
    }
    return true;
  }
}
