<?php
	// 【康托展開】
	// 演算法來自：http://zh.wikipedia.org/wiki/%E5%BA%B7%E6%89%98%E5%B1%95%E5%BC%80
	// 說明：給定一個字串，在這個字串的排列組合中，找出第n個排列組合
	// 需求：有使用到GMP的php extention (http://php.net/manual/en/book.gmp.php)
	// 作者：FoFo sunz5010@gmail.com

	function CantorExpand($n, $x)
	{
		//參數說明 
		// $n - 排列的位數
		// $x - 第幾個 (必須要是字串)

		//1. $x 先減1
		$x = gmp_sub($x,"1");

		$str = "";
		for($i=1; $i<=$n; $i++)
		{
			//2. 先算($n-$i)階乘
			$fac = gmp_strval(gmp_fact($n-$i));

			//3. 再算 $x / ($n-$i) 的商跟餘數
			$res = gmp_div_qr($x, $fac);
			$quotient = gmp_strval($res[0]);
			$remainder = gmp_strval($res[1]);

			//4. 比這個位數小的數目總共有 $quotient 個，所以開始找出這個位數
			$str .= findMax($quotient);

			//5. 把餘數設為 $x，下次要使用
			$x = $remainder;
		}
		return $str;
	}
	function findMax($inputNumber)
	{
		global $word, $isTake;

		//從第0個開始找
		$index = 0;
		while(1)
		{
			if($isTake[$index] == false && $inputNumber == 0)
			{
				//如果已經沒有比這個數字還要小，而且這個值還沒有被拿走
				$isTake[$index] = true;
				return $word[$index];
			}
			else if($isTake[$index] == false && $inputNumber > 0)
			{
				//如果這個值沒被拿走，但是還不是我們要找的數
				$index++;
				$inputNumber--;
			}
			else
			{
				//這個值已經被拿走，略過
				$index++;
			}
		}
	}
	function resetIsTake()	//重新設定isTask
	{
		global $isTake;
		foreach ($isTake as $key => $value)
		{
			$isTake[$key] = false;
		}
	}
?>


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