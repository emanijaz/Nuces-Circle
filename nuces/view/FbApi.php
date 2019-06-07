<script>
  window.fbAsyncInit = function() {
     FB.init({
          appId      : '3102409546443267',
          cookie     : true,  
          xfbml      : false, // parse social plugins on this page
          version    : 'v2.12' // use version 2.2
     });

     FB.getLoginStatus(logoutHandler);
     FB.Event.subscribe("auth.logout",logoutHandler);
     
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function logoutHandler(response){
     if (response.status == "unknown")
        document.location = "index.php";
  }

</script>

<textarea readonly style="width:100%; height: 100%">
<?php
	$url = "https://graph.facebook.com/v2.12/me/friends?access_token=" . $_REQUEST["access_token"];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$body = curl_exec($ch);
	curl_close($ch);
	//$someArray = json_decode($body, true);
	//echo $someArray;
	echo $body;
?>
</textarea>

<button onclick="FB.logout(logoutHandler)">Logout</button>
