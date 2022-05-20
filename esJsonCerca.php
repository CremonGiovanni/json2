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
    $oggetto = $json->{"oggetti"};

    for ($i = 0; $i < $json->{"counter"}; $i++) {
        if ($oggetto[$i]->{"nome"} == $_GET["cerca"]) {
            echo "ID: " . $oggetto[$i]->{"id"} . "<br/>Nome: " .
                $oggetto[$i]->{"nome"} . "<br/>Descrizione: " .
                $oggetto[$i]->{"descrizione"} . "<br/>Prezzo: " .
                $oggetto[$i]->{"prezzo"} . "<br/>Quantita: " .
                $oggetto[$i]->{"quantita"} . "<br/>Disponibilita: " .
                $oggetto[$i]->{"disponibilita"};
            break;
        } else if($i==$json->{"counter"}){
            echo"<h1>Ogetto non trovato</h1>";
           
        }
    }

    ?>
    <form action="frstPage.html">
        <button>indietro</button>
    </form>
</body>

</html>