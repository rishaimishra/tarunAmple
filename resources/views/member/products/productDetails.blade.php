@extends('Layouts.app') --}}

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | Product Details</title>
@endsection

@include('includes.head')
@include('includes.new_head')
@include('member.products.product_head_css')


@include('includes.header')







<body>


<?php
$baseUrl =url('/');
$currencySymbol="$";

$AvailableQuantity = $productDetails->quantity;

$slectedPrice = '';
$show_date = '';
$show_time = '';

$datewisePriceAvailable = 0;

if (count($checkalldates) > 0) {

    $datewisePriceAvailable = 1;
}

if (!empty($_COOKIE['price']) && !empty($_COOKIE['selectedprice']) && $_COOKIE['priceset == 1']) {
    if (!empty($_COOKIE['pro_descreption'])) {
        $productDetails->product_name = $_COOKIE['pro_descreption'];
    }
    $productDetails->single_price = $_COOKIE['price'];
    $respro->single_price = $_COOKIE['price'];
    $productDetails->pamples = $_COOKIE['noofamples'];
    $productDetails->pfwamples = $_COOKIE['freewithamples'];
    $productDetails->pdiscountprice = $_COOKIE['disprice'];
    $productDetails->pdiscount = $_COOKIE['disunt_amp'];
    $slectedPrice = $_COOKIE['selectedprice'];
    $show_date = $_COOKIE['show_date'];
    $show_time = $_COOKIE['show_time'];
    //$_COOKIE['priceset = 0;
    setcookie('priceset', 0);

    //echo "<pre>";print_R($_COOKIE);


}/*else{
    if($this->checkdates > 0){
    $i = 1;
    foreach($this->checkdates as $keysnew2){

    $productDetails->single_price=$keysnew2['price;
    $productDetails->pamples=$keysnew2['no_of_amples;
    $productDetails->pfwamples=$keysnew2['free_with_amples;
    $productDetails->pdiscountprice=$keysnew2['discount_price;
    $productDetails->pdiscount=$keysnew2['discount_amp;


    }
    }

    $slectedPrice = '';
    }     */

$UrlVendorAppend = strtolower(preg_replace('/\s+/', '', $productDetails->pvendor));

$contactMePrice = DB::table('contact_me_price')->where('ctm_product_id', $productDetails->id)->first();

$GiftcardDetail = DB::table("tbl_giftcard_detail")->where('product_id',$productDetails->id)->first();


$acpt = DB::table('tbl_vendor')
    ->select('is_accepting_orders')
    ->where('tbl_vndr_id', $productDetails->vendor_key)
    ->first();

if ($acpt) {
   // return $acpt->is_accepting_orders;
  $is_accepting_orders =$acpt->is_accepting_orders;
} else {
   // return 1;
  $is_accepting_orders=1;
}

?>



















{{-- @section('content') --}}

<section>

    <div class="all-start">
        <div class="columns-container">
            <div class="container" id="columns">
                <!-- breadcrumb -->

                <!-- ./breadcrumb -->
                <!-- row -->
                <div class="row product_detail_page_cus" id="main_row">
                    <!-- Left colunm -->
                    <div class="column col-xs-12 col-sm-3 detail_hide" id="left_column">
                        <!-- block best sellers -->
                      @include('member.products.productDetails_part1')
                      @include("member.products.productDetails_part2")
                      @include("member.products.productDetails_part3")
                      @include("member.products.productDetails_part4")

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>




















{{-- @include('includes.footer') --}}
@include('includes.script')
{{-- script 1 --}}



