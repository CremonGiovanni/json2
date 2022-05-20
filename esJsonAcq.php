<html>
    <head>
        <title>cerca</title>
    </head>
    <body>
        <?php
        $filename = "listaOggetti.json";
            $f = fopen($filename, "r");
            $fileJSON = fread($f, filesize($filename));
            $json = json_decode($fileJSON);

            fclose($f);
            
            $counter=$json->{"counter"};
            $oggetti = $json ->{"oggetti"};
            $arrayJSON = [
                "counter" => $counter,
                "oggetti" => $oggetti
            ];
            for($i=0;$i<$counter;$i++){
                if($oggetti[$i]==$_GET["acq"]){
                    if($oggetti[$i]->{"disponibilita"}=="si"){
                        $oggetti[$i]->{"quantita"}-=$_GET["number"];
                        $f = fopen($filename, "w");
                        fwrite($f, json_encode($arrayJSON));
                         fclose($f);
                    }else{
                        echo"<h1>non disponibile</h1>";
                    }
                }else if($i==$counter){
                    echo"<h1>Ogetto non trovato</h1>";
                }
            }


        ?>
                <form action="frstPage.html">
        <button>indietro</button>
    </form>
    </body>
</html>