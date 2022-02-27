<?php
	$ua=$_SERVER['HTTP_USER_AGENT'];
	$browser = ((strpos($ua,'iPhone')!==false)||(strpos($ua,'iPod')!==false)||(strpos($ua,'Android')!==false));
		if ($browser == true){
		$browser = 'sp';
	}
	if($browser == 'sp'){
?>

  <!--スマホで表示させたい内容を記載-->
  <p>この表はスクロール可能です。</p>

<?php }else{ ?>

  <!--タブレット・PCで表示させたい内容を記載-->

<?php } ?>