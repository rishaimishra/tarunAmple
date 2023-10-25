// Cart right slide code 
function toggleSidebarCart() {
  var sidebarCart = document.getElementById("sidebarCart");
  sidebarCart.style.right = sidebarCart.style.right === "0px" ? "-400px" : "0px"; /* Change left to right */
}





// card sidebar and top tab design
$(".sideTab-button").click(function () {
  $(".sideTab-button").removeClass('active')
  $(this).addClass('active')
  showSidebar()
})

$(".tab-button").click(function () {
  $(".tab-button").removeClass('tab-active')
  $(this).addClass('tab-active')
  showSidebar()
})

function showSidebar() {
  var leftItem = $(".sideTab-button.active").attr("id")
  var topItem = $(".tab-button.tab-active").attr("data-top-item")
  let htmlEl = ''
  $('.side-tab-content').hide()
  $('.tab-content').hide()
  console.log(leftItem);
  console.log(topItem);

  if (leftItem == 'sideTab1') {
    $('#sideTab-content1').show()
    if (topItem == 'new') {
      $('#tab1').show();
    } else if (topItem == 'on-sale') {
      $('#tab2').show();
    } else if (topItem == 'trending') {
      $('#tab3').show();
    }
  } else if (leftItem == 'sideTab2') {
    $('#sideTab-content2').show()
    if (topItem == 'new') {
      $('#tab4').show();
    } else if (topItem == 'on-sale') {
      $('#tab5').show();
    } else if (topItem == 'trending') {
      $('#tab6').show();
    }
  } else if (leftItem == 'sideTab3') {
    $('#sideTab-content3').show()
    if (topItem == 'new') {
      $('#tab7').show();
    } else if (topItem == 'on-sale') {
      $('#tab8').show();
    } else if (topItem == 'trending') {
      $('#tab9').show();
    }
  }
}





// -- slick carosule  
$(document).ready(function () {

  const responsive = [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 770,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ];

  $('#slick-slider-1').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    responsive: responsive
  });

  setTimeout(() => {
    $('.slick-init').css('opacity', 1)
  }, 100);
});




// -- image pagination 
$(document).ready(function() {
  const itemsPerPage = 5;
  const $vendorDivs = $('.store-pagination .vendor-div-box');
  const $paginationLinks = $('#pagination span');

  showPage(1);

  $paginationLinks.click(function(event) {
    event.preventDefault();
    const pageNumber = parseInt($(this).attr('id').replace('page', ''));
    showPage(pageNumber);
  });

  function showPage(pageNumber) {
    const minItem = (pageNumber - 1) * itemsPerPage;
    const maxItem = pageNumber * itemsPerPage;

    $vendorDivs.hide().slice(minItem, maxItem).show();

    $paginationLinks.removeClass('active');
    $('#page' + pageNumber).addClass('active');
  }
});