/*
********================================*****************
* Wishlist Script v1.0 
* Written by Vivek Kumar 9716003265 (er.vivek.rgec.cs@gmail.com)
*********=================================****************
*/

function vpb_check_out()
{
    var cartItemsTotals = $("#vpb_main_total_cart_items").val();
    $("div.shopping_cart_status").hide();
    $("div#shopping_cart_status").hide();
    $("div.checkout_user_info").show();
    $("div#checkout_user_info").show();
    $("#cartItemsTotals").val('Items Total: $'+cartItemsTotals);
    $('html, body').animate({scrollTop:0}, 'slow');
}
function vpb_checkout()
{
    var cartItemsTotals = $("#vpb_main_total_cart_items").val();
    $("div.shopping_cart_status").hide();
    $("div#shopping_cart_status").hide();
    $("div.checkout_user_info").show();
    $("div#checkout_user_info").show();
    $("#cartItemsTotals").val('Items Total: $'+cartItemsTotals);
    $('html, body').animate({scrollTop:0}, 'slow');
}
function vpb_go_back()
{
    $("div.checkout_user_info").hide();
    $("div#checkout_user_info").hide();
    $("div.shopping_cart_status").show();
    $("div#shopping_cart_status").show();
    $('html, body').animate({scrollTop:0}, 'slow');
}
function vpb_submitCart()
{
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var vpb_fullname = $("#vpb_fullname").val();
    var vpb_email = $("#vpb_email").val();
    var vpb_address = $("#vpb_address").val();
    var vpb_phone = $("#vpb_phone").val();
    
    if (vpb_fullname == "")
    {
        $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your fullname in the specified field to proceed. Thanks..</div><br clear="all" />');
        $("#vpb_fullname").focus();
    }
    else if( vpb_email == "")
    {
        $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your email address in its field to move on. Thanks..</div><br clear="all" />');
        $("#vpb_email").focus();
    }
    else if(reg.test(vpb_email) == false)
    {
        $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter a valid email address to proceed. Thanks...</div><br clear="all" />');
        $("#vpb_email").focus();
    }
    else if(vpb_address == "")
    {
        $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your home address in the specified field to proceed. Thanks...</div><br clear="all" />');
        $("#vpb_address").focus();
    }
    else if(vpb_phone == "")
    {
        $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your phone number in its field to go. Thanks...</div><br clear="all" />');
        $("#vpb_phone").focus();
    }
    else
    {
        var dataString = "vpb_fullname=" + vpb_fullname + "&vpb_email=" + vpb_email + "&vpb_address=" + vpb_address + "&vpb_phone=" + vpb_phone + "&page=submit_cart";
        
        $.ajax({  
            type: "POST",  
            url: "http://amplepoints.com/shopping_cart/wishlist_add.php",  
            data: dataString,
            beforeSend: function() 
            {
                $('html, body').animate({scrollTop:0}, 'slow');
                $("div.checkout_user_info").hide();
                $("div#checkout_user_info").hide();
                $("div.shopping_cart_status").show();
                $("div#shopping_cart_status").show();
                $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
            },  
            success: function(response)
            {
                $("#response").html(response);
            }
        });
    }
}
function vpb_clear_cart(username)
{
    if(confirm("Are you sure that you want to completely empty your cart?"))
    {
        var dataString = "username=" + username + "&page=clear_cart";
        $.ajax({  
            type: "POST",  
            url: "http://amplepoints.com/shopping_cart/wishlist_add.php",  
            data: dataString,
            beforeSend: function() 
            {
                $('html, body').animate({scrollTop:0}, 'slow');
                $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
            },  
            success: function(response)
            {
                $("div.checkout_user_info").hide();
                $("div#checkout_user_info").hide();
                $("div.shopping_cart_status").show();
                $("div#shopping_cart_status").show();
                $("#response").html(response);
            }
        });
    }
    return false;
} 
function remove_wishlist_item(item_id, usrkey)
{
    //alert(item_id);
    var dataString = "item_id=" + item_id + "&item_usrkey=" + usrkey + "&page=remove_this_item";
    // alert(dataString);
    // alert('shopping_cart/vasplus_programming_blog_shopping_cart_v4.php');
    if(confirm("Are you sure you want to delete?")){
        $.ajax({  
            type: "POST",  
            url: "http://amplepoints.com/shopping_cart/wishlist_add.php",  
            data: dataString,
            beforeSend: function() 
            {
                //$('html, body').animate({scrollTop:1}, 'slow');
                $("#items_cover"+item_id).html('<br><img src="loading.gif" align="absmiddle" alt="Loading..."> Removing...');
            },  
            success: function(response)
            {
                var strarray = response.split('###');
                $("#totalitemcount1").html(strarray[0]);
                $("#totalitemnewcount1").html(strarray[0] + " Items in my wishlist");
                $("#totalwishlist").html(strarray[1]);
                
                location.reload();
            }
        });
    }
    else 
    {
        return false;
    }
    //alert(response);
    //return false;
}
function wishlist_cart(item_name,prod_id,quant,item_price, usrkey, status)
{
    //alert(item_name);
    $("div.checkout_user_info").hide();
    $("div#checkout_user_info").hide();
    $("div.shopping_cart_status").show();
    $("div#shopping_cart_status").show();
    //alert(prod_id);
    var dataString = "item_name=" + item_name + "&prod_id=" + prod_id + "&quant=" + quant + "&item_price=" + item_price + "&item_usrkey=" + usrkey + "&page=add_to_cart";;
    $.ajax({  
        type: "POST",  
        url: "http://amplepoints.com/shopping_cart/wishlist_add.php",  
        
        
        data: dataString,
        beforeSend: function() 
        {
            $('html, body').animate({scrollTop:0}, 'slow');
            $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
        },  
        success: function(response)
        {
            var strarray = response.split('###');
            $("#totalitemcount1").html(strarray[0]);
            $("#totalitemnewcount1").html(strarray[0] + " Items in my wishlist");
            $("#totalwishlist").html(strarray[1]);
            location.reload();
        }
    });
        //alert(response);
}
function vpb_add_place(item_name,prod_id,quant,item_price,status)
{
    $("div.checkout_user_info").hide();
    $("div#checkout_user_info").hide();
    $("div.shopping_cart_status").show();
    $("div#shopping_cart_status").show();
    //alert(prod_id);
    var dataString = "item_name=" + item_name + "&prod_id=" + prod_id + "&quant=" + quant + "&item_price=" + item_price + "&page=add_to_cart";;
    $.ajax({  
        type: "POST",  
        url: "http://amplepoints.com/shopping_cart/wishlist_add.php",  
        data: dataString,
        beforeSend: function() 
        {
            $('html, body').animate({scrollTop:0}, 'slow');
            $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
        },  
        success: function(response)
        {
            $("#response").html(response);
                        $(location).attr('href',urln);
                        
        }
    });
        //alert(response);
}