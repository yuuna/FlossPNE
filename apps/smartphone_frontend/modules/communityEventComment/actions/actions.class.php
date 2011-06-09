<?php

/**
 * communityEventComment actions.
 *
 * @package    OpenPNE
 * @subpackage communityEventComment
 * @author     Your name here
 */
class communityEventCommentActions extends opCommunityTopicPluginEventCommentActions
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
