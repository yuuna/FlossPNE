<?php use_helper('opDiary'); ?>

<?php
if (!isset($keyword))
{
  $title = __('Recently Posted Diaries');
  $pagerLink = '@diary_list?page=%d';
}
else
{
  $title = __('Search Results');
  $pagerLink = '@diary_search?keyword='.$keyword.'&page=%d';
}
?>

<div data-role="header" data-theme="b">
<h1><?php echo $title ? $title : __('diary list') ?></h1>
  <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
</div>

<!--
<div id="diarySearchFormLine" class="parts searchFormLine">
<form action="<?php echo url_for('@diary_search') ?>" method="get">
<p class="form">
<input id="keyword" type="text" class="input_text" name="keyword" size="30" value="<?php if (isset($keyword)) echo $keyword ?>" />
<input type="submit" value="<?php echo __('Search') ?>" />
</p>
</form>
</div>

-->
<?php if ($pager->getNbResults()): ?>
<div data-role="content">
  <ul data-role="listview">
  <?php foreach ($pager->getResults() as $diary): ?>
    <li>
      <a href="<?php echo url_for('diary_show', $diary) ?>">
        <?php echo image_tag_sf_image($diary->Member->getImageFilename(), array('size' => '76x76')) ?>
        <p class="ui-li-aside"><?php echo op_format_date($diary->created_at, 'XDateTimeJa') ?></p>
        <h4><?php echo $diary->Member->name ?> : <?php echo op_diary_get_title_and_count($diary) ?><?php echo op_diary_image_icon($diary) ?></h4>
        <p><?php echo op_truncate(op_decoration($diary->body, true), 100, '', 1) ?></p>
      </a>
    </li>
  <?php endforeach; ?>
  </ul>
</div>
    
<?php else: ?>
<?php op_include_box('diaryList', (!isset($keyword)) ? __('There are no diaries.') : __('Your search "%1%" did not match any diaries.', array('%1%' => $keyword)), array('title' => $title)) ?>
<?php endif; ?>
