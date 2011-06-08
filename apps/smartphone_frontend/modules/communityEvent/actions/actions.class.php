<?php

/**
 * communityEvent actions.
 *
 * @package    OpenPNE
 * @subpackage communityEvent
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class communityEventActions extends opCommunityTopicPluginEventActions
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
}
