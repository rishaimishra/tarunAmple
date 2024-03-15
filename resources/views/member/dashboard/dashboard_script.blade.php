<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>




<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>

    $('.main-logo').click(function () {
        alert('bbbbbss');
        myFunctionnads();
    });

    function myFunctionnads() {
        setTimeout(function () {
            alert('ccc');
            checkForChanges();
        }, 1000);
    }

    $('.filterable .btn-filter').click(function () {
        var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function (e) {
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
            inputContent = $input.val().toLowerCase(),
            $panel = $input.parents('.filterable'),
            column = $panel.find('.filters th').index($input.parents('th')),
            $table = $panel.find('.table'),
            $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function () {
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
        }
    });

    function openprofiletab() {
        $("#myprofile-tab").trigger("click");
    }

</script>



















<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>

    var xmlHttpRequest;

    function createXMLHttpRequest() {
        if (xmlHttpRequest != null) {
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

    function changeRefferalCode(referral_no) {

        referral_no = referral_no.trim();

        if (referral_no != '') {

            if (referral_no.length == 6) {

                if (referral_no.match(/^[A-Z0-9]*$/)) {

                    $.ajax({
                        url: '<?php echo $baseUrl; ?>/default/index/changerefferalcode/',
                        data: {
                            referral_no: referral_no,
                            user_id: "<?php echo $this->record['data'][0]['user_id']; ?>",
                        },
                        beforeSend: function () {
                            $('.ajax-loader').show();
                        },
                        dataType: 'JSON',
                        type: 'POST',
                        complete: function () {
                            $('.ajax-loader').hide();
                        }
                    }).done(function (data) {

                        if (data.status == 'done') {

                            //alert("Referral Code Changed Successfully");

                            $('#referral_no_err').css('display', 'none');

                            $('#referral_no_suc').css('display', 'block');
                            $("#referral_no_suc").text("Referral Code Changed Successfully");

                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);

                        } else if (data.status == 'exist') {

                            $('#referral_no_err').css('display', 'block');
                            $("#referral_no_err").text("Enter Referral Code Already Exist.");

                        } else {

                            alert("Something Wrong");
                        }
                    });

                } else {

                    $('#referral_no_err').css('display', 'block');
                    $("#referral_no_err").text("Please Enter Only Capital Letter and Numbers.");
                    return false;
                }

            } else {

                $('#referral_no_err').css('display', 'block');
                $("#referral_no_err").text("Please Enter Only 6 Character.");
                return false;
            }

        } else {

            $('#referral_no_err').css('display', 'block');
            $("#referral_no_err").text("Enter a valid Referral Code.");
            return false;
        }

    }

    function cchangepassword(oldpwd, cpwd1, ccpwd1) {
        var baseurl = '<?PHP echo $baseUrl; ?>';

        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/changepassword/';

        var strURL = url;
        if (oldpwd != '' && cpwd1 != '' && ccpwd1 != '') {

            if (cpwd1.length < 6) {
                $('#confrmpwd_err').css('display', 'none');
                $('#newpwd_err').css('display', 'block');
                $("#newpwd_err").text("Enter a valid Password min 6 characters.");
                return false;
            } else if (cpwd1.length > 50) {
                $('#confrmpwd_err').css('display', 'none');
                $('#newpwd_err').css('display', 'block');
                $("#newpwd_err").text("Your password is too long.");
                return false;
            } else if (cpwd1.search(/\d/) == -1) {
                $('#confrmpwd_err').css('display', 'none');
                $('#newpwd_err').css('display', 'block');
                $("#newpwd_err").text("Your password must contain at least one number.");
                return false;
            } else if (cpwd1.search(/[a-zA-Z]/) == -1) {
                $('#confrmpwd_err').css('display', 'none');
                $('#newpwd_err').css('display', 'block');
                $("#newpwd_err").text("Your password must contain at least one letter.");
                return false;
            } else if (cpwd1.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
                $('#confrmpwd_err').css('display', 'none');
                $('#newpwd_err').css('display', 'block');
                $("#newpwd_err").text("Your password contains invalid characters.");
                return false;
            }

            if (cpwd1 == ccpwd1) {
                $('#oldpwd_err').css('display', 'none');
                $('#newpwd_err').css('display', 'none');
                $('#confrmpwd_err').css('display', 'none');
                var query = "c_oldpassword=" + oldpwd + "&c_confirmpassword=" + ccpwd1;
                if (xmlHttpRequest != null) {
                    xmlHttpRequest.open("post", strURL, true);
                    xmlHttpRequest.onreadystatechange = changepwdsuccess;
                    xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xmlHttpRequest.send(query);
                }
            } else {
                $('#oldpwd_err').css('display', 'none');
                $('#newpwd_err').css('display', 'none');
                $('#confrmpwd_err').css('display', 'block');
                $("#confrmpwd_err").text("Passwords do not match.");
                return false;
            }

        } else if (oldpwd == '') {
            $('#oldpwd_err').css('display', 'block');
            $('#oldpwd_err').text("Please enter your current password.");
            return false;
        } else if (cpwd1 == '') {
            $('#oldpwd_err').css('display', 'none');
            $('#newpwd_err').css('display', 'block');
            $('#newpwd_err').text("Please enter your new password.");
            return false;
        } else if (ccpwd1 == '') {
            $('#oldpwd_err').css('display', 'none');
            $('#newpwd_err').css('display', 'none');
            $('#confrmpwd_err').css('display', 'block');
            $('#confrmpwd_err').text("Please enter your confirm password.");
            return false;
        }

    }

    function changepwdsuccess() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {
                var ss = xmlHttpRequest.responseText;
                var result1 = ss;

                if (result1 == 3) {
                    $('#old_pwd').val('');
                    $('#oldpwd_err').css('display', 'block');
                    $('#oldpwd_err').text("Incorrect current password.");
                    return false;
                }

                if (result1 == 0) {
                    alert("You have successfully changed your password.");
                    window.location.href = '<?PHP echo $baseUrl; ?>' + '/dashboard';
                }


            }
        }
    }


    /*Send Invitation For Business*/


    function sendinvitationtobusiness() {
        //alert('hello');
        var baseurl = '<?PHP echo $baseUrl; ?>';
        var invitemail = new Array();

        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/sendinvitaiontobusiness/';

        /*$(".multipleInput-email span").each(function() {
        invitemail.push($(this).html());
        });*/

        console.log(invitemail);

        var strURL = url;

        var singleEmail_phone = $('#my_business_input').val();
        var my_business_name = $('#my_business_name').val();

        singleEmail_phone = $.trim(singleEmail_phone);

        //if(invitemail.length === 0) {

        if (singleEmail_phone == '' && my_business_name == '') {
            $('#sendsuccess').css({'color': 'red'});
            $('#sendsuccess').text('Please enter your friend/recipient email.');
            setTimeout(function () {
                $('#sendsuccess').text('');
            }, 3000);
        } else {

            // alert('try to send');

            //var allEmals = invitemail.join(",");

            var allEmals = singleEmail_phone;

            var query = "friendmaillist=" + allEmals + "&friend_name=" + my_business_name;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = sendbusinessinvitationsuccess;
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }

        }

    }

    function sendbusinessinvitationsuccess() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {
                var result1 = xmlHttpRequest.responseText;
                if (result1 == 1) {
                    //$('.multiinputul li').remove();
                    $('#my_business_input').val('');
                    $('#my_business_name').val('');
                    $('#sendsuccess').css({'color': 'green'});
                    $('#sendsuccess').text('Invitation Sent Successfully!!!');
                    setTimeout(function () {
                        $('#sendsuccess').text('');
                    }, 3000);

                    $.ajax({
                        url: '<?PHP echo $baseUrl; ?>/default/index/businessinvitelists',
                        dataType: 'json',
                        success: function (r) {

                            var invData = '';
                            var inted = '';
                            var registered = '';
                            for (var i in r) {
                                if (r[i].isinvited == 1) {
                                    inted = 'Sent';
                                }
                                if (r[i].isinvited == 0) {
                                    inted = 'Not Sent';
                                }
                                if (r[i].isregistered == 1) {
                                    registered = 'Yes';
                                }
                                if (r[i].isregistered == 0) {
                                    registered = 'No';
                                }
                                var g = r[i].invitedate.split(' ');
                                invData = invData + '<tr class="even pointer"><td>' + r[i].id + '</td><td>' + r[i].friend_name + '</td><td>' + r[i].friend_email + '</td><td class=" last"><a class=" btn-success btn-xs" type="button">' + inted + '</a></td><td>' + g[0] + '</td><td>' + registered + '</td></tr>';
                            }
                            $("#invitebusinessfrdlist").empty();
                            $(".recp").empty();
                            $('#invitebusinessfrdlist').html(invData);
                        }

                    });

                    //location.reload();
                } else if (result1 == 0) {

                    $('#sendsuccess').css({'color': 'red'});
                    $('#sendsuccess').text('Invitation could not send due to mail server error, try again later.');
                    setTimeout(function () {
                        $('#sendsuccess').text('');
                    }, 3000);

                } else {

                }

            }
        }
    }

    function clickforfollowers(useremail) {
        var baseurl = '<?PHP echo $baseUrl; ?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/getfollowers/';

        var strURL = url;
        if (useremail != '') {
            var query = "user_selectemail=" + useremail;
            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = clickforfollowerssuccess;
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }

    }

    function clickforfollowerssuccess() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {
                var result1 = xmlHttpRequest.responseText;

                $('#gridSystemModal').modal('show');
                $('#followers-list').html(result1);

            }
        }
    }

    function clickforfollowings(useremail) {
        var baseurl = '<?PHP echo $baseUrl; ?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/getfollowings/';

        var strURL = url;
        if (useremail != '') {
            var query = "user_selectemail=" + useremail;
            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = clickforfollowingssuccess;
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }

    }

    function clickforfollowingssuccess() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {
                var result2 = xmlHttpRequest.responseText;

                $('#myModal').modal('show');
                $('#following-list').html(result2);

            }
        }
    }

    function saveinterest(selectSubCatKey, selectMainCatKey) {

        var isselected = 0;
        var somethingChecked = $("input[id=mycheckboxId" + selectSubCatKey + "]").is(':checked');

        if (somethingChecked == 1) {
            isselected = 1;
        }

        var baseurl = '<?PHP echo $baseUrl; ?>';

        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/savecustomerinterest/';

        var strURL = url;

        if (selectSubCatKey != '') {
            var query = "selectMainInterest=" + selectMainCatKey + "&selectinterest=" + selectSubCatKey + "&ischecked=" + isselected;
            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = saveinterestsuccess;
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }

    }

    function saveinterestsuccess() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {

                var result1 = xmlHttpRequest.responseText;
                var splitresult = result1.split('openId');
                var result = splitresult[0];
                var MainCatR = splitresult[1];

                if (result == 1) {
                    if ($("#mars" + MainCatR).hasClass('active')) {
                        //Do Nothing
                    } else {
                        $("#mars" + MainCatR).toggleClass('active');
                    }
                } else {
                    $("#mars" + MainCatR).toggleClass('active');
                }
            }
        }
    }

    function validateForm() {
        var user_country = document.getElementById('user_country').value.trim();
        var user_state = document.getElementById('user_state').value.trim();
        var user_city = document.getElementById('user_city').value.trim();
        var user_zip = document.getElementById('user_zip').value.trim();
        var user_adr = document.getElementById('current-address').value.trim();

        if (user_country == '0') {
            document.getElementById('state_error').innerHTML = '';
            document.getElementById('city_error').innerHTML = '';
            document.getElementById('country_error').innerHTML = 'Please select your country';
            document.getElementById('user_country').focus();
            return false;
        } else {
            document.getElementById('country_error').innerHTML = '';
        }

        if (user_state == '0') {
            document.getElementById('country_error').innerHTML = '';
            document.getElementById('city_error').innerHTML = '';
            document.getElementById('state_error').innerHTML = 'Please select your state';
            document.getElementById('user_state').focus();
            return false;
        } else {
            document.getElementById('state_error').innerHTML = '';
        }

        if (user_city == '0') {
            document.getElementById('country_error').innerHTML = '';
            document.getElementById('state_error').innerHTML = '';
            document.getElementById('city_error').innerHTML = 'Please select your city';
            document.getElementById('user_city').focus();
            return false;
        } else {
            document.getElementById('city_error').innerHTML = '';
        }

        if (user_zip == '') {
            document.getElementById('zip_error').innerHTML = 'Please enter zip code';
            return false;
        } else {
            document.getElementById('zip_error').innerHTML = '';
        }

        if (user_adr == '') {
            document.getElementById('adr_error').innerHTML = 'Please enter yout address';
            return false;
        } else {
            document.getElementById('adr_error').innerHTML = '';
        }


    }

    function changecount(state) {
        var baseurl = '<?PHP echo $baseUrl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/statelist/';

        var strURL = url;
        if (state != '') {


            var query = "statename=" + state;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = showState;
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }
    }

    function showState() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {
                var response = xmlHttpRequest.responseText;
                document.getElementById('user_state').innerHTML = response;
                document.getElementById('user_city').innerHTML = "<option value='0'>Select City</option>";

            }
        }
    }

    function changecity(city) {
        var baseurl = '<?PHP echo $baseUrl;?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/citylist/';

        var strURL = url;
        if (city != '') {
            var query = "cityname=" + city;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = showcity;
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }
    }

    function showcity() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {
                var response = xmlHttpRequest.responseText;
                document.getElementById('user_city').innerHTML = response;

            }
        }
    }


    function postcraving() {
        var baseurl = '<?PHP echo $baseUrl; ?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/savecraving/';
        var cravingmsg = $('#cravinput').val();

        var strURL = url;
        if (cravingmsg != '') {
            var query = "cravingtext=" + cravingmsg;
            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = postcravingssuccess;
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        } else {
            $('#craverror').show();
            $('#craverror').text(' Please enter craving request message ');
            return false;
        }

    }

    function postcravingssuccess() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {
                var result1 = xmlHttpRequest.responseText;

                if (result1 == 1) {
                    alert("Your craving reuest submitted successfully");
                    location.reload();
                }
            }
        }
    }

    /*SendDriverInvitation*/

    function SendDriverInvitation() {
        //alert('hello');
        var baseurl = '<?PHP echo $baseUrl; ?>';
        var invitemail = new Array();

        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/senddriverfriendinvitation/';

        /* $(".driver-multipleInput-email span").each(function() {
        invitemail.push($(this).html());
        });*/

        console.log(invitemail);

        var strURL = url;


        var singleEmail_phone = $('#driver_my_input').val();

        singleEmail_phone = $.trim(singleEmail_phone);

        // if(invitemail.length === 0) {

        if (singleEmail_phone == '') {
            $('#driver_sendsuccess').css({'color': 'red'});
            $('#driver_sendsuccess').text('Please enter your friend/recipient email.');
            setTimeout(function () {
                $('#driver_sendsuccess').text('');
            }, 3000);
        } else {


            //var allEmals = invitemail.join(",");

            var allEmals = singleEmail_phone;

            var query = "friendmaillist=" + allEmals;

            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = Driversendinvitationsuccess;
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }

        }

    }

    function Driversendinvitationsuccess() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {
                var result1 = xmlHttpRequest.responseText;
                if (result1 == 1) {
                    //$('.drivermultiinputul li').remove();
                    $('#driver_my_input').val('');
                    $('#driver_sendsuccess').css({'color': 'green'});
                    $('#driver_sendsuccess').text('Invitation Sent Successfully!!!');
                    setTimeout(function () {
                        $('#driver_sendsuccess').text('');
                    }, 3000);

                    $.ajax({
                        url: '<?PHP echo $baseUrl; ?>/default/index/driverinvitelists',
                        dataType: 'json',
                        success: function (r) {

                            var invData = '';
                            var inted = '';
                            var registered = '';
                            for (var i in r) {
                                if (r[i].isinvited == 1) {
                                    inted = 'Sent';
                                }
                                if (r[i].isinvited == 0) {
                                    inted = 'Not Sent';
                                }
                                if (r[i].isregistered == 1) {
                                    registered = 'Yes';
                                }
                                if (r[i].isregistered == 0) {
                                    registered = 'No';
                                }
                                var g = r[i].invitedate.split(' ');
                                invData = invData + '<tr class="even pointer"><td>' + r[i].id + '</td><td>' + r[i].friend_email + '</td><td class=" last"><a class=" btn-success btn-xs" type="button">' + inted + '</a></td><td>' + g[0] + '</td><td>' + registered + '</td></tr>';
                            }
                            $("#driverinvitefrdlist").empty();
                            $(".driverrecp").empty();
                            $('#driverinvitefrdlist').html(invData);
                        }

                    });

                    //location.reload();
                } else if (result1 == 0) {

                    $('#driver_sendsuccess').css({'color': 'red'});
                    $('#driver_sendsuccess').text('Invitation could not send due to mail server error, try again later.');
                    setTimeout(function () {
                        $('#driver_sendsuccess').text('');
                    }, 3000);

                } else {

                }

            }
        }
    }

    function LoadDashboardContent(Data_For) {

        var baseurl = '<?PHP echo $baseUrl;?>';
        var SITEROOT = baseurl;

        if ($.trim($(".replace_" + Data_For).html()) == '') {

            $.ajax({
                url: SITEROOT + '/default/index/dashboardcontent/',
                data: {data_for: Data_For},
                beforeSend: function () {
                    $('.ajax-loader').show();
                },
                cache: false,
                type: 'POST',
                complete: function () {
                    $('.ajax-loader').hide();
                }
            })
                .done(function (data) {
                    // alert(data);
                    $('.replace_' + Data_For).html(data);


                })
        }


    }

