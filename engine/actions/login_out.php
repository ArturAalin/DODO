<?
if(setcookie("id", NULL, time()+3600, "/") == true){
     
     $_SESSION['id'] = null;
     
     $_SESSION['online'] = false;
     
     //session_destroy();
}
?>