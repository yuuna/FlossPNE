<?php slot('title', $community->getName().__('Community')) ?>

<?php echo image_tag_sf_image($community->getImageFilename(), array('size' => '76x76')) ?>
  <p><?php echo $community->getConfig('description') ?></p>

  <div data-role="collapsible" data-collapsed="true">
    <h3>参加メンバー</h3>
    <p>(under construction..)</p>
  </div>
    
  <div data-role="collapsible" data-collapsed="true">
    <h3>トピック</h3>
    <p>(under construction..)</p>
  </div>
    
  <div data-role="collapsible" data-collapsed="true">
    <h3>イベント</h3>
    <p>(under construction..)</p>
  </div>
