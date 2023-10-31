@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | FAQ</title>
@endsection

@include('includes.head')
@include('includes.header')

@section('content')


<div class="faq-sec">
  <div class="container">
    <div class="faq">
      <h4 class="heading text-center">How can we help you?</h4>
      <div class="faq-tab-buttons">
        <button class="faq-tab-button active-faq-button" onclick="showTab(1)">
          Top-Question
        </button>
        <button class="faq-tab-button" onclick="showTab(2)">
          About
        </button>
        <button class="faq-tab-button" onclick="showTab(3)">
          Reward
        </button>
        <button class="faq-tab-button" onclick="showTab(4)">
          Redeem
        </button>
        <button class="faq-tab-button" onclick="showTab(5)">
          Orders
        </button>
        <button class="faq-tab-button" onclick="showTab(6)">
          Shipping
        </button>
        <button class="faq-tab-button" onclick="showTab(7)">
          Returns
        </button>
        <button class="faq-tab-button" onclick="showTab(8)">
          Contact Us
        </button>
      </div>

      <div class="faq-content">

        <!-- -- Top Question --  -->
        <div class="faq-tab" id="faqTab1">
          <h4 class="faq-heading">Joining AmplePoints is Free</h4>
          <div class="accordion" id="topQuestion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                  aria-expanded="true" aria-controls="collapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What is AmplePoints?
                </button>
              </h2>
              <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                data-bs-parent="#topQuestion">
                <div class="accordion-body">
                  AmplePoints is an exclusive online shopping destination that rewards users for watching ads,
                  shopping the hottest brands, and sharing with their friends.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Who can join AmplePoints?
                </button>
              </h2>
              <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                data-bs-parent="#topQuestion">
                <div class="accordion-body">
                  We welcome all humans who live in the United States and are at least 13 years of age to come and
                  join in on all of the AmplePoints shopping and rewards fun! Plus it's free!
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What information do I need to register?
                </button>
              </h2>
              <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                data-bs-parent="#topQuestion">
                <div class="accordion-body">
                  In order to register on AmplePoints, you will need to type in your first and last name, a valid
                  email address, and a zip code of your permanent U.S. address.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Why do I need a valid email address?
                </button>
              </h2>
              <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                data-bs-parent="#topQuestion">
                <div class="accordion-body">
                  We want to make sure that everything flows as easy as possible for you and that your new AmplePoints
                  account is secure. With a valid email address, you will be able to receive your order information
                  and updates on how to earn more rewards!
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Trouble registering?
                </button>
              </h2>
              <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
                data-bs-parent="#topQuestion">
                <div class="accordion-body">
                  If you are having problems registering, and you've checked that you have a valid email address,
                  username, and password, please email the AmplePoints crew at <a href="">help@amplepoints.com</a>.
                  We'd be happy to help you.
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- -- About --  -->
        <div class="faq-tab" id="faqTab2">
          <h4 class="faq-heading">Joining AmplePoints is Free</h4>
          <div class="accordion" id="about">
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutHeading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutCollapse1" aria-expanded="true" aria-controls="aboutCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What is AmplePoints?
                </button>
              </h2>
              <div id="aboutCollapse1" class="accordion-collapse collapse show" aria-labelledby="aboutHeading1"
                data-bs-parent="#about">
                <div class="accordion-body">
                  AmplePoints is an exclusive online shopping destination that rewards users for watching ads,
                  shopping the hottest brands, and sharing with their friends.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutHeading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutCollapse2" aria-expanded="false" aria-controls="aboutCollapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Who can join AmplePoints?
                </button>
              </h2>
              <div id="aboutCollapse2" class="accordion-collapse collapse" aria-labelledby="aboutHeading2"
                data-bs-parent="#about">
                <div class="accordion-body">
                  We welcome all humans who live in the United States and are at least 13 years of age to come and
                  join in on all of the AmplePoints shopping and rewards fun! Plus it's free!
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutHeading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutCollapse3" aria-expanded="false" aria-controls="aboutCollapse3">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What information do I need to register?
                </button>
              </h2>
              <div id="aboutCollapse3" class="accordion-collapse collapse" aria-labelledby="aboutHeading3"
                data-bs-parent="#about">
                <div class="accordion-body">
                  In order to register on AmplePoints, you will need to type in your first and last name, a valid
                  email address, and a zip code of your permanent U.S. address.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutHeading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutCollapse4" aria-expanded="false" aria-controls="aboutCollapse4">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Why do I need a valid email address?
                </button>
              </h2>
              <div id="aboutCollapse4" class="accordion-collapse collapse" aria-labelledby="aboutHeading4"
                data-bs-parent="#about">
                <div class="accordion-body">
                  We want to make sure that everything flows as easy as possible for you and that your new AmplePoints
                  account is secure. With a valid email address, you will be able to receive your order information
                  and updates on how to earn more rewards!
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutHeading5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutCollapse5" aria-expanded="false" aria-controls="aboutCollapse5">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Trouble registering?
                </button>
              </h2>
              <div id="aboutCollapse5" class="accordion-collapse collapse" aria-labelledby="aboutHeading5"
                data-bs-parent="#about">
                <div class="accordion-body">
                  If you are having problems registering, and you've checked that you have a valid email address,
                  username, and password, please email the AmplePoints crew at <a href="">help@amplepoints.com</a>.
                  We'd be happy to help you.
                </div>
              </div>
            </div>
          </div>
          <h4 class="faq-heading">AmplePoints Authentication and Registration</h4>
          <div class="accordion" id="aboutTwo">
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutOneHeading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutOneCollapse1" aria-expanded="true" aria-controls="aboutOneCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Can I use my Facebook or Twitter account for registration?
                </button>
              </h2>
              <div id="aboutOneCollapse1" class="accordion-collapse collapse show" aria-labelledby="aboutOneHeading1"
                data-bs-parent="#aboutTwo">
                <div class="accordion-body">
                  Yes, you can use your Facebook or Twitter account to register on AmplePoints. You will find those
                  options on the sign up page.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutTwoHeading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutTwoCollapse2" aria-expanded="false" aria-controls="aboutTwoCollapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Why do I need a password?
                </button>
              </h2>
              <div id="aboutTwoCollapse2" class="accordion-collapse collapse" aria-labelledby="aboutTwoHeading2"
                data-bs-parent="#aboutTwo">
                <div class="accordion-body">
                  You need a password in order to access your AmplePoints account. It helps us protect your
                  information and your rewards. We don't want anyone else to claim your rewards.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutThreeHeading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutThreeCollapse3" aria-expanded="false" aria-controls="aboutThreeCollapse3">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Can I change my password?
                </button>
              </h2>
              <div id="aboutThreeCollapse3" class="accordion-collapse collapse" aria-labelledby="aboutThreeHeading3"
                data-bs-parent="#aboutTwo">
                <div class="accordion-body">
                  Yes, you can change your password at any time. Just head over to your profile settings and create a
                  new password.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutFourHeading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutFourCollapse4" aria-expanded="false" aria-controls="aboutFourCollapse4">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What if I forgot my password?
                </button>
              </h2>
              <div id="aboutFourCollapse4" class="accordion-collapse collapse" aria-labelledby="aboutFourHeading4"
                data-bs-parent="#aboutTwo">
                <div class="accordion-body">
                  If you forgot your password, don't worry! Simply click on forgot password on the login page, and you
                  will receive an email shortly giving you instructions on how to create a new one.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutFiveHeading5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutFiveCollapse5" aria-expanded="false" aria-controls="aboutFiveCollapse5">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  I already have an account; why can't I sign in?
                </button>
              </h2>
              <div id="aboutFiveCollapse5" class="accordion-collapse collapse" aria-labelledby="aboutFiveHeading5"
                data-bs-parent="#aboutTwo">
                <div class="accordion-body">
                  If you are having problems signing in, and you've checked that you entered your AmplePoints
                  registered email address and password correctly, please email the AmplePoints crew at <a
                    href="">help@amplepoints.com. </a> We'd be happy to help you.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutSixHeading5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutSixCollapse5" aria-expanded="false" aria-controls="aboutSixCollapse5">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Can I change my email or my mobile phone number?
                </button>
              </h2>
              <div id="aboutSixCollapse5" class="accordion-collapse collapse" aria-labelledby="aboutSixHeading5"
                data-bs-parent="#aboutTwo">
                <div class="accordion-body">
                  Yes, you can change your email address and mobile phone number at any time. Just head over to your
                  profile settings and update your email address and/or phone number.
                </div>
              </div>
            </div>
          </div>
          <h4 class="faq-heading">AmplePoints Profile</h4>
          <div class="accordion" id="aboutThree">
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutSevenHeading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutSevenCollapse1" aria-expanded="true" aria-controls="aboutSevenCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I update my profile information?
                </button>
              </h2>
              <div id="aboutSevenCollapse1" class="accordion-collapse collapse show"
                aria-labelledby="aboutSevenHeading1" data-bs-parent="#aboutThree">
                <div class="accordion-body">
                  After you sign up just go to the profile page to change your profile information.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="aboutEightHeading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#aboutEightCollapse2" aria-expanded="false" aria-controls="aboutEightCollapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Why don't I get AmplePoints emails?
                </button>
              </h2>
              <div id="aboutEightCollapse2" class="accordion-collapse collapse" aria-labelledby="aboutEightHeading2"
                data-bs-parent="#aboutThree">
                <div class="accordion-body">
                  Oh no, this hurts our heart. We must get you signed up right away! Email the AmplePoints crew at <a
                    href="">help@amplepoints.com</a>, and we'll get you on the list ASAP.
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- -- Rewards --  -->
        <div class="faq-tab" id="faqTab3">
          <h4 class="faq-heading">What are AmplePoints?</h4>
          <div class="accordion" id="rewardsOne">
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsOneHeading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsOneCollapse1" aria-expanded="true" aria-controls="rewardsOneCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What are AmplePoints?
                </button>
              </h2>
              <div id="rewardsOneCollapse1" class="accordion-collapse collapse show"
                aria-labelledby="rewardsOneHeading1" data-bs-parent="#rewardsOne">
                <div class="accordion-body">
                  AmplePoints is our biggest reward. We always say, time is money, so why not get paid for your time
                  online! You can use AmplePoints towards your purchases in the AmplePoints store and/or to enter for
                  a chance to win prizes in our Giveaways page.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsTwoHeading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsTwoCollapse2" aria-expanded="false" aria-controls="rewardsTwoCollapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I get free stuff?
                </button>
              </h2>
              <div id="rewardsTwoCollapse2" class="accordion-collapse collapse" aria-labelledby="rewardsTwoHeading2"
                data-bs-parent="#rewardsOne">
                <div class="accordion-body">
                  Every time you click on a product, it will display how many AmplePoints it takes to get that item
                  for free (taxes will apply). Just apply your AmplePoints in the calculator to display the new price.
                  The more AmplePoints you have, the more free stuff you get.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsThreeHeading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsThreeCollapse3" aria-expanded="false" aria-controls="rewardsThreeCollapse3">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I increase my AmplePoints?
                </button>
              </h2>
              <div id="rewardsThreeCollapse3" class="accordion-collapse collapse"
                aria-labelledby="rewardsThreeHeading3" data-bs-parent="#rewardsOne">
                <div class="accordion-body">
                  In order to increase your AmplePoints, you can shop, invite friends, or click the share button.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsFourHeading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsFourCollapse4" aria-expanded="false" aria-controls="rewardsFourCollapse4">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Do my AmplePoints expire?
                </button>
              </h2>
              <div id="rewardsFourCollapse4" class="accordion-collapse collapse" aria-labelledby="rewardsFourHeading4"
                data-bs-parent="#rewardsOne">
                <div class="accordion-body">
                  This year we have extended the expiration to December 2024.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsFiveHeading5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsFiveCollapse5" aria-expanded="false" aria-controls="rewardsFiveCollapse5">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Can I redeem my AmplePoints for real cash?
                </button>
              </h2>
              <div id="rewardsFiveCollapse5" class="accordion-collapse collapse" aria-labelledby="rewardsFiveHeading5"
                data-bs-parent="#rewardsOne">
                <div class="accordion-body">
                  No, our rewards system is exclusive to amplepoints.com. AmplePoints can only be used through the
                  AmplePoints platform as described.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsSixHeading6">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsSixCollapse6" aria-expanded="false" aria-controls="rewardsSixCollapse6">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Can I gift my AmplePoints?
                </button>
              </h2>
              <div id="rewardsSixCollapse6" class="accordion-collapse collapse" aria-labelledby="rewardsSixHeading6"
                data-bs-parent="#rewardsOne">
                <div class="accordion-body">
                  At this time, we do not have a function that allows you to gift your AmplePoints to another
                  AmplePoints user. But we do offer the option of donating your AmplePoints to a charity of your
                  choice in the AmplePoints store.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsSevenHeading7">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsSevenCollapse7" aria-expanded="false" aria-controls="rewardsSevenCollapse7">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What can I get with my AmplePoints?
                </button>
              </h2>
              <div id="rewardsSevenCollapse7" class="accordion-collapse collapse"
                aria-labelledby="rewardsSevenHeading7" data-bs-parent="#rewardsOne">
                <div class="accordion-body">
                  You can get everything from electronics and home dÃ©cor to fashion and makeup and everything else
                  that is a Ample Eligible product. Look out for the items that have the Ample Eligible icon.
                </div>
              </div>
            </div>
          </div>
          <h4 class="faq-heading">Ample Eligible Products vs. Regular Products</h4>
          <div class="accordion" id="rewardsTwo">
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading8">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse8" aria-expanded="true" aria-controls="rewardsCollapse8">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What are Ample Eligible products?
                </button>
              </h2>
              <div id="rewardsCollapse8" class="accordion-collapse collapse show" aria-labelledby="rewardsHeading8"
                data-bs-parent="#rewardsTwo">
                <div class="accordion-body">
                  Ample Eligible products are items where you can use AmplePoints towards a purchase. The Ample
                  Eligible icon will always appear on the product's tile.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading9">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse9" aria-expanded="false" aria-controls="rewardsCollapse9">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What are considered regular products?
                </button>
              </h2>
              <div id="rewardsCollapse9" class="accordion-collapse collapse" aria-labelledby="rewardsHeading9"
                data-bs-parent="#rewardsTwo">
                <div class="accordion-body">
                  Regular products are items for sale that do not have the Ample Eligible icon listed on its tile.
                  Every time a user purchases a regular product, that user will automatically receive AmplePoints.
                  Please note that regular products cannot be purchased with AmplePoints.
                </div>
              </div>
            </div>
          </div>
          <h4 class="faq-heading">Invite Friends</h4>
          <div class="accordion" id="rewardsThree">
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading10">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse10" aria-expanded="true" aria-controls="rewardsCollapse10">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I invite friends to AmplePoints?
                </button>
              </h2>
              <div id="rewardsCollapse10" class="accordion-collapse collapse show" aria-labelledby="rewardsHeading10"
                data-bs-parent="#rewardsThree">
                <div class="accordion-body">
                  Yay, we're so happy that you want to invite your friends! After you sign up just go to the profile
                  page and invite friends.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading11">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse11" aria-expanded="false" aria-controls="rewardsCollapse11">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I know which friends have joined and which haven't?
                </button>
              </h2>
              <div id="rewardsCollapse11" class="accordion-collapse collapse" aria-labelledby="rewardsHeading11"
                data-bs-parent="#rewardsThree">
                <div class="accordion-body">
                  This will be displayed in your dashboard under 'invite' and specifies which friends have joined.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading12">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse12" aria-expanded="false" aria-controls="rewardsCollapse12">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How many AmplePoints do I receive for inviting friends?
                </button>
              </h2>
              <div id="rewardsCollapse12" class="accordion-collapse collapse" aria-labelledby="rewardsHeading12"
                data-bs-parent="#rewardsThree">
                <div class="accordion-body">
                  When your friends join through your invitiation link and spend $100 in shopping, you will receive 84
                  AmplePoints, worth $10! You can see this information in 'my chain' located in the profile page.
                </div>
              </div>
            </div>
          </div>
          <h4 class="faq-heading">Giveaways</h4>
          <div class="accordion" id="rewardsFour">
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading13">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse13" aria-expanded="true" aria-controls="rewardsCollapse13">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What are AmplePoints Giveaways?
                </button>
              </h2>
              <div id="rewardsCollapse13" class="accordion-collapse collapse show" aria-labelledby="rewardsHeading13"
                data-bs-parent="#rewardsFour">
                <div class="accordion-body">
                  Giveaways are featured on the AmplePoints Giveaways page. These are fun Giveaways that users can
                  enter into for a chance to win.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading14">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse14" aria-expanded="false" aria-controls="rewardsCollapse14">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I enter AmplePoints Giveaways?
                </button>
              </h2>
              <div id="rewardsCollapse14" class="accordion-collapse collapse" aria-labelledby="rewardsHeading14"
                data-bs-parent="#rewardsFour">
                <div class="accordion-body">
                  Once you find a Giveaway that you would like to enter, simply click WIN on the tile. Please note
                  that each entry requires a certain amount of AmplePoints. When you enter a Giveaway the AmplePoints
                  will automatically be deducted from your account.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading15">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse15" aria-expanded="false" aria-controls="rewardsCollapse15">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Is there a limit on entries per Giveaways?
                </button>
              </h2>
              <div id="rewardsCollapse15" class="accordion-collapse collapse" aria-labelledby="rewardsHeading15"
                data-bs-parent="#rewardsFour">
                <div class="accordion-body">
                  No, you may enter as many times as you want, just as long as you have enough AmplePoints.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading16">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse16" aria-expanded="false" aria-controls="rewardsCollapse16">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How are winners announced?
                </button>
              </h2>
              <div id="rewardsCollapse16" class="accordion-collapse collapse" aria-labelledby="rewardsHeading16"
                data-bs-parent="#rewardsFour">
                <div class="accordion-body">
                  Once the Giveaway is over, the winner will be contacted via email. If the winner does not accept the
                  prize within 5 days, another user will be chosen at random. Finally, the official winner will be
                  featured on the homepage.
                </div>
              </div>
            </div>
          </div>
          <h4 class="faq-heading">Reward Time</h4>
          <div class="accordion" id="rewardsFive">
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading17">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse17" aria-expanded="true" aria-controls="rewardsCollapse17">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What is Reward Time?
                </button>
              </h2>
              <div id="rewardsCollapse17" class="accordion-collapse collapse show" aria-labelledby="rewardsHeading17"
                data-bs-parent="#rewardsFive">
                <div class="accordion-body">
                  Reward Time is separate from AmplePoints. Reward Time is the time you are alloted to watch ads in
                  the cube so you can earn more AmplePoints.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading18">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse18" aria-expanded="false" aria-controls="rewardsCollapse18">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I earn Reward Time?
                </button>
              </h2>
              <div id="rewardsCollapse18" class="accordion-collapse collapse" aria-labelledby="rewardsHeading18"
                data-bs-parent="#rewardsFive">
                <div class="accordion-body">
                  Reward Time is rewards on rewards. Every time you shop and spend up to $500, you earn an extra 5% in
                  Reward Time. When you spend $500 to $1000 you earn 7% in Reward Time. When you spend more than $1000
                  you earn 10% in Reward Time every month. Your Reward Time will convert into AmplePoints when you
                  watch ads.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="rewardsHeading19">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#rewardsCollapse19" aria-expanded="false" aria-controls="rewardsCollapse19">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  When does Reward Time expire?
                </button>
              </h2>
              <div id="rewardsCollapse19" class="accordion-collapse collapse" aria-labelledby="rewardsHeading19"
                data-bs-parent="#rewardsFive">
                <div class="accordion-body">
                  It does not expire. It keeps adding up.
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- -- Redeem --  -->
        <div class="faq-tab" id="faqTab4">
          <h4 class="faq-heading">Redeeming Your Rewards</h4>
          <div class="accordion" id="redeem">
            <div class="accordion-item">
              <h2 class="accordion-header" id="redeem1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#redeemCollapse1" aria-expanded="true" aria-controls="redeemCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I redeem my AmplePoints?
                </button>
              </h2>
              <div id="redeemCollapse1" class="accordion-collapse collapse show" aria-labelledby="redeem1"
                data-bs-parent="#redeem">
                <div class="accordion-body">
                  Every time you click on a product, it will display how many AmplePoints it takes to get that item
                  for free (taxes will apply). Just apply your AmplePoints in the calculator to display the new price.
                  The more AmplePoints you have, the more free stuff you get.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="redeem2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#redeemCollapse2" aria-expanded="false" aria-controls="redeemCollapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I redeem a winning Giveaway?
                </button>
              </h2>
              <div id="redeemCollapse2" class="accordion-collapse collapse" aria-labelledby="redeem2"
                data-bs-parent="#redeem">
                <div class="accordion-body">
                  The winner of the Giveaway will be emailed with instructions on how to redeem their prize.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="redeem3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#redeemCollapse3" aria-expanded="false" aria-controls="redeemCollapse3">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I redeem a Freebie?
                </button>
              </h2>
              <div id="redeemCollapse3" class="accordion-collapse collapse" aria-labelledby="redeem3"
                data-bs-parent="#redeem">
                <div class="accordion-body">
                  Once you have accepted the Freebie and placed it into your cart, you would just complete the
                  checkout process as normal.
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- -- Orders --  -->
        <div class="faq-tab" id="faqTab5">
          <h4 class="faq-heading">Order Information</h4>
          <div class="accordion" id="orders">
            <div class="accordion-item">
              <h2 class="accordion-header" id="orders1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#ordersCollapse1" aria-expanded="true" aria-controls="ordersCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How is sales tax calculated?
                </button>
              </h2>
              <div id="ordersCollapse1" class="accordion-collapse collapse show" aria-labelledby="orders1"
                data-bs-parent="#orders">
                <div class="accordion-body">
                  Sales tax is calculated based on the ship from and ship to address. If the ship to state is
                  different from the ship from state, no sales tax will be charged.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="orders2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#ordersCollapse2" aria-expanded="false" aria-controls="ordersCollapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I redeem my AmplePoints?
                </button>
              </h2>
              <div id="ordersCollapse2" class="accordion-collapse collapse" aria-labelledby="orders2"
                data-bs-parent="#orders">
                <div class="accordion-body">
                  Every time you click on a product, it will display how many AmplePoints it takes to get that item
                  for free (taxes will apply). Just apply your AmplePoints in the calculator to display the new price.
                  The more AmplePoints you have, the more free stuff you get.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="orders3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#ordersCollapse3" aria-expanded="false" aria-controls="ordersCollapse3">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How much is shipping?
                </button>
              </h2>
              <div id="ordersCollapse3" class="accordion-collapse collapse" aria-labelledby="orders3"
                data-bs-parent="#orders">
                <div class="accordion-body">
                  We offer free shipping on a number of items. Shipping is calculated based on the weight and
                  dimensions of the item as per vendor.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="orders4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#ordersCollapse4" aria-expanded="false" aria-controls="ordersCollapse4">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Do you offer a loyalty program?
                </button>
              </h2>
              <div id="ordersCollapse4" class="accordion-collapse collapse" aria-labelledby="orders4"
                data-bs-parent="#orders">
                <div class="accordion-body">
                  Our loyalty program consists of AmplePoints. It's our thanks to our customers for shopping, sharing,
                  and inviting friends.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="orders5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#ordersCollapse5" aria-expanded="false" aria-controls="ordersCollapse5">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How can I modify an order?
                </button>
              </h2>
              <div id="ordersCollapse5" class="accordion-collapse collapse" aria-labelledby="orders5"
                data-bs-parent="#orders">
                <div class="accordion-body">
                  Orders are processed very quickly. You can contact a seller by going to my purchases, locate your
                  order, and contact the seller.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="orders6">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#ordersCollapse6" aria-expanded="false" aria-controls="ordersCollapse6">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I cancel my order?
                </button>
              </h2>
              <div id="ordersCollapse6" class="accordion-collapse collapse" aria-labelledby="orders6"
                data-bs-parent="#orders">
                <div class="accordion-body">
                  Orders are processed very quickly. You can contact a seller by going to my purchases, locate your
                  order, and contact the seller.
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- -- Shipping --  -->
        <div class="faq-tab" id="faqTab6">
          <h4 class="faq-heading">SHIPPING</h4>
          <div class="accordion" id="shipping">
            <div class="accordion-item">
              <h2 class="accordion-header" id="shipping1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#shippingCollapse1" aria-expanded="true" aria-controls="shippingCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How much is shipping?
                </button>
              </h2>
              <div id="shippingCollapse1" class="accordion-collapse collapse show" aria-labelledby="shipping1"
                data-bs-parent="#shipping">
                <div class="accordion-body">
                  We offer free shipping on a number of items. Shipping is calculated based on the weight and
                  dimensions of the item as per vendor
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="shipping2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#shippingCollapse2" aria-expanded="false" aria-controls="shippingCollapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Do you ship internationally?
                </button>
              </h2>
              <div id="shippingCollapse2" class="accordion-collapse collapse" aria-labelledby="shipping2"
                data-bs-parent="#shipping">
                <div class="accordion-body">
                  Unfortunately, at this time we only ship within the U.S.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="shipping3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#shippingCollapse3" aria-expanded="false" aria-controls="shippingCollapse3">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What carrier do you use to ship?
                </button>
              </h2>
              <div id="shippingCollapse3" class="accordion-collapse collapse" aria-labelledby="shipping3"
                data-bs-parent="#shipping">
                <div class="accordion-body">
                  The carrier used depends upon each respective vendor.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="shipping4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#shippingCollapse4" aria-expanded="false" aria-controls="shippingCollapse4">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I track my order?
                </button>
              </h2>
              <div id="shippingCollapse4" class="accordion-collapse collapse" aria-labelledby="shipping4"
                data-bs-parent="#shipping">
                <div class="accordion-body">
                  Most orders come with a tracking number via email. If you do not receive a tracking number, you can
                  always contact <a href="">help@amplepoints.com</a> at anytime.
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- -- Returns --  -->
        <div class="faq-tab" id="faqTab7">
          <h4 class="faq-heading">Returns</h4>
          <div class="accordion" id="returns">
            <div class="accordion-item">
              <h2 class="accordion-header" id="returns1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#returnsCollapse1" aria-expanded="true" aria-controls="returnsCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I return an Item?
                </button>
              </h2>
              <div id="returnsCollapse1" class="accordion-collapse collapse show" aria-labelledby="returns1"
                data-bs-parent="#returns">
                <div class="accordion-body">
                  1. Go to MY PURCHASES
                  2. Locate your order
                  3. Click Return
                  4. If you can't come to a solution with the seller, you can click the "Open A Case" button in the
                  Conversation
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="returns2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#returnsCollapse2" aria-expanded="false" aria-controls="returnsCollapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  My item arrived damaged. What do I do?
                </button>
              </h2>
              <div id="returnsCollapse2" class="accordion-collapse collapse" aria-labelledby="returns2"
                data-bs-parent="#returns">
                <div class="accordion-body">
                  Oh no, we're sorry about that. Please contact our customer service team at help@ampelpoints.com.
                  AmplePoints will review the damaged item request and issue the customer a shipping label. Once the
                  seller receives the item, the purchase amount will be refunded to the customer's credit card,
                  deducting the original AmplePoints granted when first purchased. If the customer used AmplePoints to
                  make the purchase, the customer will be credited back with AmplePoints..
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="returns">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#returnsCollapse3" aria-expanded="false" aria-controls="returnsCollapse3">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  What carrier do you use to ship?
                </button>
              </h2>
              <div id="returnsCollapse3" class="accordion-collapse collapse" aria-labelledby="returns"
                data-bs-parent="#returns">
                <div class="accordion-body">
                  The carrier used depends upon each respective vendor.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="returns4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#returnsCollapse4" aria-expanded="false" aria-controls="returnsCollapse4">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  How do I track my order?
                </button>
              </h2>
              <div id="returnsCollapse4" class="accordion-collapse collapse" aria-labelledby="returns4"
                data-bs-parent="#returns">
                <div class="accordion-body">
                  Most orders come with a tracking number via email. If you do not receive a tracking number, you can
                  always contact <a href="">help@amplepoints.com</a> at anytime.
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- -- Contact Us --  -->
        <div class="faq-tab" id="faqTab8">
          <h4 class="faq-heading">Contact AmplePoints</h4>
          <div class="accordion" id="contact">
            <div class="accordion-item">
              <h2 class="accordion-header" id="contact1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#contactCollapse1" aria-expanded="true" aria-controls="contactCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Who do I contact for help or support issues?
                </button>
              </h2>
              <div id="contactCollapse1" class="accordion-collapse collapse show" aria-labelledby="contact1"
                data-bs-parent="#contact">
                <div class="accordion-body">
                  If you need to reach us for any reason, please email The AmplePoints Crew at <a
                    href="help@amplepoints.com."></a> We are available 24/7 (please allow us up to 24 hours to
                  respond).
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="contact2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#contactCollapse2" aria-expanded="false" aria-controls="contactCollapse2">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Who do I contact if I'd like to advertise and/or become a seller on AmplePoints?
                </button>
              </h2>
              <div id="contactCollapse2" class="accordion-collapse collapse" aria-labelledby="contact2"
                data-bs-parent="#contact">
                <div class="accordion-body">
                  We love that you're interested in working with us. Please email our sales team at <a
                    href="">help@amplepoints.com.</a>
                </div>
              </div>
            </div>
          </div>
          <h4 class="faq-heading">Legal</h4>
          <div class="accordion" id="contactTwo">
            <div class="accordion-item">
              <h2 class="accordion-header" id="contactTwo1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#contactTwoCollapse1" aria-expanded="true" aria-controls="contactTwoCollapse1">
                  <i class="fa fa-angle-double-right me-2 mt-1"></i>
                  Where can I find documents that explain AmplePoints legal policies?
                </button>
              </h2>
              <div id="contactTwoCollapse1" class="accordion-collapse collapse show" aria-labelledby="contactTwo1"
                data-bs-parent="#contactTwo">
                <div class="accordion-body">
                  You can find AmplePoints Terms & Policies document right here (click on Terms & Policies to access)
                  and Giveaways Policy right here (click on Giveaways policy).
                </div>
              </div>
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