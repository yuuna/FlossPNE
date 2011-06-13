<div data-role="page" id="home">
  <div data-role="header" data-theme="b">
    <h1><?php echo $member->getNameAndCount() ?></h1>
    <a data-rel="back" href="#">戻る</a>
  </div>

  <div data-role="content">
    <?php echo op_image_tag_sf_image($member->getImageFileName(), array('size' => '120x120')) ?><br />
    <!-- #<?php echo $member->getId() ?> -->

    <div data-role="listview" data-inset="true">
    <li><a href="#profile">プロフィール</a></li>
    <li><?php echo link_to('アクティビティ', 'member/showActivity?id='.$member->getId()) ?></li>
    <li><?php echo link_to('日記', 'diary/listMember?id='.$member->getId()) ?></li>
    <li><?php echo link_to('フレンドリスト', 'friend/list?id='.$member->getId()) ?></li>
<!--
    <li>(未)<a href="#favorite">お気に入りに追加</a></li>
    <li>(未)<a href="#introduction">紹介文を書く</a></li>
-->
    <li><?php echo link_to('メッセージを送る', 'message/sendToFriend?id='.$member->getId()) ?></li>
    </div>
  </div>
</div>


<!--
  <div data-role="collapsible" data-collapsed="true">
  <h3><?php echo __('Profile') ?></h3>
-->

<?php
foreach ($member->getProfiles(true) as $profile)
{
  $caption = $profile->getProfile()->getCaption();
  if ($profile->getProfile()->isPreset())
  {
    $presetConfig = $profile->getProfile()->getPresetConfig();
    $caption = __($presetConfig['Caption']);
  }

  $profileValue = (string)$profile;
  if ('' === $profileValue)
  {
    continue;
  }

  if ($profile->getFormType() === 'textarea')
  {
    $profileValue = op_auto_link_text(nl2br($profileValue));
  }

  if ($profile->getProfile()->isPreset())
  {
    if ($profile->getFormType() === 'country_select')
    {
      $profileValue = $culture->getCountry($profileValue);
    }
    elseif ('op_preset_birthday' === $profile->getName())
    {
      $profileValue = op_format_date($profileValue, 'XShortDateJa');
    }

    $profileValue = __($profileValue);
  }

  $list[$caption] = $profileValue;
}
?>
<div data-role="page" id="profile">
  <div data-role="header" data-theme="b">
    <h1><?php echo __('Profile') ?></h1>
    <a data-rel="back" href="#">戻る</a>
  </div>

  <div data-role="content">
  <ul data-role="listview" data-inset="true">
    <li>
      <?php echo op_image_tag_sf_image($member->getImageFileName(), array('size' => '120x120')) ?>
      <h3><?php echo '氏名' ?></h3>
      <p><?php echo $member->getName() ?></p>
    </li>
    <?php foreach ($list as $k => $v): ?>
    <li>
      <h3><?php echo __($k) ?></h3>
      <p><?php echo $v ?></p>
    </li>
    <?php endforeach ?>
  </ul>
  </div>

</div>
