<div data-role="header" data-theme="b">
  <h1><?php echo __('Pageview logs') ?></h1>
  <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
</div>

<!--
<?php echo __('Pageview Logs of %1%', array('%1%' => $sf_user->getMember()->getName())) ?><br />
<?php echo __('Pageview %d Logs Explanation', array('%d' => sfConfig::get('mod_ashiato_max_ashiato'))) ?>
-->

<div data-role="content">
  <!-- <p><?php echo __('Pageview %d Count', array('%d' => $count)) ?></p> -->

  <?php foreach ($pager->getResults() as $ashiato) : ?>
    <?php echo op_format_date($ashiato->updated_at, 'XDateTimeJaBr'); ?>&nbsp;
    <?php echo link_to($ashiato->Member_2->name, 'member/profile?id='.$ashiato->Member_2->id); ?></li>
    <br />
  <?php endforeach ?>
</div>

