<style type="text/css">
    .ajax-loader {
        position: fixed;
        z-index: 999;
        height: 100%;
        width: 100%;
        background: rgba(255, 255, 255, 0.7) none repeat scroll 0px 0px;
    }

    .ajax-loader > img {
        margin: 15% auto 0 50%;
        text-align: center;
    }

    .ajax-loader > span {
        margin: 15% auto 0 50%;
        text-align: center;
        font-size: 18px;
        font-weight: 300;
        color: #f75d00;
    }
</style>

@php
$displayTopBar=true;
//&& @$displayTopBar == true
@endphp
<style>
    <?php if((@$displayTopBar) ) { ?>
    .row.ash-col {
        margin: 140px 0px 0px 0;
    }

    <?php } else { ?>
    .row.ash-col {
        margin: 80px 0px 0px 0;
    }

    <?php } ?>

    .tab-content.cus-dash-board {
        min-height: 1294px;
    }

    @media (max-width: 480px) and (min-width: 300px) {

        .user-profile-tabs .nav-tabs li:nth-child(11), .user-profile-tabs .nav-tabs li:nth-child(12) {
            display: block;
        }

        .nv_tb #invite_business .col-lg-7.invitefrd {
            width: 100%;
            clear: both;
            overflow-y: scroll;
        }

    }

    .filterable {
        margin-top: 15px;
    }

    .filterable .panel-heading .pull-right {
        margin-top: -20px;
    }

    .filterable .filters input[disabled] {
        background-color: transparent;
        border: none;
        cursor: auto;
        box-shadow: none;
        padding: 0;
        height: auto;
    }

    .filterable .filters input[disabled]::-webkit-input-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]::-moz-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]:-ms-input-placeholder {
        color: #333;
    }

    #header {
        z-index: 2147483647 !important;
    }

    .images-popsme {
        position: absolute;
        z-index: 9999;
        cursor: pointer;
        width: 365px;
        height: 255px;
        top: 2px;
        left: 2px;
    }

    .top-slider .main-wpappers .images-popsme {
        border: 3px solid #000;
    }

    .ads-band .timer img {
        padding: 0 0 0 8px;
        width: 22px;
        margin: 0 3px 0 0 !important;
    }

    @media screen and (max-width: 500px) {
        .checkboxin.ches + .wmg-thumbnail {
            background-image: url("/images/checks_res.png") !important;
        }

        .avatar img {
            min-height: 139px !important;
            max-width: 100% !important;
        }
    }

    @media screen and (max-width: 500px) {
        .checkboxin.ches + .wmg-thumbnail {
            background-image: url("/images/checks_res.png") !important;
        }

        .avatar img {
            min-height: 139px !important;
            max-width: 100% !important;
        }

        .amples-valuess-box {
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .amples-valuess-box strong {
            left: 89% !important;
            width: 22px !important;
            height: 21px !important;
            float: right !important;
            position: initial !important;
        }
    }

    @media screen and (max-width: 359px OR max-height:

    260px

    ) {
        .socail-adss {
            height: 260px;
            width: 359px;
        }

        #header {
            display: none !important;
        }

        #invitedriver .col-lg-7.invitefrd {
            width: 100% !important;
        }
    }

    @media screen and (max-width: 480px OR max-height:

    360x

    ) {
        #invitedriver .col-lg-7.invitefrd {
            width: 100% !important;
        }
    }
