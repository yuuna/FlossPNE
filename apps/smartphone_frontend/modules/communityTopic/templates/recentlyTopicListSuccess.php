<?php use_helper('Date') ?>

<?php slot('title', __('Recently Posted Community Topics')) ?>

<?php if ($pager->getNbResults()): ?>
  <ul data-role="listview">
  <?php foreach ($pager->getResults() as $topic): ?>
    <li><a href="<?php echo url_for('@communityTopic_show?id='.$topic->getId()) ?>">
      <?php echo image_tag_sf_image($topic->getCommunity()->getImageFilename(), array('size' => '76x76')) ?>
      <p class="ui-li-aside"><?php echo format_datetime($topic->getUpdatedAt(), 'f') ?></p>

      <p><?php echo sprintf('%s (%s)',
                            sprintf('%s(%d)', $topic->getName(), $topic->getCommunityTopicComment()->count()),
                            $topic->getCommunity()->getName() ) ?></p>
    </a>
    </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
