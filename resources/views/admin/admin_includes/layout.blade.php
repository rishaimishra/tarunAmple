<!DOCTYPE html>
<html lang="en">
    @yield('head')
    @yield('title')
    
    <body>
        <div id="wrapper">
            @yield('sideber')
            
            <div class="content">
                @yield('content') <!-- Main content section -->
            </div>
            @include('admin.admin_includes.admin_footer')
        </div>
      @yield('script') 
    
</body>

</html>