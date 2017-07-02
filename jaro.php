  <?php

  function jaro($tokensA, $tokensB){
  $string1 = implode ($tokensA);
  $string2 = implode ($tokensB);
     
  $str1_len = strlen( $string1 );
  $str2_len = strlen( $string2 );
    
  // theoretical distance
  $distance = (int) floor(min( $str1_len, $str2_len ) / 2.0); 
    
  // get common characters
  $commons1 = getCommonCharacters( $string1, $string2, $distance );
  $commons2 = getCommonCharacters( $string2, $string1, $distance );
    
  if( ($commons1_len = strlen( $commons1 )) == 0) return 0;
  if( ($commons2_len = strlen( $commons2 )) == 0) return 0;

  // calculate transpositions
  $transpositions = 0;
  $upperBound = min( $commons1_len, $commons2_len );
  for( $i = 0; $i < $upperBound; $i++){
   if( $commons1[$i] != $commons2[$i] ) $transpositions++;
  }
  $transpositions /= 2.0;

  // return the Jaro distance
  return ($commons1_len/($str1_len) + $commons2_len/($str2_len) + ($commons1_len - $transpositions)/($commons1_len)) / 3.0;
   }
 
function getCommonCharacters( $string1, $string2, $allowedDistance ){
    
    $str1_len = strlen($string1);
    $str2_len = strlen($string2);
    $temp_string2 = $string2;
     
    $commonCharacters='';
  
    for( $i=0; $i < $str1_len; $i++){
    
   $noMatch = True;

    // compare if char does match inside given allowedDistance
    // and if it does add it to commonCharacters
   for( $j= max( 0, $i-$allowedDistance ); $noMatch && $j < min( $i + $allowedDistance + 1, $str2_len ); $j++){
      if( $temp_string2[$j] == $string1[$i] ){
        $noMatch = False;

	$commonCharacters .= $string1[$i];

	$temp_string2[$j] = '';
      }
    }
  }

  return $commonCharacters;
}

?>