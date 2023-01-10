(function (window, $) {
  $(function () {
    /* nav dropdown */
    let navLink = $('.dropdown__menu').closest('.dropdown').children('.nav__link:first-child');

    navLink.on('click', function(e) {
      e.preventDefault();

      if($(this).hasClass('active')){
        $(this).removeClass('active')
        $(this).parent().find('.dropdown__menu').removeClass('show');
      } else {
        $(this).addClass('active')
        $(this).parent().find('.dropdown__menu').addClass('show');
      }
    })

    let toggleSidebar = $('.navbar__sidebar-toggler');
    let sidebar = $('#sidebar');


    toggleSidebar.on('click', function(e) {
      e.preventDefault();

      if($(this).hasClass('collapsed')){
        $(this).removeClass('collapsed')
        sidebar.removeClass('sidebar--collapsed');
      } else {
        $(this).addClass('collapsed')
        sidebar.addClass('sidebar--collapsed');
      }
    })

    /* Dashboard */

    $('.cd-menu').on('click', 'li', (e) => {
      e.preventDefault();

      $('#change-alert').modal('show');
      $('.custom-dropdown input[type="checkbox"]').prop('checked', false);
    });

    /* Datepicker */
    $('#datetimepicker1').datetimepicker({
      format: 'L'
    });
    $('#timepicker1').datetimepicker({
      format: 'LT'
    });
    $('#timepicker2').datetimepicker({
      format: 'LT'
    });

    /* File input*/
    $('.file-upload').on('change', (e) => {
      let displayName = e.target.value.split("\\").pop().slice(0, 11);
      let extension = e.target.value.split('.').pop();
      $(e.target).closest('.custom-input-file').find('.title')[0].textContent = displayName+'...'+extension;
    });

    /* File input 2 */
    $('.input-page__img-file').on('change', (e) => {
      let file = e.target.files[0];

      let displayName = e.target.value.split("\\").pop().slice(0, 16);
      let extension = e.target.value.split('.').pop();
      let defaultImage = $(e.target).closest('.input-page__file-upload').find('.default-img')[0];
      let previewImage = $(e.target).closest('.input-page__file-upload').find('.input-page__img-preview')[0];
      let titleImage = $(e.target).closest('.input-page__file-upload').find('.title')[0];
      let sizeImmage = $(e.target).closest('.input-page__file-upload');

      if(file){
        const reader = new FileReader();
        let fileSize = Math.round(file.size / 1024);

        reader.addEventListener('load', function() {
          previewImage.setAttribute('src', this.result);
        });

        reader.readAsDataURL(file);
        defaultImage.style.display = 'none';
        previewImage.style.display = 'block';
        titleImage.textContent = displayName+'... .'+extension;
        sizeImmage.find('.size')[0].textContent = fileSize+' kB';

      } else{
        defaultImage.style.display = null;
        previewImage.style.display = null;
        previewImage.setAttribute('src', '');
        titleImage.textContent = 'No file choosen';
        sizeImmage.find('.size')[0].textContent = '0 kB';
      }
    })

    $('.sliders').slick({
      arrows: true,
      prevArrow:"<button type='button' class='slick-arrow btn-fd-arrow slick-arrow--prev'><i class='bi bi-chevron-left'></i></button>",
      nextArrow:"<button type='button' class='slick-arrow btn-fd-arrow slick-arrow--next'><i class='bi bi-chevron-right'></i></button>"
    });

    $('.facilities__items').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });

    $('.testimoni-items').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      autoplay: true,
      autoplaySpeed: 2000,
      cssEase: 'linear'
    });

    $('.locations__items').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
    });

    /* ChartJS */
    
    const labels = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'October',
      'November',
      'December',
    ];

    const data = {
      labels: labels,
      datasets: [
        {
          label: 'Dataset 1',
          backgroundColor: 'rgb(22, 91, 170)',
          borderColor: 'rgb(22, 91, 170)',
          data: [40, 50, 30, 20, 25, 30, 45],
        },
        {
          label: 'Dataset 2',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [20, 40, 20, 50, 40, 30, 45],
        }
    ]
    };

    const config = {
      type: 'line',
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Chart.js Line Chart'
          }
        }
      },
    };

    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    /*  Upload image account setting */
  
    $('#account-img').on('change', (e) => {
      console.log(`-------------ok`)
      if (e.target.files.length > 0){
        let src = URL.createObjectURL(e.target.files[0]);
        $('#account-img-preview-1').attr('src', `${src}`);
      }
    })
  
  });
}(window, jQuery));
