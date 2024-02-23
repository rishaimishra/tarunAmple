@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | Category By Mail</title>
@endsection

@include('includes.head')
@include('includes.new_head')
@include('includes.header')



<?php 
    $baseurl = url('/'); 
    $admin_model_obj  = new \App\Models\AdminImpFunctionModel;
?>
<!-- page wapper-->

<style>
    #page_navigation a {
        padding: 3px;
        border: 1px solid gray;
        margin: 2px;
        color: black;
        text-decoration: none
    }

    .active_page {
        background: #f75d00 none repeat scroll 0 0;
        color: #fff;
    }

    .all-mall .vendor-div-box {
        margin: 10px;
    }

    @media only screen and (max-width: 768px) {

    .all-mall .vendor-div .vendor-divimg img {
        height: auto;
        width: 100%;
        min-width: 100%;
        min-height: 177px !important;
      }
    }

</style>
<section>
    <div class="all-start">
        <div class="columns-container">
            <div class="container" id="columns">

                <div class="row">
                    <!-- Left colunm -->

                    <!-- ./left colunm -->
                    <!-- Center colunm-->
                    <div class="center_column col-lg-12">

                        <div id="view-product-list" class="view-product-list social-me-a all-mall">


                            <h2 class="page-heading">
                                <span class="page-heading-title">MALLS</span>
                            </h2>
                            <input type='hidden' id='current_page' />
                            <input type='hidden' id='show_per_page' />
                            <div class="content" id="productContainer">
                                <div class="">
                                    <?php foreach($mallfrontdata as $key) { 

                                        ?>
                                        <div class="vendor-div">

                                            <div class="vendor-div-box">
                                                <a href="{{route('categorybymall',$key->venr_mall_id)}}">
                                                    <div class="vendor-divimg">
                                                        <img src="<?php echo $admin_model_obj->cdnUrl('mall/logo/'.$key->logo_image);  ?>" alt="<?php echo $key->logo_image; ?>" />
                                                    </div>
                                                    <div class="vendor-detail">
                                                        <h4><span><i class="fa fa-user"></i></span>
                                                        <?php echo substr($key->display_name,0,15); ?> </h4>

                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <?php } ?>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- ./ Center colunm -->


                </div>
                <!-- ./row-->
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-6 text-left">
                        <div class="sortPagiBar">
                            <div class="sort-product">
                                <select>
                                    <option value="">Store Name</option>
                                    <option value="">Zip</option>
                                </select>
                                <div class="sort-product-icon">
                                    <i class="fa fa-sort-alpha-asc"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="bottom-pagination">
                            <div class="pagination" id='page_navigation' style="float:right;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

 @include('includes.footer')
 @include('includes.script')
 <script type="text/javascript">
    $(document).ready(function() {

        //how much items per page to show
        var show_per_page = 24;
        //getting the amount of elements inside content div
        var number_of_items = $('#productContainer').children().size();
        //calculate the number of pages we are going to have
        var number_of_pages = Math.ceil(number_of_items / show_per_page);

        //set the value of our hidden input fields
        $('#current_page').val(0);
        $('#show_per_page').val(show_per_page);

        //now when we got all we need for the navigation let's make it '

        /* 
        what are we going to have in the navigation?
        - link to previous page
        - links to specific pages
        - link to next page
        */
        var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
        var current_link = 0;
        while (number_of_pages > current_link) {
            navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + '</a>';
            current_link++;
        }
        navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';

        $('#page_navigation').html(navigation_html);

        //add active_page class to the first page link
        $('#page_navigation .page_link:first').addClass('active_page');

        //hide all the elements inside content div
        $('#productContainer').children().css('display', 'none');

        //and show the first n (show_per_page) elements
        $('#productContainer').children().slice(0, show_per_page).css('display', 'block');

    });

    function previous() {

        new_page = parseInt($('#current_page').val()) - 1;
        //if there is an item before the current active link run the function
        if ($('.active_page').prev('.page_link').length == true) {
            go_to_page(new_page);
        }

    }

    function next() {
        new_page = parseInt($('#current_page').val()) + 1;
        //if there is an item after the current active link run the function
        if ($('.active_page').next('.page_link').length == true) {
            go_to_page(new_page);
        }

    }

    function go_to_page(page_num) {
        //get the number of items shown per page
        var show_per_page = parseInt($('#show_per_page').val());

        //get the element number where to start the slice from
        start_from = page_num * show_per_page;

        //get the element number where to end the slice
        end_on = start_from + show_per_page;

        //hide all children elements of content div, get specific items and show them
        $('#productContainer').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

        /*get the page link that has longdesc attribute of the current page and add active_page class to it
        and remove that class from previously active page link*/
        $('.page_link[longdesc=' + page_num + ']').addClass('active_page').siblings('.active_page').removeClass('active_page');

        //update the current page input field
        $('#current_page').val(page_num);
    }

</script>
<!-- ./page wapper-->
