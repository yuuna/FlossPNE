<?php slot('title', $community->getName().__('Community')) ?>
<fieldset class="ui-grid-a">
  <div class="ui-block-a">
<?php echo image_tag_sf_image($community->getImageFilename(), array('size' => '76x76')) ?>
  </div>
  <div class="ui-block-b">
  <ul data-role="listview">
    <?php if ($isEditCommunity): ?>
      <li><?php echo link_to(__('Edit this %community%'), '@community_edit?id=' . $community->getId()) ?></li>
    <?php endif; ?>
    <?php if (!$isAdmin): ?>
      <?php if ($isCommunityMember): ?>
        <li><?php echo link_to(__('Leave this community'), '@community_quit?id=' . $community->getId()) ?></li>
      <?php else : ?>
        <li><?php echo link_to(__('Join this community'), '@community_join?id=' . $community->getId()) ?></li>
      <?php endif; ?>
    <?php endif; ?>
    <li><?php echo link_to(__('Community Members'), '@community_memberList?id=' . $community->getId()) ?></li>
    <?php if ($isAdmin || $isSubAdmin): ?>
    <li>
      <?php echo link_to(__('Management member'), '@community_memberManage?id='.$community->getId()); ?>
    </li>
    <?php endif; ?>
  </ul>
  </div>
</fieldset>
<br /><br /><br />
<ul data-role="listview">
  <li data-role="list-divider">コミュニティ情報</li>
  <li>
    <p class="ui-li-desc">コミュニティ名</p>
    <p class="ui-li-aside ui-li-desc"><?php echo $community->getName() ?></p>
  </li>
<?php if ($community->community_category_id): ?>
  <li>
    <p class="ui-li-desc">コミュニティカテゴリ</li>
    <p class="ui-li-aside ui-li-desc"><?php echo $community->getCommunityCategory() ?></p>
  </li>
<?php endif; ?>
  <li>
    <p class="ui-li-desc">開設日</p>
    <p class="ui-li-aside ui-li-desc"><?php echo op_format_date($community->getCreatedAt(), 'D') ?></p>
  </li>
  <li>
    <p class="ui-li-desc">管理者</p>
    <p class="ui-li-aside ui-li-desc"><?php echo $communityAdmin->getName() ?></p>
  </li>
  <li>
    <p class="ui-li-desc">メンバー数</p>
    <p class="ui-li-aside ui-li-desc"><?php echo $community->countCommunityMembers() ?></p>
  </li>
  <li>
    <p class="ui-li-desc">コミュニティ説明文</p>
    <p class="ui-li-aside ui-li-desc"><?php echo $community->getConfig('description') ?></p>
  </li>
</ul>
<!--
  <div data-role="collapsible" data-collapsed="true">
    <h3>参加メンバー</h3>
    <p><?php echo link_to(__('Community Members'), '@community_memberList?id=' . $community->getId()) ?></p>
  </div>
-->
