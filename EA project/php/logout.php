<?php
session_start();
session_unset();
echo'<head><script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script></head>';
header("Location:http://localhost/EA%20project/Signin.php");
?>
