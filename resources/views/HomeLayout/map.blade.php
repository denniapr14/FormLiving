@section('map')

<div class="content" class="map" id="map">
    <img src="{{ asset('Home') }}/images/svg/map.svg" alt=""/>
  </div>
  <style>
  .Keep {
    fill: #17a2b7;
  }

  .Available {
    fill: #28a744;
  }

  .Sold {
    fill: #dc3546;
  }

  .onProgress {
    fill: #fec107;
  }

  .Undeveloped {
    fill: none;
  }

  .Hold {
    fill: #FFCCFF;
  }
  </style>
  <div id="popover"></div>
  <!-- PAGE PLUGINS -->
  <script type="text/javascript">
  window.onload = function() {

    //call modal
    function popover(yes) {
      $.ajax({
        url: "Sales/SalesTools/updateomah",
        type: 'post',
        data: {
          id: yes.data('id'),
          blokno: yes.attr('id')
        },
        success: function(data) {
          var result = $.parseJSON(data);
          yes.popover({
            container: '#popover',
            html: true,
            title: result.blok + ' - ' + result.nomor,
            content: result.html,
            placement: 'top',
            sanitize: false
          }).popover('show');
          $("h3.popover-header").css("background-color", color(result.status));
          $("h3.popover-header").addClass("text-center");
        }
      });
    }
    //updateyes
    function updateStatus(weh) {
      $.ajax({
        url: "Sales/SalesTools/updateomah/" + weh.html(),
        type: 'post',
        data: {
          id: weh.data('id'),
          update: true
        },
        success: function(data) {
          if (data != "not rumah") {
            $("#" + weh.data('blok') + "-" + weh.data('nomor')).css("fill", color(weh.html()));
            $("div.popover").popover('dispose');
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function color(stat) {
      var iro = 'warnaa';
      switch (stat) {
        case 'Available':
          iro = '#28a744';
          break;
        case 'Keep':
          iro = '#17a2b7';
          break;
        case 'Sold':
          iro = '#dc3546';
          break;
        case 'onProgress':
          iro = '#fec107';
          break;
        case 'Undeveloped':
          iro = 'none';
        case 'Hold':
          iro = '#FFCCFF';
          break;
      }
      return iro;
    }
    //rumah onclick no trigger if dragging
    $('body').on('mousedown mousewheel touch', function(e) {
        if ($(e.target).closest('.popover').length === 0) {
          $("div.popover").popover('dispose');
          e.stopPropagation();
        }
      })
      .bind('mousewheel', function(e) {
        $("div.popover").popover('dispose');
        e.stopPropagation();
      });
    $(document).ready(function() {
      $(document).on('mouseup', "a[data-id]", function(e) {
        e.stopPropagation();
        updateStatus($(this));
      });
      $('[data-load]').on('click', function() {
        loadrumah(setEventsOmah);
      });

      function loadrumah(callbek) {
        $.ajax({
          url: 'Sales/SalesTools/getomah/',
          type: 'post',
          data: {
            'getem': 1
          },
          success: function(data) {
            var rumah = $.parseJSON(data);
            var id;
            $.each(rumah, function(index, omahe) {
              id = omahe.blok + "-" + omahe.nomor;
              $("#" + id).removeClass('OMAHMU Keep Available onProgress Sold');
              $("#" + id).addClass('OMAHMU');
              $("#" + id).addClass(omahe.status);
              $("#" + id).attr('data-id', omahe.id_rumah);
            });
            callbek();
          }
        });
      }
      var isDragging = false;

      function setEventsOmah() {
        $('svg').children('.OMAHMU').each(function(index) {
          $(this)
            .mousedown(function() {
              isDragging = false;
            })
            .mousemove(function() {
              isDragging = true;
            })
            .mouseup(function(e) {
              var wasDragging = isDragging;
              isDragging = false;
              if (!wasDragging) {
                var yeet = $(this);
                popover(yeet);
              }
            });
        });
      }
      loadrumah(setEventsOmah);
    });

    //panzoom
    setTimeout(function() {
      var instance = new SVGPanZoom($('#Layer_1')[0], {
        zoom: {
          callback: function callback(e) {
            $("div.popover").popover('dispose');
          }
        }
      });
    }, 1000);
  };
  </script>
@endsection
