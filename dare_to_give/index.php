<?php

define('FACEBOOK_APP_ID', '127081787343596');
define('FACEBOOK_SECRET', '6fa21d138f52fe2e021701f821841778');

function get_facebook_cookie($app_id, $application_secret) {
    $args = array();
    parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
    ksort($args);
    $payload = '';
    foreach ($args as $key => $value) {
        if ($key != 'sig') {
            $payload .= $key . '=' . $value;
        }
    }
    if (md5($payload . $application_secret) != $args['sig']) {
      return null;
    }
    return $args;
}

$cookie = get_facebook_cookie(FACEBOOK_APP_ID, FACEBOOK_SECRET);
//echo 'The ID of the current user is ' . $cookie['uid'];

?>

<html>
  <body>
    <?php if ($cookie) { ?>
    <p>
      Your user ID is <?= $cookie['uid'] ?>
    </p>
    <p>
<fb:serverFbml>
<script type="text/fbml">
<fb:fbml>
    Choose a friend to dare!
    <fb:request-form
        method='POST'
        type='Dare'
        content='You have been challenged to a dare! Will you accept it?
            <fb:req-choice url="http://apps.facebook.com/dare_to_give/yes.php" 
                label="Yes" />
            <fb:req-choice url="http://apps.facebook.com/dare_to_give/no.php" 
                label="No" />'
        <fb:friend-selector
            name="Choose a friend to dare" /><br />
        Suggested target: <input type="text" name="amount" value="0.00" fb_protected="true" /><br />
        <fb:request-form-submit label="Submit" />
    </fb:request-form>
</fb:fbml>
</script>
</fb:serverFbml>
    </p>
    <?php } else { ?>
      <fb:login-button>Install CharityDareMe</fb:login-button>
    <?php } ?>

    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script>
      FB.init({appId: '<?php echo FACEBOOK_APP_ID;?>', xfbml: true, cookie: true});
      FB.Event.subscribe('auth.login', function(response) {
        // Reload the application in the logged-in state
        window.top.location = 'http://apps.facebook.com/dare_to_give/';
      });
    </script>
  </body>
</html>
