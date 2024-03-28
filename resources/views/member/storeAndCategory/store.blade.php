@extends('Layouts.app')
@section('title')
    <title>Amplepoint - Store</title>
@endsection

@include('includes.head')
@include('includes.new_head')
@include('includes.header')


<!-- page wapper-->
<?php 
    $baseurl = url('/'); 
    $admin_model_obj  = new \App\Models\AdminImpFunctionModel;
    $frontallmalldata =$admin_model_obj->getfrontmainmallalldata();
    //dd($frontallmalldata);
?>















<style>
    #page_navigation a{
        padding:3px;
        border:1px solid gray;
        margin:2px;
        color:black;
        text-decoration:none
    }
    .active_page{
        background: #f75d00 none repeat scroll 0 0;
        color: #fff;
    }
    .page-heading {
        font-size: 30px;
        text-transform: capitalize;
        margin: 10px;
    }

    @media only screen and (min-width: 768px) {


    .vendor-div .vendor-detail h4 {

    white-space: nowrap;

    }

    }

    ul.mulitchec {
    list-style: outside none none;
    margin: 0;
    padding: 0px 10px 15px;
    }

    ul.mulitchec li {
    display: inline-block;
    padding: 0;
    }

    ul.mulitchec li a {
    background: #fff none repeat scroll 0 0;
    border: 1px solid;
    color: #999;
    display: block;
    font-family: arial;
    font-size: 18px;
    height: 28px;
    padding: 2px 13px;
    text-decoration: none;
    text-transform: uppercase;
    /*width: 10px;*/
    }

    ul.mulitchec li a:hover {
    background: #999 none repeat scroll 0 0;
    color: #fff;
    }

</style>

















