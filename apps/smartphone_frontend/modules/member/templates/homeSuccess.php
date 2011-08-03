<?php
function footer()
{
  $footer = '<div data-role="footer"><p>'
          . link_to('プライバシーポリシー', 'default/privacyPolicy')
          . ' '
          . link_to('利用規約', 'default/userAgreement')
          . '</p></div>';

  return $footer;
}
?>

<div data-role="page" id="home">
  <div data-role="header" data-theme="b">
<a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
     <h1><?php echo opConfig::get('sns_name') ?></h1>
    <a href="#menu" data-rel="dialog" data-transition="pop" data-icon="home" data-iconpos="notext" data-theme="b" class="ui-btn-right jqm-home">Menu</a>     
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true" data-theme="e">
    <?php include_component('diary', 'noticeUnreadDiaryComment') ?>
    <?php include_component('message', 'unreadMessage') ?>
    </ul>
  </div>

  <?php echo footer() ?>
</div><!-- page "home" -->
