<?php use_helper('opDiary', 'Text') ?>

<?php slot('title', __('Diary of %1%', array('%1%' => $member->name))) ?>

<p class="ui-li-aside"><?php echo op_format_date($diary->created_at, 'XDateTimeJaBr') ?></p>
<h3><?php echo $diary->title ?></h3>
<hr />

<?php if ($diary->has_images): ?>
<p>
  <?php foreach ($diary->getDiaryImagesJoinFile() as $image): ?>
  <a href="<?php echo sf_image_path($image->File) ?>" target="_blank"><?php echo image_tag_sf_image($image->File, array('size' => '120x120')) ?></a><br/>
  <?php endforeach; ?>
</p>
<?php endif; ?>

<p><?php echo auto_link_text(op_decoration(nl2br($diary->body))) ?></p>
<hr/>
    
<?php
$q = Doctrine::getTable('DiaryComment')->createQuery()
    ->where('diary_id = ?', $diary->getId());
$pager = new sfReversibleDoctrinePager('DiaryComment');
$pager->setQuery($q);
$commentCount = $diary->countDiaryComments();
?>
  <div data-role="collapsible" data-collapsed="false">
    <h1>コメント (<?php echo $commentCount ?>件)</h1>
    <ul data-role="listview">
    <?php foreach ($pager->getResults() as $diaryComment): ?>
    <li><p class="ui-li-aside"><?php echo $diaryComment->getCreatedAt() ?></p>
        <?php echo op_image_tag_sf_image($diaryComment->Member->getImageFileName(), array('size' => '76x76')) ?>
        <h4><?php echo $diaryComment->Member->getName() ?>:</h4>
        <p><?php echo $diaryComment->getBody() ?></p>
    </li>
    <?php endforeach ?>
    </ul>
  </div>

<h3>コメントを書く</h3>
  <span align="center">
    <form action="<?php echo url_for('diary_comment_create', $diary) ?>" method="post">
    <input type="hidden" name="diary_comment[<?php echo $form->getCSRFFieldName() ?>]" value="<?php echo $form->getCSRFToken() ?>" />
    <textarea cols="30" rows="4" name="diary_comment[body]"></textarea>
    <button type="submit" data-theme="a">コメントを投稿する</button>
    </form>
  </span>

<?php if (Doctrine::getTable('SnsConfig')->get('op_diary_plugin_use_email_post', true)): ?>
<?php echo str_replace('mailto:', 'sms:', op_mail_to('mail_diary_comment_create', array('id' => $diary->id), __('Post via MMS'))) ?><br>
<?php echo __('You can attach photo files to MMS.') ?><br>
<?php endif; ?>


