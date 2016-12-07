<?php
error_reporting(0); //不显示错误
// if(!isset($argv[1])){
// 	echo "\033[1;31;40mphp xxx.php moogujie.com 跳转\033[0m".PHP_EOL;
// 	echo "\033[1;31;40m最后一个参数是输入你需要屏蔽的关键词以后会弄正则，一般来说就是跳转|返回|首页|一类的\033[0m".PHP_EOL;
// 		exit();
// }

$dic_file='./dic.txt';//设置加载字典文件
$dict=file($dic_file);//设置字典
$count=count($dict);
//$state = get_headers($url);



for($i=0;$i<$count;$i++){

	$url = "http://".trim($dict[$i]).".".$argv[1]; // 输入扫描网站
	echo "\033[1;31;40m".$url."\033[0m".PHP_EOL;

	$state = get_headers($url);
	if($state[0]=="HTTP/1.1 200 OK"){
		echo $url.PHP_EOL;
		file_put_contents('./domain_'.$argv[1].'.txt',$url.PHP_EOL,FILE_APPEND); //保存扫描结果
		// $content = file_get_contents($url);
		// if(!strpos($content,$argv[2])){ //设置条件



		// //echo $url = "http://".trim($dict[$i]).".mogujie.com".PHP_EOL;
		// 	$url = "http://".trim($dict[$i]).".".$argv[1];
		// 	//echo $url;
		// 	file_put_contents('./domain_'.$argv[1].'.txt',$url.PHP_EOL,FILE_APPEND); //保存扫描结果

		// }

	}
	
	
	bar($i,$count);


}


 function bar($curent,$count){

  
  printf("\r%s%6.2f%% (%s/%s)",'[scan] loading:',round(($curent / $count) * 100), $curent, $count);
  
  }