@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | Contact Us</title>
@endsection

@include('includes.head')
@include('includes.header')

@section('content')


<div class="contact-sec mt-5">
  <div class="contact-us mt-5">
    <div class="form-img">
      <img src="{{ url('/') }}/public/assets/images/about/abouts.jpg" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-12 my-2">
          <div class="contact-form">
            <div class="page-heading">
              <div class="page-heading-name">
                <h4>How can we help you?</h4>
              </div>
            </div>
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Your email address *</label>
                <input type="email" class="form-control" placeholder="Email" id="exampleInputEmail1"
                  aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="subject" class="form-label">Subject *</label>
                <input type="text" class="form-control" placeholder="Subject" id="subject">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number *</label>
                <input type="text" class="form-control" placeholder="Phone Number" id="phone">
              </div>
              <div class="mb-3">
                <label class="form-label">I am a *</label>
                <div class="d-flex">
                  <div class="form-check me-4">
                    <input class="form-check-input" type="radio" name="iam" id="cust">
                    <label class="form-check-label" for="cust">
                      Customer
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="iam" id="bus">
                    <label class="form-check-label" for="bus">
                      Business
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="msg" class="form-label">Message *</label>
                <textarea class="form-control" placeholder="Message" id="msg"></textarea>
              </div>
              <p>Please enter any additional details for our Support team.</p>
              <div class="submit">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-12 my-2">
          <div class="contact-info">
            <div class="page-heading">
              <div class="page-heading-name">
                <h4>How can we help you?</h4>
              </div>
            </div>
            <div class="address mb-4">
              <span>
                <i class="fas fa-map-marker-alt"></i>
                6370 W Flamingo Rd, Suite 5, Las Vegas, NV 89103
              </span>
              <span>
                <i class="fas fa-phone-alt"></i>
                +1(702) 466-8571
              </span>
              <span>
                <a href="#">
                  <i class="fas fa-envelope"></i>
                  hello@amplepoints.com
                </a>
              </span>
            </div>
            <div class="map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3223.110470687476!2d-115.23456262497157!3d36.11516630601632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c6d933e8b1f1%3A0xd396beb22a13cc9c!2s6370%20W%20Flamingo%20Rd%20%235%2C%20Las%20Vegas%2C%20NV%2089103%2C%20USA!5e0!3m2!1sen!2sin!4v1683012689036!5m2!1sen!2sin"
                width="600" height="425" style="border:0;" allowfullscreen="" loading="lazy"
                data-lf-yt-playback-inspected-jmvz8gkbmxe82pod="true"
                data-lf-vimeo-playback-inspected-jmvz8gkbmxe82pod="true"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@include('includes.footer')
@include('includes.script')
@endsection