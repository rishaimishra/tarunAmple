<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/header/favicon.ico')}}">
  <title>Ample Points</title>
  <!-- -- bootstrap --  -->
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
  <!-- Icons -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- css  -->
  <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body>
 @include('includes.header')

  <!-- -- start header -- -->
  <div class="hero-sec">
    <video class="background" autoplay muted loop>
      <source src="https://amplepoints.com/home_banners/aboutamplepoints.mp4" type="video/mp4">
    </video>
  </div>
  <!-- -- end header -- -->
  @yield('content')
  <!-- -- start how it work -- -->
  <!-- <div class="sec-padding">
    <h2 class="main-heading">How It Works</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-12 my-3">
          <div class="video-card">
            <video controls>
              <source src="https://amplepoints.com/amplepoints_videos/big_idea.png" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- -- end how it work --  -->

  <!-- -- start carousel sopping product --  -->
  <!-- <div class="sec-padding">
    <div class="container">
      <div class="cycle-tab-container">
        <ul class="nav nav-tabs">
        <li class="cycle-tab-item active">
          <a class="nav-link" role="tab" data-toggle="tab" href="#home">home</a>
        </li>
        <li class="cycle-tab-item"> 
          <a class="nav-link" role="tab" data-toggle="tab" href="#profile">profile</a>
        </li>
        <li class="cycle-tab-item">
          <a class="nav-link" role="tab" data-toggle="tab" href="#messages">messages</a>
        </li>
        <li class="cycle-tab-item">
          <a class="nav-link" role="tab" data-toggle="tab" href="#settings">settings</a>
        </li>
      </ul>
        <div class="tab-content">
        <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">Humblebrag activated charcoal ut in taiyaki PBR&B scenester dreamcatcher flannel offal air plant DIY. Selvage fingerstache in green juice jean shorts.</div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Palo santo kogi ramps nostrud organic schlitz, art party PBR&B tbh taxidermy hammock officia chia farm-to-table irony. </div>
        <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">Asymmetrical sustainable live-edge tempor eiusmod kale chips cloud bread vexillologist et man bun pitchfork hashtag excepteur scenester ethical.</div>
        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab"> Literally wolf flexitarian snackwave raw denim bitters ut synth kombucha consequat twee polaroid.</div>
      </div>
      </div>
    </div>
  </div> -->
  <!-- -- end carousel sopping product --  -->









 @include('includes.footer')

  <!-- Member & Vendor Login Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background:#f6f9fc">
          <h4 class="modal-heading text-center">Ample Points</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="signup-btn">
            <button onclick="window.location.href='memberSignup.html'" class="btn checkout"> Sign Up As A
              Member</button>
            <button onclick="window.location.href='vendorSignup.html'" class="btn checkout mt-3"> Sign Up As A
              Vendor</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Member & Vendor Register Modal -->
  <div class="modal fade" id="vendorModal" tabindex="-1" aria-labelledby="vendorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background:#f6f9fc">
          <h4 class="modal-heading text-center">Ample Points</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="signup-btn">
            <button onclick="window.location.href='memberLogin.html'" class="btn checkout"> Login As A Member</button>
            <button onclick="window.location.href='vendorLogin.html'" class="btn checkout mt-3"> Login As A
              Vendor</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- -- script --  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('assets/js/index.js')}}"></script>
</body>

</html>