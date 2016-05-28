<div id="contentContainer">
  <div id="content">

  <script type="text/javascript">
  //<![CDATA[
  jQuery.noConflict(); jQuery(document).ready(function(){
      //MAP ZOOM (0 to 20)
      var zoomLevel = 3,
    gMap = jQuery("#gMap"),
    //iPad,iPhone,iPod...
    deviceAgent = navigator.userAgent.toLowerCase(),
    iPadiPhone = deviceAgent.match(/(iphone|ipod|ipad)/);

    //iPad Stuff
    if (iPadiPhone) {
      //ADD MAP CONTROLS AND POST ARROWS
      jQuery("#footer").prepend('<div class="markerNav" title="Prev" id="prevMarker">&lsaquo;</div><div id="markers"></div><div class="markerNav" title="Next" id="nextMarker">&rsaquo;</div><div id="mapTypeContainer"><div id="mapStyleContainer"><div id="mapStyle" class="satellite"></div></div><div id="mapType" title="Map Type" class="satellite"></div></div>');
    } else {//IF NOT iPad

      jQuery(document).on('click', '#zoomIn', function(){
        zoomLevel += 1;
        gMap.gmap3({action: 'setOptions', args:[{zoom:zoomLevel}]});
      });

      jQuery(document).on('click', '#zoomOut', function(){
        zoomLevel -= 1;
        gMap.gmap3({action: 'setOptions', args:[{zoom:zoomLevel}]});
      });

      //ADD MAP CONTROLS AND POST ARROWS
      jQuery("#footer").prepend('<div class="markerNav" title="Prev" id="prevMarker">&lsaquo;</div><div id="markers"></div><div class="markerNav" title="Next" id="nextMarker">&rsaquo;</div><div id="mapTypeContainer"><div id="mapStyleContainer"><div id="mapStyle" class="satellite"></div></div><div id="mapType" title="Map Type" class="satellite"></div></div><div class="zoomControl" title="Zoom Out" id="zoomOut"><?php echo Asset::img("zoomOut.png") ?></div><div class="zoomControl" title="Zoom In" id="zoomIn"><?php echo Asset::img("zoomIn.png") ?></div>');
    }

    jQuery('body').prepend("<div id='target'></div>");

    gMap.gmap3({
      action: 'init',
        onces: {
          bounds_changed: function(){
            var number = 0;
            jQuery(this).gmap3({
              action:'getBounds',
              callback: function (){


//ADD MARKERS HERE - FORMAT IS AS FOLLOWS...
//add(jQuery(this), number += 1, "NAME", "URL","ADDRESS1<br />ADDRESS2","LATITUDE","LONGITUDE", 'THUMBNAIL');
add(
    jQuery(this),
    number += 1,
    "Colosseum",
    "chi-tiet",
    "Via Sforza, 10<br />00184 Roma, Italy","41.890202","12.492228",
    '<img width="95" height="95" src="<?php echo Asset::get_file('colosseum.jpg', 'img', 'thumbs'); ?>" alt="" />'
  );

add(
    jQuery(this),
    number += 1,
    "Iguazu Falls",
    "chi-tiet",
    "Iguazu Falls<br />Misiones, Argentina",
    "-25.69506",
    "-54.440432",
    '<img width="95" height="95" src="<?php echo Asset::get_file('iguazu.jpg', 'img', 'thumbs'); ?>" alt="" />'
  );

add(
    jQuery(this),
    number += 1,
    "Great Barrier Reef",
    "chi-tiet",
    "Great Barrier Reef<br />Australia",
    "-10.21053",
    "142.159653",
    '<img width="95" height="95" src="<?php echo Asset::get_file('reef.jpg', 'img', 'thumbs'); ?>" alt="" />'
  );

add(
    jQuery(this),
    number += 1,
    "Statue of Liberty",
    "chi-tiet",
    "Liberty Island<br />New York, NY 10004",
    "40.69005",
    "-74.045067",
    '<img width="95" height="95" src="<?php echo Asset::get_file('liberty.jpg', 'img', 'thumbs'); ?>" alt="" />'
  );

add(
    jQuery(this),
    number += 1,
    "Chichen Itza",
    "chi-tiet",
    "Chichen Itza<br />Mexico",
    "20.683341",
    "-88.569009",
    '<img width="95" height="95" src="<?php echo Asset::get_file('itza.jpg', 'img', 'thumbs'); ?>" alt="" />'
  );

add(
    jQuery(this),
    number += 1,
    "Taj Mahal",
    "chi-tiet",
    "Taj Mahal<br />Agra, India",
    "27.174799",
    "78.042111",
    '<img width="95" height="95" src="<?php echo Asset::get_file('taj.jpg', 'img', 'thumbs'); ?>" alt=""" />'
  );

add(
    jQuery(this),
    number += 1,
    "Great Wall of China",
    "chi-tiet",
    "Great Wall of China<br />Beijing, China",
    "40.429076",
    "116.568219",
    '<img width="95" height="95" src="<?php echo Asset::get_file('wall.jpg', 'img', 'thumbs'); ?>" alt="" />'
  );

add(
    jQuery(this),
    number += 1,
    "Stonehenge",
    "chi-tiet",
    "4 A344 Road<br />Wiltshire, Salisbury SP4 7DE, UK",
    "51.178859",
    "-1.82622",
    "<img width='95' height='95' src='<?php echo Asset::get_file('stone.jpg', 'img', 'thumbs'); ?>' alt='' />"
  );

add(
    jQuery(this),
    number += 1,
    "Great Pyramid of Giza",
    "chi-tiet",
    "Great Pyramid of Giza<br />Egypt",
    "29.977316",
    "31.132314",
    '<img width="95" height="95" src="<?php echo Asset::get_file('giza.jpg', 'img', 'thumbs'); ?>" alt="" />'
  );

add(
    jQuery(this),
    number += 1,
    "Grand Canyon",
    "chi-tiet",
    "Grand Canyon<br />Williams, AZ",
    "36.34313",
    "-112.51339",
    '<img width="95" height="95" src="<?php echo Asset::get_file('canyon.jpg', 'img', 'thumbs'); ?>" alt="" />'
  );

add(
    jQuery(this),
    number += 1,
    "Eiffel Tower",
    "chi-tiet",
    "Parc du Champ de Mars, 5 Ave Anatole France <br />75007 Paris, France",
    "48.858588",
    "2.293847",
    '<img width="95" height="95" src="<?php echo Asset::get_file('tower.jpg', 'img', 'thumbs'); ?>" alt="" />'
  );

                  }
                });
              }
            }
          },{
      action: 'setOptions', args:[{
        zoom:zoomLevel,
        scrollwheel:false,
        disableDefaultUI:true,
        disableDoubleClickZoom:true,
        draggable:true,
        mapTypeControl:false,
        panControl:false,
        scaleControl:false,
        streetViewControl:false,
        zoomControl:false,
        //MAP TYPE: 'roadmap', 'satellite', 'hybrid'
        mapTypeId:'roadmap'
      }]
    });
        function add(jQuerythis, i, title, link, excerpt, lati, longi, img){
          jQuerythis.gmap3({
            action : 'addMarker',
            lat:lati,
            lng:longi,
            //PIN MARKER IMAGE
            options: {icon: new google.maps.MarkerImage("<?php echo Asset::get_file('pin.png', 'img'); ?>")},
            events:{
            mouseover: function(marker){
                jQuerythis.css({cursor:'pointer'});
                jQuery('#markerTitle'+i+'').fadeIn({ duration: 200, queue: false }).animate({bottom:"32px"},{duration:200,queue:false});
                jQuery('.markerInfo').removeClass('activeInfo').hide();
                jQuery('#markerInfo'+i+'').addClass('activeInfo').show();
                jQuery('.marker').removeClass('activeMarker');
                jQuery('#marker'+i+'').addClass('activeMarker');
            },
            mouseout: function(){
                jQuerythis.css({cursor:'default'});
                jQuery('#markerTitle'+i+'').stop(true,true).fadeOut(200,function(){jQuery(this).css({bottom:"0"})});
            },
            click: function(marker){window.location = link}
        },
            callback: function(marker){
              var jQuerybutton = jQuery('<div id="marker'+i+'" class="marker"><div id="markerInfo'+i+'" class="markerInfo"><a href="'+link+'">'+img+'</a><h2><a href="'+link+'">'+title+'</a></h2><p>'+excerpt+'</p><a class="markerLink" href="'+link+'">View Details &rarr;</a><div class="markerTotal">'+i+' / <span></span></div></div></div>');
              jQuerybutton.mouseover(function(){
                  jQuerythis.gmap3({
                    action:'panTo',
                    args:[marker.position]
                  });
                  jQuery("#target").stop(true,true).fadeIn(1200).delay(500).fadeOut(1200);
               });
              jQuery('#markers').append(jQuerybutton);
              var numbers = jQuery(".markerInfo").length;
              jQuery(".markerTotal span").html(numbers);
              if(i == 1){
                jQuery('.marker:first-child').addClass('activeMarker').mouseover();
              }
              jQuerythis.gmap3({
                action:'addOverlay',
                content: '<div id="markerTitle'+i+'" class="markerTitle">'+title+'</div>',
                latLng: marker.getPosition()
               });
            }
          });
        }
});
//]]>
</script>
</div><!--end content-->
</div><!--end contentContainer-->