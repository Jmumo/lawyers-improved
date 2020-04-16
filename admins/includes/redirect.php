<?php
function redirect_to($new_location)
{

   return header("location:$new_location");
//    exit;
}

?>