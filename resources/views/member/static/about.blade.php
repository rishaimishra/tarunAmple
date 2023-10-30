@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | About Us</title>
@endsection

@include('includes.head')
@include('includes.header')

@section('content')


<div class="banner-sec" style="background: url('https://amplepoints.com/home_banners/slider-3.jpg')"></div>


<div class="about-sec">
  <div class="about-us">
    <div class="container">
      <div class="page-heading">
        <div class="page-heading-name">
          <h4>About Us</h4>
        </div>
      </div>
      <div class="about-para">
        <p>Welcome to AmplePoints! Like we always say, isn't it time to reward yourself and Amp Up Your World?
          AmplePoints rewards you with what you love and in return you just do what you love online: Browse social
          content, Shop your favorite brands, Share it with your friends …exactly what you do everyday! You watch,
          shop, share… we reward, reward, reward… AmplePoints believes that everyone should be rewarded for their
          time. At AmplePoints you are rewarded for shopping for stuff you love and sharing with your friends! When
          you join, you earn AmplePoints to enter great Giveaways and use your AmplePoints towards the purchase of
          brands you love or local retailers and redeem them for free at checkout! AmplePoints is building a premier
          rewards shopping destination and has hand picked the hottest brands, products and local merchants all while
          rewarding our customers!</p>
        <p>AmplePoints is a Shopping Rewards Platform that allows users to gain points for purchasing the products
          they love, sharing on social media and inviting friends to join. Presently, that includes awarding points to
          users for shopping the AmplePoints marketplace and sharing their favorite blogs, photos and videos. But
          that's just the start. AmplePoints is constantly looking at new opportunities to reward users for their
          loyalty to brands, local vendors and social entertainment. Available right now, members receive AmplePoints
          for signing up on the website, get rewarded for inviting friends to join, get AmplePoints for each purchase
          and get rewarded every time you share on social media. Users can redeem their points at check-out from the
          thousands of products and services in our marketplace, gift cards, Giveaways entries or they can convert
          points into charitable donations. AmplePoints also has the society page that allows users to fully engage
          with their friends’ favorites, videos & movies, photos and blogs. Coming soon is the phone app featuring
          trailers, movies and music that allow users to engage with the on demand content and earn extra points on
          the go!</p>
      </div>
    </div>
  </div>
</div>


@include('includes.footer')
@include('includes.script')
@endsection