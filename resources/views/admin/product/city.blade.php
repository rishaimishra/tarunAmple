<label for="city_1" class="bmd-label-floating">Select City</label>
@if(count($cities)>0)
<select name="delcity[]"  id="city_1">
	@foreach($cities as $val)
	<option value='{{$val->id}}'>{{$val->name}}</option>
	@endforeach
	
</select>
@else
No cities under that state
@endif