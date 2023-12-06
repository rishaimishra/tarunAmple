@php
$baseurl = url('/');
@endphp
<!-- jQuery -->
<script src="https://code.jquery.com/jquery/3.6.4/jquery.min.js"></script>

<script>

    var xmlHttpRequest;

    function createXMLHttpRequest() {
        if (xmlHttpRequest != null && typeof xmlHttpRequest != 'undefined') {
            return;
        }
        if (window.ActiveXObject) {
            try {
                xmlHttpRequest = new ActiveXObject('Msxml2.XMLHTTP');
            } catch (exception_1) {
                try {
                    xmlHttpRequest = new ActiveXObject('Microsoft.XMLHTTP');
                } catch (exception_2) {
                }
            }
        } else if (window.XMLHttpRequest) {
            xmlHttpRequest = new XMLHttpRequest();
        }
    }

    var xmlHttpRequest1;

    function mycreateXMLHttpRequest() {
        if (xmlHttpRequest1 != null && typeof xmlHttpRequest1 != 'undefined') {
            return;
        }
        if (window.ActiveXObject) {
            try {
                xmlHttpRequest1 = new ActiveXObject('Msxml2.XMLHTTP');
            } catch (exception_1) {
                try {
                    xmlHttpRequest1 = new ActiveXObject('Microsoft.XMLHTTP');
                } catch (exception_2) {
                }
            }
        } else if (window.xmlHttpRequest) {
            xmlHttpRequest1 = new XMLHttpRequest();
        }
    }

    $(document).ready(function () {


        //load_options('','Category');

        load_optionsfileter('', 'Category', 'lmorecategory');

        $('#pvendorId').change(function () {
            /* setting currently changed option value to option variable */
            var option = $(this).find('option:selected').text();
            /* setting input box value to selected option value */
            //alert(option);
            $('#showVendorName').val(option);
        });


// that 3 below will replace by function vendorchange

        $('.pvendor').change(function () {

            var pvendor = $(this).val();
            //alert(pvendor);
            var baseurl = '<?php echo $baseurl;?>';
            var SITEROOT = baseurl;

            $.ajax({
                url: SITEROOT + '/category_filter/vendorfilter.php',
                data: {id: pvendor},
                cache: false,
                type: 'GET'
            })
                .done(function (data) {
                    // alert(data);
                    $('#s1').html(data);
                    $("#s1").selectpicker('refresh');

                })
        });

        $('.pvendor').change(function () {
            //alert('hi');
            var pvendor = $(this).val();
            var baseurl = '<?php echo $baseurl;?>';
            var SITEROOT = baseurl;
            $.ajax({
                url: SITEROOT + '/category_filter/vendorlocation.php',
                data: {id: pvendor},
                cache: false,
                type: 'GET'
            })
                .done(function (data) {
                    //alert(data);
                    //$('#pics').css('display' , 'none');
                    $('#SelectStr').css('display', 'block');
                    $('#pickupstore').html(data);

                    $("#locpick").selectpicker('refresh');


                    //$('#pics')css('display', 'none');

                })
        });

        $('.pvendor').change(function () {
            //alert('hi');
            var pvendor = $(this).val();
            var baseurl = '<?php echo $baseurl;?>';
            var SITEROOT = baseurl;
            $.ajax({
                url: SITEROOT + '/category_filter/vendorbyappointlocation.php',
                data: {id: pvendor},
                cache: false,
                type: 'GET'
            })
                .done(function (data) {
                    //alert(data);


                    $('#byappointstore').html(data);

                    //$('#pics')css('display', 'none');

                })
        });







        $('.vampli').click(function () {
            var amplival = $('.vampli').val();
            if (amplival == '5') {
                //$('#pics').css('display' , 'block');
                $(".vendorsl").hide();
                $('#pickupstore').css('display', 'none');
                $('#ampdilv').css('display', 'none');
                $('#ampbyappoint').css('display', 'none');
                $(".filter").hide();
            }
        });

        $('.vamplis').click(function () {
            var amplival = $('.vamplis').val();
            if (amplival == '6') {
                //$('#pics').css('display' , 'none');
                $(".vendorsl").show();
                $('#pickupstore').css('display', 'block');
                $('#ampdilv').css('display', 'block');
                $('#ampbyappoint').css('display', 'block');
                $(".filter").show();
            }

        });

        $('.salertradio').click(function () {

            var salertradioval = $(this).val();

            if (salertradioval == 1) {
                $("#stockqty1").show();
            }

            if (salertradioval == 2) {
                $("#stockqty1").hide();

            }

        });

        $('#typepro').change(function () {
            var typpro = $(this).val();
            if (typpro == '1') {
                $('#vendoremail').css('display', 'block');
                $('#contact_me_price').css('display', 'block');
            } else {
                $('#vendoremail').css('display', 'none');
                $('#contact_me_price').css('display', 'none');
            }
        });

        $('#pickups').click(function () {
            //alert('hi');
            $('#pickuploc').toggle();
        });

        $('.nocustloc').click(function () {
            $('#pics').css('display', 'none');
            $('#storelistdiv').css('display', 'block');

        });

        $('.custloc').click(function () {
            $('#pics').css('display', 'block');
            $('#storelistdiv').css('display', 'none');
            $('#storeuploc').css('display', 'none');
        });

        $('#online').click(function () {
            //alert('hi');
            $('#onlineloc').toggle();
        });

        $('#delivery').click(function () {
            $('#diliveradddilv').toggle();
        });

        $('#typedelfee').change(function () {
            var typeshipfee = $('#typedelfee').val();
            if (typeshipfee == 'paid') {
                $('#delfee').css('display', 'block');
            } else {
                $('#delfee').css('display', 'none');
            }
        });

        $('#shipping').click(function () {
            $('#shippingcat').toggle();
        });

        $('#typeshippfee').change(function () {
            var typeshipfee = $('#typeshippfee').val();
            if (typeshipfee == 'FF') {
                $('#shipflatfee').css('display', 'block');
                $('#shipflatfeeqty').css('display', 'block');
            } else {
                $('#shipflatfee').css('display', 'none');
                $('#shipflatfeeqty').css('display', 'none');
            }
        });

        $('#typeshipplabel').change(function () {
            var typeshipplabel = $('#typeshipplabel').val();
            if (typeshipplabel == 'ESL') {
                $('#emailshipplab').css('display', 'block');
            } else {
                $('#emailshipplab').css('display', 'none');
            }
        });

        $('.nocolor').click(function () {
            $('#displaycolor').css('display', 'none');
            //$('#displaychooseradio').css('display' , 'block');

        });

        $('.yescolor').click(function () {
            $('#displaycolor').css('display', 'block');
            //$('#displaychooseradio').css('display' , 'none');
            //$( ".nochooseimg" ).trigger( "click" );
        });


        $('.nochooseimg').click(function () {
            $('#displaychooseimg').css('display', 'none');

        });

        $('.yeschooseimg').click(function () {
            $('#displaychooseimg').css('display', 'block');
        });

        $('.nosize').click(function () {
            $('#displaysize').css('display', 'none');

        });

        $('.yessize').click(function () {
            $('#displaysize').css('display', 'block');
        });

        $('input[name="p_wholesel"]').change(function () {
            var wsp = $(this).val();
            var wsprice = parseFloat(wsp);
            var rp = $('input[name="p_retail"]').val();
            var rprice = parseFloat(rp);
            if (wsprice > rprice) {
                alert("The wholesale price must be less than or equal to retail price.");
                return false;
            }
            //var discount_percentage = ((wsprice/rprice)*100);
            var discount_percentage = (((rprice - wsprice) * 100) / rprice);
            $('input[name="discount_amplifyon"]').val(discount_percentage.toFixed(2) + '%');
        });

        $('.without_no').click(function () {
            $('#display_without_ample').css('display', 'none');
            $('#display_discount_without_ample').css('display', 'none');

        });

        $('.without_yes').click(function () {
            $('#display_without_ample').css('display', 'block');
            $('#display_discount_without_ample').css('display', 'block');
        });

        $('.is_free_product_no').click(function () {

            $('input[name="p_retail"]').val('');
            $('input[name="p_wholesel"]').val('');
            $('input[name="discount_amplifyon"]').val('');

        });

        $('.is_free_product_yes').click(function () {

            $('input[name="p_retail"]').val(parseFloat(0.00));
            $('input[name="p_wholesel"]').val(parseFloat(0.00));
            $('input[name="discount_amplifyon"]').val(parseFloat(0.00));


        });

        $('input[name="wholesel_without_ample"]').change(function () {
            var wsp = $(this).val();
            var wsprice = parseFloat(wsp);
            var rp = $('input[name="p_retail"]').val();
            var rprice = parseFloat(rp);
            if (wsprice > rprice) {
                alert("The wholesale price must be less than or equal to retail price.");
                return false;
            }
            //var discount_percentage = ((wsprice/rprice)*100);
            var discount_percentage = (((rprice - wsprice) * 100) / rprice);
            $('input[name="discount_without_ample"]').val(discount_percentage.toFixed(2) + '%');
        });

        $('.apply_offer').click(function () {
            $("#offer_box").show();

        });

        $('.not_apply_offer').click(function () {
            $("#offer_box").hide();
        });

        $('.nohours').click(function () {

            var specific_hours = $(this).val();

            if (specific_hours == 1) {
                $("#specific_hours").hide();
            }

            if (specific_hours == 0) {
                $("#specific_hours").show();

            }

        });

        $('.redeemedfor').click(function () {

            var redeemedfor = $(this).val();

            if (redeemedfor == 1) {
                $("#price_sheet_div").show();
            }

            if (redeemedfor == 0) {
                $("#price_sheet_div").hide();

            }

        });


    });

    function load_options(id, index) {

        var siteurl = "<?php echo $baseurl; ?>";
        var dataurl = siteurl + "/category_filter/ajax.php?index=" + index + "&id=" + id;

        $.ajax({
            url: dataurl,
            cache: false,
            complete: function () {
            },
            success: function (data) {
                $("#" + index).html(data);
                $("#" + index).selectpicker('refresh');
            }
        })

        if (index == 'Subcategory2') {

            if (id == 208) {

                $("#gift_card_details").show();

            } else {

                $("#gift_card_details").hide();
            }

        }
    }

    function getSubcategory() {

        var siteurl = "<?php echo $baseurl; ?>";

        var str = '';

        var val = document.getElementById('lmorecategory');

        for (i = 0; i < val.length; i++) {
            if (val[i].selected) {
                str += val[i].value + ',';
            }
        }

        var str = str.slice(0, str.length - 1);

        $.ajax({
            type: "GET",
            url: siteurl + "/category_filter/loadsubcategory.php",
            data: 'category_id=' + str,
            success: function (data) {
                $("#lmoresubcategory").html(data);
                $("#lmoresubcategory").selectpicker('refresh');
            }
        });
    }

    function getSub2category() {

        var siteurl = "<?php echo $baseurl; ?>";

        var str = '';

        var val = document.getElementById('lmoresubcategory');

        for (i = 0; i < val.length; i++) {
            if (val[i].selected) {
                str += val[i].value + ',';
            }
        }

        var str = str.slice(0, str.length - 1);

        $.ajax({
            type: "GET",
            url: siteurl + "/category_filter/loadsub2category.php",
            data: 'category_id=' + str,
            success: function (data) {
                $("#lmoresub2category").html(data);
                $("#lmoresub2category").selectpicker('refresh');
            }
        });
    }


    function coutrychange(currBox) {

        var CountryId = currBox.id;

        // alert(CountryId);

        var number = parseInt(CountryId.replace(/[^0-9\.]/g, ''), 10);

        //alert(number);

        var baseurl = '<?PHP echo $baseurl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/statelist/';

        var strURL = url;
        if (currBox.value != '') {
            var query = "statename=" + currBox.value;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                //xmlHttpRequest.onreadystatechange = showState(number);
                xmlHttpRequest.onreadystatechange = (function (x, m) {
                    return function () {
                        if (x.readyState == 4) {
                            if (x.status == 200) {
                                var response = x.responseText;
                                var stateId = 'state_' + m;
                                var cityId = 'city_' + m;

                                document.getElementById(stateId).innerHTML = response;

                                document.getElementById(cityId).innerHTML = "<option value='0'>Select City</option>";

                                $("#state_" + m).selectpicker('refresh');
                                $("#city_" + m).selectpicker('refresh');

                            }
                        }
                    }
                })(xmlHttpRequest, number);
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }


    }


    function changecity(currBox) {

        var StateId = currBox.id;

        // alert(CountryId);

        var number = parseInt(StateId.replace(/[^0-9\.]/g, ''), 10);

        var baseurl = '<?PHP echo $baseurl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/citylist/';

        var strURL = url;
        if (currBox.value != '') {
            var query = "cityname=" + currBox.value;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = (function (x, m) {
                    return function () {
                        if (x.readyState == 4) {
                            if (x.status == 200) {

                                var response = x.responseText;
                                var cityId = 'city_' + m;
                                document.getElementById(cityId).innerHTML = response;

                                $("#city_" + m).selectpicker('refresh');


                            }
                        }
                    }
                })(xmlHttpRequest, number);
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }
    }












