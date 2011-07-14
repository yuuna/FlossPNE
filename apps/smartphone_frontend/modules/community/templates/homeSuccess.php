<?php slot('title', $community->getName().__('Community')) ?>

<?php echo image_tag_sf_image($community->getImageFilename(), array('size' => '76x76')) ?>
  <p><?php echo $community->getConfig('description') ?></p>

  <div data-role="collapsible" data-collapsed="true">
    <h3>参加/退会</h3>
    <?php if (!$isAdmin): ?>
      <?php if ($isCommunityMember): ?>
        <p><?php echo link_to(__('Leave this community'), '@community_quit?id=' . $community->getId()) ?></p>
      <?php else : ?>
        <p><?php echo link_to(__('Join this community'), '@community_join?id=' . $community->getId()) ?></p>
      <?php endif; ?>
    <?php endif; ?>
  </div>

  <?php if ($isEditCommunity): ?>
    <div data-role="collapsible" data-collapsed="true">
      <p><?php echo link_to(__('Edit this community'), '@community_edit?id=' . $community->getId()) ?></p>
    </div>
  <?php endif; ?>

  <div data-role="collapsible" data-collapsed="true">
    <h3>参加メンバー</h3>
    <p><?php echo link_to(__('Community Members'), '@community_memberList?id=' . $community->getId()) ?></p>
  </div>
    
  <div data-role="collapsible" data-collapsed="true">
    <h3>トピック</h3>
    <p>(under construction..)</p>
  </div>
    
  <div data-role="collapsible" data-collapsed="true">
    <h3>イベント</h3>
    <p>(under construction..)</p>
  </div>
