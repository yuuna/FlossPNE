<?php slot ('title', 'コミュニティに参加') ?>
<?php op_include_form('communityJoining', $form, array(
  'title'    => __('Join to "%1%"', array('%1%' => $community->getName())),
  'body'     => __('Do you really join to the following community?'),
)) ?>