// that 1 function
    function shipcoutrychange(currBox) {

        var CountryId = currBox.id;

        // alert(CountryId);

        var number = parseInt(CountryId.replace(/[^0-9\.]/g, ''), 10);

        //alert(number);

        var baseurl = '<?PHP echo $baseurl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/statelist/';

        var strURL = url;
        if (currBox.value != '') {
            var query = "statename=" + currBox.value;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                //xmlHttpRequest.onreadystatechange = showState(number);
                xmlHttpRequest.onreadystatechange = (function (x, m) {
                    return function () {
                        if (x.readyState == 4) {
                            if (x.status == 200) {
                                var response = x.responseText;
                                var stateId = 'shipstate_' + m;
                                var cityId = 'shipcity_' + m;

                                document.getElementById(stateId).innerHTML = response;

                                document.getElementById(cityId).innerHTML = "<option value='0'>Select City</option>";

                                $("#shipstate_" + m).selectpicker('refresh');
                                $("#shipcity_" + m).selectpicker('refresh');

                            }
                        }
                    }
                })(xmlHttpRequest, number);
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }


    }














    function shipchangecity(currBox) {

        var StateId = currBox.id;

        // alert(CountryId);

        var number = parseInt(StateId.replace(/[^0-9\.]/g, ''), 10);

        var baseurl = '<?PHP echo $baseurl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/citylist/';

        var strURL = url;
        if (currBox.value != '') {
            var query = "cityname=" + currBox.value;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = (function (x, m) {
                    return function () {
                        if (x.readyState == 4) {
                            if (x.status == 200) {

                                var response = x.responseText;
                                var cityId = 'shipcity_' + m;
                                document.getElementById(cityId).innerHTML = response;

                                $("#shipcity_" + m).selectpicker('refresh');


                            }
                        }
                    }
                })(xmlHttpRequest, number);
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }
    }


    function ajaxfunctions() {

        var httpxml;
        try {
            httpxml = new XMLHttpRequest();
        } catch (e) {
            try {
                httpxml = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    httpxml = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    alert("Your browser does not support AJAX!");
                    return false;
                }
            }
        }

        var str = '';
        var s1ar = document.getElementById('s1');
        for (i = 0; i < s1ar.length; i++) {
            if (s1ar[i].selected) {
                str += s1ar[i].value + ',';
            }
        }

        function stateck() {
            if (httpxml.readyState == 4) {
                var myarray = JSON.parse(httpxml.responseText);
                //alert(myarray);
                for (j = document.getElementById('s2').length - 1; j >= 0; j--) {
                    document.getElementById('s2').remove(j);
                }

                for (i = 0; i < myarray.data.length; i++) {
                    var optn = document.createElement("OPTION");
                    optn.text = myarray.data[i].title;
                    optn.value = myarray.data[i].id;

                    document.getElementById('s2').options.add(optn);

                    $("#s2").selectpicker('refresh');

                }

            }
        }

        var str = str.slice(0, str.length - 1); // remove the last coma from string
        var url = "<?php echo $baseurl;?>/category_filter/dd-multiple.php";
        url = url + "?cat_id=" + str;
        url = url + "&sid=" + Math.random();
        httpxml.onreadystatechange = stateck;
        httpxml.open("GET", url, true);
        httpxml.send(null);
    }

    function ajaxfunction() {

        var httpxml;
        try {
            httpxml = new XMLHttpRequest();
        } catch (e) {
            try {
                httpxml = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    httpxml = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    alert("Your browser does not support AJAX!");
                    return false;
                }
            }
        }

        var str = '';
        var s1ar = document.getElementById('s2');
        for (i = 0; i < s1ar.length; i++) {
            if (s1ar[i].selected) {
                str += s1ar[i].value + ',';
            }
        }

        function stateck() {
            if (httpxml.readyState == 4) {
                var myarray = JSON.parse(httpxml.responseText);
                //alert(myarray);
                for (j = document.getElementById('s3').length - 1; j >= 0; j--) {
                    document.getElementById('s3').remove(j);
                }

                for (i = 0; i < myarray.data.length; i++) {
                    var optn = document.createElement("OPTION");
                    optn.text = myarray.data[i].name;
                    optn.value = myarray.data[i].id;

                    document.getElementById('s3').options.add(optn);

                    $("#s3").selectpicker('refresh');

                }

            }
        }

        var str = str.slice(0, str.length - 1); // remove the last coma from string
        var url = "<?php echo $baseurl;?>/category_filter/dd-smultiple.php";
        url = url + "?cat_id=" + str;
        url = url + "&sid=" + Math.random();
        httpxml.onreadystatechange = stateck;
        httpxml.open("GET", url, true);
        httpxml.send(null);
    }


    function toggledtdiv() {

        $("#dtpfields").toggle("slow", function () {
            // Animation complete.
        });
    }

    function changedprice(priceid) {
        // alert(priceid);
        var wsp = $('#dtpwholsale_' + priceid).val();
        var wsprice = parseFloat(wsp);
        var rp = $('#dtpretail_' + priceid).val();
        var rprice = parseFloat(rp);
        if (wsprice > rprice) {
            alert("The wholesale price must be less than or equal to retail price.");
            return false;
        }
        var discount_percentage = (((rprice - wsprice) * 100) / rprice);
        $('#discountampl_' + priceid).val(discount_percentage.toFixed(2) + '%');

    }

    function load_optionsfileter(id, index, loadid) {
        var siteurl = "<?php echo $baseurl; ?>";
        var dataurl = siteurl + "/category_filter/ajax.php?index=" + index + "&id=" + id;

        $.ajax({
            url: dataurl,
            cache: false,
            complete: function () {
            },
            success: function (data) {
                $("#" + loadid).html(data);
                $("#" + loadid).selectpicker('refresh');
            }
        })
    }












