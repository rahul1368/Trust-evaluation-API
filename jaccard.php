<?php

function jaccard( array $tokensA, $tokensB) {
	
	$arr_intersection = array_intersect( $tokensA, $tokensB );
	$arr_union = array_merge( $tokensA, $tokensB );
	$coefficient = count( $arr_intersection ) / count( $arr_union );
	
	return $coefficient;
}
	
?>