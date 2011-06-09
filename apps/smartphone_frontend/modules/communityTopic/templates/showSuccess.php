<?php use_helper('Date'); ?>

<div data-role="header" data-theme="b">
  <h1><?php echo '['.$communityTopic->getCommunity()->getName().'] '.__('Topic') ?></h1>
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

<?php
$q = Doctrine::getTable('CommunityTopicComment')->createQuery()
  ->where('community_topic_id = ?', $communityTopic->getId());
$pager = new sfReversibleDoctrinePager('CommunityTopicComment');
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
      <form action="<?php echo url_for('@communityTopic_comment_create?id='.$communityTopic->getId()) ?>" method="post">
      <input type="hidden" name="community_topic_comment[<?php echo $form->getCSRFFieldName() ?>]" value="<?php echo $form->getCSRFToken() ?>" />
      <textarea cols="30" rows="4" name="community_topic_comment[body]"></textarea>
      <button type="submit" data-theme="a">コメントを投稿する</button>
      </form>
    </span>
</div>
