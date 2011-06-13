<?php use_helper('Date') ?>

<?php slot('title', __('Recently Posted Community Events')) ?>

<?php if ($pager->getNbResults()): ?>
  <ul data-role="listview">
  <?php foreach ($pager->getResults() as $event): ?>
    <li><a href="<?php echo url_for('@communityEvent_show?id='.$event->getId()) ?>">
      <?php echo image_tag_sf_image($event->getCommunity()->getImageFilename(), array('size' => '76x76')) ?>
      <p class="ui-li-aside"><?php echo format_datetime($event->getUpdatedAt(), 'f') ?></p>
      <p><?php echo sprintf('%s (%s)',
                            sprintf('%s(%d)', $event->getName(), $event->getCommunityEventComment()->count()),
                            $event->getCommunity()->getName() ) ?></p>
    </a>
    </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