<script src="https://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script>

    /* var CookieIsset = false;

    if(!CookieIsset){

    delete_cookie('price');
    delete_cookie('noofamples');
    delete_cookie('freewithamples');
    delete_cookie('disprice');
    delete_cookie('disunt_amp');
    delete_cookie('selectedprice');
    }   */

    $(document).ready(function () {
        var headervalue = $(".product-name").text();
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/,/') + 1);
        var filenamema = url.substring(url.lastIndexOf('/') + 1);

        //alert(filename);
        if (filename == "/index/productdetail/pid/" + filenamema) {

            //var url = window.location.pathname;

            location = url + "/?pname=" + headervalue;
            //location = "#";
        }

        if (window.location.href.indexOf("/index/productdetail/pid") > -1) {

            //window.location.href = "<?php echo $baseUrl . '/productdetail/' . $productDetails->id; ?>";

        }

    });
</script>
<script>
    $(document).ready(function () {

        $('.items-count').on('click', function () {

            var clicked_btn = this.id;

            var AvailableQuantity = '<?php echo $AvailableQuantity; ?>';

            AvailableQuantity = parseInt(AvailableQuantity);

            if (clicked_btn == 'btn_add_one') {

                var result = document.getElementById('qty');

                var qtyinc = result.value;

                qtyinc = parseInt(qtyinc);

                if (!isNaN(qtyinc)) {

                    qtyinc = ++qtyinc;

                    if (AvailableQuantity >= qtyinc) {

                        result.value++;

                        $(".mainqty").trigger("change");

                        $('#wait_list_btn').hide();

                    } else {

                        alert("Quantity Not Available");

                        $('#wait_list_btn').show();

                        return false;
                    }
                }

            }

            if (clicked_btn == 'btn_minus_one') {

                var result = document.getElementById('qty');

                var qtydecs = result.value;

                qtydecs = parseInt(qtydecs);

                if (!isNaN(qtydecs) && qtydecs > 1) {

                    qtydecs = --qtydecs;

                    if (AvailableQuantity >= qtydecs) {

                        result.value--;

                        $(".mainqty").trigger("change");

                        $('#wait_list_btn').hide();

                    } else {

                        alert("Quantity Not Available while minus");

                        $('#wait_list_btn').show();

                        return false;
                    }
                }
            }


        });

        $('.mainqty').on('change', function () {

            var qtyinc = this.value;

            var numbers = /^[0-9]+$/;

            if (!isNaN(qtyinc) && qtyinc >= 1 && qtyinc.match(numbers)) {

                var qty = qtyinc;

                qty = parseInt(qty);

                var qtyValue = qtyinc;

                qtyValue = parseInt(qtyValue);

                var AvailableQuantity = '<?php echo $AvailableQuantity; ?>';

                AvailableQuantity = parseInt(AvailableQuantity);

                console.log("QTY => " + qty);
                console.log("Available QTY => " + AvailableQuantity);


                if (AvailableQuantity >= qty) {

                    var itemprice = '<?php echo $productDetails->single_price; ?>';
                    var buyearnamples = '<?php echo $productDetails->pamples; ?>';
                    var itemuseamples = '<?php echo $productDetails->pfwamples; ?>';
                    var itemreward = '<?php echo $productDetails->pdiscountprice; ?>';
                    var itemdiscount = '<?php echo $productDetails->pdiscount; ?>';
                    var newitemreward = (qty * itemreward);
                    var newitemdiscount = (qty * itemdiscount);
                    var newitemprice = (qty * itemprice);
                    var newbuyearnamples = ((qty * itemreward) / .12);
                    var earnrewardamples = (((newitemprice * ((itemdiscount) / 100)) / 12) * 100);

                    var newitemuseamples = (qty * itemuseamples);
                    $('#itemprice').val('<?php echo $currencySymbol; ?>' + newitemprice.toFixed(2));
                    $('#buyearnamples').val(newbuyearnamples.toFixed(2) + ' Amples');
                    $('#useamplestoshop').val(newitemuseamples.toFixed(2) + ' Amples');
                    $('#newitemprice').text(' ' + '<?php echo $currencySymbol; ?>' + newitemprice.toFixed(2));
                    //$('#usernewitemprice').val((newitemprice/qty).toFixed(2));
                    $('#usernewitemprice').val(newitemprice.toFixed(2));
                    $('#earnrewardamples').val(earnrewardamples.toFixed(2) + ' Amples');
                    $('#earnrewardonitem').val('<?php echo $currencySymbol; ?>' + newitemreward.toFixed(2));
                    if (qty > 1) {
                        var newitemdiscountpercentage = parseInt((newitemdiscount) / qty);
                        $('#youearndiscount').val(newitemdiscountpercentage.toFixed(2) + '%');
                    } else {
                        var newitemdiscountpercentage = parseInt(newitemdiscount);
                        $('#youearndiscount').val(newitemdiscountpercentage.toFixed(2) + '%');
                    }

                    $('#wait_list_btn').hide();


                } else {

                    alert("Quantity Not Available");

                    $('.mainqty').val(AvailableQuantity);

                    ChangeAcordingtoQTY(AvailableQuantity);

                    $('#wait_list_btn').show();

                    return false;
                }

            } else {

                alert("Please Enter Valid Number");

                $('.mainqty').val(1);

                $(".mainqty").trigger("change");

                return false;
            }

        });

        $('#applyamples').on('click', function () {
             var user_total_alample ={{@$user_total_alample}};

            var qty = $('#qty').val();
            var totalamples = $('#useamplestoshop').val();
            var amplesbyuser = $('#inputamples').val();
            var amplesbyusr = parseFloat(amplesbyuser);
            var totalpamples = totalamples.split(' ');
            var totalitemamples = parseFloat(totalpamples[0]);

            var checkusertotal = parseFloat(user_total_alample);
            var checkapplyample = parseFloat(amplesbyuser);

            var pattern = /^\d+(\.\d{1,2})?$/;

            if (!pattern.test(amplesbyuser)) {

                alert("Please Enter Valid Amples");
                return false;
            }

            if (amplesbyuser == '00' || amplesbyuser <= 0) {

                alert("Please Enter Valid Amples");
                return false;
            }


            if (checkapplyample > checkusertotal) {

                alert("You Don't Have Enough Ample Please Earn More Ample");
                return false;
            }


            if (amplesbyuser == '') {
                alert("Please enter number of amples you want to apply");
            } else if (amplesbyusr > totalitemamples) {
                alert("Please enter the number of amples below to total of amples for this product.");
                $('#inputamples').val('');
            } else {

                $("#btax").hide();
                $("#atax").show();

                var amplepricebyuser = ((amplesbyuser * 12) / 100);
                var itempricebyample = ((totalitemamples * 12) / 100);

                var itemprice = '<?php echo $productDetails->single_price; ?>';
                //    alert(itemprice);
                var itemreward = '<?php echo $productDetails->pdiscountprice; ?>';
                var itemdiscount = '<?php echo $productDetails->pdiscount; ?>';
                //var newitemreward = (qty * itemreward);
                var newitemprice = (qty * itemprice);
                //alert(newitemprice);
                var newitemdiscount = (qty * itemdiscount);

                // New Price by user = (amples needed to redeem - apply amples)*.12  $...

                // Earn Reward = (new price by user * discount percentage)/.12       Amples....

                // If No amples applied by user then Reward Value = (retail price * discount percentage)  $....

                // Reward Value = (new price by user * discount percentage)      $....

                // You Earn = discount percentage

                var newitempricebyuser = (itempricebyample - amplepricebyuser);

                var earnrewardamples = (((newitempricebyuser * ((itemdiscount) / 100)) / 12) * 100);

                var newitemreward = (newitempricebyuser * ((itemdiscount) / 100));

                if (newitempricebyuser == 0.00) {
                    $("#newpricesection").css("display", "block");
                    $('#newitemprice').text(' ' + '<?php echo $currencySymbol; ?>' + newitempricebyuser.toFixed(2));
                    //$('#usernewitemprice').val((newitempricebyuser/qty).toFixed(2));
                    $('#usernewitemprice').val(newitempricebyuser.toFixed(2));
                    $('#earnrewardamples').val('0.00');
                    $("#earnrewardsection").css("display", "none");
                    $(".res-collection-sub1").css("display", "none");
                    $(".res-collection-sub").css("display", "block");
                    $(".earn-reward ").css("display", "none");
                } else {
                    $(".res-collection-sub1").css("display", "block");
                    $(".res-collection-sub").css("display", "none");
                    $("#earnrewardsection").css("display", "none");
                    $("#newpricesection").css("display", "block");
                    $("#newitemprice").css("display", "block");
                    $('#newitemprice').text(' ' + '<?php echo $currencySymbol; ?>' + newitempricebyuser.toFixed(2));
                    //$('#usernewitemprice').val((newitempricebyuser/qty).toFixed(2));
                    $('#usernewitemprice').val(newitempricebyuser.toFixed(2));
                    $("#earnrewardsection").css("display", "block");
                    $('#earnrewardamples').val(earnrewardamples.toFixed(2) + ' Amples');
                    $('#earnrewardonitem').val('<?php echo $currencySymbol; ?>' + newitemreward.toFixed(2));
                    if (qty > 1) {
                        var newitemdiscountpercentage = parseInt((newitemdiscount) / qty);
                        $('#youearndiscount').val(newitemdiscountpercentage.toFixed(2) + '%');
                    } else {
                        var newitemdiscountpercentage = parseInt(newitemdiscount);
                        $('#youearndiscount').val(newitemdiscountpercentage.toFixed(2) + '%');
                    }

                    $(".earn-reward ").css("display", "block");
                }

            }

        });

    });

    function triggerLogin() {
        $('#modal_trigger').trigger("click");
    }

    function ChangeAcordingtoQTY(qty) {

        var itemprice = '<?php echo $productDetails->single_price; ?>';
        var buyearnamples = '<?php echo $productDetails->pamples; ?>';
        var itemuseamples = '<?php echo $productDetails->pfwamples; ?>';
        var itemreward = '<?php echo $productDetails->pdiscountprice; ?>';
        var itemdiscount = '<?php echo $productDetails->pdiscount; ?>';
        var newitemreward = (qty * itemreward);
        var newitemdiscount = (qty * itemdiscount);
        var newitemprice = (qty * itemprice);
        var newbuyearnamples = ((qty * itemreward) / .12);
        var earnrewardamples = (((newitemprice * ((itemdiscount) / 100)) / 12) * 100);

        var newitemuseamples = (qty * itemuseamples);
        $('#itemprice').val('<?php echo $currencySymbol; ?>' + newitemprice.toFixed(2));
        $('#buyearnamples').val(newbuyearnamples.toFixed(2) + ' Amples');
        $('#useamplestoshop').val(newitemuseamples.toFixed(2) + ' Amples');
        $('#newitemprice').text(' ' + '<?php echo $currencySymbol; ?>' + newitemprice.toFixed(2));
        //$('#usernewitemprice').val((newitemprice/qty).toFixed(2));
        $('#usernewitemprice').val(newitemprice.toFixed(2));
        $('#earnrewardamples').val(earnrewardamples.toFixed(2) + ' Amples');
        $('#earnrewardonitem').val('<?php echo $currencySymbol; ?>' + newitemreward.toFixed(2));
        if (qty > 1) {
            var newitemdiscountpercentage = parseInt((newitemdiscount) / qty);
            $('#youearndiscount').val(newitemdiscountpercentage.toFixed(2) + '%');
        } else {
            var newitemdiscountpercentage = parseInt(newitemdiscount);
            $('#youearndiscount').val(newitemdiscountpercentage.toFixed(2) + '%');
        }

    }

