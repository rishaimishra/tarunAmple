<style>
    #fssList li a {
        display: none !important;
    }

    .l-player-slid .four-btns > li {
        height: 50px;
        margin: 2px 0px !important;
    }

    body {
        /*background: #474747 none repeat scroll 0 0;*/
        background: url('{{$baseUrl}}/images/moviescreen_1.png;');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .vid iframe {
        pointer-events: none;
    }

    #fullscreen > div#fullscreen-btn {
        display: none;
        bottom: 0;
        top: auto;
        color: #ffffff;
        position: fixed;
        left: 0;
        z-index: 999999999;
    }

    #fullscreen > div#fullscreen-btn a {
        background: rgba(0, 0, 0, 0) url("<?php echo $baseUrl; ?>/img/zoomi.png") repeat scroll 0 0 / 100% 100%;
        color: #ffffff;
        display: block;
        font-size: 0 !important;
        height: 41px;
        margin: 0;
        padding: 0 4px;
        width: 41px !important;
        opacity: 0.2;
    }

    #fullscreen > div#fullscreen-btn a:hover {
        opacity: 1;
    }

    #fullscreen > div#fullscreen-btn a.exitfullscreen-close {
        display: none;
    }

    #fullscreen.game-wrapper.mynewgame.makeactive-full > div#fullscreen-btn a.exitfullscreen-close {
        display: block;
    }

    #fullscreen.game-wrapper.mynewgame.makeactive-full > div#fullscreen-btn a.requestfullscreen {
        display: none;
    }

    .vediotitle {
        color: #919191;
        display: block;
        font-size: 13px;
        padding: 4px 9px;
    }

    #fssList {
        display: none;
    }

    .vediotitle > br {
        display: none;
    }

    #header {
        z-index: 999999999 !important;
    }

    #header .header-mini-cart a {
        height: auto;
        padding: 5px 0;
    }

    #slideshow div#playlistreply {
        background: #008000 none repeat scroll 0 0;
        color: #ffffff;
        position: absolute;
        z-index: 2147483647;
        left: 0;
        right: 0;
        padding: 5px 9px;
        top: -1px;
        display: none;
    }

    #totalitemdata .p-right p {
        text-align: left;
    }

    .slideshow-histroybox {
        background: #fff none repeat scroll 0 0;
        border: 7px solid #eeeeee;
        border-radius: 8px;
        bottom: -137px;
        display: none;
        height: 700px;
        left: auto;
        overflow: auto;
        padding: 6px 8px;
        position: absolute;
        right: -1px;
        top: 0px;
        width: 244px;
        z-index: 9999;
    }

    .clocse-my-historytab {
        background: #ff0000 none repeat scroll 0 0;
        border-radius: 10em;
        color: #ffffff;
        cursor: pointer;
        font-size: 13px;
        font-weight: bold;
        height: 19px;
        left: auto;
        padding: 1px 0 0;
        position: absolute;
        right: 1px;
        text-align: center;
        top: 1px;
        width: 19px;
        z-index: 999999;
    }

    body > .div-menu {
        display: none;
    }

    #portfoliolist .block.left-module {
        display: block !important;
    }

    .slideshow-histroybox img {
        width: 92px;
    }

    .slideshow-histroybox-main {
        background: rgba(0, 0, 0, 0.9) none repeat scroll 0 0;
        bottom: 0;
        display: none;
        left: 0;
        overflow: hidden;
        position: fixed;
        right: 0;
        top: 0;
        z-index: 999999999;
    }

    .lshapright {
        background: rgba(0, 0, 0, 0.9) none repeat scroll 0 0;
        bottom: 0;
        display: none;
        left: 917px;
        overflow: hidden;
        position: absolute;
        right: 0;
        top: 11px;
        z-index: 999999999;
        width: 246px;
        height: 698px;
        cursor: pointer;

    }

    .lshapbottom {
        background: rgba(0, 0, 0, 0.9) none repeat scroll 0 0;
        bottom: 0;
        display: none;
        left: 0;
        overflow: hidden;
        position: absolute;
        right: 0;
        top: 11px;
        z-index: 999999999;
        width: 100%;
        height: 100%;
        cursor: pointer;

    }

    .main-wpappers-box-main {
        border-top: 1px dashed #999999;
        margin: 32px 0 0;
        padding: 20px 0 0;
        width: 100%;
    }

    .main-wpappers.social-videoplayer {
        background: #fff;
        padding: 0;
    }


    .first-forth.youtubeplayerfourcol li {
        position: relative;
        top: 4px;
    }

    .columns-container.eranvideoamps {
    }

    .columns-container.eranvideoamps ul#portfolio-list li {
        width: 24%;
    }

    .columns-container.eranvideoamps ul#portfolio-list li.all-a.video.col-sm-3.product-container.no-space.a1.vid {
        box-shadow: 0 0 3px #d0d0d0;
        height: 28px !important;
        min-height: 250px !important;
        border-radius: 5px !important;
        -moz-border-radius: 5px !important;
        -webkit-border-radius: 5px !important;
        overflow: hidden;
    }

    .product-media.product-list.ni.row li .left-block {
        min-height: 100px !important;
        padding: 0px;
    }

    .blog-text-a h5 {
        color: #444 !important;
        font-size: 14px !important;
        font-weight: bold !important;
    }

    .columns-container.eranvideoamps ul#portfolio-list li.all-a.video.col-sm-3.product-container.no-space.a1.vid .left-block iframe {
        height: 118px;
        width: 100%;
    }

    .columns-container.eranvideoamps ul#portfolio-list li.all-a.video.col-sm-3.product-container.no-space.a1.vid .by_aria {
        bottom: 0;
        position: absolute;
        padding-top: 8px;
        padding-bottom: 8px;
        background-color: #9b00c1;
    }

    .by_aria a {
        color: #ff0000;
        outline: 0 none;
        left: 37% !important;
        position: relative;
    }

    .columns-container.eranvideoamps ul#portfolio-list li.all-a.video.col-sm-3.product-container.no-space.a1.vid .by_aria a {
        color: #fff;

    }

    .blog-text-a {
        height: 80px !important;
    }

    .columns-container.eranvideoamps ul#portfolio-list li.all-a.video.col-sm-3.product-container.no-space.a1.vid .by_aria:hover {
        bottom: 0;
        cursor: pointer;
        position: absolute;
        background-color: #f75d00;
    }

    .columns-container.eranvideoamps ul#portfolio-list li.all-a.video.col-sm-3.product-container.no-space.a1.vid .by_aria:hover a {
        color: #fff;
    }

    /* before change ample win image

    .amples-valuess-box {
    background: rgba(255, 255, 255, 0.8) none repeat scroll 0 0;
    bottom: 0;
    display: none;
    height: 472px;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 2147483647;
    }
    .amples-valuess-box > span {
    background: url(http://amplepoints.com/img/img-amples-win.gif);
    position: absolute;
    top: 23px;
    left: 100px;
    color: #f75d00;
    right: 0;
    height: 200px;
    width: 200px;
    text-align: center;
    bottom: 0;    padding: 14% 0 0 0;
    }
    .main-slider-shocase-box .amples-valuess-box > span{
    background: rgba(0, 0, 0, 0) url("http://amplepoints.com/img/img-amples-win.gif") repeat scroll left center;
    left: 18px;
    padding: 61px 0 0;
    top: 27%;
    }
    span.amples-valuess{
    color: #f75d00;
    font-size: 28px;
    display: block;
    font-weight: bold;
    }

    */

    .amples-valuess-box {
        background: url("<?php echo $baseUrl; ?>/img/earnamplewin.gif");
        bottom: 0;
        display: none;
        height: 476px;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        z-index: 2147483647;
    }

    .amples-valuess-box > span {
        position: absolute;
        top: 23px;
        left: 100px;
        color: #f75d00;
        right: 0;
        height: 200px;
        width: 200px;
        text-align: center;
        bottom: 0;
        padding: 14% 0 0 0;
    }

    .main-slider-shocase-box .amples-valuess-box > span {
        color: #ffffff;
        font-size: 28px;
        font-weight: bold;
        left: 18px;
        padding: 61px 0 0;
        top: 24%;
    }

    .amples-valuess-box strong {
        background: #c84500 none repeat scroll 0 0;
        border-radius: 10em;
        color: #fff;
        cursor: pointer;
        font-size: 12px;
        font-weight: bold;
        height: 20px;
        margin: 2px 0 0 7px;
        padding: 2px 0 0;
        position: absolute;
        right: 5px;
        text-align: center;
        width: 20px;
    }

    #slideshowWrapper {
        position: relative;
    }

    #slideshowWrapper .amples-valuess-box {
        bottom: 0;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
    }

    #slideshowWrapper .amples-valuess-box > span {
        left: 0;
        margin: 0 auto;
        padding: 75px 0 0;
        right: 0;
    }

    #slideshowWrapper .amples-valuess-box > strong {
        left: auto;
        right: 4px;
    }

    .top-slider-txt {
        background: #f1f1f1 none repeat scroll 0 0;
        color: #919191;
        font-size: 15px;
        font-weight: bold;
        height: auto;
        padding: 6px 8px;
    }

    .top-slider-txt span {
        color: #ff0000;
    }

    .bottom-slider-txt {
        background: rgba(255, 255, 255, 0.8) none repeat scroll 0 0;
        bottom: 0;
        color: #797979;
        font-size: 12px;
        left: 0;
        padding: 6px;
        position: absolute;
        right: 0;
    }

    .bottom-slider-txt span {
        color: #ff0000;
    }

    .bottom-slider-txt span.pricess {
        font-size: 19px;
        font-weight: bold;
    }

    .main-imagess {
        display: block;
        height: 360px;
        overflow: hidden;
    }

    #fssList {
        display: block;
    }

    .video-player.video-player-index {
        z-index: 999999999999999;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .l-player-slid .four-btns > li {
        display: block !important;

    }

    .l-player-slidbtn li:hover, .l-player-slidbtn li.activcl {
        background: #f75d00 none repeat scroll 0 0;
    }

    .l-player-slidbtn > .atvclr {

        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #f75d00), color-stop(1, #eb5100), color-stop(1, #e04600));
        background-image: -o-linear-gradient(bottom, #f75d00 0, #eb5100 100%, #e04600 100%);
        background-image: -moz-linear-gradient(bottom, #f75d00 0, #eb5100 100%, #e04600 100%);
        background-image: -webkit-linear-gradient(bottom, #f75d00 0, #eb5100 100%, #e04600 100%);
        background-image: -ms-linear-gradient(bottom, #f75d00 0, #eb5100 100%, #e04600 100%);
        background-image: linear-gradient(to bottom, #f75d00 0, #eb5100 100%, #e04600 100%)
    }

    .pause.clocse-my-videoa {
        background: #ff0000 none repeat scroll 0 0;
        border-radius: 10em;
        color: #ffffff;
        cursor: pointer;
        font-size: 13px;
        font-weight: bold;
        height: 19px;
        left: auto;
        padding: 1px 0 0;
        position: absolute;
        right: 1px;
        text-align: center;
        top: 1px;
        width: 19px;
        z-index: 999999;
    }

    .l-player-slid .four-btns > li {
        margin: 0 9px 2px 0 !important;
    }

    .myunick {
        position: absolute;

        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 999999;
    }

    .sixtysectime {
        top: 42px;
        position: absolute;
        left: 50%;
        color: #f75d00;
        font-size: 26px;
    }

    .sixtysec {
        top: 73px;
        position: absolute;
        left: 43%;
        color: #f75d00;
        font-size: 26px;
    }

    .nointerest {
        top: 18px;
        position: absolute;
        left: 10px;
        color: #f75d00;
        font-size: 28px;

    }

    .game-wrapper.mynewgame.makeactive-full .cf.slider-mainbox {
        height: calc(100% - 43px);
        width: 243px;
    }

    .game-wrapper.mynewgame.makeactive-full .cf #slideshowWrapper ul li a img {
        width: auto;
    }

    .game-wrapper.mynewgame.makeactive-full .main-slider-shocase-box {
        height: 100%;
        right: 0;
        width: 237px;
    }

    .main-logo {
        height: 100%;
    }

    .imcas {
        position: absolute;
        z-index: 9999999999999999999999999999999999999999;
        bottom: 18px;
        overflow: hidden;
        left: ;
        right: 0;
        left: 0;
        top: 0;
        background: #000;
        padding: 29px;
        background: rgba(0, 0, 0, 0.94);
        display: none;
    }

    .imcas ul#portfolio-list li {
        width: 32% !important;
        height: 44px !important;
        overflow: hidden;
        min-height: 157px !important;
    }

    .imcas .box-text-a {
        display: none;
    }

    .imcas .product-media.product-list.ni.row li .left-block {
        min-height: 100% !important;
        max-height: 100% !important;
        height: 100% !important;
        padding: 0 !important;
    }

    .imcas .vid iframe {
        pointer-events: none;
        width: 100%;
        height: 100%;
    }


    #Mycontainer-right {
        width: 243px;
        height: 177px;
        overflow-x: hidden;
        background-color: #fff;
        overflow-y: scroll;
        display: block;
        position: relative;
    }

    .wmg-container {
        filter: alpha(opacity=0);
        font-family: empty;
        font-size: 0;
        opacity: 0;
        position: relative;
        width: 100%;
        zoom: 1;
        background: #eee;
        margin: auto 0;
        text-align: center
    }

    .bs-example {
        width: 90%;
        margin: 0 auto;
        overflow: hidden;
    }


    .bs-example .wmg-container {
        opacity: 1;
        /* width: 50%; */
        margin: 0 auto;
    }

    .wmg-container .wmg-item {
        box-sizing: border-box;
        display: inline-block;
        position: relative;
    }


    .text-chackbox {
        background: #07253F;
        width: 100%;
        height: 30px;
        padding: 5px 0px;
        color: #ffffff;
        text-align: center;
    }

    .text-chackbox span {
        color: #fff;
        font-size: 14px;
        text-align: center;
        font-family: sans-serif;
    }

    #checkboxin.checkboxin {
        -moz-appearance: none;
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        height: 100%;
        opacity: 0.2;
        position: absolute;
        top: 0;
        left: 0px;
        width: 100%;
        z-index: 9;
    }

    .checkboxin.ches + .wmg-thumbnail {
        background-attachment: scroll !important;
        background-clip: border-box !important;
        background-color: rgba(0, 0, 0, 0.8);
        background-image: url(/images/checks.png) !important;
        background-origin: padding-box !important;
        /*background-position: left 43px top -159px;*/
        background-position: left 65px top -65px;
        background-repeat: no-repeat;
        background-size: auto auto;
    }

    .checkboxin.ches {
        opacity: 0 !important;
    }

    .checkboxin.ches + .wmg-thumbnail .wmg-thumbnail-content {
        opacity: 0.5;
    }

    .interestimg {
        width: 100%;
    }

    a.actives {
        background: #f75d00 none repeat scroll 0 0 !important;
    }

    /*New CSS*/

    .a1 .left-block, .charity li .left-block img, .product-container.no-space.a1.left-block img {
        height: 125px !important;
        min-height: 1px !important;
    }

    .blog-text-a {
        height: 75px !important;
    }

    .blog-text-a h5 {
        color: #444 !important;
        font-size: 13px !important;
        font-weight: bold !important;
        line-height: 15px;
    }

    /*New css*/

    .defcaategories .catgoryss {
        height: 177px;
    }

    .bottom-catergorylisting {
        background: #434343 none repeat scroll 0 0;
        height: 45px;
        margin: 2px 0 0;
        padding: 0;
        box-shadow: 0 0 0 #000;
    }

    .bottom-catergorylisting > a {
        background: #f75d00 linear-gradient(to bottom, #050505 0px, #6e6b6e 100%, #1f1f1f 100%) repeat scroll 0 0;
        border: 1px solid #000;
        border-radius: 0 0 10px 10px;
        color: #fff;
        display: inline-block;
        float: left;
        font-size: 12px;
        font-weight: 700;
        margin: 0;
        padding: 11px 0;
        text-align: center;
        text-transform: none;
        vertical-align: top;
        width: 50%;
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #050505), color-stop(1, #6E6B6E), color-stop(1, #1F1F1F));
        background-image: -o-linear-gradient(bottom, #050505 0, #6E6B6E 100%, #1F1F1F 100%);
        background-image: -moz-linear-gradient(bottom, #050505 0, #6E6B6E 100%, #1F1F1F 100%);
        background-image: -webkit-linear-gradient(bottom, #050505 0, #6E6B6E 100%, #1F1F1F 100%);
        background-image: -ms-linear-gradient(bottom, #050505 0, #6E6B6E 100%, #1F1F1F 100%);
        background-image: linear-gradient(to bottom, #050505 0, #6E6B6E 100%, #1F1F1F 100%)
    }


    .mynewgame .cf #main .slider > div.defcaategories {
        margin: 47px 0 0 0;
        height: 178px;
        position: relative;
        /* overflow: hidden; */
    }

    .iterst-sec {
        display: block !important;
    }

    .mynewgame .cf #main .slider > div.defcaategories ul.iterst-sec {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 999;
        width: 100%;
        background: #fff;
        box-shadow: 0 0 4px #000;
    }

    .mynewgame .cf #main .slider > div.defcaategories ul.iterst-sec li.actives, .mynewgame .cf #main .slider > div.defcaategories ul.iterst-sec li:hover {
        background: #f75d00;
    }

    .mynewgame .cf #main .slider > div.defcaategories ul.iterst-sec li {
        float: left;
        cursor: pointer;
        width: 50%;
        background: #333;
        color: #fff;
        padding: 5px 4px;
        box-shadow: inset 0 0 8px #000;
        text-align: center;
        margin: 0;
        border: 4px solid #fff;
        border-radius: 10em;
        text-transform: uppercase;
        font-size: 10px;
        font-weight: bold;
    }

    .wmg-item {
        height: 170px !important;
    }

    .columns-container.eranvideoamps {
        margin-top: 0px;
    }

    .l-player-slid .main-imagess > img {
        height: 100%;
        width: auto;
        max-width: 100%;
    }

</style>








 <style>

                    .slide_show_li {
                        background: #fff;

                    }

                    .mynewgame .cf #main #slideshow > li {
                        height: 520px !important;
                    }

                    .givway_mian_img {

                        height: 200px !important;
                        min-height: 200px !important;
                        max-height: 200px !important;
                    }


                    .giveaway-catg {
                        background: #d4ff00;
                        color: #000;
                        text-align: center;
                        font-size: 17px;
                        padding: 15px 0;
                        font-weight: bold;
                    }

                    .giveaway-catg:hover {
                        background: #ff4301;
                        color: #fff;
                        font-size: 17px;
                        font-weight: bold;
                    }

                    .entries-d {

                        font-weight: bold;
                    }

                    .entries-d {
                        border-top: 1px solid #DDD;
                        clear: both;
                        padding-top: 10px;
                        text-align: center;
                        font-size: 14px;
                        color: #000;
                        padding-bottom: 10px;
                        font-weight: bold;
                    }

                    .blog-text-a a {
                        text-align: center;
                        height: 54px;
                        overflow: hidden;
                    }

                    #fssPrev {
                        position: absolute;
                        left: 0px;
                        bottom: -43px;
                        width: 50%;
                        background: #333;
                        color: #fff;
                        padding: 5px 4px;
                        box-shadow: inset 0 0 8px #000;
                        text-align: center;
                        margin: 0;
                        border: 4px solid #fff;
                        border-radius: 10em;
                        text-transform: uppercase;
                        font-size: 15px;
                        font-weight: bold;
                        text-indent: unset;
                        top: auto;
                        height: auto;
                    }

                    #fssNext {
                        position: absolute;
                        left: 118px;
                        bottom: -43px;
                        width: 50%;
                        background: #333;
                        color: #fff;
                        padding: 5px 4px;
                        box-shadow: inset 0 0 8px #000;
                        text-align: center;
                        margin: 0;
                        border: 4px solid #fff;
                        border-radius: 10em;
                        text-transform: uppercase;
                        font-size: 15px;
                        font-weight: bold;
                        text-indent: unset;
                        top: auto;
                        height: auto;
                    }

                </style>

                <style>

                    /*Hiren CSS Start*/
                    .new_add_main_images {
                        display: inline-block;
                        overflow: hidden;
                        max-height: 310px !important;
                    }

                    .slide_show_li .new_add_main_images > img {
                        height: auto !important;
                        width: auto !important;
                        max-width: 100%;
                        display: block;
                    }

                    .new_add_bottom_slider_txt {
                        background: #fff !important;
                        color: #797979;
                        font-size: 12px;
                        left: 0;
                        padding: 6px;
                        position: absolute;
                        right: 0;
                        bottom: 50px !important;
                    }

                    .new_add_bottom_slider_txt span {
                        color: #ff0000;
                    }

                    .new_add_border_right {

                        height: 16px;

                        border-right: 1px solid #000;

                        border-left: 1px solid #000;

                    }

                    .new_add_top_slider_txt {
                        background: #f1f1f1 none repeat scroll 0 0;
                        color: #000;
                        font-size: 13px !important;
                        font-weight: bold;
                        height: auto;
                        padding: 6px 8px;
                    }

                    .new_add_top_slider_txt span {
                        color: #ff0000;
                    }

                    .new_add_paty1:first-child {
                        width: 33.33%;
                    }

                    .new_add_paty1:last-child {
                        width: 28.33%;
                        float: right;
                    }

                    .new_add_tilter {
                        width: 215px;
                        text-align: left;
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        font-size: 18px;
                    }

                    .new_add_content_price3 {
                        padding: 4px 0px 4px 0px !important;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;
                        width: 100%;
                    }

                    .new_add_content_price3 span {
                        color: #000;
                        font-size: 16px;
                        line-height: 14px;
                        font-family: sans-serif;
                        text-transform: lowercase;
                        float: left;
                    }

                    .new_add_content_price3 h6 {
                        color: #f75d00;
                        font-family: sans-serif;
                        font-size: 14px;
                        font-weight: 700;
                        float: left;
                        margin: 0;
                    }

                    .new_add_content_price3 h5 {
                        color: #f75d00;
                        font-family: sans-serif;
                        font-size: 20px;
                        font-weight: 700;
                        float: left;
                        text-transform: uppercase;
                        margin: -3px 0px 0px 0px;
                    }

                    .new_add_paty1 {
                        float: left;
                        display: inline-block;
                        width: 38.33%;
                    }

                    .new_add_paty1 strong {
                        font-size: 12px !important;
                        display: inline-block;
                        color: #000 !important;
                        text-align: center;
                        width: 100%;
                    }

                    .new_add_paty1 span {
                        text-align: center;
                        width: 100%;
                        height: 50px;
                        position: relative;
                        top: 10px;
                        display: inline-block;
                    }

                    .new_add_pri_bod {
                        float: left;
                        display: inline-block;
                        width: 100%;
                        margin-top: 0;
                        padding: 4px 2px 0px 5px;
                    }

                    .new_add_sel_Price.new_add_pricess {
                        line-height: 14px;
                        font-size: 17.5px;
                        color: #ff4201;
                        font-family: 'Bebas';
                        font-weight: 200 !important;
                    }

                    .new_add_paty1 span b {
                        padding-bottom: 5px;
                        line-height: 14px;
                        font-size: 16.5px;
                        color: #ff4201;
                        font-family: 'Bebas';
                        font-weight: 200 !important;
                        text-align: center !important;
                        width: 100%;
                        display: inline-block;
                    }

                    .new_add_sel_by {
                        float: right;
                        display: inline-block;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;
                        max-width: 60%;
                    }

                    .new_add_sel_Price.new_add_pricess {
                        color: #ff4201;
                        float: left;
                        width: auto;
                    }
                </style>