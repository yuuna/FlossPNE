<div data-role="header" data-theme="b">
  <h1><?php echo $member->getNameAndCount() ?></h1>
  <a data-rel="back" href="#">戻る</a>
</div>

<div data-role="content">
  <?php echo op_image_tag_sf_image($member->getImageFileName(), array('size' => '120x120')) ?><br />
  <!-- #<?php echo $member->getId() ?> -->

  <div data-role="collapsible" data-collapsed="true">
  <h3><?php echo __('Profile') ?></h3>

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

#  if ($member->getId() == $sf_user->getMemberId() && $profile->getPublicFlag() == ProfileTable::PUBLIC_FLAG_FRIEND)
#  {
#    $profileValue .= ' ('.__('Only Open to %my_friend%', array(
#      '%my_friend%' => $op_term['my_friend']->titleize()->pluralize(),
#    )).')';
#  }
#  elseif ($member->getId() == $sf_user->getMemberId() && $profile->getPublicFlag() == ProfileTable::PUBLIC_FLAG_WEB)
#  {
#    $profileValue .= ' ('.__('All Users on the Web').')';
#  }
  $list[$caption] = $profileValue;
}
?>

  <?php foreach ($list as $k => $v): ?>
    <b><?php echo __($k) ?></b><br />
    <?php echo $v ?><br />
    <hr/>
  <?php endforeach ?>
  </div><!-- collapsible -->

</div>
