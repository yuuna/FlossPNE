<?php if ($unreadMessageCount > 0): ?>
<li><?php echo link_to(__('There are new %d messages!', array('%d' => $unreadMessageCount)), 'message/index') ?></li>
<?php endif; ?>
