<?php

/**
 * communityTopic actions.
 *
 * @package    OpenPNE
 * @subpackage communityTopic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class communityTopicActions extends opCommunityTopicPluginTopicActions
{
  /**
   * postExecute
   */
  public function postExecute()
  {
    if ($this->community instanceof Community)
    {
      sfConfig::set('sf_nav_type', 'community');
      sfConfig::set('sf_nav_id', $this->community->getId());
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    $topicComment = new CommunityTopicComment();

    $this->form = new CommunityTopicCommentForm($topicComment);

    return parent::executeShow($request);
  }
}
