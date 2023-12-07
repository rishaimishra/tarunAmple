
    
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}

<!-- jQuery -->
<script src="https://code.jquery.com/jquery/3.6.4/jquery.min.js"></script>


@php
$baseurl=url('/');
@endphp

<script>

       $(document).ready(function () {
        // Code for the Validator
        var $validator = $('.card-wizard form').validate({
            rules: {
                p_title: {
                    required: true,
                    minlength: 3
                },
                d_p_title: {
                    required: true,
                    minlength: 10
                },
                p_sku: {
                    required: true,
                },
                p_qty: {
                    required: true,
                },
                typepro: {
                    required: true,
                },
                Category: {
                    required: true,
                },
                "pro_detail_image[]": {
                    extension: "jpg|png|jpeg|gif",
                },
                "pro_choose_img[]": {
                    extension: "jpg|png|jpeg|gif",
                },
                p_retail: {
                    required: true,
                },
                p_wholesel: {
                    required: true,
                },
                promess: {
                    required: true,
                },
                filemain: {
                    required: true,
                    extension: "jpg|png|jpeg|gif",
                },
                "file[]": {
                    extension: "jpg|png|jpeg|gif",
                },

            },
            messages: {
                "pro_detail_image[]": {
                    extension: "Only Select Image With Extension jpg|png|jpeg|gif"
                },
                "pro_choose_img[]": {
                    extension: "Only Select Image With Extension jpg|png|jpeg|gif"
                },
                filemain: {
                    extension: "Only Select Image With Extension jpg|png|jpeg|gif",
                    required: "Please Select File"
                },
                "file[]": {
                    extension: "Only Select Image With Extension jpg|png|jpeg|gif",
                },

            },

            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            },
            success: function (element) {
                $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
            },
            groups: {checks: checkbox_names},
            errorPlacement: function (error, element) {

                $(element).append(error);

                console.log(error.text());

                if (error.text() != '') {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: error.text(),
                    })
                }


            },
        });

        $.validator.addMethod("extension", function (value, element, param) {
            param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
            return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
        });


        $.validator.addMethod('del_checkbox', function (value) {
            return $('.del_checkbox:checked').length > 0;
        }, 'Please check at least one Delevery Method.');

        var checkboxes = $('.del_checkbox');

        var checkbox_names = $.map(checkboxes, function (e, i) {
            return $(e).attr("name")
        }).join(" ");


        // Wizard Initialization
        $('.card-wizard').bootstrapWizard({
            'tabClass': 'nav nav-pills',
            'nextSelector': '.btn-next',
            'previousSelector': '.btn-previous',

            onNext: function (tab, navigation, index) {
                var $valid = $('.card-wizard form').valid();
                if (!$valid) {
                    $validator.focusInvalid();
                    return false;
                }
            },

            onInit: function (tab, navigation, index) {
                //check number of tabs and fill the entire row
                var $total = navigation.find('li').length;
                var $wizard = navigation.closest('.card-wizard');

                $first_li = navigation.find('li:first-child a').html();
                $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
                $('.card-wizard .wizard-navigation').append($moving_div);

                refreshAnimation($wizard, index);

                $('.moving-tab').css('transition', 'transform 0s');
            },

            onTabClick: function (tab, navigation, index) {
                var $valid = $('.card-wizard form').valid();

                if (!$valid) {
                    return false;
                } else {
                    return true;
                }
            },

            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;

                var $wizard = navigation.closest('.card-wizard');

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $($wizard).find('.btn-next').hide();
                    $($wizard).find('.btn-finish').show();
                } else {
                    $($wizard).find('.btn-next').show();
                    $($wizard).find('.btn-finish').hide();
                }

                button_text = navigation.find('li:nth-child(' + $current + ') a').html();

                setTimeout(function () {
                    $('.moving-tab').text(button_text);
                }, 150);

                var checkbox = $('.footer-checkbox');

                if (!index == 0) {
                    $(checkbox).css({
                        'opacity': '0',
                        'visibility': 'hidden',
                        'position': 'absolute'
                    });
                } else {
                    $(checkbox).css({
                        'opacity': '1',
                        'visibility': 'visible'
                    });
                }

                refreshAnimation($wizard, index);
            }
        });


        // Prepare the preview for profile picture
        $("#wizard-picture").change(function () {
            readURL(this);
        });


        $('.set-full-height').css('height', 'auto');

        //Function to show image before upload

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(window).resize(function () {
            $('.card-wizard').each(function () {
                $wizard = $(this);

                index = $wizard.bootstrapWizard('currentIndex');
                refreshAnimation($wizard, index);

                $('.moving-tab').css({
                    'transition': 'transform 0s'
                });
            });
        });

        function refreshAnimation($wizard, index) {
            $total = $wizard.find('.nav li').length;
            $li_width = 100 / $total;

            total_steps = $wizard.find('.nav li').length;
            move_distance = $wizard.width() / total_steps;
            index_temp = index;
            vertical_level = 0;

            mobile_device = $(document).width() < 600 && $total > 3;

            if (mobile_device) {
                move_distance = $wizard.width() / 2;
                index_temp = index % 2;
                $li_width = 50;
            }

            $wizard.find('.nav li').css('width', $li_width + '%');

            step_width = move_distance;
            move_distance = move_distance * index_temp;

            $current = index + 1;

            if ($current == 1 || (mobile_device == true && (index % 2 == 0))) {
                move_distance -= 8;
            } else if ($current == total_steps || (mobile_device == true && (index % 2 == 1))) {
                move_distance += 8;
            }

            if (mobile_device) {
                vertical_level = parseInt(index / 2);
                vertical_level = vertical_level * 38;
            }

            $wizard.find('.moving-tab').css('width', step_width);
            $('.moving-tab').css({
                'transform': 'translate3d(' + move_distance + 'px, ' + vertical_level + 'px, 0)',
                'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

            });
        }

        $('.hr_timepicker').datetimepicker({
            //          format: 'H:mm',    // use this format if you want the 24hours hr_timepicker
            // format: 'h:mm A', //use this format if you want the 12hours timpiecker with AM/PM toggle
            format: 'H:mm', //use this format if you want the 12hours timpiecker with AM/PM toggle
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'

            }
        });

        $('.mytimepicker').datetimepicker({
            //          format: 'H:mm',    // use this format if you want the 24hours hr_timepicker
            // format: 'h:mm A', //use this format if you want the 12hours timpiecker with AM/PM toggle
            format: 'h:mm A', //use this format if you want the 12hours timpiecker with AM/PM toggle
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'

            }
        });

        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });

        $('.usdatepicker').datetimepicker({
            //format: 'MM/DD/YYYY',
            format: 'YYYY-MM-DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });


    })


    if ($(".myeditor").length) {

        $('.myeditor').each(function () {

            var editor_id = $(this).attr('id');

            //console.log(editor_id);

            CKEDITOR.replace(editor_id,
                {
                    width: '100%',
                    toolbar:
                        [
                            ['Source', '-', '-', 'Cut', 'Copy', 'Paste', '-', 'SpellChecker', '-', 'Replace', '-'],
                            ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight'],
                            ['Link', 'Unlink', 'Anchor', 'Image', 'Table', 'HorizontalRule', 'Format', 'Font', 'FontSize'],
                        ],
                    filebrowserBrowseUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });

        });
    }


    if ($("#editor_500").length) {

        //CKEDITOR.replace( 'editor_500' );

        CKEDITOR.replace("editor_500",
            {
                width: '100%',
                toolbar:
                    [
                        ['Source', '-', '-', 'Cut', 'Copy', 'Paste', '-', 'SpellChecker', '-', 'Replace', '-'],
                        ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight'],
                        ['Link', 'Unlink', 'Anchor', 'Image', 'Table', 'HorizontalRule', 'Format', 'Font', 'FontSize'],
                    ],
                filebrowserBrowseUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: 'https://expect.amplepoints.com/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });

    }


























//================== all nessasary javascript codes for fields ===========================

 $('#pvendorId').change(function () {
            /* setting currently changed option value to option variable */
            var option = $(this).find('option:selected').text();
            /* setting input box value to selected option value */
            //alert(option);
            $('#showVendorName').val(option);
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

            if (discount_percentage > 0) {

                $('input[name="discount_amplifyon"]').val(discount_percentage.toFixed(2) + '%');

            } else {

                $('input[name="discount_amplifyon"]').val(0.00 + '%');
            }

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




    function toggledtdiv() {

        $("#dtpfields").toggle("slow", function () {
            // Animation complete.
        });
    }

    function toggledctmtdiv() {

        $("#ctmfields").toggle("slow", function () {
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






  function changedctmprice(ctm_discount_price) {
        // alert(priceid);
        var wsprice = parseFloat(ctm_discount_price);

        var ctm_no_of_amples = (wsprice / .12);

        $('#ctm_no_of_amples').val(ctm_no_of_amples.toFixed(2));

    }






















   
























// ============================== ALL AJAX CODE ========================================//

 $(document).ready(function () {


        load_options('', 'Category');
        load_optionsfileter('', 'Category', 'lmorecategory');
    });



// 1
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





// 2
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







// 3
function load_options(id, index) {
// alert(111)
// console.log(id, index)
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
                $("#promess").val('PROMOTIONAL CARD MUST CHECK GIFT CARD DETAILS');

            } else {

                $("#gift_card_details").hide();
            }

        }
    }








// 4
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










// country dropdown
// 5
    function coutrychange(currBox) {
        var CountryId = currBox.id;
        // alert(CountryId);
        var number = parseInt(CountryId.replace(/[^0-9\.]/g, ''), 10);

        // alert(number);

        var baseurl = '<?PHP echo $baseurl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/load-states/'+currBox.value;

        var strURL = url;
        if (currBox.value != '') {
            var query = "statename=" + currBox.value;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("get", strURL, true);
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




// 6
  function changecity(currBox) {

        var StateId = currBox.id;

        // alert(CountryId);

        var number = parseInt(StateId.replace(/[^0-9\.]/g, ''), 10);

        var baseurl = '<?PHP echo $baseurl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url =  SITEROOT + '/load-states/'+currBox.value;

        var strURL = url;
        if (currBox.value != '') {
            var query = "cityname=" + currBox.value;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("get", strURL, true);
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








// 7
   function shipcountrychange(currBox) {

        var CountryId = currBox.id;

        // alert(CountryId);

        var number = parseInt(CountryId.replace(/[^0-9\.]/g, ''), 10);

        //alert(number);

        var baseurl = '<?PHP echo $baseurl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/load-states/'+currBox.value;

        var strURL = url;
        if (currBox.value != '') {
            var query = "statename=" + currBox.value;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("get", strURL, true);
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







// 8
    function shipchangecity(currBox) {

        var StateId = currBox.id;

        // alert(CountryId);

        var number = parseInt(StateId.replace(/[^0-9\.]/g, ''), 10);

        var baseurl = '<?PHP echo $baseurl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url =  SITEROOT + '/load-states/'+currBox.value;

        var strURL = url;
        if (currBox.value != '') {
            var query = "cityname=" + currBox.value;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("get", strURL, true);
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






// 9
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










// 10
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









// onchage of vendor from vendor dropdown at the initial form part
// 11
     function VendorEvents(MyvdrID) {
       // alert(MyvdrID)
        var pvendorID = MyvdrID;
        //alert(pvendor);
        var baseurl = '<?php echo $baseurl;?>';
        var SITEROOT = baseurl;

        $.ajax({
            url: SITEROOT + '/category_filter/vendorfilter.php',
            data: {id: pvendorID},
            cache: false,
            type: 'GET'
        })
            .done(function (data) {
                // alert(data);
                $('#s1').html(data);
                $("#s1").selectpicker('refresh');

            })

        $.ajax({
            url: SITEROOT + '/category_filter/vendorlocation.php',
            data: {id: pvendorID},
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


        $.ajax({
            url: SITEROOT + '/category_filter/vendorbyappointlocation.php',
            data: {id: pvendorID},
            cache: false,
            type: 'GET'
        })
            .done(function (data) {
                //alert(data);


                $('#byappointstore').html(data);

                //$('#pics')css('display', 'none');

            })

    }





// 12
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

























//=================================== below functions is for edit ======================================//

// below 4 function
    function delete_detail_img(pid) {
        var check = confirm('Are you want to sure to delete?');

        if (check) {
            var baseurl = '<?PHP echo $baseurl;?>';
            var SITEROOT = baseurl;
            createXMLHttpRequest();
            var url = SITEROOT + '/admin/deletedetailproimg/'+pid;

            var strURL = url;

            if (pid != '') {
                var query = "deleteid=" + pid;

                if (xmlHttpRequest != null) {
                    xmlHttpRequest.open("get", strURL, true);
                    xmlHttpRequest.onreadystatechange = (function (x, m) {
                        return function () {
                            console.log(111111,x,m)
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
            var url = SITEROOT + '/admin/deleteproattributes/'+pid;

            var strURL = url;

            if (pid != '') {
                var query = "deleteid=" + pid + "&att_type=image";

                if (xmlHttpRequest != null) {
                    xmlHttpRequest.open("get", strURL, true);
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
            var url = SITEROOT + '/admin/deletedatewiseproduct/'+pid;

            var strURL = url;

            if (pid != '') {
                var query = "deleteid=" + pid;

                if (xmlHttpRequest != null) {
                    xmlHttpRequest.open("get", strURL, true);
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
            var url = SITEROOT + '/admin/deleteproductdetailimage/'+pid;

            var strURL = url;

            if (pid != '') {
                var query = "deleteid=" + pid;

                if (xmlHttpRequest != null) {
                    xmlHttpRequest.open("get", strURL, true);
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





</script>