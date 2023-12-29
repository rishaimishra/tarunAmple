<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('facebook.php');

  $config = array(
    'appId'  => '509709012416816',
    'secret' => 'b8e77e2eec178e444e3f2c7328fe4524',
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
  $token =$facebook->getAccessToken();
  
  
?>
<html>
  <head>< >
  <input id="AccessToken" type="text"  name ="token" value="" />
 <input id="tati" type="text"  name ="token" value=".<?php echo $facebook->getAccessToken(); ?>." />
<div id="fb-root"></div>
<script src="https://connect.facebook.net/en_US/all.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {

        FB.init({ 
            appId: '509709012416816', 
            cookie: true, 
            xfbml: true, 
            status: true });

			
		
		FB.getLoginStatus(function (response) {
		var uid = response.authResponse.userID;
		var accessToken = response.authResponse.accessToken;
		
		 if (response.status === 'connected') {

                 var uid = response.authResponse.userID;
                 var accessToken = response.authResponse.accessToken;

			}
            if (response.authResponse) {
                $('#AccessToken').val(response.authResponse.accessToken);
            } else {
                alert("Motherfucker");
            }
		
        });
		
		

    });
</script>
</head>
  <body>

  <?php
  //session_start();
  
		/*echo "<script type='text/javascript' >";
		echo "$(document).ready(function () {";
		echo "FB.getLoginStatus(function (response) {"
	$toti=	echo "response.authResponse.accessToken;";
		echo "  });":
		echo "  });":
		echo $toti;*/
    if($user_id) {
		
      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
        $ret_obj = $facebook->api('/me/feed', 'POST',
                                    array(
                                      'link' => 'https://www.postmygreetings.com',
                                      'message' => 'Show you care'

                                 ));
								 //header("Location:fbb.php");
        echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';

        // Give the user a logout link 
        echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl( array(
                       'scope' => 'publish_stream'
                       )); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, so print a link for the user to login
      // To post to a user's wall, we need publish_stream permission
      // We'll use the current URL as the redirect_uri, so we don't
      // need to specify it here.
      $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream' ) );
      echo 'Please <a href="' . $login_url . '">login.</a>';

    } 

  ?>      

  </body> 
</html>  

