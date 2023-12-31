<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{url('/')}}/public/adminassets/img/sidebar-1.jpg">
  
  <div class="logo">
    <a href="{{route('admin.dashboard')}}" class="simple-text logo-mini">
      CT
    </a>
    <a href="{{route('admin.dashboard')}}" class="simple-text logo-normal">
      Creative Tim
    </a>
  </div>
  <div class="sidebar-wrapper">
    <div class="user">
      <div class="photo">
        <img src="{{url('/')}}/public/adminassets/img/faces/avatar.jpg" />
      </div>
      <div class="user-info">
        <a data-toggle="collapse" href="#collapseExample" class="username">
          <span>
          System Admin
            <b class="caret"></b>
          </span>
        </a>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> My Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> EP </span>
                <span class="sidebar-normal"> Edit Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> S </span>
                <span class="sidebar-normal"> Settings </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav">
      <li class="nav-item active ">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="material-icons">dashboard</i>
          <p> Dashboard </p>
        </a>
      </li>




      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
          <i class="material-icons">image</i>
          <p> Admin Details
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="pagesExamples">
          <ul class="nav">
          
            <li class="nav-item ">
              <a class="nav-link" href="{{route('admin.add.page')}}">
                <span class="sidebar-mini"> A-A </span>
                <span class="sidebar-normal"> Admin Add </span>
              </a>
            </li>

            <li class="nav-item ">
              <a class="nav-link" href="{{route('admin.list.page')}}">
                <span class="sidebar-mini"> A-L </span>
                <span class="sidebar-normal"> Admin list </span>
              </a>
            </li>
          
          </ul>
        </div>
      </li>




{{-- home / banner/ --}}
       <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
          <i class="material-icons">apps</i>
          <p> Home
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="componentsExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                <span class="sidebar-mini"> H-S </span>
                <span class="sidebar-normal">Home Slider
                  <b class="caret"></b>
                </span>
              </a>
              <div class="collapse" id="componentsCollapse">
                <ul class="nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.banner.add.page')}}">
                      <span class="sidebar-mini"> A-B </span>
                      <span class="sidebar-normal"> Add Banner </span>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.banner.list')}}">
                      <span class="sidebar-mini"> V-B </span>
                      <span class="sidebar-normal"> View Banner </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
           {{--  <li class="nav-item ">
              <a class="nav-link" href="../examples/components/buttons.html">
                <span class="sidebar-mini"> B </span>
                <span class="sidebar-normal"> Buttons </span>
              </a>
            </li> --}}
          
          </ul>
        </div>
      </li>





      {{-- store/ category/ product --}}

        <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#componentsExamples2">
          <i class="material-icons">apps</i>
          <p> Store /Brand
            <b class="caret"></b>
          </p>
        </a>


        <div class="collapse" id="componentsExamples2">
           <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" data-toggle="collapse" href="#componentsCollapse3">
                {{-- <span class="sidebar-mini"> M-C </span> --}}
                <span class="sidebar-normal"> &nbsp; Manage Product
                  <b class="caret"></b>
                </span>
              </a>
              <div class="collapse" id="componentsCollapse3">
                <ul class="nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.product.add.page')}}">
                      <span class="sidebar-normal"> Add Product </span>
                    </a>
                  </li>

                   <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.product.list')}}">
                      <span class="sidebar-normal"> View Product </span>
                    </a>
                  </li>

                </ul>
              </div>
            </li>
          
          </ul>
          
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" data-toggle="collapse" href="#componentsCollapse2">
                {{-- <span class="sidebar-mini"> M-C </span> --}}
                <span class="sidebar-normal"> &nbsp; Manage Category
                  <b class="caret"></b>
                </span>
              </a>
              <div class="collapse" id="componentsCollapse2">
                <ul class="nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.category.add')}}">
                      <span class="sidebar-normal"> Add Category </span>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.category.list')}}">
                      <span class="sidebar-normal"> View Category  </span>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.sub.category.list')}}">
                      <span class="sidebar-normal"> View Sub Category  </span>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.sub2.category.list')}}">
                      <span class="sidebar-normal"> View Sub2 Category  </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
           {{--  <li class="nav-item ">
              <a class="nav-link" href="../examples/components/buttons.html">
                <span class="sidebar-mini"> B </span>
                <span class="sidebar-normal"> Buttons </span>
              </a>
            </li> --}}
          
          </ul>
        </div>
      </li>
     



     <li class="nav-item ">
        <a class="nav-link" href="{{route('admin.home.brand.slider')}}">
          <i class="material-icons">Slider</i>
          <p> Home Brand Slider </p>
        </a>
      </li>



















     

     {{-- <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#formsExamples">
          <i class="material-icons">content_paste</i>
          <p> Forms
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="formsExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="../examples/forms/regular.html">
                <span class="sidebar-mini"> RF </span>
                <span class="sidebar-normal"> Regular Forms </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/forms/extended.html">
                <span class="sidebar-mini"> EF </span>
                <span class="sidebar-normal"> Extended Forms </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/forms/validation.html">
                <span class="sidebar-mini"> VF </span>
                <span class="sidebar-normal"> Validation Forms </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/forms/wizard.html">
                <span class="sidebar-mini"> W </span>
                <span class="sidebar-normal"> Wizard </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
          <i class="material-icons">grid_on</i>
          <p> Tables
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="tablesExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="../examples/tables/regular.html">
                <span class="sidebar-mini"> RT </span>
                <span class="sidebar-normal"> Regular Tables </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/tables/extended.html">
                <span class="sidebar-mini"> ET </span>
                <span class="sidebar-normal"> Extended Tables </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/tables/datatables.net.html">
                <span class="sidebar-mini"> DT </span>
                <span class="sidebar-normal"> DataTables.net </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
          <i class="material-icons">place</i>
          <p> Maps
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="mapsExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/google.html">
                <span class="sidebar-mini"> GM </span>
                <span class="sidebar-normal"> Google Maps </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/fullscreen.html">
                <span class="sidebar-mini"> FSM </span>
                <span class="sidebar-normal"> Full Screen Map </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/vector.html">
                <span class="sidebar-mini"> VM </span>
                <span class="sidebar-normal"> Vector Map </span>
              </a>
            </li>
          </ul>
        </div>
      </li> --}}





   
      <li class="nav-item ">
        <a class="nav-link" href="{{route('admin.logout')}}">
          <i class="material-icons">date_range</i>
          <p> Logout </p>
        </a>
      </li>

    </ul>
  </div>
</div>
<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
          <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
          <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
          </button>
        </div>
        {{-- <a class="navbar-brand" href="#pablo">Dashboard</a> --}}
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <form class="navbar-form">
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" placeholder="Search...">
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
            </button>
          </div>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <i class="material-icons">dashboard</i>
              <p class="d-lg-none d-md-block">
                Stats
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">notifications</i>
              <span class="notification">5</span>
              <p class="d-lg-none d-md-block">
                Some Actions
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Mike John responded to your email</a>
              <a class="dropdown-item" href="#">You have 5 new tasks</a>
              <a class="dropdown-item" href="#">You're now friend with Andrew</a>
              <a class="dropdown-item" href="#">Another Notification</a>
              <a class="dropdown-item" href="#">Another One</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <p class="d-lg-none d-md-block">
                Account
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Log out</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->