<?php
	$page=$_GET['page'];
	$name=$page%4+1;
	$html='<ul><li><img src="images/p'.$name.'.jpg">'.$page.'</li></ul>';
	echo $html;
?>