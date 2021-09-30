<?php
    $var1 = random_int(1,10);
    $var2 = random_int(1,10);
    echo "<br> x = ".$var1;
    echo "<br> y = ".$var2;

    echo "<br> ".$var1." + ".$var2." = ".($var1+$var2);
    echo "<br> ".$var1." - ".$var2." = ".($var1-$var2);
    echo "<br> ".$var1." * ".$var2." = ".($var1*$var2);
    echo "<br> ".$var1." / ".$var2." = ".($var1/$var2);
    echo "<br> ".$var1." % ".$var2." = ".($var1%$var2);
    
    $pot = $var1;
    for($i=1; $i<$var2; $i++){
        $pot = $pot * $var1;
    }
    echo "<br> ".$var1." ** ".$var2." = ".$pot;
?>