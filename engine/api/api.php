<?php
class API{
     function __construct(){
          
     }
}


class otherAPI{
     
     function __construct(){
          
     }
     
     public function wiki($title){
    	     //������������� ���������� ����� �����
     	$fp = fsockopen("ru.wikipedia.org", 80, $errno, $errstr, 30);
     	if (!$fp) {
     	    echo "$errstr ($errno)<br />\n";
     	} else {
     	    $out = "GET /w/api.php?action=opensearch&search=".urlencode($title)."&prop=info&format=xml&inprop=url HTTP/1.1\r\n";
     	    $out .= "Host: ru.wikipedia.org\r\n";
     		// ��������� User-Agent. ��� ����  ����� ������
     	    $out .= "User-Agent: MyCuteBot/0.1\r\n";
     	    $out .= "Connection: Close\r\n\r\n";
     	    fwrite($fp, $out);
     	    $str = '';
     		// �������� ������ xml ��� ��������� ���������� �������
     	    while (!feof($fp)) {
     	        $tmp_str = fgets($fp, 128);
     	        if ($str != '' || substr($tmp_str,0,2)=='<?')
     	        	$str .= $tmp_str;
     	    }
     	    fclose($fp);
     		//������ ������
     	    $xml = simplexml_load_string($str);
     	    return $xml->Section->Item;
     	}
          
     }
}
?>