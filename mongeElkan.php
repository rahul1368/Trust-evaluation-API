<?php
//Monge elkan implementation in php
function mongeElkan($tokensA, $tokensB) {
	$str1 = implode ($tokensA);
	$str2 = implode ($tokensB);
	$clean_str1 = array();
	$clean_str2 = array();
	preg_match_all('/\S+/', $str1, $token1);
	preg_match_all('/\S+/', $str2, $token2);
	$score = 0;
	foreach ($token1[0] as $key => $value) {
		$clean_str1[] = preg_replace('/[^a-zA-Z0-9]+/', '', $value);
	}
	foreach ($token2[0] as $key => $value) {
		$clean_str2[] = preg_replace('/[^a-zA-Z0-9]+/', '', $value);
	}
	$token1 = array_filter($clean_str1);
	$token2 = array_filter($clean_str2);
	foreach ($token1 as $k => $v) {
		foreach ($token2 as $key => $value) {
			if (startsWith($v, $value)) {
				$score++;
			}
		}
	}
	return $score / ((count($token1) + count($token2))/2);
}
function startsWith($haystack, $needle) {
	$length1 = strlen($needle);
	$length2 = strlen($haystack);
	if ($length1 > $length2) {
		$length = $length2;
		$nee = $haystack;
		$hay = $needle;
	} else {
		$length = $length1;
		$nee = $needle;
		$hay = $haystack;
	}
    return (substr($hay, 0, $length) === $nee);
}