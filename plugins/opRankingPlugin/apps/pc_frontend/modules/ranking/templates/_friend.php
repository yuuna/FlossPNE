<?php if ($memberList['number']): ?>
<?php
$list = array();
for ($i = 0; $i < $memberList['number']; $i++)
{
  $member = $memberList['model'][$i];
  $list[$i][__('No%0%', array('%0%' => $memberList['rank'][$i]))] =
    __('%0% :%1% member', array('%0%' => link_to($member->getName(), '@obj_member_profile?id='.$member->getId()), '%1%' => $memberList['count'][$i]));
  $selfintoroCaption = __('Self Introduction');
  if ($member->getProfile('op_preset_self_introduction'))
  {
    $list[$i][$selfintoroCaption] = op_truncate($member->getProfile('op_preset_self_introduction'), 36, '', 3);
  }
}

$options = array(
  'id'             => 'rankingResultList',
  'title'          => __('The No1 of the number of %friend% member is %0%', array(
    '%friend%' => $op_term['friend']->pluralize(), '%0%' => $memberList['model'][0]->getName()
  )),
  'link_to_detail' => '@obj_member_profile?id=%d',
  'model'          => $memberList['model'],
  'list'           => $list,
  'rank'           => $memberList['rank'],
);

include_partial('global/partsRankingResultList', array('options' => $options));
?>
<?php else: ?>
<?php op_include_box('friend_list', __('There is no member who has a %friend%'), array(
  'title' => __('Member of number No1 of %friend%', array('%friend%' => $op_term['friend']->pluralize()))
)); ?>
<?php endif; ?>
