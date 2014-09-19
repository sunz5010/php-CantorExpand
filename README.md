# 介紹
##【康托展開】

* 演算法來自：[康托wiki介紹](http://zh.wikipedia.org/wiki/%E5%BA%B7%E6%89%98%E5%B1%95%E5%BC%80)
* 說明：給定一個字串，在這個字串的排列組合中，找出第n個排列組合
* 需求：有使用到GMP的php extention (http://php.net/manual/en/book.gmp.php)
* 作者：FoFo sunz5010@gmail.com
	
## 使用方式
```
<?php
	//Define
	//全排列的字串
	$word = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/");

	//要記錄某個字有沒有被用過
	$isTake = array();

	//如果想要知道某一個位數的字串全排列總共有多少排列組合
	//$n = 64;
	//echo gmp_strval(gmp_fact(64);

	//托康展開
	echo CantorExpand(count($word), "10000000000")."\r\n"; //找出第 10000000000 排列組合的結果

	//重新設定isTask
	resetIsTake();

	//找出64位字串最後一個排列組合
	echo CantorExpand(count($word),"126886932185884164103433389335161480802865516174545192198801894375214704230400000000000000")."\r\n";
?>
```

```
//輸出結果
ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxz6+4819/70325y
/+9876543210zyxwvutsrqponmlkjihgfedcbaZYXWVUTSRQPONMLKJIHGFEDCBA
```
