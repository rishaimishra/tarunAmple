function vpb_check_out() {

    var a = $("#vpb_main_total_cart_items").val();
    $("div.shopping_cart_status").hide();
    $("div#shopping_cart_status").hide();
    $("div.checkout_user_info").show();
    $("div#checkout_user_info").show();
    $("#cartItemsTotals").val("Items Total: $" + a);
    $("html, body").animate({scrollTop: 0}, "slow");
}

function vpb_checkout() {

    var a = $("#vpb_main_total_cart_items").val();
    $("div.shopping_cart_status").hide();
    $("div#shopping_cart_status").hide();
    $("div.checkout_user_info").show();
    $("div#checkout_user_info").show();
    $("#cartItemsTotals").val("Items Total: $" + a);
    $("html, body").animate({scrollTop: 0}, "slow");
}

function vpb_go_back() {

    $("div.checkout_user_info").hide();
    $("div#checkout_user_info").hide();
    $("div.shopping_cart_status").show();
    $("div#shopping_cart_status").show();
    $("html, body").animate({scrollTop: 0}, "slow");
}

function vpb_submitCart() {

    var b = $("#vpb_fullname").val();
    var a = $("#vpb_email").val();
    var c = $("#vpb_address").val();
    var d = $("#vpb_phone").val();

    if ("" == b) $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your fullname in the specified field to proceed. Thanks..</div><br clear="all" />'), $("#vpb_fullname").focus();
    else if ("" == a) $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your email address in its field to move on. Thanks..</div><br clear="all" />'), $("#vpb_email").focus();
    else if (0 == /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(a))
        $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter a valid email address to proceed. Thanks...</div><br clear="all" />'), $("#vpb_email").focus();
    else if ("" == c)
        $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your home address in the specified field to proceed. Thanks...</div><br clear="all" />'), $("#vpb_address").focus();
    else if ("" == d) $("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your phone number in its field to go. Thanks...</div><br clear="all" />'), $("#vpb_phone").focus();
    else {
        var e = "vpb_fullname=" + b + "&vpb_email=" + a + "&vpb_address=" + c + "&vpb_phone=" + d + "&page=submit_cart",
            f = window.location.origin;
        $.ajax({
            type: "POST",
            url: f + "/shopping_cart/shopping_cart_operation.php",
            data: e,
            beforeSend: function () {
                $("html, body").animate({scrollTop: 0}, "slow"),
                    $("div.checkout_user_info").hide(),
                    $("div#checkout_user_info").hide(),
                    $("div.shopping_cart_status").show(),
                    $("div#shopping_cart_status").show(),
                    $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
            },
            success: function (a) {
                $("#response").html(a);
            },
        });
    }
}

function vpb_clear_cart(a) {
    if (confirm("Are you sure that you want to completely empty your cart?")) {
        var b = "username=" + a + "&page=clear_cart",
            c = window.location.origin;
        $.ajax({
            type: "POST",
            url: c + "/shopping_cart/shopping_cart_operation.php",
            data: b,
            beforeSend: function () {
                $("html, body").animate({scrollTop: 0}, "slow");
                $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
            },
            success: function (a) {
                
                $("div.checkout_user_info").hide();
                $("div#checkout_user_info").hide();
                $("div.shopping_cart_status").show();
                $("div#shopping_cart_status").show();
                $("#response").html(a);
            },
        });
    }
    return !1;
}

function remove_this_item(a, b) {
    if (!confirm("Are you sure you want to delete?")) return !1;
    var c = window.location.origin;
    $.ajax({
        type: "POST",
        url: c + "/shopping_cart/shopping_cart_operation.php",
        data: "item_id=" + a + "&usrmaid=" + b + "&page=remove_this_item",
        beforeSend: function () {
            $("#items_cover" + a).html('<br><img src="loading.gif" align="absmiddle" alt="Loading..."> Removing...');
        },
        success: function (b) {
            var a = b.split("###");
            $("#totalitemcount").html(a[0]),
                $("#totalitemcount4mob").html(a[0]),
                $(".totalitemnewcount").html(a[0]),
                $(".cart-title").html(a[0] + " Items in my cart"),
                $(".totalitemdata").html(a[1]),
                $(".totalitemamount").html("$ " + a[2]),
                $("#mylatestamples").html(a[3]),
                $("#checkoutitemlist").html(a[4]),
                $("#totalcheckouttaxamount").html("$ " + a[2]),
                $(".totalcheckoutamount").html("$ " + a[2]),
            "0.00" == a[2] && $("#checkpickdelivery").hide(),
                window.location.reload();
        },
    });
}

function vpb_dcre_from_cart(b, c, d, e, f, h, a) {
    "" == a && (a = 0);
    var g = window.location.origin;
    $.ajax({
        type: "POST",
        url: g + "/shopping_cart/shopping_cart_operation.php",
        data: "item_name=" + b + "&prod_id=" + c + "&quant=" + d + "&item_price=" + e + "&usrmaid=" + f + "&page=decrement_this_item&is_without_ample=" + a,
        beforeSend: function () {
            $("#items_cover" + c).html('<br><img src="loading.gif" align="absmiddle" alt="Loading..."> Removing...');
        },
        success: function (b) {
            var a = b.split("###");
            $("#totalitemcount").html(a[0]), $("#totalitemcount4mob").html(a[0]), $(".totalitemnewcount").html(a[0]), $(".totalitemdataa").html(a[1]), $(".totalitemamount").html("$ " + a[2]);
        },
    });
}

function vpb_add_to_cart(c, d, e, f, g, h, a, i, k, b) {
    "" == a && (a = 0), "" == b && (b = 0);
    var j = window.location.origin;
    $.ajax({
        type: "POST",
        url: j + "/shopping_cart/shopping_cart_operation.php",
        data: "item_name=" + c + "&prod_id=" + d + "&quant=" + e + "&item_price=" + f + "&earn_amples=" + g + "&usr_tot_amples=" + h + "&usrmaid=" + a + "&vdrmaid=" + i + "&page=add_to_cart&is_without_ample=" + b,
        beforeSend: function () {
            $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
        },
        success: function (b) {
            var a = b.split("###");
            $("#totalitemcount").html(a[0]),
                $("#totalitemcount4mob").html(a[0]),
                $(".totalitemnewcount").html(a[0]),
                $(".cart-title").html(a[0] + " Items in my cart"),
                $(".totalitemdata").html(a[1]),
                $(".totalitemamount").html("$ " + a[2]);
            openSidebarCart();
        },
    });
}

function vpb_free_add_to_cart(c, d, e, f, g, h, a, i, k, b) {
    "" == a && (a = 0), "" == b && (b = 0);
    var j = window.location.origin;
    $.ajax({
        type: "POST",
        url: j + "/shopping_cart/shopping_cart_operation.php",
        data: "item_name=" + c + "&prod_id=" + d + "&quant=" + e + "&item_price=" + f + "&earn_amples=" + g + "&usr_tot_amples=" + h + "&usrmaid=" + a + "&vdrmaid=" + i + "&page=add_free_to_cart&is_free_product=" + b,
        beforeSend: function () {
            $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
        },
        success: function (b) {
            var a = b.split("###");
            $("#totalitemcount").html(a[0]),
                $("#totalitemcount4mob").html(a[0]),
                $(".totalitemnewcount").html(a[0]),
                $(".cart-title").html(a[0] + " Items in my cart"),
                $(".totalitemdata").html(a[1]),
                $(".totalitemamount").html("$ " + a[2]);
            openSidebarCart();
        },
    });
}

function vpb_add_to_cart_with_amples(d, e, f, g, h, a, b, i, j, k, _) {
    if ("" == a) return alert("Please enter number of amples you want to use on purchasing of this product."), !1;
    var c = parseFloat(a);
    if (c > b) return alert("Sorry, You don't have sufficient amples to purchase this product."), !1;
    $("div.checkout_user_info").hide(), $("div#checkout_user_info").hide(), $("div.shopping_cart_status").show(), $("div#shopping_cart_status").show();
    var l =
        "item_name=" +
        d +
        "&prod_id=" +
        e +
        "&quant=" +
        f +
        "&item_price=" +
        g +
        "&usrnewitem_pricebyamples=" +
        h +
        "&usr_applied_amples=" +
        c +
        "&usr_total_amples=" +
        b +
        "&earn_amples=" +
        i +
        "&usrmaid=" +
        j +
        "&vdrmaid=" +
        k +
        "&page=add_to_cart_with_amples",
        m = window.location.origin;
    $.ajax({
        type: "POST",
        url: m + "/shopping_cart/shopping_cart_operation.php",
        data: l,
        beforeSend: function () {
            $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
        },
        success: function (d) {
            var a = d.split("###");
            $("#totalitemcount").html(a[0]), $("#totalitemcount4mob").html(a[0]), $(".totalitemnewcount").html(a[0]), $(".totalitemdata").html(a[1]);
            var c = a[2].split("m!K!B0T"),
                b = c[0],
                e = c[1];
            $("#mylatestamples").html(e), $(".totalitemamount").html("$ " + b), $("#checkoutitemlist").html(a[3]), $("#totalcheckouttaxamount").html("$ " + b), $(".totalcheckoutamount").html("$ " + b);
            openSidebarCart();
        },
    });
}

function vpb_add_place(a, b, c, d, f) {
    $("div.checkout_user_info").hide(), $("div#checkout_user_info").hide(), $("div.shopping_cart_status").show(), $("div#shopping_cart_status").show();
    var e = window.location.origin;
    $.ajax({
        type: "POST",
        url: e + "/shopping_cart/shopping_cart_operation.php",
        data: "item_name=" + a + "&prod_id=" + b + "&quant=" + c + "&item_price=" + d + "&page=add_to_cart",
        beforeSend: function () {
            $("html, body").animate({scrollTop: 0}, "slow"), $("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
        },
        success: function (a) {
            $("#response").html(a), $(location).attr("href", urln);
        },
    });
}
