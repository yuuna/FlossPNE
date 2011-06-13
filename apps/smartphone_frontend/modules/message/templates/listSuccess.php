<?#php use_helper('Date', 'JavascriptBase'); ?>

<?php 
switch ($messageType):
  case 'receive':
    $title = __('Inbox');
    $page_url = "@receiveList";
#    $sender_title = __('From');
    break;
  case 'send':
    $title = __('Sent Messages');
    $page_url = "@sendList";
#    $sender_title = __('To');
    break;
  case 'draft':
    $title = __('Drafts');
    $page_url = "@draftList";
#    $sender_title = __('To');
    break;
  case 'dust':
    $title = __('Trash');
    $page_url = "@dustList";
#    $sender_title = __('From/To');
    break;
endswitch;
?>

<div data-role="header" data-theme="b">
  <h1><?php echo $title ?></h1>
  <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
</div>

<div data-role="content">
  <?php if ($pager->getNbResults()): ?>
  <ul data-role="listview">
  <?php foreach ($pager->getResults() as $message): ?>
  <?php
switch ($messageType):
  case 'receive':
    $sender = $message->getSendFrom();
    $detail_title = $message->getSubject();
    $detail_url = '@readReceiveMessage?id='.$message->getMessageId();
    break;
  case 'send':
    $sender = $message->getSendTo();
    $detail_title = $message->getSubject();
    $detail_url = '@readSendMessage?id='.$message->getId();
    break;
  case 'draft':
    $sender = $message->getSendTo();
    $detail_title = $message->getSubject();
    $detail_url = 'message/edit?id='.$message->getId();
    break;
  case 'dust':
    $sender = $message->getSendFromOrTo();
    $detail_title = $message->getSubject();
    $detail_url = '@readDustMessage?id='.$message->getViewMessageId();
    break;
endswitch;
?>
    <li>
<?php $hasDetail = ('draft' !== $messageType || $sender->getId()); ?>
    <?php if ($hasDetail): ?><a href="<?php echo url_for($detail_url) ?>"><?php endif; ?>
    <p class="ui-li-aside"><?php echo $message->getCreatedAt() ?></p>
    <p>
<?php if ($messageType == 'send'): ?>
<?php   echo image_tag('/opMessagePlugin/images/icon_mail_3.gif') ?>
<?php elseif ($messageType == 'draft'): ?>
<?php   echo image_tag('/opMessagePlugin/images/icon_mail_1.gif') ?>
<?php elseif ($messageType == 'dust'): ?>
  <?php if ($message->getIcon() && $message->getIconAlt()): ?>
  <?php   echo image_tag('/opMessagePlugin/images/'.$message->getIcon(), array('alt' => $message->getIconAlt())) ?>
  <?php endif; ?>
<?php elseif ($message->getIsHensin() == 1): ?>
<?php   echo image_tag('/opMessagePlugin/images/icon_mail_4.gif', array('alt' => __('Replied'))) ?>
<?php elseif ($message->getIsRead() == 1): ?>
<?php   echo image_tag('/opMessagePlugin/images/icon_mail_2.gif', array('alt' => __('Open'))) ?>
<?php else: ?>
<?php   echo image_tag('/opMessagePlugin/images/icon_mail_1.gif', array('alt' => __('Unopened'))) ?>
<?php endif; ?>

<?php if ($sender->getId()): ?>
<?php   echo $sender->getName() ?>
<?php endif; ?>
      </p>
      <p><?php echo $detail_title ?></p>
      <?php if ($hasDetail): ?></a><?php endif; ?>
    </li>
<?php endforeach; ?>
  </ul>
<?php else: ?>
<?php   echo __('There are no messages') ?>
<?php endif; ?>
</div>
