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



// -- testimonials products --  
$(document).ready(function () {

  const responsive = [
    {
      breakpoint: 2560,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 770,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    }
  ];
  // -- testimonials products -- 
  $('#slick-slider-2').slick({
    slidesToShow: 1,
    slidesToScroll: 1,  
    prevArrow: false,
    nextArrow: false,
    responsive: responsive
  });

  setTimeout(() => {
    $('.slick-init').css('opacity', 1)
  }, 100);


});




// -- image pagination 
$(document).ready(function () {
  const itemsPerPage = 5;
  const $vendorDivs = $('.store-pagination .vendor-div-box');
  const $paginationLinks = $('#pagination span');

  showPage(1);

  $paginationLinks.click(function (event) {
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








// ---------- PRODUCTS PAGE ----------------


function showTab(tabIndex) {
  var tabs = document.querySelectorAll('.products-tab');
  for (var i = 0; i < tabs.length; i++) {
    tabs[i].classList.remove('active-products-tab');
  }

  tabs[tabIndex].classList.add('active-products-tab');
}

// Show the initial tab
showTab(0);





// -- price filter -- 

var lowerSlider = document.querySelector('#lower');
var upperSlider = document.querySelector('#upper');

document.querySelector('#two').value = upperSlider.value;
document.querySelector('#one').value = lowerSlider.value;

var lowerVal = parseInt(lowerSlider.value);
var upperVal = parseInt(upperSlider.value);

upperSlider.oninput = function () {
  lowerVal = parseInt(lowerSlider.value);
  upperVal = parseInt(upperSlider.value);

  if (upperVal < lowerVal + 4) {
    lowerSlider.value = upperVal - 4;
    if (lowerVal == lowerSlider.min) {
      upperSlider.value = 4;
    }
  }
  document.querySelector('#two').value = this.value
};

lowerSlider.oninput = function () {
  lowerVal = parseInt(lowerSlider.value);
  upperVal = parseInt(upperSlider.value);
  if (lowerVal > upperVal - 4) {
    upperSlider.value = lowerVal + 4;
    if (upperVal == upperSlider.max) {
      lowerSlider.value = parseInt(upperSlider.max) - 4;
    }
  }
  document.querySelector('#one').value = this.value
};