$(document).ready(function() {
    function showValues() {
        $("#productContainer").css("opacity",0.5);
        $("#loaderID").css("opacity",1);

        //e.css('visibility','visible');


        var mainarray = new Array();

        var trmya = document.getElementById('phatonpen').value;
        if(trmya == 'undefined' && trmya != ''){
            var trmapk_checklist = "&ptrmya=";
        }
        else {
            var trmapk_checklist = "&ptrmya="+trmya;
        }

        var pingon = document.getElementById('targeton').value;
        if(pingon == 'undefined' && pingon != ''){
            var tping_checklist = "&tping=";
        }
        else {
            var tping_checklist = "&tping="+pingon;
        }

        var curl =     window.location.href;

        //var ptsplit = curl.split("/amp/");
        //var ptid = ptsplit[1];

        var ptid =  $('#ptid').val();

        if(ptid){
            var ptid_checklist = "&ptid="+ptid;
        }
        else {
            var ptid_checklist = "&ptid=";
        }

        //var ctsplit = curl.split("/cat/");
        //var ctid = ctsplit[1];

        var ctid =  $('#ctid').val();

        if(ctid){
            var ctid_checklist = "&ctid="+ctid;
        }
        else {
            var ctid_checklist = "&ctid=";
        }

        //var sbctsplit = curl.split("/subcat/");
        //var sbctid = sbctsplit[1];

        var sbctid =  $('#sbctid').val();

        if(sbctid){
            var sbctid_checklist = "&sbctid="+sbctid;
        }
        else {
            var sbctid_checklist = "&sbctid=";
        }

        var selid =  $('#myselid').val();

        //var selsplit = curl.split("/selid/");
        //var selid = selsplit[1];
        if(selid){

            var selid_checklist = "&selid="+selid;
        }
        else {
            var selid_checklist = "&selid=";
        }

        var is_without_ample =  $('#is_without_ample').val();

        //var selsplit = curl.split("/selid/");
        //var selid = selsplit[1];
        if(is_without_ample){

            var pro_without_ample = "&without_ample="+is_without_ample;
        }
        else {
            var pro_without_ample = "&without_ample=";
        }

        var catarray = new Array();        
        $('input[name="catcheck"]:checked').each(function(){            
            catarray.push($(this).val());        
            //$('.spanbrandcls').css('visibility','visible');            
            //alert($(this).attr("checkboxname"));    
        });
        if(catarray=='') $('.spanbrandcls').css('visibility','hidden');
        var cat_checklist = "&catcheck="+catarray;

        var brandarray = new Array();
        $('input[name="bevcheck"]:checked').each(function(){            
            brandarray.push($(this).val());        
            //$('.spanbrandcls').css('visibility','visible');            
            //alert($(this).attr("checkboxname"));    
        });
        if(brandarray=='') $('.spanbrandcls').css('visibility','hidden');
        var brand_checklist = "&bevcheck="+brandarray;

        var sizearray = new Array();        
        $('input[name="scheck"]:checked').each(function(){            
            sizearray.push($(this).val());    
            //$('.spansizecls').css('visibility','visible');    
        });
        if(sizearray=='') $('.spansizecls').css('visibility','hidden');
        var size_checklist = "&scheck="+sizearray;
        //alert(size_checklist);

        var colorarray = new Array();        
        $('input[name="ccheck"]:checked').each(function(){            
            colorarray.push($(this).val());
            //$('.spancolorcls').css('visibility','visible');        
        });
        if(colorarray=='') $('.spancolorcls').css('visibility','hidden');
        var color_checklist = "&ccheck="+colorarray;
        //alert(color_checklist);


        var pricerangearray = new Array();        
        $('#amount-price-complete-amount').each(function(){    
            var pricerange = $(this).val();
            //alert(pricerange);
            pricerangearray.push(pricerange);
            //$('.spanpricecls').css('visibility','visible');        
        });
        if(pricerangearray=='') $('.spanpricecls').css('visibility','hidden');
        var pricerange_checklist = "&full_price_range="+pricerangearray;
        //alert(pricerange_checklist);

        var pricearray = new Array();        
        $('input[name="price_range"]:checked').each(function(){    
            var pricerange = $(this).val();
            pricearray.push(pricerange);
            //$('.spanpricecls').css('visibility','visible');        
        });
        if(pricearray=='') $('.spanpricecls').css('visibility','hidden');
        var price_checklist = "&price_range="+pricearray;
        //alert(price_checklist);

        var rewardarray = new Array();        
        $('input[name="reward_range"]:checked').each(function(){    
            var rewardrange = $(this).val();
            rewardarray.push(rewardrange);
            //$('.spanpricecls').css('visibility','visible');        
        });
        if(rewardarray=='') $('.spanpricecls').css('visibility','hidden');
        var reward_checklist = "&reward_range="+rewardarray;
        //alert(price_checklist);
        
        var discountarray = new Array();        
        $('input[name="discount_range"]:checked').each(function(){    
            var discountrange = $(this).val();
            discountarray.push(discountrange);
            //$('.spanpricecls').css('visibility','visible');        
        });
        if(discountarray=='') $('.spanpricecls').css('visibility','hidden');
        var discount_checklist = "&discount_range="+discountarray;
        //alert(price_checklist);

        var sub_filter_array = new Array();        
        $('input[name="sub-filter-checkbox"]:checked').each(function(){    
            var subfiletr = $(this).val();
            sub_filter_array.push(subfiletr);
            //$('.spanpricecls').css('visibility','visible');        
        });
        if(sub_filter_array == '') $('.spanpricecls').css('visibility','hidden');
        var subfilter_checklist = "&sub_filter="+sub_filter_array;

        var sub2_filter_array = new Array();        
        $('input[name="sub2-filter-checkbox"]:checked').each(function(){    
            var sub2filetr = $(this).val();
            sub2_filter_array.push(subfiletr);
            //$('.spanpricecls').css('visibility','visible');        
        });
        if(sub2_filter_array == '') $('.spanpricecls').css('visibility','hidden');
        var sub2filter_checklist = "&sub2_filter="+sub2_filter_array;

        var main_string = trmapk_checklist+tping_checklist+ptid_checklist+ctid_checklist+sbctid_checklist+selid_checklist+cat_checklist+brand_checklist+size_checklist+color_checklist+price_checklist+pricerange_checklist+subfilter_checklist+sub2filter_checklist+pro_without_ample+reward_checklist+discount_checklist;
        main_string = main_string.substring(1, main_string.length)
        //alert(main_string);

        var base_url = window.location.origin;

        $.ajax({
            type: "POST",
            url: base_url+"/product_filter/filter_products.php",
            data: main_string, 
            cache: false,
            success: function(html){
                //alert(html);
                $("#productContainer").html(html);        
                $("#productContainer").css("opacity",1);
                $("#loaderID").css("opacity",0);

            }
        });

    }


    $("input[name='catcheck']").on( "click", showValues );

    $("input[name='bevcheck']").on( "click", showValues );

    $("input[name='scheck']").on( "click", showValues );

    $("input[name='ccheck']").on( "click", showValues );

    $("input[name='price_range']").on( "click", showValues );
    
    $("input[name='reward_range']").on( "click", showValues );
    
    $("input[name='discount_range']").on( "click", showValues );

    $("input[name='sub-filter-checkbox']").on( "click", showValues );

    $("input[name='sub2-filter-checkbox']").on( "click", showValues );

    $("#slider-range-price-filter").bind("keyup blur change mouseup", showValues);
    $("select").on( "change", showValues );

    $(".spanbrandcls").click(function(){
        $('.catcheck').removeAttr('checked');                
        showValues();
        $('.spanbrandcls').css('visibility','hidden');
    });
    $(".spanbrandcls").click(function(){
        $('.bcheck').removeAttr('checked');                
        showValues();
        $('.spanbrandcls').css('visibility','hidden');
    });
    $(".spansizecls").click(function(){
        $('.scheck').removeAttr('checked'); 
        showValues();
        $('.spansizecls').css('visibility','hidden');
    });
    $(".spancolorcls").click(function(){
        $('.ccheck').removeAttr('checked'); showValues();
        $('.spancolorcls').css('visibility','hidden');
    });
    $(".spanpricecls").click(function(){
        $('.price_range').removeAttr('checked'); showValues();
        $('.spanpricecls').css('visibility','hidden');
    });
    $(".clear_filters").click(function(){
        $('#productCategoryLeftPanel').find('input[type=checkbox]:checked').removeAttr('checked');
        $('#productCategoryLeftPanel').find('input[type=radio]:checked').removeAttr('checked');
        showValues();
    });

});    