// below 4 function
    function delete_detail_img(pid) {
        var check = confirm('Are you want to sure to delete?');

        if (check) {
            var baseurl = '<?PHP echo $baseurl;?>';
            var SITEROOT = baseurl;
            createXMLHttpRequest();
            var url = SITEROOT + '/admin/index/deletedetailproimg/';

            var strURL = url;

            if (pid != '') {
                var query = "deleteid=" + pid;

                if (xmlHttpRequest != null) {
                    xmlHttpRequest.open("post", strURL, true);
                    xmlHttpRequest.onreadystatechange = (function (x, m) {
                        return function () {
                            if (x.readyState == 4) {
                                if (x.status == 200) {

                                    var stateId = 'delete_detail_img_' + m;

                                    document.getElementById(stateId).remove();

                                }
                            }
                        }
                    })(xmlHttpRequest, pid);
                    xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xmlHttpRequest.send(query);
                }
            }

        }

    }

    function delete_choose_img(pid) {
        var check = confirm('Are you want to sure to delete?');

        if (check) {
            var baseurl = '<?PHP echo $baseurl;?>';
            var SITEROOT = baseurl;
            createXMLHttpRequest();
            var url = SITEROOT + '/admin/index/deleteproattributes/';

            var strURL = url;

            if (pid != '') {
                var query = "deleteid=" + pid + "&att_type=image";

                if (xmlHttpRequest != null) {
                    xmlHttpRequest.open("post", strURL, true);
                    xmlHttpRequest.onreadystatechange = (function (x, m) {
                        return function () {
                            if (x.readyState == 4) {
                                if (x.status == 200) {

                                    var stateId = 'delete_choose_img_' + m;

                                    document.getElementById(stateId).remove();

                                }
                            }
                        }
                    })(xmlHttpRequest, pid);
                    xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xmlHttpRequest.send(query);
                }
            }

        }

    }

    function deletedtwiserow(pid) {
        var check = confirm('Are you want to sure to delete?');

        if (check) {

            var baseurl = '<?PHP echo $baseurl;?>';
            var SITEROOT = baseurl;
            createXMLHttpRequest();
            var url = SITEROOT + '/admin/index/deletedatewiseproduct/';

            var strURL = url;

            if (pid != '') {
                var query = "deleteid=" + pid;

                if (xmlHttpRequest != null) {
                    xmlHttpRequest.open("post", strURL, true);
                    xmlHttpRequest.onreadystatechange = (function (x, m) {
                        return function () {
                            if (x.readyState == 4) {
                                if (x.status == 200) {

                                    var stateId = 'pptrid_' + m;

                                    document.getElementById(stateId).remove();

                                }
                            }
                        }
                    })(xmlHttpRequest, pid);
                    xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xmlHttpRequest.send(query);
                }
            }

        }

    }


    function deletepimg(pid) {
        var check = confirm('Are you want to sure to delete?');

        if (check) {
            var baseurl = '<?PHP echo $baseurl;?>';
            var SITEROOT = baseurl;
            createXMLHttpRequest();
            var url = SITEROOT + '/admin/index/deleteproductdetailimage/';

            var strURL = url;

            if (pid != '') {
                var query = "deleteid=" + pid;

                if (xmlHttpRequest != null) {
                    xmlHttpRequest.open("post", strURL, true);
                    xmlHttpRequest.onreadystatechange = (function (x, m) {
                        return function () {
                            if (x.readyState == 4) {
                                if (x.status == 200) {

                                    var stateId = 'removeimage_' + m;

                                    document.getElementById(stateId).remove();

                                }
                            }
                        }
                    })(xmlHttpRequest, pid);
                    xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xmlHttpRequest.send(query);
                }
            }

        }

    }













    function toggledctmtdiv() {

        $("#ctmfields").toggle("slow", function () {
            // Animation complete.
        });
    }

    function changedctmprice(ctm_discount_price) {
        // alert(priceid);
        var wsprice = parseFloat(ctm_discount_price);

        var ctm_no_of_amples = (wsprice / .12);

        $('#ctm_no_of_amples').val(ctm_no_of_amples.toFixed(2));

    }


</script>