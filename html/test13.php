<?php
session_start();
session_unset();
session_destroy();
echo "session destroy";
header("location:index.php");
?>
<html>
<head>
</head>
<body onload="">

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      window.location.href ="index.php";
    });
    
  }

  </script>
 </body>
</html> 