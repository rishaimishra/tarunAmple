@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | Checkout</title>
@endsection

@include('includes.head')
@include('includes.new_head')
@include('includes.header')

@include('includes.script')

<?php
    $baseUrl = url('/');
    $admin_model_obj  = new \App\Models\AdminImpFunctionModel;
?>
{{-- <?php print $doctype() ?> --}}



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
        $SiteKeywords = "Ample Points,amplepoints.com,Online Shoping,entertainment,nightlife,restaurants,local deals,local services,beauty,spas,fashion,jewelry,watches,electronics,office,home,movies,music,games,health,fitness,automotive,real estate,travel,getaway,gifts,seasonal";

        $SiteDescription = "Ample points is an exclusive online shopping destination that rewards users for watching ads, shopping the hottest brands, and sharing with their friends. Shop on Ample points from local merchants and top brands all while earning reward points to use towards your next purchase.";

        if(isset($SiteKeywords) && !empty($SiteKeywords)){
            $SiteKeywords = $SiteKeywords;
        }
        if(isset($SiteDescription) && !empty($SiteDescription)){
            $SiteDescription = $SiteDescription;
        }
    ?>



    <meta name="keywords" content="<?php echo $SiteKeywords; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $SiteDescription; ?>">
    <meta name="author" content="Ample points">
    <meta name="google-site-verification" content="QXEBSr4FV-Sfy7uosGahydp2QUMcIFWo6ytLXLKAIzo" />
    <meta name="p:domain_verify" content="475ee70ebbc9453eae72d248b1658a93"/>
    <?php if(isset($setOgUrl)){ ?>
        <?php if(isset($ogUrl)){ ?>
            <meta property="og:url" content="<?php echo $ogUrl; ?>" />
            <?php } ?>
        <?php if(isset($ogType)){ ?>
            <meta property="og:type" content="<?php echo $ogType; ?>" />
            <?php } ?>
        <?php if(isset($ogTitle)){ ?>
            <meta property="og:title" content="<?php echo $ogTitle; ?>" />
            <?php } ?>
        <?php if(isset($ogDescription)){ ?>
            <meta property="og:description" content="<?php echo $ogDescription; ?>" />
            <?php } ?>
        <?php if(isset($ogImage)){ ?>
            <meta property="og:image"  content="<?php echo $ogImage ?>" />
            <?php } ?>
        <?php } ?>






    <link rel='shortcut icon' type='image/x-icon' href="<?php echo $admin_model_obj->cdnUrl('images/favicon.ico');?>" >
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto+Mono:300,400,500,700|Roboto:100,300,400,500,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/font-awesome/css/font-awesome.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/font-awesome/css/font-awesome.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/fonts/glyphicons-halflings-regular.ttf');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/main-style.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/amplepoint-style.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/amples.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/variables.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/prodect-a.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/prodect-b.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/search-header.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/POPUP.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/responsive.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/flyPanels.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/prodect-detail.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/jquery-ui.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/animate-login.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/style-check.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/colorpicker/bootstrap-colorpicker.min.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/theme.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/themes.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/pikaday.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/editor.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/jquerysctipttop.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/fileinput.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/jquery.wm-gridfolio-1.0.min.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/email-m.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('shopping_cart/vasplus_programming_blog_shopping_cart_v4.css');?>" >
    



    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('shopping_cart/jquery_1.5.2.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('shopping_cart/shopping_cart_operation.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('shopping_cart/wishlist_add.js');?>"></script>
    <!--<script type="text/javascript" language="javascript" src="<?php //echo $baseUrl('product_filter/js/jquery-1.10.1.min.js'); ?>"></script>-->
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('product_filter/js/productfilter.js'); ?>"></script>
    <script>



        $(function() {

            // grab the initial top offset of the navigation
            var sticky_navigation_offset_top = $('#header-bg').offset().top;

            // our function that decides weather the navigation bar should have "fixed" css position or not.
            var sticky_navigation = function(){
                var scroll_top = $(window).scrollTop(); // our current vertical position from the top

                // if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
                if (scroll_top > sticky_navigation_offset_top) {
                    $('#header-bg').css({ 'position': 'fixed', 'top':0, 'left':0 , 'width': '100%',});
                } else {
                    $('#header-bg').css({ 'position': 'relative' });
                }

                if (scroll_top > 300) {
                    $('#parallex-div-div').css({ 'position': 'fixed', 'top':71, 'z-index': 9, 'left':0 ,  'width': '100%',});

                }
                if (scroll_top > 300) {
                    <!--$('.img-parallax-img-img').addClass("slideInLeft");-->
                    $('#parallex-div-div').css({ 'width':'100%', 'transform':' translateZ(0%)', 'transform':'translateX(0%)', 'transform':'translateY(0%)', 'transition':'all 2s ease 0s, visibility 0s linear 2s'});
                }

                if (scroll_top < 300) {
                    $('#parallex-div-div').css({ 'width':'100%', 'transform':' translateZ(0%)', 'top':-100, 'transform':'translateX(0%)', 'transform':'translateY(0%)', 'transition':'all 0.5s ease 0s, visibility 0s linear 0.5s'});
                }

                /*if (scroll_top > 300) {
                $('#header-bg').css({ 'display': 'none',});
                } */


                /*if (scroll_top < 300) {
                $('#parallex-div-div').css({ 'position': 'fixed', 'top':250, 'background':(0, 0, 0, 0), 'left':0 , 'z-index':0 , 'width': '100%',});
                }  */
            };

            // run our function on load
            sticky_navigation();

            // and run it again every time you scroll
            $(window).scroll(function() {
                sticky_navigation();
            });

            // NOT required:
            // for this demo disable all links that point to "#"
            $('a[href="#"]').click(function(event){
                event.preventDefault();
            });

        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-80727818-1', 'auto');
        ga('send', 'pageview');

    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-K64BTZM');
    </script>
    <!-- End Google Tag Manager -->

    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=6481adb08bdd800012e15f44&product=inline-share-buttons&source=platform"
            async="async"></script>
</head>

<body  data-spy="scroll" data-target=".navbar-collapse">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K64BTZM" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/jquery-1.11.2.min.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/animation-style.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/select2.min.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/theme-script.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/owl.carousel.min.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/jquery.picZoomer.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/jquery-ui/jquery-ui.min.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/jquery.leanModal.min.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/round.js'); ?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/dropdownLayer.min.js'); ?>"></script>
    <!--<script type="text/javascript" language="javascript" src="<?php //echo $baseUrl('newcss/js/location.js'); ?>"></script>-->
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/jquery.wm-gridfolio-1.0.min.js'); ?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/navAccordion.min.js'); ?>"></script>
    <script type="text/javascript">

        (function($){
            $.fn.percentComplete = function(selector, color, size){
                return this.each(function(){
                    var fieldCount = '<?php echo $nonemptydatacount; ?>';

                    if(fieldCount){
                        var completeCount = '<?php echo count($progressdata); ?>';
                        var percentComplete = Math.round((fieldCount / completeCount) * 100);
                        $('.chart').attr('data-percent', percentComplete);
                        $(this).empty().append(percentComplete + "%");
                    }
                });
            };
        })(jQuery);


        $("document").ready(function(){
            $("#completion_meter").percentComplete(".form-control", "#ff6610", "290px");
            $(":input").blur(function(){
                $("#completion_meter").percentComplete(".form-control", "#ff6610", "290px");
            });
        });
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/script.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/stix.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/test.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/colorpicker/docs.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/colorpicker/bootstrap-colorpicker.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/filterable.pack.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('follow_unfollow/js/vpb_script.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/multiple-emails.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/pikaday.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/editor.js');?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/fileinput.js'); ?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/jquery.countdownTimer.js'); ?>"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/jquery.wm-gridfolio-1.0.min.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.my-grid').WMGridfolio();
        });
    </script>
    <script>
        $(document).ready(function () {
            var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

            trigger.click(function () {
                hamburger_cross();
            });

            function hamburger_cross() {

                if (isClosed == true) {
                    overlay.hide();
                    trigger.removeClass('is-open');
                    trigger.addClass('is-closed');
                    isClosed = false;
                } else {
                    overlay.show();
                    trigger.removeClass('is-closed');
                    trigger.addClass('is-open');
                    isClosed = true;
                }
            }

            $('[data-toggle="offcanvas"]').click(function () {
                $('#wrapper').toggleClass('toggled');
            });
        });
    </script>
    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/navAccordion.min.js');?>"></script>
    <script>
        $(document).ready(function () {


            $('.menu-icon-responsive').click(function () {
                if ($('#navigator').css("left") == "-290px") {
                    $('#navigator').animate({left: '0px'}, 350);
                    $('.menu-icon-responsive').animate({left: '275px'}, 350);
                    $('.menu-text').animate({left: '300px'}, 350).empty().text("Close");
                }
                else  {
                    $('#navigator').animate({left: '-290px'}, 350);
                    $(this).animate({left: '0px'}, 350);
                    $('.menu-text').animate({left: '50px'}, 350).empty().text("Menu");

                }
            });
            $('.menu-icon-responsive').click(function () {
                $(this).toggleClass("on"); });
        });
    </script>
    <script>
        jQuery(document).ready(function(){

            //Accordion Nav
            jQuery('.mainNav').navAccordion({
                expandButtonText: '<i class="fa fa-plus"></i>',  //Text inside of buttons can be HTML
                collapseButtonText: '<i class="fa fa-minus"></i>'
            },
            function(){
                console.log('Callback')
            });

        });
    </script>
    <?php if(isset($displaypicZoomer) && $displaypicZoomer == true) { ?>
        <script type="text/javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/jquery.picZoomer.js');?>"></script>
        <script type="text/javascript">
            $(function() {
                $('.picZoomer').picZoomer();
                $('.piclist li').on('click',function(event){
                    var $pic = $(this).find('img');
                    $('.picZoomer-pic').attr('src',$pic.attr('src'));
                });
            });
        </script>
        <?php } ?>
    <?php

        if(isset($progressdata) && !empty($progressdata)) {

            foreach($progressdata as $progressdatarow) {

                //print_r($progressdatarow);
                $reward_timeuser = $progressdatarow->reward_time;

            }

        }
    ?>
    <?php
        if(isset($displaySideAdd) && $displaySideAdd == true){
            print $render('advertisement.phtml');
        }
    ?>

    <?php if(isset($displayTopBar) && $displayTopBar == true){ print $render('topdashboardjs.phtml'); } ?>

    <script type="text/javascript" language="javascript" src="<?php echo $admin_model_obj->cdnUrl('newcss/js/ratings.js');?>"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118594802-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118594802-1');
    </script>