</script>
<script type="text/javascript">
    $(document).ready(function () {
        /* we are assigning change event handler for select box */
        /* it will run when selectbox options are changed */
        $('#countryId').change(function () {
            /* setting currently changed option value to option variable */
            var option = $(this).find('option:selected').text();
            /* setting input box value to selected option value */
            //alert(option);
            $('#showcountryName').val(option);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        /* we are assigning change event handler for select box */
        /* it will run when selectbox options are changed */
        $('#stateId').change(function () {
            /* setting currently changed option value to option variable */
            var option = $(this).find('option:selected').text();
            /* setting input box value to selected option value */
            //alert(option);
            $('#showstateName').val(option);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        /* we are assigning change event handler for select box */
        /* it will run when selectbox options are changed */
        $('#cityId').change(function () {
            /* setting currently changed option value to option variable */
            var option = $(this).find('option:selected').text();
            /* setting input box value to selected option value */
            //alert(option);
            $('#showcityName').val(option);
        });
    });
</script>
<script>
    function openfileDialog() {
        $("#fileLoader").click();
    }
</script>






















  <script>
    $(document).ready(function () {

        jQuery('.popsup').click(function () {
            var width = window.innerWidth * 0.66;
            // define the height in
            var height = width * window.innerHeight / window.innerWidth;
            // Ratio the hight to the width as the user screen ratio
            //window.open("<?PHP echo $this->baseUrl('popupadds'); ?>" , 'newwindow','newwindow','width=' + 380 + ', height=' + 343 + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
            window.open("<?PHP echo $this->baseUrl('popout'); ?>", 'newwindow', 'width=376,height=345,left=0,top=0');
            return false;

        });
    });
  </script>






  <script>

                            var incadd = 1;
                            var from_row = 3;
                            var totalAdds = '<?php echo $toatalAdds - 1; ?>';
                            var UserIdAdd = '<?php echo $this->usrmakey; ?>';
                            var rotationaddInterval;

                            function startAddRotation() {

                                rotationaddInterval = setInterval(function () {
                                    /* $('.first-forth li').fadeTo();
                                    $('.first-forth li:nth-child(1)').appendTo('.first-forth');*/
                                    if (totalAdds == from_row) {
                                        from_row = 0;
                                    } else {
                                        from_row = from_row + 1;
                                    }


                                    if (incadd == 1) {
                                        $.ajax({
                                            url: '<?php echo $baseUrl; ?>/category_filter/loadrandomaddnew.php',
                                            data: {user_id: UserIdAdd, from_add: from_row},
                                            type: 'GET'
                                        })
                                            .done(function (data) {
                                                //alert(data);
                                                $('#addid_1').html(data);
                                            })
                                        incadd = 4;
                                    } else if (incadd == 4) {
                                        $.ajax({
                                            url: '<?php echo $baseUrl; ?>/category_filter/loadrandomaddnew.php',
                                            data: {user_id: UserIdAdd, from_add: from_row},
                                            type: 'GET'
                                        })
                                            .done(function (data) {
                                                //alert(data);
                                                $('#addid_4').html(data);
                                            })
                                        incadd = 2
                                    } else if (incadd == 2) {
                                        $.ajax({
                                            url: '<?php echo $baseUrl; ?>/category_filter/loadrandomaddnew.php',
                                            data: {user_id: UserIdAdd, from_add: from_row},
                                            type: 'GET'
                                        })
                                            .done(function (data) {
                                                //alert(data);
                                                $('#addid_2').html(data);
                                            })
                                        incadd = 3
                                    } else if (incadd == 3) {
                                        $.ajax({
                                            url: '<?php echo $baseUrl; ?>/category_filter/loadrandomaddnew.php',
                                            data: {user_id: UserIdAdd, from_add: from_row},
                                            type: 'GET'
                                        })
                                            .done(function (data) {
                                                //alert(data);
                                                $('#addid_3').html(data);
                                            })
                                        incadd = 1
                                    }


                                }, 4000);

                            }

                            function stopAddRotation() {

                                clearInterval(rotationaddInterval);
                                console.log("Stop Add Rotation");
                            }

                            $("body").on("click", ".main-logo", function (event) {

                                stopAddRotation();
                                var ID = $(this).attr('id');
                                var total_ample_present = '<?php echo (int)($this->record['data'][0]['total_ample']); ?>';
                                var total_reward_time = '<?php if (!empty($reward_minutes)) {
                                    echo round($reward_minutes);
                                } else {
                                    echo "0";
                                }  ?>';
                                //alert(total_ample_present);
                                //alert(total_reward_time);
                                var camid = $("#" + ID).siblings("input[name=hiddenvaldd]").val();
                                var advertype = $("#" + ID).siblings("input[name=hiddenvaldver]").val();
                                var userid = $("#" + ID).siblings("input[name=hiddenuserid]").val();
                                //alert(userid);
                                var baseurl = '<?PHP echo $baseUrl; ?>';
                                var SITEROOT = baseurl;
                                /*    $.ajax({
                                url: SITEROOT+'/category_filter/analytics.php',
                                data: {adverid: camid,userid: userid},
                                type: 'POST'
                                })
                                .done(function(data){
                                //$('#adverpro').css('display','block');
                                //$('.main-wpappers').css('display','none');
                                $('#adverproductid').html(data);

                                })    */

                                if (advertype == 'static') {
                                    $.ajax({
                                        url: SITEROOT + '/category_filter/adver.php',
                                        //cache:false,
                                        data: {adverid: camid, userid: userid},
                                        type: 'GET'
                                    })
                                        .done(function (data) {
                                            $('#adverpro').css('display', 'block');
                                            $('.main-wpappers').css('display', 'none');
                                            $('#adverpro').html(data);

                                        })
                                } else {
                                    $.ajax({
                                        url: SITEROOT + '/category_filter/advervideo.php',
                                        //cache:false,
                                        data: {camid: camid, userid: userid},
                                        type: 'GET'
                                    })
                                        .done(function (data) {
                                            $('#member').css('display', 'block');
                                            $('.main-wpappers').css('display', 'none');
                                            $('#member').html(data);

                                        })
                                }
                            });


                            <?php if(!empty($adverise)){ ?>

                            $("body").on("click", ".images-popsme", function (event) {
                                // $(this).remove();
                                <?php if($toatalAdds > 4){ ?>
                                startAddRotation();
                                <?php } ?>
                                /* var sixtime = 15;
                                    var sixtyinterval = setInterval(function() {
                                    $('.sixtysectime').text(sixtime);
                                    console.log(sixtime);
                                    sixtime = sixtime - 1;
                                    if (sixtime == 0) {
                                    clearInterval(sixtyinterval);
                                    }
                                    }, 1000);
                                    setTimeout(function() {
                                    $('.myunick').remove();
                                    startAddRotation();
                                    }, 16000);*/

                            });

                            <?php }else{ ?>

                            $("body").on("click", ".images-popsme", function (event) {
                                //$(this).remove();

                            });

                            <?php  } ?>


                        </script>














                        <script type="text/javascript">
                                        $(document).ready(function () {
                                            $(document).on('show.bs.modal', '#notificationmodel', function (e) {
                                                //alert('wow');
                                                var button = $(e.relatedTarget) // Button that triggered the modal
                                                var vendor = button.data('vendor');
                                                var fullmsg = button.data('fullmsg');
                                                var vendorid = button.data('vendorid');
                                                var vendorLink = "<?php echo $this->BaseUrl('/productbyseller/'); ?>" + vendorid;
                                                var hreflink = '<a href="' + vendorLink + '" target="_blank">' + vendor + '</a>';
                                                var modal = $(this);
                                                modal.find('.modal-title').html('Special Offer From ' + hreflink);
                                                modal.find('.modal-body').html(fullmsg);

                                            });
                                        })

                                        function deletenotification(notiid) {

                                            var check = confirm('Are you want to sure to delete?');

                                            if (check) {

                                                $.ajax({
                                                    url: '<?php echo $baseUrl; ?>/index/deletenotification',
                                                    data: {delete_id: notiid},
                                                    type: 'POST'
                                                })
                                                    .done(function (data) {
                                                        if (data) {
                                                            $('#notification_' + notiid).remove();
                                                        }

                                                    })

                                            }
                                        }

                                    </script>





                                       <script>

                                                function ValidateSize(file) {
                                                    console.log(file.files[0]);
                                                    var FileSize = file.files[0].size / 1024 / 1024; // in MB
                                                    var FileType = file.files[0].type;
                                                    if (FileSize > 2) {
                                                        alert('File size exceeds 2 MB Please Upload File Size < 2MB');
                                                        $(file).val('');
                                                    }

                                                    if (FileType != 'image/jpeg' && FileType != 'image/png' && FileType != 'image/gif' && FileType != 'image/jpg') {

                                                        alert('invalid File extension Allowed Only jpeg,png,gif,jpg Extension');
                                                        $(file).val('');
                                                    }
                                                }

                                                var CustCount = 2;

                                                $('.multi-field-wrapper-files').each(function () {
                                                    var $wrapper = $('.multi-fields', this);
                                                    $(".add-field", $(this)).click(function (e) {

                                                        var htmltoadd = '<div class="multi-field">';
                                                        htmltoadd += '<div class="col-sm-8">';
                                                        htmltoadd += '<div class="form-group">';
                                                        htmltoadd += '<input name="photosimages[]" multiple type="file" onchange="ValidateSize(this)" class="form-control" accept="image/*" required="required">';
                                                        htmltoadd += '</div>';
                                                        htmltoadd += '</div>';
                                                        htmltoadd += '<div class="col-sm-4">';
                                                        htmltoadd += '<button type="button" class="remove-field" style="margin-top: 0px;">Remove</button>';
                                                        htmltoadd += '</div>';
                                                        htmltoadd += '</div>';

                                                        $wrapper.append(htmltoadd);

                                                        CustCount++;

                                                        $('.multi-field .remove-field', $wrapper).click(function () {

                                                            CustCount++;
                                                            $(this).closest('.multi-field').remove();
                                                        });

                                                    });

                                                    $('.multi-field .remove-field', $wrapper).click(function () {
                                                        CustCount++;
                                                        $(this).parent('.multi-field').remove();


                                                    });

                                                });

                                            </script>








                                            <script>

                                                $("#vediourl").change(function () {

                                                    var loadedifram = $(this).val();

                                                    var videotype = $('#video_type').val();

                                                    if (videotype != "") {

                                                        var iframcode = '';

                                                        if (videotype == 'youtube') {

                                                            iframcode = '<iframe width="854" height="480" src="https://www.youtube.com/embed/' + loadedifram + '?showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>';

                                                        } else if (videotype == 'vimeo') {

                                                            iframcode = '<iframe src="https://player.vimeo.com/video/' + loadedifram + '?byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

                                                        } else if (videotype == 'dailymotion') {

                                                            iframcode = '<iframe frameborder="0" width="480" height="270" src="https://www.dailymotion.com/embed/video/' + loadedifram + '" allowfullscreen></iframe>';

                                                        } else {

                                                            iframcode = '';
                                                        }


                                                        if (iframcode.indexOf('iframe') >= 0) {

                                                            $('#loadiframe').html(iframcode);

                                                        } else {

                                                            alert('Please insert Ifram Embeded code only');
                                                        }

                                                    } else {

                                                        alert("Please First Select Video Type");
                                                    }


                                                });

                                                $("#video_type").change(function () {
                                                    $('#vediourl').val('');
                                                    $('#loadiframe').html('');
                                                })

                                            </script>











                                            <script>

                                                $("#mtv_vediourl").change(function () {

                                                    var loadedifram = $(this).val();

                                                    var videotype = $('#mtv_video_type').val();

                                                    if (videotype != "") {

                                                        var iframcode = '';

                                                        if (videotype == 'youtube') {

                                                            iframcode = '<iframe width="854" height="480" src="https://www.youtube.com/embed/' + loadedifram + '?showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>';

                                                        } else if (videotype == 'vimeo') {

                                                            iframcode = '<iframe src="https://player.vimeo.com/video/' + loadedifram + '?byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

                                                        } else if (videotype == 'dailymotion') {

                                                            iframcode = '<iframe frameborder="0" width="480" height="270" src="https://www.dailymotion.com/embed/video/' + loadedifram + '" allowfullscreen></iframe>';

                                                        } else {

                                                            iframcode = '';
                                                        }


                                                        if (iframcode.indexOf('iframe') >= 0) {

                                                            $('#mtv_loadiframe').html(iframcode);

                                                        } else {

                                                            alert('Please insert Ifram Embeded code only');
                                                        }

                                                    } else {

                                                        alert("Please First Select Video Type");
                                                    }


                                                });

                                                $("#mtv_video_type").change(function () {
                                                    $('#mtv_vediourl').val('');
                                                    $('#mtv_loadiframe').html('');
                                                })

                                            </script>
















                                              <script type="text/javascript">
            $(document).ready(function () {
                $('.js-dropdown-item').dropdownLayer({
                    'elemSelector': "js-dropdown-item",
                    'containerClass': "js-dropdown-items",
                    'descriptionClass': "js-description",
                    'arrowClass': "js-dropdown-arrow",
                    'dropdownClass': "js-dropdown",
                    'dropdownContentClass': "js-dropdown-content",
                    'disableDropdownClass': "js-dropdown-disable",
                    'useSlideUp': true,
                    'slideUpSpeed': 200,
                    'useSlideDown': true,
                    'slideDownSpeed': 200,
                    'callOnCompleteHide': function () {
                        console.log('your custom function which will be called on complete after hiding');
                    },
                    'callOnCompleteShow': function () {
                        console.log('your custom function which will be called on complete after showing');
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {

                $(document).on('show.bs.modal', '#messegemodel', function (e) {
                    //alert('wow');
                    console.log(e.relatedTarget);
                    var msgproductid = $(e.relatedTarget).data('msgproductid'),
                        msgvendorid = $(e.relatedTarget).data('msgvendorid'),
                        msgsubject = $(e.relatedTarget).data('msgsubject');
                    $("#msgproductid").val(msgproductid);
                    $("#msgvendorid").val(msgvendorid);
                    $("#msgsubject").val(msgsubject);
                });

                $(document).on('show.bs.modal', '#confirmorder', function (e) {
                    //alert('wow');
                    console.log(e.relatedTarget);
                    var productadded_id = $(e.relatedTarget).data('productadded_id');
                    $("#productadded_id").val(productadded_id);
                });

            })

            function openGifcarddetailPopup(product_id, productadded_id) {

                $.ajax({
                    url: "<?php echo $this->baseUrl('index/getgiftcarddetail') ?>",
                    type: 'post',
                    data: {product_id: product_id, productadded_id: productadded_id},
                    beforeSend: function () {

                        $("#gift_card_model_body").empty();
                    },
                    success: function (response) {

                        $("#gift_card_model_body").html(response);

                        setTimeout(function () {
                            $('#giftcardmodel').modal('show');
                        }, 1000);

                    }
                });


            }

        </script>





























   <script>
            function disputeorder() {

                if (confirm("Are you sure You want to Return?") == true) {
                    return true;
                } else {
                    return false;
                }

            }

            var max_fields = 5; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="form-group"><input type="file" name="msgfiles[]" class="form-control"><a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })

            $("form#messegeform").submit(function () {

                var formData = new FormData(this);


                $.ajax({
                    url: "<?php echo $this->baseUrl('index/savemessegedata') ?>",
                    type: 'POST',
                    data: formData,
                    async: false,
                    success: function (data) {
                        if (data == 'done') {

                            alert("Your Messege has been Submited!");
                            location.reload(true)
                        } else {

                            alert("Somthing Wrong Please Try Again");
                            location.reload(true)
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;
            });

            $("form#confirmorderform").submit(function () {

                var formData = new FormData(this);


                $.ajax({
                    url: "<?php echo $this->baseUrl('index/reedemorder') ?>",
                    type: 'POST',
                    data: formData,
                    async: false,
                    success: function (data) {

                        //console.log(data);
                        alert(data);
                        location.reload(true)
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;
            });

        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.js-dropdown-item').dropdownLayer({
                    'elemSelector': "js-dropdown-item",
                    'containerClass': "js-dropdown-items",
                    'descriptionClass': "js-description",
                    'arrowClass': "js-dropdown-arrow",
                    'dropdownClass': "js-dropdown",
                    'dropdownContentClass': "js-dropdown-content",
                    'disableDropdownClass': "js-dropdown-disable",
                    'useSlideUp': true,
                    'slideUpSpeed': 200,
                    'useSlideDown': true,
                    'slideDownSpeed': 200,
                    'callOnCompleteHide': function () {
                        console.log('your custom function which will be called on complete after hiding');
                    },
                    'callOnCompleteShow': function () {
                        console.log('your custom function which will be called on complete after showing');
                    }
                });
            });
        </script>
        <style type="text/css">

        </style>
        <script>
            $(document).ready(function () {
                $("#show").hide();
                $("#hide").click(function () {
                    $(".kjhejn img,.first-forth").hide();
                    $('#hide').hide();
                    $('#show').show();
                });
                $("#show").click(function () {
                    $(".kjhejn img,.first-forth").show();
                    $('#hide').show();
                    $('#show').hide();
                });
                $('.kjhejn img').click(function () {
                    $(".kjhejn img,#show").hide();
                    $('.first-forth').show();
                    $('#hide').show();
                });
            });
        </script>
        <script type="text/javascript">

            $(function () {

                $.fn.multipleInput = function () {

                    return this.each(function () {

                        // create html elements

                        // list of email addresses as unordered list
                        $list = $('<ul class="multiinputul" />');

                        // input
                        var $input = $('<input type="text" class="form-control" placeholder="Email/Phone" />').keyup(function (event) {

                            if (event.which == 32 || event.which == 188 || event.which == 13) {
                                // key press is space or comma
                                // var val = $(this).val().slice(0, -1); // remove space/comma from value
                                var val = $(this).val(); // remove space/comma from value

                                // append to list of emails with remove button
                                $list.append($('<li class="multipleInput-email"><span>' + val + '</span></li>')
                                    .append($('<a href="#" class="multipleInput-close" title="Remove" ><i class="glyphicon glyphicon-remove" style="left: -5px;top: -6px;font-size: 13px;color: #428bca;"></i></a>')
                                        .click(function (e) {
                                            $(this).parent().remove();
                                            e.preventDefault();
                                        })
                                    )
                                );
                                $(this).attr('placeholder', '');
                                // empty input
                                $(this).val('');
                            }

                        });

                        // container div
                        var $container = $('<div class="multipleInput-container" />').click(function () {
                            $input.focus();
                        });

                        // insert elements into DOM
                        $container.append($list).append($input).insertAfter($(this));

                        // add onsubmit handler to parent form to copy emails into original input as csv before submitting
                        /*
                var $orig = $(this);
                $(this).closest('form').submit(function(e) {

                var emails = new Array();
                $('.multipleInput-email span').each(function() {
                emails.push($(this).html());
                });
                emails.push($input.val());

                $orig.val(emails.join());

                });

                */

                        return $(this).hide();

                    });

                };
            });


            $(function () {

                $.fn.drivermultipleInput = function () {

                    return this.each(function () {

                        // create html elements

                        // list of email addresses as unordered list
                        $driverlist = $('<ul class="drivermultiinputul" />');

                        // input
                        var $driverinput = $('<input type="text" class="form-control" placeholder="Email/Phone" />').keyup(function (event) {

                            if (event.which == 32 || event.which == 188 || event.which == 13) {
                                // key press is space or comma
                                // var val = $(this).val().slice(0, -1); // remove space/comma from value
                                var driverval = $(this).val(); // remove space/comma from value

                                // append to list of emails with remove button
                                $driverlist.append($('<li class="driver-multipleInput-email"><span>' + driverval + '</span></li>')
                                    .append($('<a href="#" class="driver-multipleInput-close" title="Remove" ><i class="glyphicon glyphicon-remove" style="left: -5px;top: -6px;font-size: 13px;color: #428bca;"></i></a>')
                                        .click(function (e) {
                                            $(this).parent().remove();
                                            e.preventDefault();
                                        })
                                    )
                                );
                                $(this).attr('placeholder', '');
                                // empty input
                                $(this).val('');
                            }

                        });

                        // container div
                        var $drivercontainer = $('<div class="driver-multipleInput-container" />').click(function () {
                            $driverinput.focus();
                        });

                        // insert elements into DOM
                        $drivercontainer.append($driverlist).append($driverinput).insertAfter($(this));

                        // add onsubmit handler to parent form to copy emails into original input as csv before submitting
                        /*
                var $orig = $(this);
                $(this).closest('form').submit(function(e) {

                var emails = new Array();
                $('.multipleInput-email span').each(function() {
                emails.push($(this).html());
                });
                emails.push($input.val());

                $orig.val(emails.join());

                });

                */

                        return $(this).hide();

                    });

                };
            });

            //Plug-in function for the Semantic UI version of the multiple email
            $(function () {
                //To render the input device to multiple email input using SemanticUI icon
                //$('#invitemail').multiple_emails({theme: "SemanticUI"});
                //$('#my_input').multipleInput();
                //$('#driver_my_input').drivermultipleInput();
            });
        </script>

        <!------------------calender-------------->
        <script src="<?php echo $admin_model_obj->cdnUrl('js/pikaday.js'); ?>"></script>
        <script>
            var picker = new Pikaday(
                {

                    field: document.getElementById('datepicker'),
                    firstDay: 1,
                    minDate: new Date(1950, 0, 1),
                    maxDate: new Date(2010, 12, 31),
                    yearRange: [1950, 2010]
                });

        </script>
        <script>
            /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
            $(document).ready(
                /* This is the function that will get executed after the DOM is fully loaded */

                function () {
                    $("#datepicker").datepicker({
                        //dateFormat: "yy-mm-dd"
                        dateFormat: "mm/dd/yy"
                    });
                }
            );</script>
        <script>
            /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
            $(document).ready(
                /* This is the function that will get executed after the DOM is fully loaded */

                function () {
                    $("#datepickerfrom").datepicker({
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true,//this option for allowing user to select month
                        changeYear: true //this option for allowing user to select from year range
                    });
                }
            );</script>
        <script>
            /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
            $(document).ready(
                /* This is the function that will get executed after the DOM is fully loaded */

                function () {
                    $("#datepickerto").datepicker({

                        dateFormat: 'yy-mm-dd',
                        changeMonth: true,//this option for allowing user to select month
                        changeYear: true //this option for allowing user to select from year range
                    });
                }
            );</script>

        <!------------------------------------------------------>

        <!----------------------editor------------------------->
        <script>
            $(document).ready(function () {
                $("#txtEditor").Editor();
            });
        </script>

        <!--------- photo upload----------->
        <script>
            $('#file-fr').fileinput({
                language: 'fr',
                uploadUrl: '#',
                allowedFileExtensions: ['jpg', 'png', 'gif'],
            });
            $('#file-es').fileinput({
                language: 'es',
                uploadUrl: '#',
                allowedFileExtensions: ['jpg', 'png', 'gif'],
            });
            $("#file-0").fileinput({
                'allowedFileExtensions': ['jpg', 'png', 'gif'],
            });
            $("#file-1").fileinput({
                uploadUrl: '#', // you must set a valid URL here else you will get an error
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                overwriteInitial: false,
                maxFileSize: 1000,
                maxFilesNum: 10,
                //allowedFileTypes: ['image', 'video', 'flash'],
                slugCallback: function (filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            });
            /*
$(".file").on('fileselect', function(event, n, l) {
    alert('File Selected. Name: ' + l + ', Num: ' + n);
});
*/
            $("#file-3").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
            });
            $("#file-4").fileinput({
                uploadExtraData: {kvId: '10'}
            });
            $(".btn-warning").on('click', function () {
                if ($('#file-4').attr('disabled')) {
                    $('#file-4').fileinput('enable');
                } else {
                    $('#file-4').fileinput('disable');
                }
            });
            $(".btn-info").on('click', function () {
                $('#file-4').fileinput('refresh', {previewClass: 'bg-info'});
            });
            /*
$('#file-4').on('fileselectnone', function() {
    alert('Huh! You selected no files.');
});
$('#file-4').on('filebrowse', function() {
    alert('File browse clicked for #file-4');
});
*/
            $(document).ready(function () {
                $("#test-upload").fileinput({
                    'showPreview': false,
                    'allowedFileExtensions': ['jpg', 'png', 'gif'],
                    'elErrorContainer': '#errorBlock'
                });
                /*
    $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
        alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
    });
    */
            });

        </script>
        <script>
            $('.drop-check-Interest ').on('click', function () {
                //$(this).toggleClass('active');
            });
        </script>
        <script>
            $('.check-ab').on('click', function () {
                $(this).toggleClass('active');
            });
        </script>
        <script>
            $('.drop-check-Interest-new').on('click', function () {
                $(this).toggleClass('active');
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".close-close").click(function () {
                    $(".").remove();
                });
                $(".a-a").click(function () {
                    $("").show();
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".close-close-b").click(function () {
                    $(".b").remove();
                });

                $(".b-b").click(function () {
                    $(".b").show();
                });

                $('.main-historyss-ul-1').click(function () {
                    $(this).addClass('main-historyss-ul-active');
                    $('.top-amples-detail-right').css('display', 'block');
                    $('.fhistory').css('display', 'none');
                });
                $('.main-historyss-ul-2').click(function () {
                    $('.main-historyss-ul-1').removeClass('main-historyss-ul-active');
                    $(this).addClass('main-historyss-ul-active');
                    $('.top-amples-detail-right').css('display', 'none');
                    $('.fhistory').css('display', 'block');
                });

            });
        </script>
        <script>
            function updateorderstatus(orderstatus, orderid) {
//alert(orderstatus);
//alert(orderid);

                $.ajax({
                    url: '<?php echo $baseUrl; ?>/public/category_filter/sortorderlistvendor.php',
                    data: {orderstatus: orderstatus, order_id: orderid},
                    type: 'POST'
                })
                    .done(function (data) {
                        //alert(data);
                        $('#updatednew').html(data);
                        window.setTimeout(function () {
                            location.reload()
                        }, 1000)
                    })

            }

            $(document).ready(function () {
                var width = $(window).width(), height = $(window).height();
                if ((width == 244) && (height == 178)) {
                    alert('testing');
                } else {

                }
                $('#view').click(function () {
                    $(this).remove();
                });
            });
        </script>
</section>
<script>
    $(document).ready(function () {
        var slug = window.location.href.split('/');
        slug = slug[slug.length - 2];
        $("header").addClass(slug);
        $(".res-menu").addClass(slug);
        $("body").addClass(slug);
    });
</script>
<script>

    $(document).ready(function () {

        <?php if($InviteActive){ ?>

        $("#myinviteTab").trigger("click");

        <?php } ?>

        <?php if($InterestTabActive){ ?>

        $("#myinterestTab").trigger("click");

        <?php } ?>

    });

</script>

