<script type="text/javascript">
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
                    extension: "Only Select Image With Extension jpg|png|jpeg|gif"
                },
                "file[]": {
                    extension: "Only Select Image With Extension jpg|png|jpeg|gif"
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

    var detaiimgcounter = 2;

    $('.multi-field-wrapperprodetailimg').each(function () {

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
            htmltoadd += '<input type="file" id="pro_detail_image_' + detaiimgcounter + '"" name="pro_detail_image[]" /> ';

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
            htmltoadd += '<select name="country[]" class="selectpicker searchdropdown" onchange="shipcoutrychange(this);" id="shipcount_' + shipcounter + '" data-style="btn btn-primary btn-round" data-live-search="true" data-size="7" title="Select Country">';
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
            htmltoadd += '<input type="file" id="file_' + CustCount + '"" name="file[]" /> ';

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

    var countergift = 502;

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