</body>
</html><style>
    .checkboxin.ches { opacity: 0 !important; }
    .checkboxin.ches + .wmg-thumbnail {
        background-attachment: scroll !important; background-clip: border-box !important; background-color: rgba(0, 0, 0, 0.8);
        background-image: url("<?php echo $admin_model_obj->cdnUrl('images/checks.png');?>");
        background-origin: padding-box !important;
        background-position: left 75px top -65px;
        background-repeat: no-repeat;
        background-size: auto auto;
    }
    .checkboxin.ches + .wmg-thumbnail .wmg-thumbnail-content { opacity: 0.5; }
    #purchase { position: relative; }
    .total-combat { background: #ff0000 none repeat scroll 0 0; color: #ffffff; font-size: 19px; font-weight: bold; padding: 2px 19px; position: absolute; right: 0; top: 0; }
    #purchase .table.table-bordered-a.table-responsive.cart_summary tr:nth-child(2) td:nth-child(2) { font-size: 0; }
    body { padding: 0; }
</style>
<script>
    $('.checkboxin:checked').addClass('ches');
    //$('#purchase .table.table-bordered-a.table-responsive.cart_summary tr:nth-child(2)').html('ches');
    $('.checkboxin:checkbox').change(function(){
        if($(this).is(":checked")) {
            $(this).addClass('ches');
        } else {
            $(this).removeClass('ches');
        }
    });


</script>
<script>
    $(document).ready(function () {

        var sum = 0
        $(this).find('.price span').each(function () {
            var combat = $(this).text();
            if (!isNaN(combat) && combat.length !== 0) {
                sum += parseFloat(combat);
            }
        });
        // $('.total-combat span').html(sum);

    });
</script>
<script type="text/javascript">
    var width = $(window).width(), height = $(window).height();
    if ((width <= 379)) {

        $('body').addClass('remove-allun');
    } else {

        $('body').removeClass('remove-allun');
    }

</script>
<script type="text/javascript">
    var width = $(window).width(), height = $(window).height();
    if ((width <= 244)) {
        //alert('ghg');
        $('body').addClass('removers');
    } else {

        $('body').removeClass('removers');
    }

</script>
<style>
    @media(max-width:280px) {
    body { display: none !important; }
    }
    .removers h3 { display: none; }
    .removers div#interests { padding: 0 !important; }
    .removers .col-md-12.user-name { display: none; }
    .removers .row.top-slider { display: none; }
    .removers header#header { display: none; }
    .removers .wmg-container.my-grid { opacity: 1 !important; display: block !important; }
    .removers .tab-content.cus-dash-board > div { display: none !important; }
    .removers .tab-content.cus-dash-board > div#interests { display: block !important; }
    body.remove-allun.removers { position: absolute; left: 0; top: 0; bottom: 0; width: 235px; right: 0; top: 17px; left: 4px; height: 250px; overflow: scroll !important; }
    .removers .user-profile-tabs { display: none; }
    .removers .tab-content.cus-dash-board { min-height: 398px; width: 100% !important; }
    .removers #interests .wmg-item {
    box-sizing: border-box; display: inline-block; width: 117px !important; position: relative; height: 117px !important; padding: 1px 1px !important; }
    .removers .checkboxin.ches + .wmg-thumbnail {
    background-attachment: scroll !important;
    background-clip: border-box !important;
    background-color: rgba(0, 0, 0, 0.8);
    background-image: url("<?php echo $admin_model_obj->cdnUrl('images/checks.png'); ?>");
    background-origin: padding-box !important;
    background-position: left 69px top -61px;
    background-repeat: no-repeat !important;
    background-size: 94px 195px !important;
    }
    .removers .wmg-thumbnail-content img {
    max-width: 100% !important;
    max-height: 100% !important;
    }
</style>






@include('includes.footer')