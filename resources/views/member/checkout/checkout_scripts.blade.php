@php
$baseUrl=url('/');
@endphp
<script type="text/javascript">
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
$(document).ready(function () {
$("#regcheck").click(function () {
document.getElementById('create-account-row').style.display = 'block';
});
$("#guestcheck").click(function () {
document.getElementById('create-account-row').style.display = 'none';
});
});
function copyTextValue(t) {
if (t.cbCopyBillInfo.checked) {
t.first_name_1.value = t.first_name.value;
t.last_name_1.value = t.last_name.value;
t.company_name_1.value = t.company_name.value;
t.email_address_1.value = t.email_address.value;
t.city_1.value = t.city.value;
t.state_1.value = t.state.value;
t.postal_code_1.value = t.postal_code.value;
t.country_1.value = t.country.value;
t.telephone_1.value = t.telephone.value;
t.fax_1.value = t.fax.value;
} else {
t.first_name_1.value = '';
t.last_name_1.value = '';
t.company_name_1.value = '';
t.email_address_1.value = '';
t.city_1.value = '';
t.state_1.value = '';
t.postal_code_1.value = '';
t.country_1.value = '';
t.telephone_1.value = '';
t.fax_1.value = '';
}
}
function SelectCC(ccnum) {
var first = ccnum.charAt(0);
var second = ccnum.charAt(1);
var third = ccnum.charAt(2);
var fourth = ccnum.charAt(3);
if (first == "4") {
//Visa
document.getElementById("mastercard").src = "<?php echo $baseUrl; ?>/images/mastercard-card-bw.png";
document.getElementById("amex").src = "<?php echo $baseUrl; ?>/images/amex-card-bw.png";
document.getElementById("discover").src = "<?php echo $baseUrl; ?>/images/discover-card-bw.png";
document.getElementById("visa").src = "<?php echo $baseUrl; ?>/images/visa-card.png";
document.getElementById("cctype").value = "1";
} else if ((first == "3") && ((second == "4") || (second == "7"))) {
//American Express
document.getElementById("mastercard").src = "<?php echo $baseUrl; ?>/images/mastercard-card-bw.png";
document.getElementById("visa").src = "<?php echo $baseUrl; ?>/images/visa-card-bw.png";
document.getElementById("discover").src = "<?php echo $baseUrl; ?>/images/discover-card-bw.png";
document.getElementById("amex").src = "<?php echo $baseUrl; ?>/images/amex-card.png";
document.getElementById("cctype").value = "3";
} else if ((first == "5")) {
//Mastercard
document.getElementById("amex").src = "<?php echo $baseUrl; ?>/images/amex-card-bw.png";
document.getElementById("visa").src = "<?php echo $baseUrl; ?>/images/visa-card-bw.png";
document.getElementById("discover").src = "<?php echo $baseUrl; ?>/images/discover-card-bw.png";
document.getElementById("mastercard").src = "<?php echo $baseUrl; ?>/images/mastercard-card.png";
document.getElementById("cctype").value = "2";
} else if ((first == "6") && (second == "0") && (third == "1") && (fourth == "1")) {
//Discover
document.getElementById("amex").src = "<?php echo $baseUrl; ?>/images/amex-card-bw.png";
document.getElementById("visa").src = "<?php echo $baseUrl; ?>/images/visa-card-bw.png";
document.getElementById("mastercard").src = "<?php echo $baseUrl; ?>/images/mastercard-card-bw.png";
document.getElementById("discover").src = "<?php echo $baseUrl; ?>/images/discover-card.png";
document.getElementById("cctype").value = "4";
} else {
document.getElementById("amex").src = "<?php echo $baseUrl; ?>/images/amex-card-bw.png";
document.getElementById("visa").src = "<?php echo $baseUrl; ?>/images/visa-card-bw.png";
document.getElementById("mastercard").src = "<?php echo $baseUrl; ?>/images/mastercard-card-bw.png";
document.getElementById("discover").src = "<?php echo $baseUrl; ?>/images/discover-card-bw.png";
document.getElementById("cctype").value = "";
}
}
</script>
<script type="text/javascript">
function openvendoraddress(starkey) {
//alert(starkey);
if (starkey != '') {
$("#vdrpickupadr" + starkey).show();
$("#cstdelveradr" + starkey).hide();
//$("#vdrpickupadr"+starkey).hide();
$("#customer_address" + starkey).removeAttr('checked');
}
}
/*function vdrbyappointkupdivadr(starkey){
//alert(starkey);
if(starkey != ''){
$("#vdrpickupadr"+starkey).show();
$("#cstdelveradr"+starkey).hide();
$("#vdrpickupadr").hide();
$("#customer_address"+starkey).removeAttr('checked');
}
}*/
function opencustomeraddress(starkey) {
if (starkey != '') {
$("#cstdelveradr" + starkey).show();
$("#vdrpickupadr" + starkey).hide();
$("#vdrpickupadr" + starkey).hide();
$(".vndradrs" + starkey).each(function () {
$(this).removeAttr('checked');
});
}
}
/*function submitcheckoutform()
{
var fakepdctcount = ' //echo count($this->totalcartdata);';
if(fakepdctcount > 0) {
for(var myfakecontrol = 1; myfakecontrol <= fakepdctcount; myfakecontrol++)
{
//$(".commondelpikchk"+myfakecontrol).each(function () {
if($(".commondelpikchk"+myfakecontrol).is(":checked")) {
//$(".commondelpikchk"+myfakecontrol).each(function () {
//var somethingChecked = $(this).prop('checked');
//alert(somethingChecked+myfakecontrol);
//if(somethingChecked == 1)
//{
var myForm = $('#mycheckoutform');
if(!myForm[0].checkValidity())
{
myForm.find(':submit').click();
return false;
}
else{
$("#savecheckoutdata").click();
}
}
else {
alert("Please select a pickup/delivery address.");
return false;
}
}
}
}*/
/*function validateForm()
{
var user_country =  document.getElementById('user_country').value.trim();
//alert(user_country);
var user_state =  document.getElementById('user_state').value.trim();
var user_city =  document.getElementById('user_city').value.trim();
var user_zip =  document.getElementById('postal_code').value.trim();
var user_adr =  document.getElementById('address').value.trim();
if(user_country == '0')
{
document.getElementById('state_error').innerHTML = '';
document.getElementById('city_error').innerHTML = '';
document.getElementById('country_error').innerHTML = 'Please select your country';
document.getElementById('user_country').focus();
return false;
}
else
{
document.getElementById('country_error').innerHTML = '';
}
if(user_state == '0')
{
document.getElementById('country_error').innerHTML = '';
document.getElementById('city_error').innerHTML = '';
document.getElementById('state_error').innerHTML = 'Please select your state';
document.getElementById('user_state').focus();
return false;
}
else
{
document.getElementById('state_error').innerHTML = '';
}
if(user_city == '0')
{
document.getElementById('country_error').innerHTML = '';
document.getElementById('state_error').innerHTML = '';
document.getElementById('city_error').innerHTML = 'Please select your city';
document.getElementById('user_city').focus();
return false;
}
else
{
document.getElementById('city_error').innerHTML = '';
}
if(user_zip == ''){
document.getElementById('zip_error').innerHTML = 'Please enter zip code';
return false;
}
else
{
document.getElementById('zip_error').innerHTML = '';
}
if(user_adr == ''){
document.getElementById('adr_error').innerHTML = 'Please enter yout address';
return false;
}
else
{
document.getElementById('adr_error').innerHTML = '';
}
}*/
function billChangeCount(state) {
var baseurl = '<?PHP echo $baseUrl;?>';
var SITEROOT = baseurl;
createXMLHttpRequest();
var url = SITEROOT + '/default/index/statelist/';
var strURL = url;
if (state != '') {
var query = "statename=" + state;
if (xmlHttpRequest != null) {
xmlHttpRequest.open("post", strURL, true);
xmlHttpRequest.onreadystatechange = showsBillState;
xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xmlHttpRequest.send(query);
}
}
}
function showsBillState() {
if (xmlHttpRequest.readyState == 4) {
if (xmlHttpRequest.status == 200) {
var response = xmlHttpRequest.responseText;
document.getElementById('b_state').innerHTML = response;
document.getElementById('b_city').innerHTML = "<option value='0'>Select City</option>";
}
}
}
function BillChangeCity(city) {
var baseurl = '<?PHP echo $baseUrl;?>';
var SITEROOT = baseurl;
createXMLHttpRequest();
var url = SITEROOT + '/default/index/citylist/';
var strURL = url;
if (city != '') {
var query = "cityname=" + city;
if (xmlHttpRequest != null) {
xmlHttpRequest.open("post", strURL, true);
xmlHttpRequest.onreadystatechange = showBillCity;
xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xmlHttpRequest.send(query);
}
}
}
function showBillCity() {
if (xmlHttpRequest.readyState == 4) {
if (xmlHttpRequest.status == 200) {
var response = xmlHttpRequest.responseText;
document.getElementById('b_city').innerHTML = response;
}
}
}
/* Function above billing country state city */
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
function schangecount(state) {
var baseurl = '<?PHP echo $baseUrl;?>';
var SITEROOT = baseurl;
createXMLHttpRequest();
var url = SITEROOT + '/default/index/statelist/';
var strURL = url;
if (state != '') {
var query = "statename=" + state;
if (xmlHttpRequest != null) {
xmlHttpRequest.open("post", strURL, true);
xmlHttpRequest.onreadystatechange = showsState;
xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xmlHttpRequest.send(query);
}
}
}
function showsState() {
if (xmlHttpRequest.readyState == 4) {
if (xmlHttpRequest.status == 200) {
var response = xmlHttpRequest.responseText;
document.getElementById('user_sstate').innerHTML = response;
document.getElementById('user_scity').innerHTML = "<option value='0'>Select City</option>";
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
function schangecity(city) {
var baseurl = '<?PHP echo $baseUrl;?>';
var SITEROOT = baseurl;
createXMLHttpRequest();
var url = SITEROOT + '/default/index/citylist/';
var strURL = url;
if (city != '') {
var query = "cityname=" + city;
if (xmlHttpRequest != null) {
xmlHttpRequest.open("post", strURL, true);
xmlHttpRequest.onreadystatechange = sshowcity;
xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xmlHttpRequest.send(query);
}
}
}
function sshowcity() {
if (xmlHttpRequest.readyState == 4) {
if (xmlHttpRequest.status == 200) {
var response = xmlHttpRequest.responseText;
document.getElementById('user_scity').innerHTML = response;
}
}
}
function updateaddress() {
var user_country = document.getElementById('user_country').value.trim();
var user_state = document.getElementById('user_state').value.trim();
var user_city = document.getElementById('user_city').value.trim();
var user_zip = document.getElementById('postal_code').value.trim();
var user_adr = document.getElementById('address').value.trim();
var baseurl = '<?PHP echo $baseUrl;?>';
var SITEROOT = baseurl;
createXMLHttpRequest();
var url = SITEROOT + '/default/index/getcscdata/';
var strURL = url;
if (user_adr != '' && user_city != '' && user_state != '' && user_country != '' && user_zip != '') {
var query = "countrykey=" + user_country + "&statekey=" + user_state + "&citykey=" + user_city;
if (xmlHttpRequest != null) {
xmlHttpRequest.open("post", strURL, true);
xmlHttpRequest.onreadystatechange = showupdateaddress;
xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xmlHttpRequest.send(query);
}
}
}
/*function showupdateaddress()
{
if(xmlHttpRequest.readyState == 4)
{
if(xmlHttpRequest.status == 200)
{
var response = xmlHttpRequest.responseText;
var splitresult = response.split('&hecx&');
var result     = splitresult[0];
var my_city    = splitresult[1];
var my_state = splitresult[2];
var my_country     = splitresult[3];
var user_zip =  document.getElementById('postal_code').value.trim();
var user_adr =  document.getElementById('address').value.trim();
if(user_adr != '' && my_city != '' && my_state != '' && my_country != '' && user_zip != '')
{
$(".usrdeliveryadrs").html("<input type='radio' id='customer_address1' class='commondelpikchk1' name='customer_address1'>"+ user_adr + ", " + my_city + ", " + my_state + ", " + my_country + " - " + user_zip + "</input>");
}
else {
return false;
}
}
}
}*/
function calcavatax(city) {
var baseurl = '<?PHP echo $baseUrl;?>';
var SITEROOT = baseurl;
createXMLHttpRequest();
var url = SITEROOT + '/default/index/citylist/';
var strURL = url;
if (city != '') {
var query = "cityname=" + city;
if (xmlHttpRequest != null) {
xmlHttpRequest.open("post", strURL, true);
xmlHttpRequest.onreadystatechange = avavtaxresult;
xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xmlHttpRequest.send(query);
}
}
}
function avavtaxresult() {
if (xmlHttpRequest.readyState == 4) {
if (xmlHttpRequest.status == 200) {
var response = xmlHttpRequest.responseText;
document.getElementById('user_city').innerHTML = response;
}
}
}
</script>
<script type="text/javascript">
function increase_iteam(item_added, product_id, min_order_quantity, item_single_price, earned_amples, total_ample, usrmakey, vendor_id, method, is_withoutample) {
vpb_add_to_cart(item_added, product_id, min_order_quantity, item_single_price, earned_amples, total_ample, usrmakey, vendor_id, method, is_withoutample);
setTimeout(function () {
window.location.reload();
}, 500);
}
function decrease_iteam(item_added, product_id, min_order_quantity, item_single_price, usrmakey, method, is_withoutample) {
vpb_dcre_from_cart(item_added, product_id, min_order_quantity, item_single_price, usrmakey, method, is_withoutample);
setTimeout(function () {
window.location.reload();
}, 500);
}
$(document).ready(
function () {
$("#datepicker1").datepicker({
dateFormat: 'yy/mm/dd',
changeMonth: true,//this option for allowing user to select month
changeYear: true //this option for allowing user to select from year range
});
});
</script>
<script>
$(document).ready(function () {
$('#checkpickdelivery').click(function () {
var fname = $('#first_name').val();
if (fname == "") {
$('#first_error').html("This is a required field.");
$('#first_name').focus();
return false;
}
$('#first_error').empty();
var lname = $('#last_name').val();
if (lname == "") {
$('#last_error').html("This is a required field.");
$('#last_name').focus();
return false;
}
$('#last_error').empty();
var email = $('#email_address').val();
if (email == "") {
$('#email_error').html("This is a required field.");
$('#email_address').focus();
return false;
}
$('#email_error').empty();
var address = $('#address').val();
if (address == "") {
$('#adr_error').html("This is a required field.");
$('#address').focus();
return false;
}
$('#adr_error').empty();
var user_country = $('#user_country').val();
if (user_country == "") {
$('#country_error').html("This is a required field.");
$('#user_country').focus();
return false;
}
$('#country_error').empty();
var user_state = $('#user_state').val();
if (user_state == "") {
$('#state_error').html("This is a required field.");
$('#user_state').focus();
return false;
}
$('#state_error').empty();
var user_city = $('#user_city').val();
if (user_city == "") {
$('#city_error').html("This is a required field.");
$('#user_city').focus();
return false;
}
$('#city_error').empty();
var postal_code = $('#postal_code').val();
if (postal_code == "") {
$('#zip_error').html("This is a required field.");
$('#postal_code').focus();
return false;
}
$('#zip_error').empty();
var telephone = $('#telephone').val();
if (telephone == "") {
$('#tel_error').html("This is a required field.");
$('#telephone').focus();
return false;
}
$('#tel_error').empty();
var fax = $('#fax').val();
if (fax == "") {
$('#fax_error').html("This is a required field.");
$('#fax').focus();
return false;
}
$('#fax_error').empty();
/*
var password_m = $('#password').val();
var confirm_m = $('#confirm').val();
if(password_m != confirm_m){
$('#fax_error2').html("This does not match with password.");
$('#confirm').focus();
return false;
} */
});
});
</script>