<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        p:nth-child(odd){
            color: red;            
        }
        p:nth-child(even){
            color: blue; 
        }
    </style>
</head>



    <?php
        $rand = random_int(1,9);

        echo "Numero generado: ".$rand."<br>";

        for($i = 1; $i<= $rand; $i++){
            echo "<p>";
            for($j = 0; $j < $i; $j++){
                echo $i;
            }
            echo "</p>";
        }
    ?>