</script>



<script>
    $(document).ready(function () {
        $('.success-btn').click(function () {
            var data_rating = $('#ratings-hidden').val();
            var data_comment = $('#new-review').val();

            if (data_rating == '') {
                data_rating = 0;
            }

            if (data_comment == '') {
                $('.new-review-error').show();
                return false;
            }

            data = new Object();
            data.rating = data_rating;
            data.comment = data_comment;
            data.pdkey = '<?php echo $productDetails->id; ?>';
           
            var siteurl = '{{ url('index/saveusrrating') }}';
            $.ajax({
                url: siteurl,// path of the file
                data: data,
                type: "POST",
                success: function (response) {
                    if (response == 1) {
                        $('#post-review-box').hide();
                        $('.new-review-error').hide();
                        $('#open-review-box').show();
                        $('#ratings-hidden').val('');
                        $('#new-review').val('');
                        $('#count').html('0');
                        $('#stars span').each(function () {
                            $(this).removeClass("glyphicon-star").addClass("glyphicon-star-empty");
                        });

                        $("#success-review-msg").show().delay(10000).fadeOut();

                    }
                }
            });
        })

        $('#open-review-box').click(function () {

            $("#post-review-box").toggle();
        })
    })

    function showqyalert() {

        alert("Quantity Not Available");
    }

    function shownotacceptingorders() {

        alert("Currently we are not accepting orders for this store");
    }

