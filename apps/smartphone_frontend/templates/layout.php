<!DOCTYPE html>
<html lang="ja">
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
<div data-role="page" data-url="<?php echo $_SERVER['REQUEST_URI'] ?>">
  <div data-role="header" data-theme="b">
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
    <h1><?php include_slot('title') ?></h1>
    <?php echo link_to('Home', '@homepage',
            array('data-icon' => 'home',
                  'data-iconpos' => 'notext',
                  'data-direction' => 'reverse',
                  'class' => 'ui-btn-right jqm-home',
                  'data-theme' => 'b')) ?>
  </div>

  <div data-role="content">
    <?php echo $sf_content ?>
  </div>

  <div data-role="footer">
    <p align="right">
      <?php echo link_to('プライバシーポリシー', 'default/privacyPolicy') ?>
      <?php echo link_to('利用規約', 'default/userAgreement') ?>
    </p>
  </div>

</div>
</body>
</html>
