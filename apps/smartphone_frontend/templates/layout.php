<!DOCTYPE html>
<html lang="ja" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px max-width-1024px">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, minimum-scale=1, maximum-scale=1" name="viewport">
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <link rel="shortcut icon" href="/favicon.ico" />
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</head>
<body>
<div data-role="page" data-url="<?php echo $_SERVER['REQUEST_URI'] ?>"><?php echo $sf_content ?></div>
</body>
</html>
