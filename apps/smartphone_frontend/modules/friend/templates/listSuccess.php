<div data-role="header" data-theme="b">
<!-- <h1><?php echo __('My Friends') ?></h1>-->
  <h1><?php echo __('フレンドリスト') ?></h1>
  <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
</div>

<div data-role="content">
  <ul data-role="listview">
  <?php foreach ($pager->getResults() as $member): ?>
    <li><a href="<?php echo url_for('@member_profile?id='.$member->getId()) ?>">
        <?php echo op_image_tag_sf_image($member->getImageFileName(), array('size' => '76x76')) ?>
        <h3><?php echo $member->getNameAndCount() ?></h3>
        <p><?php echo $member->getProfile('fullname') ?>
           <!-- / <?php echo $member->getProfile('op_preset_self_introduction') ?> -->
        </p>
      </a>
    </li>
  <?php endforeach ?>
  </ul>
</div>
