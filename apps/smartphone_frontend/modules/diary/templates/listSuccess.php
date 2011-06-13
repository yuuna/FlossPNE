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

<?php slot('title', $title ? $title : __('diary list')) ?>

<?php if ($pager->getNbResults()): ?>
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
    
<?php else: ?>
<?php op_include_box('diaryList', (!isset($keyword)) ? __('There are no diaries.') : __('Your search "%1%" did not match any diaries.', array('%1%' => $keyword)), array('title' => $title)) ?>
<?php endif; ?>
