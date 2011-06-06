#<?php echo $member->getId() ?>
<hr />
<?php echo op_image_tag_sf_image($member->getImageFileName(), array('size' => '120x120')) ?><br />
<?php echo $member->getNameAndCount() ?><br />

<hr />
<dl>
<?php
foreach ($member->getProfiles() as $profile)
{
  printf("<dt><b>%s</b></dt>", $profile->getName());
  printf("<dd><pre>%s</pre></dd>\n", $profile->getValue());
}
?>
</dl>