<div class="all-start">
    <div class="columns-container">
        <div class="container" id="columns"> 
            <!-- breadcrumb -->

            <!-- ./breadcrumb --> 

            <!-- row -->
            <div class="row"> 
                <!-- Left colunm -->

                <!-- ./left colunm --> 
                <!-- Center colunm-->
                <div class="center_column col-lg-12"> 

                    <div id="view-product-list" class="view-product-list social-me-a">

                        <?php if(isset($frontallmalldata) && !empty($frontallmalldata)){ ?>

                            <?php foreach($frontallmalldata as $keymall) { 

                                ?>
                                <div class="vendor-div maxxvendor-detail">

                                    <div class="vendor-div-box" style="width: 200px !important;">
                                      

                                          <a href="{{route('categorybymall',$keymall->venr_mall_id)}}">
                                            <div class="vendor-divimg">
                                               {{--  <img src="<?php echo $admin_model_obj->cdnUrl('mall/logo/'.$keymall->logo_image);  ?>" alt="<?php echo $keymall->logo_image; ?>" /> --}}
                                               <img src="https://amplepoints.com/mall/logo/{{$keymall->logo_image}}" alt="<?php echo $keymall->logo_image; ?>" /> 
                                            </div>
                                            <div class="vendor-detail">
                                                <h4><span><i class="fa fa-user"></i></span>
                                                <?php echo substr($keymall->display_name,0,15); ?> </h4>

                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <?php } ?>

                            <div class="clear"></div>

                            <?php } ?>











                        <h1 class="page-heading inner_poage_head" style=" margin-top: 30px !important;">
                            <!--<span class="page-heading-title">STORES</span>-->
                            STORES - Make Your Own Online Store in LAS VEGAS
                        </h1>

                        <ul id="myid" class="mulitchec">
                            <li><a href="<?php echo $baseurl."/stores?filt=a " ?>">A</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=b " ?>">B</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=c " ?>">C</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=d " ?>">D</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=e " ?>">E</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=f " ?>">F</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=g " ?>">G</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=h " ?>">H</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=i " ?>">I</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=j " ?>">J</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=k " ?>">K</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=l " ?>">L</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=m " ?>">M</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=n " ?>">N</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=o " ?>">O</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=p " ?>">P</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=q " ?>">Q</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=r " ?>">R</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=s " ?>">S</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=t " ?>">T</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=u " ?>">U</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=v " ?>">V</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=w " ?>">W</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=x " ?>">X</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=y " ?>">Y</a></li>
                            <li><a href="<?php echo $baseurl."/stores?filt=z " ?>">Z</a></li>

                        </ul>



                        <input type='hidden' id='current_page' />
                        <input type='hidden' id='show_per_page' />
                      

                    </div>

                </div>
                <!-- ./ Center colunm -->


            </div>
            <!-- ./row--> 
        </div>
        <div class="container">
            <div class="row">
                <?php /*
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
                */ ?>

                <div class="col-md-12  col-sm-12 text-right">
                  
                    <div class="content" id="productContainer">
                            <?php foreach($allvendorslist as $key) {
                                //dd($key);

                                    $vendorName1 = strtolower(preg_replace('/\s+/', '', $key->vendor_displayname));
                                   // dd($vendorName1,$key->tbl_vndr_id);
                                ?>
                                    <a href="{{ !empty($key->tbl_vndr_id) ? route('productbyseller', ['vendorName1' => @$vendorName1, 'tbl_vndr_id' => @$key->tbl_vndr_id]) : '#' }}">



                                    <div class="vendor-div maxxvendor-detail">
                                        <div class="vendor-div-box">
                                            <div class="vendor-divimg">
                                                {{-- <img src="<?php if(!empty($key->vendor_profileimage)) { echo $admin_model_obj->cdnUrl('vendor-data/'.$key->tbl_vndr_id.'/profile/'.$key->vendor_profileimage); } else { echo $admin_model_obj->cdnUrl('img/profile-img/avtar.jpg'); } ?>" alt="<?php echo $key->vendor_displayname; ?>" /> --}}

                                                 <img src="<?php if(!empty($key->vendor_profileimage)) { echo $admin_model_obj->cdnUrl('vendor-data/'.$key->tbl_vndr_id.'/profile/'.$key->vendor_profileimage); } else { echo $admin_model_obj->cdnUrl('img/profile-img/avtar.jpg'); } ?>" alt="<?php echo $key->vendor_displayname; ?>" />
                                            </div>
                                          <div class="vendor-detail">
                                                <h4><span><i class="fa fa-user"></i></span>
                                                <?php echo substr($key->vendor_displayname, 0, 17); ?> </h4>
                                                <h3><span><i class="fa fa-map-marker"></i></span>
                                                <?php echo $key->vendor_city; ?>
                                                </h3>
                                                <h5><span><i class="fa fa-thumb-tack"></i></span>
                                                <?php echo $key->tbl_vndr_zip; ?>
                                                </h5>
                                            </div>
                                        </div>
                                </div> </a>
                                <?php } ?>
                        </div>
                          

                </div>
                <div class="col-md-12">
                    <div class="pagination justify-content-end" id='page_navigation'></div>
                </div>
                
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    </div>
<!-- ./page wapper-->



@include('includes.footer')
@include('includes.script')
<script type="text/javascript">
    $(document).ready(function(){

        //how much items per page to show
        var show_per_page = 25; 
        //getting the amount of elements inside content div
        var number_of_items = $('#productContainer').children().size();
        //calculate the number of pages we are going to have
        var number_of_pages = Math.ceil(number_of_items/show_per_page);

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
        while(number_of_pages > current_link){
            navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
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

    function previous(){

        new_page = parseInt($('#current_page').val()) - 1;
        //if there is an item before the current active link run the function
        if($('.active_page').prev('.page_link').length==true){
            go_to_page(new_page);
        }

    }

    function next(){
        new_page = parseInt($('#current_page').val()) + 1;
        //if there is an item after the current active link run the function
        if($('.active_page').next('.page_link').length==true){
            go_to_page(new_page);
        }

    }
    function go_to_page(page_num){
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
        $('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');

        //update the current page input field
        $('#current_page').val(page_num);
    }

</script>

