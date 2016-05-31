<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title><?php echo $title?></title>

    <?php echo $headers ?>
  </head>

  <body ng-app="gps_app">

    <div id="gMap"></div>

    <div id="loading"></div>
    <?php echo $content?>


    <?php echo $footers ?>
  </body>
</html>