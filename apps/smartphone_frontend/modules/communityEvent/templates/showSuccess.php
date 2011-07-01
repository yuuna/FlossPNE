<?php use_helper('Date'); ?>

<?php slot('title', '['.$community->getName().'] '.__('Event')) ?>

<p class="ui-li-aside"><?php echo op_format_date($communityEvent->getCreatedAt(), 'XDateTimeJaBr') ?></p>

<h3><?php echo $communityEvent->getName() ?></h3>
<p><?php if ($_member = $communityEvent->getMember()) : ?><?php echo link_to($_member->getName(), 'member/profile?id='.$_member->getId()) ?><?php endif; ?></p>
<hr/>

<?php if (count($images = $communityEvent->getImages()) != 0): ?>
  <?php foreach ($images as $image): ?>
    <a href="<?php echo sf_image_path($image->File) ?>" target="_blank"><?php echo image_tag_sf_image($image->File, array('size' => '120x120')) ?></a><br />
  <?php endforeach; ?>
<?php endif; ?>

<?php echo op_url_cmd(nl2br($communityEvent->getBody())) ?>
<?php if ($communityEvent->isEditable($sf_user->getMemberId())): ?>
<?php endif; ?>
<hr />

<?php
$q = Doctrine::getTable('CommunityEventComment')->createQuery()
  ->where('community_event_id = ?', $communityEvent->getId());
$pager = new sfReversibleDoctrinePager('CommunityEventComment');
$pager->setQuery($q);
$commentCount = $pager->getNbResults();
?>
  <div data-role="collapsible" data-collapsed="true">
    <h3>コメント<!-- (<?php echo $commentCount ?>件) --></h3>
    <ul data-role="listview">
    <?php foreach ($pager->getResults() as $comment): ?>
    <li><p class="ui-li-aside"><?php echo $comment->getCreatedAt() ?></p>
        <?php echo op_image_tag_sf_image($comment->Member->getImageFileName(), array('size' => '76x76')) ?>
        <h4><?php echo $comment->Member->getName() ?>:</h4>
        <p><?php echo $comment->getBody() ?></p>
    </li>
    <?php endforeach ?>
    </ul>
  </div>

<h3>コメントを書く</h3>
  <span align="center">
    <form action="<?php echo url_for('@communityEvent_comment_create?id='.$communityEvent->getId()) ?>" method="post">
    <input type="hidden" name="community_event_comment[<?php echo $form->getCSRFFieldName() ?>]" value="<?php echo $form->getCSRFToken() ?>" />
    <textarea cols="30" rows="4" name="community_event_comment[body]"></textarea>
    <button type="submit" data-theme="a">コメントを投稿する</button>
    </form>
  </span>

<?php if ('example.com' !== sfConfig::get('op_mail_domain')): ?>
<?php echo str_replace('mailto:', 'sms:', op_mail_to('mail_community_event_comment_create', array('id' => $communityEvent->id), __('Post via MMS'))) ?><br>
<?php echo __('You can attach photo files to MMS.') ?><br>
<?php endif; ?>
