<?php
class modRepl{
     function repl($str){
          preg_match("/.*\[(.+)\|(.+)\].*/", $str, $matches);
          echo $matches[1];        
     }
}

?>