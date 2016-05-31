window.MT_app = angular.module('gps_app', []);

// -------------------------CONTROLLER ANGULAR JS----------------------------------------

MT_app.controller('home_controller', function($scope, $http, $sce, $interval) {

  //----------------------------------------------------------------------
  $scope.init = function(){

    jQuery.noConflict();
    jQuery(document).ready(function(){

      //MAP ZOOM (0 to 20)
      var zoomLevel = 16, gMap = jQuery("#gMap");

      jQuery('body').prepend("<div id='target'></div>");

      gMap.gmap3(
      {
        action: 'init',
        onces: {
          bounds_changed: function(){
            var number = 0;
            jQuery(this).gmap3({
              action:'getBounds',
              callback: function (){

                add(
                    jQuery(this),
                    number += 1,
                    "Colosseum",
                    "chi-tiet",
                    "Via Sforza, 10<br />00184 Roma, Italy",
                    "10.7539713",
                    "106.6317263",
                    // "<img width='95' height='95' src='<?php echo Asset::get_file(\'colosseum.jpg\', \'img\', \'thumbs\'); ?>' alt='' />"

                    '<img width="95" height="95" src="<?php echo Asset::get_file("colosseum.jpg", "img", "thumbs"); ?>" alt="" />'
                );

                add(
                    jQuery(this),
                    number += 1,
                    "Iguazu Falls",
                    "chi-tiet",
                    "Iguazu Falls<br />Misiones, Argentina",
                    "10.7757846",
                    "106.6672037",
                    '<img width="95" height="95" src="<?php echo Asset::get_file("iguazu.jpg", "img", "thumbs"); ?>" alt="" />'
                );

              }
            });
          }
        }
      },
      {
        action: 'setOptions', args:[{
          zoom:zoomLevel,
          scrollwheel:true,
          disableDefaultUI:true,
          disableDoubleClickZoom:true,
          draggable:true,
          mapTypeControl:true,
          panControl:true,
          scaleControl:true,
          streetViewControl:true,
          zoomControl:true,
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
          events: {
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

            if (i == 1) {
              jQuery('.marker:first-child').addClass('activeMarker').mouseover();
            }

            // Add title trên marker
            jQuerythis.gmap3({
              action:'addOverlay',
              content: '<div id="markerTitle'+i+'" class="markerTitle">'+title+'</div>',
              latLng: marker.getPosition()
            });
          }
        });
      }
    });

  }; // END INIT


}); // END CONTROLLER