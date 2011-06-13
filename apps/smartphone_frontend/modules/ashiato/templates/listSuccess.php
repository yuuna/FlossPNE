<?php slot('title', __('Pageview logs')) ?>
<!-- <p><?php echo __('Pageview %d Count', array('%d' => $count)) ?></p> -->

<?php foreach ($pager->getResults() as $ashiato) : ?>
  <?php echo op_format_date($ashiato->updated_at, 'XDateTimeJaBr'); ?>&nbsp;
  <?php echo link_to($ashiato->Member_2->name, 'member/profile?id='.$ashiato->Member_2->id); ?>
  <br />
<?php endforeach ?>
