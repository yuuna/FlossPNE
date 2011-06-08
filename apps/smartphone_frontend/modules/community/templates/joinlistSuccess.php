<div data-role="header" data-theme="b">
  <h1><?php echo __('My Communities') ?></h1>
  <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
</div>

<div data-role="content">
  <ul data-role="listview">
  <?php foreach ($pager->getResults() as $community): ?>
    <!-- 'crownIds' => $sf_data->getRaw('crownIds'), -->
    <li><a href="<?php echo url_for('community/home?id='.$community->getId()) ?>">
      <p><?php echo $community->getName() ?></p>
      </a>
    </li>
  <?php endforeach ?>
  </ul>
</div>
