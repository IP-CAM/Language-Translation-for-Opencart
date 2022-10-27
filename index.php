<?php
require_once ('GoogleTranslateForFree.php');
use \Dejurin\GoogleTranslateForFree;
function trans($filename){
include($filename);
$tr = new GoogleTranslateForFree();
$contents="<?php".chr(13);
$thay='%s';
foreach ($_ as $key => $value){
	$value=str_replace($thay,"____",$value);
	$value = $result = $tr->translate('en', 'vi', $value, 5); 
	$value=str_replace("____",$thay,$value);	
	//echo "\$_['".$key."']        = '".$value."';".chr(10).chr(13)."</br>";	
  $contents.="\$_['".$key."'] = '".$value."';".chr(13); 
}
file_put_contents($filename, $contents);
}
$path = "D:/laragon/www/langtrans/4.0.1.1_0/";
function listIt($path) {
$items = scandir($path);

foreach($items as $item) {
    // Ignore the . and .. folders
    if($item != "." AND $item != "..") {
        if (is_file($path . $item)) {            
			$ext = pathinfo($item, PATHINFO_EXTENSION);
			if ($ext == 'php'){
			echo $path . $item.'<BR>';
			$filename=$path . $item;
			trans($filename);
			}
			
        } else {            
            listIt($path . $item . "/");
        }
    }
  }
}
listIt($path);
?>