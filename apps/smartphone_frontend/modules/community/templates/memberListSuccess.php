<?php slot('title', __(' Community Members')) ?>

<ul data-role="listview">
<?php foreach ($pager->getResults() as $member): ?>
  <li><a href="<?php echo url_for('@member_profile?id='.$community->getId()) ?>">
    <h3><?php echo $member->getName() ?></h3>
    </a>
  </li>
<?php endforeach ?>
</ul>
