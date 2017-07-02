<?php
$array1=array();
            $preference=$_POST["preference"];
            
            $temp=$array[$preference];
            $array[$preference]=$array[0];
            $array[0]=$temp;
            
            for ($index1 = 1; $index1 < 12; $index1++) {
                $array1[$index1-1]=$array[$index1];
            }
            rsort($array1);
            
            for ($index1 = 1; $index1 < 12; $index1++) {
                $array[$index1]=$array1[$index1-1];
            }
            
            $alpha = 0.0;
            for ($index2 = 0; $index2 < 12; $index2++) {
                $alpha += (12-$index2-1)*$array[$index2];
            }
            $alpha = $alpha/((12-1)*10);
            //echo "<br><br>alpha=".round($alpha,3);
            if($alpha>0.5){
                $alpha=1-$alpha;
            }
            $min = 10000000;
            $w=array();
            $w[0]=$alpha;
            for ($i = 1; $i <= 11; $i++) {
                $w[$i]=(1-$alpha)/11;
            }
            
            $trust = 0.0;
            for ($i = 0; $i < 12; $i++) {
                $trust += $array[$i]*$w[$i]*100;
            }
            
            echo '<br><br>Trust score based on profile matching='.round($trust,2)."%<br>";    
            $conn->exec("TRUNCATE friend1");
            $conn->exec("TRUNCATE friend2");
            if($trust>=40){
                echo "The user is trustworthy enough according to our system. Do you want to accept friend request?<br><button><a href='./confirmfriend.php'>Yes</button><button><a 				href='./declinerequest.php'>No</button><button><a href='./pendingrequest.php'>Change 					Preference</a></button>";
            }
            else {
                echo "The user is not much trustworthy according to our system. Do you want to accept friend request?<br><button><a href='./confirmfriend.php'>Yes</button><button><a 				href='./declinerequest.php'>No</button><button><a href='./pendingrequest.php'>Change 					Preference</a></button>";
?>