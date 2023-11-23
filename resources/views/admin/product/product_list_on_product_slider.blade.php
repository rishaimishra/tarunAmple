{{-- <?php echo $admin_model_obj->cdnUrl('product_images/'.$this->escape($key->pid).'/'.$this->escape($key->img_name)); ?> --}}
<?php 

   

    if(count($resultproductlist) > 0) {

        foreach($resultproductlist as $key) { ?>
        <tr>
            <td><img style="width: 150px;height: 150px" src=""></td>
            <td>{{$key->pname}}
                <input type="hidden" name="product_key[]" value="{{$key->pid}}">
            </td>
            <td>

                <div class="form-check form-check-inline">
                    <label class="form-check-label">

                    	<input type="checkbox"  name="rofftype1[]" value="{{$key->pid}}" class="form-check-input tableflat" <?php if(isset($countrelatedplist) && !empty($countrelatedplist)){ foreach($countrelatedplist as $rpchk) { if($rpchk->relp_pid == $key->pid) { echo "checked"; } } } ?>>
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>

            </td>
            <td>

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox"  name="rofftype2[]" value="{{$key->pid}}" class="form-check-input tableflat" <?php if(isset($countmightlikeplist) && !empty($countmightlikeplist)){ foreach($countmightlikeplist as $mlpchk) { if($mlpchk->mal_pid == $key->pid) { echo "checked"; } } } ?>>
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>

            </td>
            <td>

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox"  name="rofftype3[]" value="{{$key->pid}}" class="form-check-input tableflat"  <?php if(isset($countonsaleplist) && !empty($countonsaleplist)){ foreach($countonsaleplist as $onspchk) { if($onspchk->os_pid == $key->pid) { echo "checked"; } } } ?>>
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>

            </td>
            <td>
            
            
            <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox"  name="rofftype4[]" value="{{$key->pid}}" class="form-check-input tableflat"  <?php if(isset($countofferplist) && !empty($countofferplist)){ foreach($countofferplist as $onffpchk) { if($onffpchk->off_pid == $key->pid) { echo "checked"; } } } ?>>
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
            
            
            </td>
        </tr>

        <?php } 

} 
else{
        	echo"no data";
        }
?>
