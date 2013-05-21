<?php
class html{
     function getForm($formName){
          
          $form = file_get_contents('atmp/' . $formName);
          
          echo $form;   
     }
     
     function getHtml($FileName){
          
          ob_start();
          
          include('tmp/'. $FileName);
          
          $HTML = ob_get_contents();
          
          ob_end_clean();
          
          return $HTML;
     }
}

?>