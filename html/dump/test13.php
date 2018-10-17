<?php
session_destroy();
echo "session destroy";

?>
<html>
<head>
</head>
<body>

<a href="googlesign.html" onclick="signOut();">Sign out</a>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
  </script>
 </body>
</html> 