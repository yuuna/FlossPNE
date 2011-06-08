<?php use_helper('Date') ?>


<div data-role="header" data-theme="b">
  <h1><?php echo __('Recently Posted Community Topics') ?></h1>
  <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
</div>

<?php if ($pager->getNbResults()): ?>

<div data-role="content">
  <ul data-role="listview">
  <?php foreach ($pager->getResults() as $topic): ?>
    <li><a href="<?php echo url_for('communityTopic/show?id='.$topic->getId()) ?>">
      <p class="ui-li-aside"><?php echo format_datetime($topic->getUpdatedAt(), 'f') ?></p>

      <p><?php echo sprintf('%s (%s)',
                            sprintf('%s(%d)', $topic->getName(), $topic->getCommunityTopicComment()->count()),
                            $topic->getCommunity()->getName() ) ?></p>
    </a>
    </li>
  <?php endforeach; ?>
  </ul>
</div>

<?php endif; ?>
