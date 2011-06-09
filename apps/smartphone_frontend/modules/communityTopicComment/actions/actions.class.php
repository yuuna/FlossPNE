<?php

/**
 * communityTopicComment actions.
 *
 * @package    OpenPNE
 * @subpackage communityTopicComment
 * @author     Your name here
 */
class communityTopicCommentActions extends opCommunityTopicPluginTopicCommentActions
{
  /**
   * postExecute
   */
  public function postExecute()
  {
    sfConfig::set('sf_nav_type', 'community');
    sfConfig::set('sf_nav_id', $this->community->getId());
  }
}
