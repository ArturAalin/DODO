<? 
$act = new actions();

if(isset($_COOKIE['id']) and $_SESSION['online'] == true){
     
          echo $act->SendBoolAnswer(true);
          
     }else{
          
          echo $act->SendBoolAnswer(false);       
     }
  
          
?>