</script>




















{{-- script -2 --}}
<script>
    $('.product-details').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#product-detail').addClass('active');
    });
    $('.rewis').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#reviews').addClass('active');
    });
    $('.aboutus').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#information').addClass('active');
    });
    $('.shuipping').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#extra-tabs').addClass('active');
    });
    $('.returnss').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#guarantees').addClass('active');
    });
    $('.nfact').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#display_nutritional').addClass('active');
    });
    $('.specialties').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#display_specialties').addClass('active');
    });
    $('.specification').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#display_specification').addClass('active');
    });
    $('.hours').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#display_hours').addClass('active');
    });

    $('.venuedetail').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#display_venue').addClass('active');
    });
    $('.onlinedetail').click(function () {
        $('.nav-tab li').removeClass('active');
        $(this).closest('li').addClass('active');
        $('.tab-container div').removeClass('active');
        $('#display_online_detail').addClass('active');
    });


    $('.modal_close').click(function () {
        $('#modal').removeClass('mynewloginbox');
    });

    $('#submt1').click(function () {

        var datepicker = $("#datepicker").val();
        var pictime = $("#pictime").val();
        alert(datepicker);
        alert(pictime);
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#stars').on('starrr:change', function (e, value) {
            //console.log(value);
            if (typeof value === "undefined") {
                //alert("inside");
                $('#count').html('0');
                $('#ratings-hidden').val(0);
            } else {
                $('#count').html(value);
                $('#ratings-hidden').val(value);
            }

        });

    });
