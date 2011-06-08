<?php use_helper('Date'); ?>

<div data-role="header" data-theme="b">
  <h1><?php echo '['.$community->getName().'] '.__('Topic') ?></h1>
  <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
  <!-- <p class="public">(<?#php echo $diary->getPublicFlagLabel() ?>)</p> -->
</div>

<div data-role="content">
  <p class="ui-li-aside"><?php echo op_format_date($communityTopic->getCreatedAt(), 'XDateTimeJaBr') ?></p>

  <h3><?php echo $communityTopic->getName() ?></h3>
  <p><?php if ($_member = $communityTopic->getMember()) : ?><?php echo link_to($_member->getName(), 'member/profile?id='.$_member->getId()) ?><?php endif; ?></p>
  <hr/>

<?php if (count($images = $communityTopic->getImages()) != 0): ?>
  <?php foreach ($images as $image): ?>
    <a href="<?php echo sf_image_path($image->File) ?>" target="_blank"><?php echo image_tag_sf_image($image->File, array('size' => '120x120')) ?></a><br />
  <?php endforeach; ?>
<?php endif; ?>

<?php echo op_url_cmd(nl2br($communityTopic->getBody())) ?>
<?php if ($communityTopic->isEditable($sf_user->getMemberId())): ?>
<?php endif; ?>

  <hr />

</div>