<div data-role="page" id="home">
  <div data-role="header" data-theme="b">
     <h1><?php echo opConfig::get('sns_name') ?></h1>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><a href="#messages"><?php echo __('Messages') ?></a></li>
      <li><?php echo link_to(__('Activities'), 'friend/showActivity') ?></li>
      <li><a href="#diaries"><?php echo __('Diaries') ?></a></li>
      <li><a href="#friends"><?php echo __('Friends') ?></a></li>
      <li><a href="#communities"><?php echo __('Communities') ?></a></li>
      <li><a href="#misc"><?php echo __('Misc') ?></a></li>
    </ul>
  </div>

  <div data-role="footer">
    <p align="right">
      <?php echo link_to('プライバシーポリシー', 'default/privacyPolicy') ?>
      <?php echo link_to('利用規約', 'default/userAgreement') ?>
    </p>
  </div>

</div><!-- page "home" -->


<div data-role="page" id="messages">
  <div data-role="header" data-theme="b">
    <h1><?php echo __('Messages') ?></h1>
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
</div><!-- page "messages" -->


<div data-role="page" id="diaries">
  <div data-role="header" data-theme="b">
    <h1><?php echo __('Diaries') ?></h1>
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><?php echo link_to(__('Recent Diaries'), 'diary/list') ?></li>
      <li>(未)<?php echo link_to(__('My Diaries'), 'diary/listMember?id='.$memberId) ?></li>
      <li>(未)<?php echo link_to(__('New Diary'), 'diary/new') ?></li>
    </ul>
  </div>
</div><!-- page "diaries" -->


<div data-role="page" id="friends">
  <div data-role="header" data-theme="b">
    <h1><?php echo __('Friends') ?></h1>
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><?php echo link_to(__('My Friends'), 'friend/list') ?></li>
      <li>(未)<?php echo link_to(__('Invite Friends'), '@member_invite') ?></li>
      <li>(未)<?php echo link_to(__('Member search'), 'member/search') ?></li>
    </ul>
  </div>
</div><!-- page "members" -->


<div data-role="page" id="communities">
  <div data-role="header" data-theme="b">
    <h1><?php echo __('Communities') ?></h1>
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><?php echo link_to(__('Recently Posted Community Topics'), 'communityTopic/recentlyTopicList') ?></li>
      <li><?php echo link_to(__('Recently Posted Community Events'), 'communityEvent/recentlyEventList') ?></li>
      <li><?php echo link_to(__('My Communities'), 'community/joinlist?id='.$memberId) ?></li>
      <li>(未)<?php echo link_to(__('Community search'), 'community/search') ?></li>
    </ul>
  </div>
</div><!-- page "message" -->


<div data-role="page" id="misc">
  <div data-role="header" data-theme="b">
    <h1><?php echo __('Misc') ?></h1>
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li>(未)<?php echo link_to(__('Favorites'), 'favorite/list') ?></li>
      <li><?php echo link_to(__('Pageview logs'), 'ashiato/list') ?></li>
      <li>(未)<?php echo link_to(__('Ranking'), 'ranking/index') ?></li>
      <li><?php echo link_to(__('My Profile'), '@member_profile_mine') ?></li>
      <li>(未)<?php echo link_to(__('Settings'), 'member/config') ?></li>
      <li><?php echo link_to(__('Logout'), '@member_logout') ?></li>
    </ul>
  </div>
</div><!-- page "misc" -->