</script>
<script>
    $(document).ready(function () {
        /*$('.datechecknew').click(function(){

        //    alert('ds');
        $( ".cloneprice" ).appendTo( ".price" );
        });
        */

    });

    function myFunctionnew(price, no_of_amples, free_with_amples, discount_price, discount_amp, selectedprice, show_date, show_time, dtp_detail) {
        //alert(price);
        //alert(no_of_amples);
        //alert(free_with_amples);
        //alert(discount_price);
        //alert(discount_amp);
        CookieIsset = true;
        document.cookie = "price=" + price;
        document.cookie = "noofamples=" + no_of_amples;
        document.cookie = "freewithamples=" + free_with_amples;
        document.cookie = "disprice=" + discount_price;
        document.cookie = "disunt_amp=" + discount_amp;
        document.cookie = "selectedprice=" + selectedprice;
        document.cookie = "priceset=" + 1;
        document.cookie = "show_time=" + show_time;
        document.cookie = "show_date=" + show_date;
        document.cookie = "pro_descreption=" + dtp_detail;
        //alert(document.cookie);
        window.location.reload(true);

    }

</script>
{{-- <script type="text/javascript" src="<?php echo $this->baseUrl('introjs/intro.js'); ?>"></script> --}}
<script>
    $(function () {
        $('.acc_ctrl').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).next().stop().slideUp(300);
            } else {
                $(this).addClass('active');
                $(this).next().stop().slideDown(300);
            }
        });
    });
</script>

</body>
