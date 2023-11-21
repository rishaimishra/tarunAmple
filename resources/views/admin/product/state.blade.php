<label for="state_1" class="bmd-label-floating">Select State</label>
<select name="delstate[]"  onchange="changeCity(this);" id="state_1">
	@foreach($states as $val)
	<option value='{{$val->stateid}}'>{{$val->statename}}</option>
	@endforeach
</select>




<script>
	// Handle city change event
function changeCity(element) {
var stateId = $(element).val();
if (stateId) {
$.ajax({
url: '{{url('/')}}/load-cities/' + stateId,
type: 'GET',
success: function (data) {
console.log(data)
$("#city_id").html(data)
}
});
} else {
// If no state is selected, disable and clear the city dropdown
cityDropdown.prop('disabled', true).html('<option value="">Select City</option>');
}
}
</script>