<?php use_helper('Date', 'Text'); ?>

<?php slot('title', __('Message')) ?>

<p class="ui-li-aside"><?php echo $message->getCreatedAt() ?></p>
<p>
<?php if(count($fromOrToMembers) == 1): ?>
  <?php echo link_to(image_tag_sf_image($fromOrToMembers[0]->getImageFileName(), array('size' => '76x76')), 'member/profile?id='.$fromOrToMembers[0]->getId()) ?>
<?php endif; ?>

<?php if ($message->getIsSender()): ?>
  <?php echo __('To') ?>
<?php else: ?>
  <?php echo __('From') ?>
<?php endif; ?>

<?php foreach ($fromOrToMembers as $member): ?>
  <?php if ($member->getId()):?>
    <?php echo link_to($member->getName(), '@member_profile?id='.$member->getId()) ?></li>
  <?php else: ?>
    <?php $isDeletedMember = true; ?>
  <?php endif; ?>
<?php endforeach; ?>


<h3><?php echo $message->getSubject() ?></h3>
<hr/>
    
<?php $images = $message->getMessageFile() ?>
<?php if (count($images)): ?>
  <?php foreach ($images as $image): ?>
    <a href="<?php echo sf_image_path($image->getFile()) ?>" target="_blank">
    <?php echo image_tag_sf_image($image->getFile(), array('size' => '120x120')) ?></a><br/>
  <?php endforeach; ?>
<?php endif; ?>

<p><?php echo auto_link_text(nl2br($message->getDecoratedMessageBody()), 'urls', array('target' => '_blank'), true, 57) ?></p>
<hr/>
