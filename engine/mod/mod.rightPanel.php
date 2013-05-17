<?php
$user = new user();

if($user->StatusOnline() == true){
     include('tmp/rightPanel.phtml');
}

?>