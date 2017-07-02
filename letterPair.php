<?php 
    function letterPair($tokensA, $tokensB)
    {
        $string1 = implode($tokensA);
	$string2 = implode($tokensB);
	if (mb_strlen($string1, 'UTF-8') + mb_strlen($string2, 'UTF-8') == 0 || 0 == strcmp($string1, $string2)) {
            return 1.0;
        }
        $pairs1 = wordLetterPairs($string1);
        $pairs2 = wordLetterPairs($string2);
        $intersection = 0;
        $union = count($pairs1) + count($pairs2);
        foreach ($pairs1 as $pair1) {
            foreach ($pairs2 as $key => $pair2) {
                if ($pair1 == $pair2) {
                    $intersection++;
                    unset($pairs2[$key]);
                    break;
                }
            }
        }
        return (2.0*$intersection)/$union;
    }
    
    function wordLetterPairs($string)
    {
        $allPairs = array();
        $words = explode(' ', $string);
        foreach ($words as $word) {
            $pairsInWord = letterPairs($word);
            foreach ($pairsInWord as $pair) {
                $allPairs[] = $pair;
            }
        }
        return $allPairs;
    }
 
	
    function letterPairs($string)
    {
        $numPairs = mb_strlen($string, 'UTF-8') - 1;
        $pairs = array();
        for ($i = 0; $i < $numPairs; $i++) {
            $pairs[] = mb_substr($string, $i, 2, 'UTF-8');
        }
        return $pairs;
    }
