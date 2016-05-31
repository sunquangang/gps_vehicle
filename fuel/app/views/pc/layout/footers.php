<div id="footer">

  <div id="markers"></div>

  <!--COPYRIGHT NOTICE - IMPORTANT! DO NOT REMOVE GOOGLE NOTICE -->
  <div id="copyright">
    &copy; 2016 The GPS Vehicle. Map by Google. Site by <a href="<?php echo Uri::create('/') ?>">GPS Vehicle</a>
  </div>

</div><!--end footer-->

<?php echo Asset::js(array(
                        'global/jquery-ui.js',
                        'global/bootstrap.js',
                        'global/angular.js',
                        'global/gmap3.min.js',
                        'global/jquery.backstretch.min.js',
                        'global/jquery.animate-colors-min.js',

                        'pc/application.js',
                        'pc/prettyphoto.js',
                        'pc/activity.js',
                        'pc/custom.js',
                      )) ?>