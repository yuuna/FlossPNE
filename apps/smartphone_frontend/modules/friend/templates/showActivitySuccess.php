<div data-role="header" data-theme="b">
  <h1><?php echo __('friend activity') ?></h1>
  <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
</div>

<div data-role="content">
  <ul data-role="listview">
  <?php foreach ($pager->getResults() as $activityData): ?>
    <li>
      <!-- a href="<?php echo url_for('@member_profile?id='.$activityData->Member->getId()) ?>" -->
      <?php echo op_image_tag_sf_image($activityData->Member->getImageFileName(), array('size' => '76x76')) ?>
      <p class="ui-li-aside"><?php echo substr($activityData->getCreatedAt(),11) ?></p>
      <h4><?php echo $activityData->Member->getName() ?>:</h4>
      <p><?php echo $activityData->getBody() ?></p>
      <!-- /a -->
    </li>
  <?php endforeach ?>
  </ul>
</div>
