<script>
// multiple product image add

 var detaiimgcounter = 2;

    $('.multi-field-wrapperprodetailimg').each(function () {

        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            //alert('hehe');

            var imgUrl = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFLwDkTYFPJCZVh9iRZ7mu8zjxu6QoiIg_8NnC0ka-fA&s';

            var htmltoadd = '<div class="col-md-4 multi-field">';

            htmltoadd += '<div class="fileinput fileinput-new text-center" data-provides="fileinput">';

            htmltoadd += '<div class="fileinput-new thumbnail">';

            htmltoadd += '<img src="' + imgUrl + '" alt="">';

            htmltoadd += '</div>';

            htmltoadd += '<div class="fileinput-preview fileinput-exists thumbnail"></div>';

            htmltoadd += '<div>';

            htmltoadd += '<span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">';

            htmltoadd += '<span class="fileinput-new">Select image</span>';
            htmltoadd += '<span class="fileinput-exists">Change</span>';
            htmltoadd += '<input accept="image/*" type="file" id="pro_detail_image_' + detaiimgcounter + '"" name="pro_detail_image[]" /> ';

            htmltoadd += '</span>';

            htmltoadd += '<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>';

            htmltoadd += '</div>';

            htmltoadd += '</div>';


            htmltoadd += '<button type="button" class="btn btn-danger btn-round remove-field" style="float: right;padding: 11px 11px;margin: -15px 0px 0px 25px;position: absolute;left: 215px;">';
            htmltoadd += '<i class="material-icons">clear</i>';
            htmltoadd += '<div class="ripple-container"></div>';
            htmltoadd += '</button>';

            htmltoadd += '</div>';

            //alert(htmltoadd);


            $wrapper.append(htmltoadd);

            detaiimgcounter++;

            $('.multi-field .remove-field', $wrapper).click(function () {

                detaiimgcounter++;
                $(this).parent('.multi-field').remove();
            });


        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            detaiimgcounter++;
            $(this).parent('.multi-field').remove();


        });

    });






    var counterpicadd = 2;

    $('.multi-field-wrapperpicaddress').each(function () {

        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            //alert('hehe');

            var htmltoadd = '<div class="multi-field"> ';
            htmltoadd += '<div class="form-group" style="width: 80%;float: left;">';
            htmltoadd += '<label for="address_' + counterpicadd + '" class="bmd-label-floating">PicuUp Address</label>';
            htmltoadd += '<textarea id="address_' + counterpicadd + '" name="picaddress[]" class="form-control"></textarea>';
            htmltoadd += '</div>';

            htmltoadd += '<button type="button" class="remove-field btn btn-danger" style="margin-top: 20px;margin-left: 10px;"><i class="material-icons">clear</i> Remove</button> ';
            htmltoadd += '</div>';

            $wrapper.append(htmltoadd);

            counterpicadd++;

            $('.multi-field .remove-field', $wrapper).click(function () {

                counterpicadd++;
                $(this).parent('.multi-field').remove();
            });


        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            counterpicadd++;
            $(this).parent('.multi-field').remove();


        });

    });

    var countonlineadd = 2;

    $('.multi-field-wrapperonlineadd').each(function () {

        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            //alert('hehe');

            var htmltoadd = '<div class="multi-field"> ';
            htmltoadd += '<div class="form-group" style="width: 80%;float: left;">';
            htmltoadd += '<label for="online_address_' + countonlineadd + '" class="bmd-label-floating">Online Address</label>';
            htmltoadd += '<textarea id="online_address_' + countonlineadd + '" name="onlineddress[]" class="form-control"></textarea>';
            htmltoadd += '</div>';

            htmltoadd += '<button type="button" class="remove-field btn btn-danger" style="margin-top: 20px;margin-left: 10px;"><i class="material-icons">clear</i> Remove</button> ';
            htmltoadd += '</div>';

            $wrapper.append(htmltoadd);

            countonlineadd++;

            $('.multi-field .remove-field', $wrapper).click(function () {

                countonlineadd++;
                $(this).parent('.multi-field').remove();
            });


        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            countonlineadd++;
            $(this).parent('.multi-field').remove();


        });

    });








    var counterdeladd = 2;

    $('.multi-field-wrapperg').each(function () {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            var htmltoadd = '<div class="multi-field row">';

            htmltoadd += '<div class="col-sm-4">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="country_' + counterdeladd + '" class="bmd-label-floating" for="country">Select Country</label>';
            htmltoadd += '<select name="delcountry[]" class="selectpicker searchdropdown" onchange="coutrychange(this);" id="country_' + counterdeladd + '" data-style="btn btn-primary btn-round" data-live-search="true" data-size="7" title="Select Country">';
            htmltoadd += ' <?php echo $coutryValueOption; ?>';
            htmltoadd += '</select>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-4">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="state_' + counterdeladd + '" class="bmd-label-floating">Select State</label>';
            htmltoadd += '<select name="delstate[]" class="selectpicker searchdropdown" onchange="changecity(this);" id="state_' + counterdeladd + '" data-style="btn btn-primary btn-round" data-live-search="true" data-size="7" title="Select State">';
            htmltoadd += '<option value="0">Select State</option>';
            htmltoadd += '</select>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-4">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="city_' + counterdeladd + '" class="bmd-label-floating">Select City</label>';
            htmltoadd += '<select name="delcity[]" class="selectpicker searchdropdown" id="city_' + counterdeladd + '" data-style="btn btn-primary btn-round" data-live-search="true" data-size="7" title="Select City">';
            htmltoadd += '<option value="0">Select City</option>';
            htmltoadd += '</select>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-6 mtop35Px">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label class="bmd-label-floating" for="delpost-code' + counterdeladd + '">Zip Code</label>';
            htmltoadd += '<input type="text" id="delpost-code' + counterdeladd + '" name="delpost-code[]" class="form-control">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-6">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label class="bmd-label-floating" for="miles' + counterdeladd + '">Miles Ratio</label>';
            htmltoadd += '<select class="selectpicker" name="delmiles[]" id="miles' + counterdeladd + '" data-style="btn btn-primary btn-round" data-live-search="false" data-size="7" title="Select Miles">';
            htmltoadd += '<option value="">Select</option>';
            htmltoadd += '<option value="5">5 Miles</option>';
            htmltoadd += '<option value="10">10 Miles</option>';
            htmltoadd += '<option value="20">20 Miles</option>';
            htmltoadd += '<option value="50">50 Miles</option>';
            htmltoadd += '</select>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<button type="button" class="remove-field btn btn-danger" style="margin-left: 85%;"><i class="material-icons">clear</i> Remove</button>';

            htmltoadd += '</div>';

            $wrapper.append(htmltoadd);

            $("#country_" + counterdeladd).selectpicker('refresh');
            $("#state_" + counterdeladd).selectpicker('refresh');
            $("#city_" + counterdeladd).selectpicker('refresh');
            $("#miles" + counterdeladd).selectpicker('refresh');

            counterdeladd++;

            $('.multi-field .remove-field', $wrapper).click(function () {
            	// alert(1)

                if ($('.multi-field', $wrapper).length == 1) {

                    counterdeladd++;
                    alert("There is only one Delivery Address");

                } else {

                    counterdeladd--;
                    $(this).parent('.multi-field').remove();
                }
            });

        });

        $('.multi-field .remove-field', $wrapper).click(function () {
alert(2)
            if ($('.multi-field', $wrapper).length == 1) {

                counterdeladd++;
                alert("There is only one Delivery Address");

            } else {

                counterdeladd--;
                $(this).parent('.multi-field').remove();
            }


        });

    });














    var shipcounter = 2;

    $('.multi-field-wrappers').each(function () {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            var htmltoadd = '<div class="multi-field row">';

            htmltoadd += '<div class="col-sm-3">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="shipcount_' + shipcounter + '" class="bmd-label-floating" for="country">Select Country</label>';
            htmltoadd += '<select name="country[]" class="selectpicker searchdropdown" onchange="shipcountrychange(this);" id="shipcount_' + shipcounter + '" data-style="btn btn-primary btn-round" data-live-search="true" data-size="7" title="Select Country">';
            htmltoadd += ' <?php echo $coutryValueOption; ?>';
            htmltoadd += '</select>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-3">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="shipstate_' + shipcounter + '" class="bmd-label-floating">Select State</label>';
            htmltoadd += '<select name="state[]" class="selectpicker searchdropdown" onchange="shipchangecity(this);" id="shipstate_' + shipcounter + '" data-style="btn btn-primary btn-round" data-live-search="true" data-size="7" title="Select State">';
            htmltoadd += '<option value="0">Select State</option>';
            htmltoadd += '</select>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-3">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="shipcity_' + shipcounter + '" class="bmd-label-floating">Select City</label>';
            htmltoadd += '<select name="city[]" class="selectpicker searchdropdown" id="shipcity_' + shipcounter + '" data-style="btn btn-primary btn-round" data-live-search="true" data-size="7" title="Select City">';
            htmltoadd += '<option value="0">Select City</option>';
            htmltoadd += '</select>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-3 mtop35Px">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label class="bmd-label-floating" for="post-code' + shipcounter + '">Zip Code</label>';
            htmltoadd += '<input type="text" id="post-code' + shipcounter + '" name="post-code[]" class="form-control">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';


            htmltoadd += '<button type="button" class="remove-field btn btn-danger" style="margin-left: 85%;"><i class="material-icons">clear</i> Remove</button>';

            htmltoadd += '</div>';

            $wrapper.append(htmltoadd);

            $("#shipcount_" + shipcounter).selectpicker('refresh');
            $("#shipstate_" + shipcounter).selectpicker('refresh');
            $("#shipcity_" + shipcounter).selectpicker('refresh');

            shipcounter++;

            $('.multi-field .remove-field', $wrapper).click(function () {

                if ($('.multi-field', $wrapper).length == 1) {

                    shipcounter++;
                    alert("There is only one Delivery Address");

                } else {

                    shipcounter--;
                    $(this).parent('.multi-field').remove();
                }
            });

        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            if ($('.multi-field', $wrapper).length == 1) {

                shipcounter++;
                alert("There is only one Delivery Address");

            } else {

                shipcounter--;
                $(this).parent('.multi-field').remove();
            }


        });

    });

    var countercolor = 2;

    $('.multi-field-wrappercolor').each(function () {

        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            var htmltoadd = '<div class="multi-field row"> ';

            htmltoadd += '<div class="col-sm-9">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label class="bmd-label-floating" for="prodcolor' + countercolor + '">Color</label>';
            htmltoadd += '<input type="color" id="prodcolor' + countercolor + '" name="prodcolor[]" class="form-control">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<button type="button" class="remove-field btn btn-danger col-sm-2"><i class="material-icons">clear</i> Remove</button> ';
            htmltoadd += '</div>';

            $wrapper.append(htmltoadd);

            countercolor++;

            $('.multi-field .remove-field', $wrapper).click(function () {

                countercolor++;
                $(this).parent('.multi-field').remove();
            });


        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            countercolor++;
            $(this).parent('.multi-field').remove();


        });

    });

    var countersize = 2;

    $('.multi-field-wrappersize').each(function () {

        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            var htmltoadd = '<div class="multi-field row"> ';

            htmltoadd += '<div class="col-sm-9">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label class="bmd-label-floating" for="psize' + countersize + '">Size</label>';
            htmltoadd += '<input type="text" id="psize' + countersize + '" name="psize[]" class="form-control">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<button type="button" class="remove-field btn btn-danger col-sm-2"><i class="material-icons">clear</i> Remove</button> ';
            htmltoadd += '</div>';

            $wrapper.append(htmltoadd);

            countersize++;

            $('.multi-field .remove-field', $wrapper).click(function () {

                countersize++;
                $(this).parent('.multi-field').remove();
            });


        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            countersize++;
            $(this).parent('.multi-field').remove();


        });

    });

    var prochooseimgcounter = 2;

    $('.multi-field-wrapperchooseimg').each(function () {

        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            //alert('hehe');

            var imgUrl = '<?php echo $baseurl; ?>/admin_dir/material/img/image_placeholder.jpg';

            var htmltoadd = '<div class="col-md-4 multi-field">';

            htmltoadd += '<div class="fileinput fileinput-new text-center" data-provides="fileinput">';

            htmltoadd += '<div class="fileinput-new thumbnail">';

            htmltoadd += '<img src="' + imgUrl + '" alt="">';

            htmltoadd += '</div>';

            htmltoadd += '<div class="fileinput-preview fileinput-exists thumbnail"></div>';

            htmltoadd += '<div>';

            htmltoadd += '<span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">';

            htmltoadd += '<span class="fileinput-new">Select image</span>';
            htmltoadd += '<span class="fileinput-exists">Change</span>';
            htmltoadd += '<input type="file" id="pro_choose_img_' + prochooseimgcounter + '"" name="pro_choose_img[]" /> ';

            htmltoadd += '</span>';

            htmltoadd += '<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>';

            htmltoadd += '</div>';

            htmltoadd += '</div>';


            htmltoadd += '<button type="button" class="btn btn-danger btn-round remove-field" style="float: right;padding: 11px 11px;margin: -15px 0px 0px 25px;position: absolute;left: 215px;">';
            htmltoadd += '<i class="material-icons">clear</i>';
            htmltoadd += '<div class="ripple-container"></div>';
            htmltoadd += '</button>';

            htmltoadd += '</div>';

            //alert(htmltoadd);


            $wrapper.append(htmltoadd);

            prochooseimgcounter++;

            $('.multi-field .remove-field', $wrapper).click(function () {

                prochooseimgcounter++;
                $(this).parent('.multi-field').remove();
            });


        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            prochooseimgcounter++;
            $(this).parent('.multi-field').remove();


        });

    });

    var counterdtdtwise = 2;

    $('.multi-field-wrapperdtwiseprice').each(function () {

        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            //alert('hehe');

            var htmltoadd = '<div class="multi-field row"> ';

            htmltoadd += '<div class="col-sm-12 mtop35Px">';
            htmltoadd += '<div class="input-group form-control-lg">';
            htmltoadd += '<div class="input-group-prepend">';
            htmltoadd += '<span class="input-group-text">';
            htmltoadd += '<i class="material-icons">assignment</i>';
            htmltoadd += '</span>';
            htmltoadd += '</div>';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="dtp_detail_' + counterdtdtwise + '" class="bmd-label-floating">Descreption</label>';
            htmltoadd += '<textarea name="date_wise_detail[' + counterdtdtwise + '][dtp_detail]" class="form-control" id="dtp_detail_' + counterdtdtwise + '"></textarea>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-6 mtop35Px">';
            htmltoadd += '<div class="input-group form-control-lg">';
            htmltoadd += '<div class="input-group-prepend">';
            htmltoadd += '<span class="input-group-text">';
            htmltoadd += '<i class="material-icons">date_range</i>';
            htmltoadd += '</span>';
            htmltoadd += '</div>';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="dtdate_' + counterdtdtwise + '" class="bmd-label-floating">Select Date</label>';
            htmltoadd += '<input type="text" name="date_wise_detail[' + counterdtdtwise + '][dtdtae]" class="form-control datepicker" id="dtdate_' + counterdtdtwise + '" value="">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-6">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="dttime_' + counterdtdtwise + '" class="bmd-label-floating">Select Time</label>';
            htmltoadd += '<select name="date_wise_detail[' + counterdtdtwise + '][dttime]" class="selectpicker searchdropdown" id="dttime_' + counterdtdtwise + '" data-style="btn btn-primary btn-round" data-live-search="true" data-size="10" title="Select Time">';
            htmltoadd += '<?php echo $TimeValueOption; ?>';
            htmltoadd += '</select>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-4">';
            htmltoadd += '<div class="input-group form-control-lg">';
            htmltoadd += '<div class="input-group-prepend">';
            htmltoadd += '<span class="input-group-text">';
            htmltoadd += '<i class="material-icons">sell</i>';
            htmltoadd += '</span>';
            htmltoadd += '</div>';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="dtpretail_' + counterdtdtwise + '" class="bmd-label-floating">Enter Retail Price</label>';
            htmltoadd += '<input type="number" name="date_wise_detail[' + counterdtdtwise + '][newprices]" class="form-control" id="dtpretail_' + counterdtdtwise + '" value="">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-4">';
            htmltoadd += '<div class="input-group form-control-lg">';
            htmltoadd += '<div class="input-group-prepend">';
            htmltoadd += '<span class="input-group-text">';
            htmltoadd += '<i class="material-icons">sell</i>';
            htmltoadd += '</span>';
            htmltoadd += '</div>';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="dtpwholsale_' + counterdtdtwise + '" class="bmd-label-floating">Enter Wholesale Price</label>';
            htmltoadd += '<input type="number" name="date_wise_detail[' + counterdtdtwise + '][wholesel]" class="form-control" id="dtpwholsale_' + counterdtdtwise + '" onchange="changedprice(' + counterdtdtwise + ')" value="">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-4">';
            htmltoadd += '<div class="input-group form-control-lg">';
            htmltoadd += '<div class="input-group-prepend">';
            htmltoadd += '<span class="input-group-text">';
            htmltoadd += '<i class="material-icons">loyalty</i>';
            htmltoadd += '</span>';
            htmltoadd += '</div>';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="discountampl_' + counterdtdtwise + '" class="bmd-label-floating">Discount Amplepoints</label>';
            htmltoadd += '<input type="text" name="date_wise_detail[' + counterdtdtwise + '][discount_amp]" class="form-control" id="discountampl_' + counterdtdtwise + '" value="0.00%">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-12">';
            htmltoadd += '<div class="input-group form-control-lg">';
            htmltoadd += '<div class="input-group-prepend">';
            htmltoadd += '<span class="input-group-text">';
            htmltoadd += '<i class="material-icons">shopping_cart</i>';
            htmltoadd += '</span>';
            htmltoadd += '</div>';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="dtp_quantity_' + counterdtdtwise + '" class="bmd-label-floating">Quantity</label>';
            htmltoadd += '<input type="number" name="date_wise_detail[' + counterdtdtwise + '][dtp_quantity]" class="form-control" id="dtp_quantity_' + counterdtdtwise + '" value="">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';


            htmltoadd += '<button type="button" class="remove-field btn btn-danger col-sm-2" style="margin-left: 82%;"><i class="material-icons">clear</i> Remove</button>';
            htmltoadd += '</div>';

            $wrapper.append(htmltoadd);

            $("#dttime_" + counterdtdtwise).selectpicker('refresh');

            counterdtdtwise++;

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


            $('.multi-field .remove-field', $wrapper).click(function () {

                counterdtdtwise++;
                $(this).parent('.multi-field').remove();
            });


        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            counterdtdtwise++;
            $(this).parent('.multi-field').remove();


        });

    });

    $("#lmorecategory").change(function () {
        $("#rownew").val(0);
    });
    $("#lmoresubcategory").change(function () {
        $("#rownew").val(0);
    });
    $("#lmoresub2category").change(function () {
        $("#rownew").val(0);
    });


































  $('.loadprod').click(function () {

        //alert('loadprod cliek');

        var allcountnew = 9999;

        rownew = 0;

        $('#rownew').val(0);


        var lmorevid = $('#lmorevendor').val();
        var lmorecatid = $('#lmorecategory').val();
        var lmoresubcatid = $('#lmoresubcategory').val();
        var lmoresub2catid = $('#lmoresub2category').val();

        if (lmorecatid != '' || lmoresubcatid != '' || lmoresub2catid != '') {

            $('.myloadmorenew').css("display", "block");
            $('.myloadmore').css("display", "none");

            if (rownew <= allcountnew) {

              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
                });

                $.ajax({
                    url: "{{route('filterviewproductsnew')}}",
                    type: 'post',
                    data: {
                        row: rownew,
                        vendorid: lmorevid,
                        catid: lmorecatid,
                        subcateid: lmoresubcatid,
                        sub2cateid: lmoresub2catid
                    },
                    beforeSend: function () {
                        $(".loadcustmore").text("Loading...");
                    },
                    success: function (response) {

                        // Setting little delay while displaying new content
                        setTimeout(function () {
                            // appending posts after last post with class="post"
                            //$(".post:last").after(response).show().fadeIn("slow");
                            $('#product_list').html(response);

                            var rownonew = rownew + 9;

                            //$("#rownew").val(rownonew);

                            // checking row value is greater than allcount or not
                            if (rownonew > allcountnew) {

                                // Change the text and background
                                $('.load-more-new').text("Hide");
                                $('.load-more-new').css("background", "darkorchid");
                            } else {
                                $(".loadcustmore").text("Load More Products");
                            }
                        }, 2000);


                    }
                });
            }
        } else {

            alert("Please Select One Of Category");
        }

    });












    function custloadmoreprod() {

        //alert('load-more-new cliek');
        var lmorerownew = Number($('#rownew').val());
        var lmoreallcountnew = 9999;
        lmorerownew = lmorerownew + 9;

        var lmorevidnew = $('#lmorevendor').val();
        var lmorecatidnew = $('#lmorecategory').val();
        var lmoresubcatidnew = $('#lmoresubcategory').val();
        var lmoresub2catidnew = $('#lmoresub2category').val();

        if (lmorecatidnew != '' || lmoresubcatidnew != '' || lmoresub2catidnew != '') {

            if (lmorerownew <= lmoreallcountnew) {

                $("#rownew").val(lmorerownew);

                $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
                });


                $.ajax({
                    url: "{{route('filterviewproductsnew')}}",
                    type: 'post',
                    data: {
                        row: lmorerownew,
                        vendorid: lmorevidnew,
                        catid: lmorecatidnew,
                        subcateid: lmoresubcatidnew,
                        sub2cateid: lmoresub2catidnew
                    },
                    beforeSend: function () {
                        $(".loadcustmore").text("Loading...");
                    },
                    success: function (response) {

                        // Setting little delay while displaying new content
                        setTimeout(function () {
                            // appending posts after last post with class="post"
                            //$(".post:last").after(response).show().fadeIn("slow");
                            $('#product_list').append(response);

                            var rownonewdata = lmorerownew + 9;

                            // $("#rownew").val(rownonew);

                            // checking row value is greater than allcount or not
                            if (rownonewdata > lmoreallcountnew) {

                                // Change the text and background
                                $('.load-more-new').text("Hide");
                                $('.load-more-new').css("background", "darkorchid");
                            } else {
                                $(".loadcustmore").text("Load More Products");
                            }
                        }, 2000);


                    }
                });
            }
        } else {

            alert("Please Select One Of Category");
        }

    }


    











    var CustCount = 2;

    $('.multi-field-wrapper-files').each(function () {

        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            //alert('hehe');

            var imgUrl = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFLwDkTYFPJCZVh9iRZ7mu8zjxu6QoiIg_8NnC0ka-fA&s';

            var htmltoadd = '<div class="col-md-4 multi-field">';

            htmltoadd += '<div class="fileinput fileinput-new text-center" data-provides="fileinput">';

            htmltoadd += '<div class="fileinput-new thumbnail">';

            htmltoadd += '<img src="' + imgUrl + '" alt="">';

            htmltoadd += '</div>';

            htmltoadd += '<div class="fileinput-preview fileinput-exists thumbnail"></div>';

            htmltoadd += '<div>';

            htmltoadd += '<span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">';

            htmltoadd += '<span class="fileinput-new">Select image</span>';
            htmltoadd += '<span class="fileinput-exists">Change</span>';
            htmltoadd += '<input accept="image/*" type="file" id="file_' + CustCount + '"" name="file[]" /> ';

            htmltoadd += '</span>';

            htmltoadd += '<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>';

            htmltoadd += '</div>';

            htmltoadd += '</div>';


            htmltoadd += '<button type="button" class="btn btn-danger btn-round remove-field" style="float: right;padding: 11px 11px;margin: -15px 0px 0px 25px;position: absolute;left: 215px;">';
            htmltoadd += '<i class="material-icons">clear</i>';
            htmltoadd += '<div class="ripple-container"></div>';
            htmltoadd += '</button>';

            htmltoadd += '</div>';

            //alert(htmltoadd);


            $wrapper.append(htmltoadd);

            CustCount++;

            $('.multi-field .remove-field', $wrapper).click(function () {

                CustCount++;
                $(this).parent('.multi-field').remove();
            });


        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            CustCount++;
            $(this).parent('.multi-field').remove();


        });

    });


    var countergift = 2;

    $('.multi-field-wrappergchr').each(function () {

        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {

            //alert('hehe');

            var htmltoadd = '<div class="multi-field row"> ';

            htmltoadd += '<div class="col-sm-4">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="hr_day_' + countergift + '" class="bmd-label-floating">Slect Day</label>';
            htmltoadd += '<select name="hours_of_use[' + countergift + '][hr_day]" class="selectpicker searchdropdown" id="hr_day_' + countergift + '" data-style="btn btn-primary btn-round" data-live-search="true" data-size="7" title="Select Day">';
            htmltoadd += '<option value="Monday">Monday</option>';
            htmltoadd += '<option value="Tuesday">Tuesday</option>';
            htmltoadd += '<option value="Wednsday">Wednsday</option>';
            htmltoadd += '<option value="Thursday">Thursday</option>';
            htmltoadd += '<option value="Friday">Friday</option>';
            htmltoadd += '<option value="Saturday">Saturday</option>';
            htmltoadd += '<option value="Sunnday">Sunnday</option>';
            htmltoadd += '</select>';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-3 mtop45px">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="hr_start_time_' + countergift + '" class="bmd-label-floating">Start Time</label>';
            htmltoadd += '<input type="text" id="hr_start_time_' + countergift + '" name="hours_of_use[' + countergift + '][start_time]" class="form-control mytimepicker">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';

            htmltoadd += '<div class="col-sm-3 mtop45px">';
            htmltoadd += '<div class="form-group">';
            htmltoadd += '<label for="hr_end_time_' + countergift + '" class="bmd-label-floating">Start Time</label>';
            htmltoadd += '<input type="text" id="hr_end_time_' + countergift + '" name="hours_of_use[' + countergift + '][end_time]" class="form-control mytimepicker">';
            htmltoadd += '</div>';
            htmltoadd += '</div>';


            htmltoadd += '<button type="button" class="remove-field btn btn-danger col-sm-2" style="margin: 45px 0px 15px 0px;"><i class="material-icons">clear</i> Remove</button>';
            htmltoadd += '</div>';

            $wrapper.append(htmltoadd);

            $("#hr_day_" + countergift).selectpicker('refresh');

            countergift++;

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


            $('.multi-field .remove-field', $wrapper).click(function () {

                countergift++;
                $(this).parent('.multi-field').remove();
            });


        });

        $('.multi-field .remove-field', $wrapper).click(function () {

            counterdtdtwise++;
            $(this).parent('.multi-field').remove();


        });

    });

	
</script>