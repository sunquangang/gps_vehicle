<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title><?php echo $title?></title>

    <?php echo $headers ?>
  </head>

  <body>

    <div id="gMap"></div>

    <div id="header">
      <!--LOGO-->
      <a id="logo" href="<?php echo Uri::create('/') ?>"><?php echo Asset::img('logo.png') ?></a>

    </div><!--end header-->

    <div id="loading"></div>
    <?php echo $content?>


    <?php echo $footers ?>
  </body>
</html>