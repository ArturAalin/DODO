<?php
class html{
     function getForm($formName){
          $form = file_get_contents('atmp/' . $formName);
          echo $form;
          
     }
}

?>