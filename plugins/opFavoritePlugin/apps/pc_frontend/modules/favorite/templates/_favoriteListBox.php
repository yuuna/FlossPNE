<?php
$options = array(
  'title' => __('Favorite list'),
  'list' => $members,
  'link_to' => '@member_profile?id=',
  'moreInfo' => array(link_to(sprintf('%s(%d)', __('Show all'), $cnt), '@favorite_list')),
  'type' => 'full',
  'row' => $row,
  'col' => $col,
);

op_include_parts('nineTable', 'favoriteList_'.$gadget->getId(), $options);
