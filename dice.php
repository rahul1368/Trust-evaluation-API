<?php
 
function dice($tokensA, $tokensB)
{
    $a = implode($tokensA);
    $b = implode($tokensB);
    $az=zerleg($a);
    $ac=count($az);
     
    $bz=zerleg($b);
    $bc=count($bz);
     
    $is=array_intersect($az, $bz);
    $ic=count($is);
     
    return 2 * $ic / ($ac + $bc);
}
 
function zerleg($str)
{
    $a=strtolower($str);
    $len=strlen($a);
         
    for($n=2;$n<$len;$n++)
        for($i=0 ; $i+$n<=$len ; $i++)
            $arr[]=substr($a,$i,$n);
    return $arr;
}
 
 
 
?>