 <div id="sidebar" class="sidebar">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <img src="{{asset('public/assets/images/sidebar/logo.png')}}" width="30">
        </a>
        <a href="{{ route('admin.dashboard') }}" class="simple-text logo-normal hide-content-collapsed">
          AMPLE POINTS
        </a>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">

          <li><a href=""><i class="fas fa-th-large"></i></a><a href="{{ route('admin.dashboard') }}" class="hide-menu"> Dashboard</a>
          </li>

          <li><a href=""><i class="fas fa-th-large"></i></a><a href="{{ route('admin.add.page') }}" class="hide-menu"> Admin Add</a>
          </li>
          
           <li><a href=""><i class="fas fa-th-large"></i></a><a href="{{ route('admin.logout') }}" class="hide-menu"> Logout</a>
          </li>

        </ul>
      </div>
    </div>