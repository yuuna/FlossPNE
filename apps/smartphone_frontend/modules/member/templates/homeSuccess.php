<div data-role="header" data-theme="b">
  <h1>Home</h1>
</div>

<div data-role="content">
  <p>My friends</p>
  <ul data-role="listview" data-inset="true">
    <li><?php echo link_to('list', 'friend/list') ?></li>
    <li><?php echo link_to('activities', 'friend/showActivity') ?></li>
  </ul>

  <p>Diary</p>
  <ul data-role="listview" data-inset="true">
    <li><?php echo link_to('write', 'diary/new') ?></li>
    <li><?php echo link_to('list', 'diary/listMember?id='.$member->id) ?></li>
  </ul>

</div>