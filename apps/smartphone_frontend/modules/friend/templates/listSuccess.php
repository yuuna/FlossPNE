<!--
# $options = array(
#  'title' => 'friend list',  // ('%friend% List', array('%friend%' => $op_term['friend']->titleize())),
#  'list' => $pager->getResults(),
#  'link_to' => '@member_profile?id=',
#  'pager' => $pager,
#  'link_to_pager' => '@friend_list?page=%d&id='.$id,
#  'use_op_link_to_member' => true,
#);
# op_include_parts('photoTable', 'friendList', $options)
-->


<div data-role="header">
<h1 class="ui-title" tabindex="0" role="heading" aria-level="1">friend list</h1>
</div>

<div data-role="content" class="ui-content" role="main">
  <ul data-role="listview" dava-split-icon="gear" data-split-theme="d" class="ui-listview">
<?php foreach ($pager->getResults() as $member): ?>
  <li class="ui-li-has-thumb ui-btn ui-btn-icon-right ui-li ui-li-has-alt ui-btn-up-c" data-theme="c">
    <div class="ui-btn-inner ui-li ui-li-has-alt">
      <div clsss="ui-btn-text">
        <a href="<?php echo url_for('@member_profile?id='.$member->getId()) ?>" class="ui-link-inherit">
          <?php echo op_image_tag_sf_image($member->getImageFileName(), array('size' => '76x76', 'class' => 'ui-li-thumb')) ?>
          <h4 class="ui-li-heading"><?php echo $member->getNameAndCount() ?></h4>
          <p class="ui-li-desc">ててて</p>
        </a>
      </div>
    </div>
    <a href="" class="ui-li-link-alt ui-btn ui-btn-up-c" data-theme="c"></a>
  </li>

<?php endforeach ?>
</ul>
</div>
