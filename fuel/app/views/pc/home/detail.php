<div id="contentContainer">
  <div id="content">

    <div id="main">

      <div id="handle"></div>
      <div id="closeBox"></div>

      <div  class="post">
        <!--POST TITLE-->
        <h2 class="posttitle">Example Map Post</h2>

        <!--BREADCRUMB LINKS-->
        <div id="crumbs"><a href="#">Home</a> &nbsp;/&nbsp; <a href="#" title="View all posts in Locations">Locations</a> &nbsp;/&nbsp; <a href="#" title="View all posts in Europe">Europe</a> &nbsp;/&nbsp; <span class="current">Current Page</span></div>

        <!--POST DETAILS-->
        <div id="entryToggle" class="toggleButton opened"><span>&times;</span>Details</div>
        <div class="entry">
          <p id='postAddr'>
            Via Sforza, 10<br />
            00184 Roma, Italy<br />
            <!--GET DIRECTIONS LINK-->
            <em><a target='_blank' title='Get Directions' href='http://maps.google.com/maps?daddr=Via Sforza, 10 00184 Roma, Italy'>Get Directions &rarr;</a></em>
          </p>
          <!--GREEN CHECKMARK LIST-->
          <ul class="goodList">
            <li>Good Stuff</li>
            <li>Can Be Listed</li>
            <li>Like This</li>
          </ul>
          <!--YELLOW YIELD SIGN LIST-->
          <ul class="okList">
            <li>Okay Stuff</li>
            <li>Can Be Listed</li>
            <li>Like This</li>
          </ul>
          <!--RED EXCLAMATION POINT LIST-->
          <ul class="badList">
            <li>Bad Stuff</li>
            <li>Can Be Listed</li>
            <li>Like This</li>
          </ul>
        </div><!--end entry-->

        <!--SHARE BUTTONS-->
        <div id="socialToggle" class="toggleButton closed"><span>+</span>Share</div>
        <div class="social">

        </div><!--end social-->

        <!--RELATED POSTS-->
        <div id="relatedToggle" class="toggleButton"><span>+</span>Related</div>
        <div class="related">

        </div><!--end related-->

        <!--META INFO-->
        <div id="tagsToggle" class="toggleButton"><span>+</span>Meta</div>
        <div class="tags">

        </div><!--end tags-->


      </div><!--end post-->

    <script type="text/javascript">
    jQuery.noConflict(); jQuery(document).ready(function(){

      //MAP ZOOM (0 to 20)
      var zoomLevel = 16,
        gMap = jQuery("#gMap"),
        //iPad,iPhone,iPod...
        deviceAgent = navigator.userAgent.toLowerCase(),
        iPadiPhone = deviceAgent.match(/(iphone|ipod|ipad)/);

      //iPad Stuff
      if (iPadiPhone) {
        //ADDS MAP CONTROLS
        jQuery("#footer").append('<div id="mapTypeContainer"><div id="mapStyleContainer" class="gradientBorder"><div id="mapStyle"></div></div><div id="mapType" class="roadmap"></div></div>');
      } else {
        jQuery(document).on('click', '#zoomIn', function(){
          zoomLevel += 1;
          gMap.gmap3({action: 'setOptions', args:[{zoom:zoomLevel}]});
        });
        jQuery(document).on('click', '#zoomOut', function(){
          zoomLevel -= 1;
          gMap.gmap3({action: 'setOptions', args:[{zoom:zoomLevel}]});
        });
        //ADDS MAP CONTROLS
            jQuery("#footer").append('<div id="mapTypeContainer"><div id="mapStyleContainer" class="gradientBorder"><div id="mapStyle"></div></div><div id="mapType" class="roadmap"></div></div><div class="zoomControl" id="zoomOut"><?php echo Asset::img("zoomOut.png") ?></div><div class="zoomControl" id="zoomIn"><?php echo Asset::img("zoomIn.png") ?></div>');
      }

      jQuery('#gMap').gmap3({
          action: 'addMarker',
          //LATITUDE AND LONGITUDE OF MARKER - REQUIRED
          lat:41.890202,
          lng:12.492228,
          marker:{
            //PIN MARKER IMAGE
              options:{icon: new google.maps.MarkerImage('<?php echo Asset::get_file('pin.png', 'img'); ?>')}
          },
          map:{
           center: true,
           zoom: zoomLevel
          }
      },{
        action: 'setOptions', args:[{
          scrollwheel:false,
          disableDefaultUI:true,
          disableDoubleClickZoom:true,
          draggable:true,
          mapTypeControl: false,
          panControl:false,
          scaleControl:false,
          streetViewControl:false,
          zoomControl:false,
          //MAP TYPE: 'roadmap', 'satellite', 'hybrid'
          mapTypeId:'satellite'
        }]
      });
    });
    </script>

    </div><!--end main-->
  </div><!--end content-->
</div><!--end contentContainer-->