</style>
<style>
    #datepicker.date-picker.form-control.lb.hasDatepicker {
        background: rgba(0, 0, 0, 0) url("<?php echo $baseUrl; ?>/img/caln.png") no-repeat scroll right center;
        width: 100% !important;
    }

    .notification {
        background: #dfdfdf none repeat scroll 0 0;
        border: 1px solid #eeeeee;
        color: #868686;
        font-size: 9px;
        padding: 4px 6px;
    }

    .tab-content {
        width: 85%;
    }

    .col-lg-8.col-md-8.col-sm-8.col-xs-8.col-padding-left-site {
        width: 67.6%;
    }

    .watch-adsss {
        font-size: 17px;
        padding: 15px 20px 0;
    }

    .watch-adsss span {
        background: #aaffaa none repeat scroll 0 0;
        border: 1px solid #0b8b0b;
        color: #0b8b0b;
        display: block;
        padding: 5px 9px;
        text-align: center;
    }

    .user-profile .user-name h3 {
        margin: 0 0 15px 0 !important;
    }

    .col-lg-4.col-padding-right-site {
        width: 32.4%;
    }

    .user-profile-tabs {
        margin-left: 0;
    }

    #header {
    }

    .remove-allun #ample-reward {
        display: none;
        display:;
    }

    .remove-allun .row.ash-col {
        margin: 0 0 0 !important;
    }

    .remove-allun .main-wpappers {
        display: block;
        top: 0;
    }

    .lastest iframe {
        width: 100%;
        height: 60px;
    }

    .vdolink {
        background: none !important;
        font-weight: normal !important;
        color: #000000 !important;
        padding: 0px !important;
        display: inline-block !important;
        margin-top: 5px !important;
        text-decoration: underline !important;
    }

    #followers-list .all.design, #followers-list .all.partner {
        background: #ffffff none repeat scroll 0 0 !important;
        border: 5px solid #e4e4e4;
        margin-bottom: 20px;
        min-height: 250px;
        box-shadow: 0 3px 5px 1px #565656;
    }

    #followers-list .all.design .find-freind {
        border-radius: 10em !important;
    }

    #followers-list .all.design .find-freind img {
        width: 100%;
    }

    #following-list .all.design, #following-list .all.partner {
        background: #ffffff none repeat scroll 0 0 !important;
        border: 5px solid #e4e4e4;
        margin-bottom: 20px;
        min-height: 250px;
        box-shadow: 0 3px 5px 1px #565656;
    }

    #following-list .all.design .find-freind {
        border-radius: 10em !important;
    }

    #following-list .all.design .find-freind img {
        width: 100%;
    }

    .multipleInput-container {
        border: 1px #ccc solid;
        padding: 1px;
        padding-bottom: 0;
        cursor: text;
        font-size: 13px;
        width: 100%;
    }

    .multipleInput-container input {
        font-size: 13px;
        clear: both;
        height: 46px !important;
        width: 100%;
        padding: 0px !important;
        margin: 0px !important;
    }

    .multipleInput-container ul {
        list-style-type: none;
    }

    li.multipleInput-email {
        float: left;
        margin-right: 2px;
        margin-bottom: 1px;
        border: 1px #BBD8FB solid;
        padding: 2px;
        background: #F3F7FD;
    }

    .multipleInput-close {
        width: 16px;
        height: 16px;
        display: block;
        float: right;
        margin: 0 3px;
    }

    .driver-multipleInput-container {
        border: 1px #ccc solid;
        padding: 1px;
        padding-bottom: 0;
        cursor: text;
        font-size: 13px;
        width: 100%;
    }

    .driver-multipleInput-container input {
        font-size: 13px;
        clear: both;
        height: 46px !important;
        width: 100%;
        padding: 0px !important;
        margin: 0px !important;
    }

    .driver-multipleInput-container ul {
        list-style-type: none;
    }

    li.driver-multipleInput-email {
        float: left;
        margin-right: 2px;
        margin-bottom: 1px;
        border: 1px #BBD8FB solid;
        padding: 2px;
        background: #F3F7FD;
    }

    .driver-multipleInput-close {
        width: 16px;
        height: 16px;
        display: block;
        float: right;
        margin: 0 3px;
    }

    #special-offer img {
        width: 100% !important;
        height: 100% !important;
    }

    .multiple_emails-container {
        border: 1px #ccc solid;
        border-radius: 4px;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        padding: 0;
        margin: 0;
        cursor: text;
        width: 100%;
    }

    .multiple_emails-container input {
        clear: both;
        width: 100%;
        height: 25px;
        border: 0;
        outline: none;
        margin-bottom: 3px;
        padding-left: 5px;
        box-sizing: border-box;
    }

    .multiple_emails-container input {
        border: 0 !important;
    }

    .multiple_emails-container input.multiple_emails-error {
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px red !important;
        outline: thin auto red !important;
    }

    .multiple_emails-container ul {
        list-style-type: none;
        padding-left: 0;
    }

    .multiple_emails-email {
        float: left;
        margin: 3px 5px 3px 5px;
        padding: 3px 5px 3px 5px;
        border: 1px #BBD8FB solid;
        border-radius: 3px;
        background: #F3F7FD;
    }

    .multiple_emails-close {
        float: left;
        margin: 0 3px;
    }

    #ample-reward {
        background: #e3e4e3 none repeat scroll 0 0;
        float: left;
        padding: 25px 5px 100px;
    }

    .select-style {
        border: 1px #ccc;
        width: 100%;
        padding: 6px;
    }

    .select-style-profile-auto {
        border: 1px #ccc;
        width: auto;
        padding: 0px;
    }

    .select-style-profile-full {
        border: 1px #ccc;
        padding: 0px;
    }

    #profile .select-style select {
        padding: 10px !important;
        background: transparent;
        -webkit-appearance: none;
        height: 40px !important;
        max-width: 100% !important;
        font-size: 13px;
        width: 96% !important;
        left: 9px;
        top: 0px;
    }

    #profile .select-style-profile-full select {
        padding: 0px 0px 0px 8px !important;
        background: transparent;
        -webkit-appearance: none;
        height: 40px !important;
        max-width: 100% !important;
        font-size: 18px;
        width: 96% !important;
        left: 9px;
        top: 0px;
    }

    #profile .select-style-profile-auto select {
        padding: 10px !important;
        background: transparent;
        -webkit-appearance: none;
        height: 40px !important;
        max-width: 100% !important;
        font-size: 13px;
        width: 96% !important;
        left: 9px;
        top: 0px;
    }

    .lastest-a {
        float: left;
        margin-left: 5%;
        width: 100%;
    }

    .lastest {
        width: 100%;
        float: left;
    }

    .lastest iframe {
        width: 100%;
        height: 200px;
    }

    .lastest-a h2 {
        font-size: 13px;
        height: 47px;
        line-height: 15px;
        margin: 0 5px 0 0px;
        float: left;
    }

    .fixvideohight {
        max-height: 1000px;
        overflow-y: auto;
    }

    .popsup {
        background: #000000 none repeat scroll 0 0;
        bottom: auto;
        color: #ffffff;
        font-size: 11px;
        position: absolute;
        text-align: center;
        top: 0;
        width: 56px;
        z-index: 1;
        left: 368px;
        display: inline-block;
    }

    .row.ash-col {
        position: relative;
    }

    .myrevrd span {
        display: none;
    }

    @media (max-width: 500px) {
        .first-forth {
            height: 100% !important;
            position: relative;
            width: 100% !important;
        }
    }

    @media (max-width: 660px) {
        .popsup {
            font-size: 0;
        }

        .myrevrd {
            background: #ff4500 none repeat scroll 0 0;
            border-radius: 20px 20px 0 0;
            color: #fff !important;
            display: block;
            font-size: 26px;
            left: 41%;
            padding: 0 0 6px;
            position: fixed !important;
            top: 29px !important;
            z-index: 999999999;
        }

        .myrevrd span {
            display: block;
            font-size: 7px;
            margin: -4px 0 0;
            text-transform: uppercase;
            width: 64px;
        }

        .main-wpappers {
            bottom: 0;
            left: 0; /* position: relative; */
            right: 0 !important;
            top: 0px;
        }

        .first-forth {
            height: 100% !important;
            width: 100% !important;
        }

        .respo-logo {
            display: block;
            margin: 0 auto !important;
            padding: 3px 0;
            text-align: center;
            width: 100%;
        }

        .top-icons {
        }

        .cd-search-trigger {
        }

        .top-icons .top-icon {
            display: block;
        }

        .account-list.animated.fadeInDown { /*display: none !important;*/
        }

        .myrevrd {
            display: none;
        }

        body {
            background: #3d3d3d none repeat scroll 0 0;
            overflow: scroll;
        }

        .main-wpappers {
            height: 260px;
        }

        .carousel-caption {
            display: block;
        }
    }

    .myunick {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 999;
        background-color: #ffffff;
        opacity: 0.8;
    }

    .myunicknointerest {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
        background-color: #ffffff;
        border: 4px solid #000; /*opacity: 0.8;*/
    }

    .sixtysectime {
        top: 42px;
        position: absolute;
        left: 171px;
        color: #f75d00;
        font-size: 26px;
    }

    .sixtysec {
        top: 73px;
        position: absolute;
        left: 116px;
        color: #f75d00;
        font-size: 26px;
    }

    .nointerest {
        top: 18px;
        position: absolute;
        left: 10px; /*color: #f75d00;*/
        color: #07253F;
        font-size: 22px;
        text-align: center;
        margin-top: 70px;
    }

    .responstable {
        margin: 1em 0;
        width: 96%;
        overflow: hidden;
        background: #FFF;
        color: #024457;
        border-radius: 10px;
        border: 1px solid #024457;
        margin: 0 auto;
    }

    .responstable tr {
        border: 1px solid #E8E8EA;
    }

    .responstable tr:nth-child(odd) {
        background-color: #EAF3F3;
    }

    .responstable th {
        display: none;
        border: 1px solid #FFF;
        background-color: #07253f;
        color: #FFF;
        padding: 1em;
    }

    .responstable th:first-child {
        display: table-cell;
        text-align: center;
    }

    .responstable th:nth-child(2) {
        display: table-cell;
    }

    .responstable th:nth-child(2) span {
        display: none;
    }

    .responstable th:nth-child(2):after {
        content: attr(data-th);
    }

    @media (min-width: 480px) {
        .responstable th:nth-child(2) span {
            display: block;
        }

        .responstable th:nth-child(2):after {
            display: none;
        }
    }

    .responstable td {
        display: block;
        word-wrap: break-word;
        max-width: 7em;
    }

    .responstable td:first-child {
        display: table-cell;
        text-align: center;
        border-right: 1px solid #E8E8EA;
    }

    @media (min-width: 480px) {
        .responstable td {
            border: 1px solid #E8E8EA;
        }
    }

    .responstable th, .responstable td {
        text-align: center;
        margin: .5em 1em;
    }

    @media (min-width: 480px) {
        .responstable th, .responstable td {
            display: table-cell;
            padding: 1em;
        }
    }

    body {
        padding: 0 2em;
        font-family: Arial, sans-serif;
        color: #024457;
        background: #f2f2f2;
    }

    h1 {
        font-family: Verdana;
        font-weight: normal;
        color: #024457;
    }

    h1 span {
        color: #167F92;
    }

    .responstable {
        margin: 1em 0;
        width: 96%;
        overflow: hidden;
        background: #FFF;
        color: #024457;
        border-radius: 10px;
        border: 1px solid #024457;
        margin: 0 auto;
    }

    .responstable tr {
        border: 1px solid #E8E8EA;
    }

    .responstable tr:nth-child(odd) {
        background-color: #EAF3F3;
    }

    .responstable th {
        display: none;
        border: 1px solid #FFF;
        background-color: #07253f;
        color: #FFF;
        padding: 1em;
    }

    .responstable th:first-child {
        display: table-cell;
        text-align: center;
    }

    .responstable th:nth-child(2) {
        display: table-cell;
    }

    .responstable th:nth-child(2) span {
        display: none;
    }

    .responstable th:nth-child(2):after {
        content: attr(data-th);
    }

    @media (min-width: 480px) {
        .responstable th:nth-child(2) span {
            display: block;
        }

        .responstable th:nth-child(2):after {
            display: none;
        }
    }

    .responstable td {
        display: block;
        word-wrap: break-word;
        max-width: 7em;
    }

    .responstable td:first-child {
        display: table-cell;
        text-align: center;
        border-right: 1px solid #E8E8EA;
    }

    @media (min-width: 480px) {
        .responstable td {
            border: 1px solid #E8E8EA;
        }
    }

    .responstable th, .responstable td {
        text-align: center;
        margin: .5em 1em;
    }

    @media (min-width: 480px) {
        .responstable th, .responstable td {
            display: table-cell;
            padding: 1em;
        }
    }

    body {
        padding: 0 2em;
        font-family: Arial, sans-serif;
        color: #024457;
        background: #f2f2f2;
    }

    h1 {
        font-family: Verdana;
        font-weight: normal;
        color: #024457;
    }

    h1 span {
        color: #167F92;
    }

    .refno {
        border: 5px solid #f75d00;
        border-radius: 5px;
        font-size: 20px;
        float: right;
        margin-bottom: 8px;
    }

    .invitefrd1 {
        width: 100%;
        background: #eeeeee none repeat scroll 0 0;
        clear: both;
        max-height: 735px;
        overflow-y: scroll;
        overflow: auto;
        padding: 8px 0;
    }

    table.increrewad {
        font-family: arial;
        font-size: 12px;
        width: 100%;
    }

    table.increrewad td, table.increrewad th {
        border: 1px solid #e5e5e5;
        padding: 6px 7px 0;
        position: relative;
        text-align: left;
        vertical-align: middle;
        text-align: center;
    }

    table.increrewad th {
        background: none;
        border: 1px solid #e5e5e5;
        padding: 6px 5px;
    }

    #loadiframe iframe {
        width: 100%;
        height: 300px;
    }

    .refno {
        border: 5px solid #f75d00;
        border-radius: 5px;
        font-size: 20px;
        float: right;
    }

    @media (min-width: 1280px) {
        .wmg-item {
            height: 183px !important;
        }

        .col-pad {
            position: relative;
            top: 0;
            width: 100%;
        }

        .wmg-thumbnail-content .text-chackbox .col-pad p {
            text-align: center;
            /* padding-left: 0; */
            padding: 7px 0px 0px 0px;
        }

        .col-lg-4.col-md-4.col-sm-4.col-xs-12.col-padding-right-site.deek {
            width: 32.4% !important;
        }

        .seek {
            width: 66.66666667%;
        }

        .slider-text {
            position: absolute;
            top: 0px;
            color: #fff;
            padding: 15px;
            width: 98%;
        }

        /*CSS 25/09/18 start*/
        .top-marrgin {
            margin-top: 140px;
        }

        .top-banner-text {
            margin-top: 20px;
            text-shadow: 2px 2px 5px #000;
        }

        .brief-info .col-md-2.col-sm-2.clear-padding img {
            height: auto !important;
        }

        /*CSS 25/09/18 END*/
        .star-a {
            width: 23%;
            float: left;
            margin-top: 15px;
            margin-right: 12px;
        }

        .earn-amples .col-lg-12.no-space {
            padding: 54px 0 0 0 !important;
        }

        .rowcls {
            margin-left: -15px;
            margin-right: -15px
        }

        .packegeses > div h1 {
            font-size: 20px !important;
        }

    }

    .right_title {
        background: #e6e6e6;
        margin: 0px;
        padding: 15px;
        font-size: 16px;
        float: left;
        width: 100%;
    }

    .right_spane {
        float: left;
    }

    .view_all {
        width: auto;
        float: right;
        height: auto;
        margin: auto !important;
    }

    .view_all:hover {
        color: #fff;
        background: #031b33;
    }

    .share-link {
        margin: 10px 0px 0px 3px;
    }

    .social-invite {
        float: left;
        font-weight: 700;
        margin-top: 5px;
    }

    .social-share {
        float: left;
        height: 35px;
        margin-top: 3px;
        margin-left: 5px;
        width: auto;
    }

    .at-icon-wrapper {
        width: 25px !important;
        height: 25px !important;
    }

    .at-expanded-menu-button > .at-icon-wrapper {
        width: 45px !important;
        height: 45px !important;
    }

    .at-icon {
        width: 25px !important;
        height: 25px !important;
    }

