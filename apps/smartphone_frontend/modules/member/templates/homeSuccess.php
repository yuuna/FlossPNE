<div data-role="page" id="home">
  <div data-role="header" data-theme="b">
    <h1><?php echo __('Home') ?></h1>
  </div>

  <div data-role="content">
    <p><?php echo __("What's up?") ?></p>
    <ul data-role="listview" data-inset="true">
<!--  <li>(未)<?php echo link_to(__('Messages'), 'message/index') ?></li>-->
      <li><a href="#message"><?php echo __('Messages') ?></a></li>
      <li><?php echo link_to(__('Activities'), 'friend/showActivity') ?></li>
      <li>(未)<?php echo link_to(__('Recently Posted Community Topics'), 'communityTopic/recentlyTopicList') ?></li>
      <li>(未)<?php echo link_to(__('Recently Posted Community Events'), 'communityEvent/recentlyEventList') ?></li>
      <li><?php echo link_to(__('Diaries'), 'diary/list') ?></li>
      <li>(未)<?php echo link_to(__('Ranking'), 'ranking/index') ?></li>
      <li>(未)<?php echo link_to(__('Pageview logs'), 'ashiato/list') ?></li>
    </ul>

    <p><?php echo __('My') ?></p>
    <ul data-role="listview" data-inset="true">
      <li><?php echo link_to(__('Friends'), 'friend/list') ?></li>
      <li>(未)<?php echo link_to(__('Communities'), 'community/joinList?id='.$memberId) ?></li>
      <li>(未)<?php echo link_to(__('Diaries'), 'diary/listMember?id='.$memberId) ?></li>
      <li>(未)<?php echo link_to(__('Favorites'), 'favorite/list') ?></li>
<!--  <li><?php echo link_to(__('write a new'), 'diary/new') ?></li>-->
      <li><?php echo link_to(__('Profile'), '@member_profile_mine') ?></li>
    </ul>

    <p><?php echo __('Search') ?></p>
    <ul data-role="listview" data-inset="true">
      <li>(未)<?php echo link_to(__('Member search'), 'member/search') ?></li>
      <li>(未)<?php echo link_to(__('Community search'), 'community/search') ?></li>
    </ul>

    <p><?php echo __('Misc') ?></p>
    <ul data-role="listview" data-inset="true">
      <li>(未)<?php echo link_to(__('Settings'), 'member/config') ?></li>
      <li>(未)<?php echo link_to(__('Invite Friends'), '@member_invite') ?></li>
      <li><?php echo link_to(__('Logout'), '@member_logout') ?></li>
    </ul>
  </div>
</div><!-- page "home" -->


<div data-role="page" id="message">
  <div data-role="header" data-theme="b">
    <h1><?php echo __('Message') ?></h1>
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><?php echo link_to('受信メッセージ', 'message/index') ?></li>
      <li><?php echo link_to('送信済みメッセージ', 'message/sendList') ?></li>
      <li><?php echo link_to('下書きメッセージ', 'message/draftList') ?></li>
      <li><?php echo link_to('ゴミ箱', 'message/dustList') ?></li>
    </ul>
  </div>
</div><!-- page "message" -->
