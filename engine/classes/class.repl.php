<?php
class modRepl{
     
     public function __construct() {
          
     }


     function replace($string){                
                
                //Выбираем из строки
                
                preg_match("/.*\[(.+)\|(.+)\].*/", $string, $matches);   
                
                //Переменные
                
                $patt = array();
                
                $sing = null;
                
                //БЭКАП переменной
                
                $reStr = $string;
                
                //Выводим из регулярного выражения
                
                $strReplace = $matches[0];
                
                $item = $matches[1];
                
                $ref = $matches[2];
                
                //Хост сайта
                
                $refHost = parse_url($ref);
                
                $refHost = $refHost['host'];
                                  
                //Распределитель
                $patt = self::reSite($refHost,$ref);
                 
                $string = preg_replace($patt['pattern'],'', $string);   
                
                $string = str_replace('{link}', $patt['str'], $string); 
                
                
                if($string == null){
                    
                    return $reStr;
                    
                }else{
                    
                    return $string;
                    
                }
                
           }
           
     function reSite($host,$ref){
                    
                     $arr = array();
                     
                     switch($host){
                         //Википедия
                         case 'wikipedia.org':
                         $sing = 'wiki';
                         break;
                         
                         case 'ru.wikipedia.org':
                         $sing = 'wiki';
                         break;
                         
                         case 'vk.com':
                         $sing = 'vk';
                         break;
                         
                         //Стандартно если сайт неизвестен
                         default:
                         $sing = 'site';
                         break;
                         
                     }


                     //Получение title
                     if($ref != '' and $ref != null){
                          $str = file_get_contents($ref);
                          
                          preg_match('/<title>(.*)<\/title>/s', $str, $dataOut);
                          
                          $title = $dataOut[1];
                          
                          switch($title){
                              case 'Wall':
                              $title = 'Стена';
                              break;
                          }
                          
                          if(strlen($title) > 30){
                              
                              $title = substr($title, 0, 32) . '...';
                              
                          }
                          
                          switch($sing){
                              case 'vk':
                              $title = $title . ' - ВКонтакте';
                              break;
                          }    
                     }
                     
                     
                     //Собираем массив
                     
                     $arr['title'] = $title;
                     
                     $arr['pattern'] = '/\[site\|[^\]]+\]/'; 

                     $arr['sing'] = $sing;
                     
                     if($host != null){
                         
                         $arr['str'] =  "<a href='". $ref ."' target = '_blank' >". $title ."</a>";  
                          
                     }else{
                         
                         $arr['str'] = null;
                         
                     }
                     
                     $arr['type'] = 'link';
                     
                     return $arr;
                 
               }
}

?>