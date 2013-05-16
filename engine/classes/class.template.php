<?php
class template{
     
     function getTemplate($file, $array){
          ob_start();
          require_once("tmp/".$file);
          return ob_get_contents();
          ob_end_clean();
     }
}
?>