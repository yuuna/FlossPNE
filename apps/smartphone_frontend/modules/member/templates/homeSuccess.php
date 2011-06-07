<div data-role="header" data-theme="b">
  <h1><?php echo __('Home') ?></h1>
</div>

<div data-role="content">
  <p><?php echo __("What's up?") ?></p>
  <ul data-role="listview" data-inset="true">
    <li>(x)<?php echo link_to(__('Messages'), 'message/index') ?></li>
    <li>(o)<?php echo link_to(__('Activities'), 'friend/showActivity') ?></li>
    <li>(o)<?php echo link_to(__('Diaries'), 'diary/list') ?></li>
    <li>(x)<?php echo link_to(__('Ranking'), 'ranking/index') ?></li>
    <li>(x)<?php echo link_to(__('Pageview logs'), 'ashiato/list') ?></li>
  </ul>

  <p><?php echo __('My') ?></p>
  <ul data-role="listview" data-inset="true">
    <li>(o)<?php echo link_to(__('Friends'), 'friend/list') ?></li>
    <li>(x)<?php echo link_to(__('Communities'), 'community/joinList?id='.$memberId) ?></li>
    <li>(x)<?php echo link_to(__('Diaries'), 'diary/listMember?id='.$memberId) ?></li>
    <li>(x)<?php echo link_to(__('Favorites'), 'favorite/list') ?></li>
<!--<li><?php echo link_to(__('write a new'), 'diary/new') ?></li>-->
    <li>(o)<?php echo link_to(__('Profile'), '@member_profile_mine') ?></li>
  </ul>

  <p><?php echo __('Search') ?></p>
  <ul data-role="listview" data-inset="true">
    <li>(x)<?php echo link_to(__('Member search'), 'member/search') ?></li>
    <li>(x)<?php echo link_to(__('Community search'), 'community/search') ?></li>
  </ul>

  <p><?php echo __('Misc') ?></p>
  <ul data-role="listview" data-inset="true">
    <li>(x)<?php echo link_to(__('Settings'), 'member/config') ?></li>
    <li>(o)<?php echo link_to(__('Logout'), '@member_logout') ?></li>
  </ul>

</div>
