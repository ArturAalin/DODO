<?php
     //Выбираем язык
$lang = 'ru';
     //Подключаем
include('lang.'. $lang .'.php');

//Устанавливаем константы
     
if($user->StatusOnline() == true){
     //Если онлайн
     define('LOC_AUT',$LOC_AUT_YES);
     define('LOC_TITLE_PAGE',$LOC_PAGE_TITLE_ONLINE);
}else{
     //Если оффлайн
     define('LOC_AUT',$LOC_AUT_NO);
     define('LOC_TITLE_PAGE',$LOC_PAGE_TITLE_OFFLINE);
}
  
define('LOC_TEXT_FPAGE',$LOC_TEXT_FPAGE);
define('LOC_BUTTON_LOGIN',$LOC_BUTTON_LOGIN);
define('LOC_BUTTON_UNLOGIN',$LOC_BUTTON_UNLOGIN);   
define('LOC_BUTTON_REG',$LOC_BUTTON_REG); 
define('LOC_BUTTON_GET_POSTS',$LOC_BUTTON_GET_POSTS);

?>