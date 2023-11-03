<!DOCTYPE html>
<html lang="en">
    @yield('head')
    @yield('title')
    
    <body>
        <div id="wrapper">
            @yield('sideber')
            <div id="content">
                <div id="header" class="header">
                    <div class="header-menu">
                        <div class="toggle">
                            <button id="menu-toggle">☰</button>
                            {{-- <p>Dashboard</p> --}}
                        </div>
                        <div class="user">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div id="main-content" class="main-content">
                    @yield('content') <!-- Main content section -->
                </div>
            </div>
        </div>
        @yield('footerAndScript')
    </body>

    
</html>