</style>
<style>
    .newinvitetxt {
        border: 2px solid #f75d00;
        margin: 15px 0px 15px 2px;
        width: 96%;
        padding: 5px 0px 5px 5px;
    }

    .chekinvitebtn {
        margin: 0px !important;
        padding: 5px 0 !important;
        text-align: center;
        width: 98px;
        background: #f75d00 !important;
        font-weight: bold !important;
        color: #fff !important;
        display: inline-block !important;
        border: 1px solid #fff;
        border-radius: 4px;
    }

    .table tr {
        cursor: pointer;
    }

    .hiddenRow {
        padding: 0 4px !important;
        background-color: #eeeeee;
        font-size: 13px;
    }

    @media only screen and (max-width: 500px) {
        .col-lg-6.no-space.banner_txt_ctn {
            width: 100%;
            float: left;
            margin-right: 0;
            margin-bottom: 10px;
        }
    }

    @media only screen and (min-width: 768px) {
        .prof_dropdown {

            width: 50%;
        }

    }

    /*Latest Responsive Changes*/

    @media only screen and (max-width: 768px) {

        .prof_dropdown {

            width: 100%;
        }

        .gender_drp {

            margin-bottom: 10px;
        }

        .inmobile_date {
            z-index: 9;
        }

        .button_in_mobie {

            width: 100%;
        }

        .nv_tb #profile .select-style select {

            z-index: 1 !important;
        }

        select#localfilter {
            width: 125px !important;
            margin-bottom: 10px;
        }

        table#localtable {
            margin-top: 30px;
        }

        .total-combat {
            left: 15px;
            right: 15px !important;
            text-align: center;
        }

        .replace_my_purchases .total-combat {
            left: -5px;
            top: -20px;
            margin-bottom: 0px !important;
            width: 104%;
            text-align: center;
        }

        .qty .form-control {
            width: 35px;
            font-weight: bold;
        }

        .cus-dash-board #ample-detail {
            padding: 2px;

        }

        .main-historyss-ul li {
            display: inline-block;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .hisno {
            font-size: 18px;
        }

        .cplo {

            background: url("<?php echo $admin_model_obj->cdnUrl('img/dashboard/share-img-amples.png');?>");
            margin-left: 40px !important;
        }

    }

    .user-name h4 {
        font-size: 16px;
        font-weight: bold;
    }

    .profile_pg_label {
        font-size: 18px;
        font-weight: bold !important;
    }

    .profile_ample_descreption {
        font-size: 15px;
        font-weight: bold !important;
    }

    .profile_pg_controle {
        font-weight: bold;
        font-size: 18px;
    }

    .profile_pg_controle {
        padding: 5px !important;
    }

    @media only screen and (min-width: 768px) {
        .profile_background_color {
            padding-top: 26px;
        }
    }

    @media only screen and (max-width: 768px) {

        #profile .select-style-profile-full select {
            padding: 0px 0px 0px 8px !important;
            background: transparent;
            -webkit-appearance: none;
            height: 40px !important;
            max-width: 100% !important;
            font-size: 18px;
            width: 90% !important;
            left: 15px;
            top: 0px;
        }

        .profile_pg_label {
            font-size: 16px;
            font-weight: bold !important;
        }

        .profile_pg_controle {
            font-weight: bold;
            font-size: 16px;
        }

        .profile_ample_descreption {
            font-size: 14px;
            font-weight: bold !important;
        }

        .select-style-profile-full > .profile_pg_label {
            margin-left: 15px !important;
        }

        .accurate_info {
            text-align: center;
        }

        .mobClear {
            clear: both !important;
        }

        .mobMtop15 {
            margin-top: 15px;
        }

    }

</style>







 <style>
                                    .notification-entry {
                                        clear: both;
                                        border: 1px solid #f75d00;
                                        width: 100%;
                                        position: relative;
                                        margin-top: 10px;
                                    }

                                    .vendor_img_container {
                                        width: 20%;
                                        float: left;
                                        position: relative;
                                    }

                                    .noti_vendor_img {
                                        width: 100%;
                                        margin: 10px 0px 0px 5px;
                                    }

                                    .descreption_container {
                                        width: 80%;
                                        float: left;
                                        position: relative;
                                    }

                                    .noti_vendor_descreption {
                                        border-bottom: none !important;
                                        padding: 10px 10px !important;
                                    }

                                    .offer_btn_cls {
                                        width: auto;
                                        padding: 5px 10px 5px 10px;
                                        background: #f75d00;
                                        color: #fff !important;
                                        border-color: #f75d00;
                                    }

                                    .offer_btn_cnt {
                                        float: right;
                                        margin-bottom: 10px;
                                    }
                                </style>