<html>
    <head>
        <title>Json es 1</title>
    </head>
    <body>
    <?php
$filename = "listaOggetti.json";
if (file_exists($filename)&&is_file($filename)) {
    $f = fopen($filename, "r");
    $fileJSON = fread($f, filesize($filename));
    $json = json_decode($fileJSON);
    fclose($f);
    $counter = intval($json->{"counter"});
    $counter++;
    echo $counter;
    $oggetti = $json ->{"oggetti"};
    $oggetti[] = createJson($counter);
    $arrayJSON = [
        "counter" => $counter,
        "oggetti" => $oggetti
    ];
    $f = fopen($filename, "w");
   fwrite($f, json_encode($arrayJSON));

    fclose($f);
    echo'<form action='."frstPage.html".'>
    <h1>Fatto</h1>
    <button>indietro</button>
    </form>';
    
} else {
    $counter = 1;
    $f = fopen($filename, "w");
    $arrayJSON = [
        "counter" => $counter,
        "oggetti" => [
         createJson($counter)
        ]
    ];
    fwrite($f, json_encode($arrayJSON));
    fclose($f);
    echo'<form action='."frstPage.html".'>
    <h1>Fatto</h1>
    <button>indietro</button>
    </form>';
}
$f = fopen($filename, "r");
echo fread($f, filesize($filename));
fclose($f);
function createJson($counter) {
    $oggetto = [
        "id" => $counter,
        "nome" => $_GET["name"],
        "descrizione" => $_GET["description"],
        "prezzo" => $_GET["price"],
        "quantita" => $_GET["amount"],
        "disponibilita" => dis($_GET["amount"])
    ];
    return $oggetto;
}

function dis($qnt){
if($qnt>0){
    return "si";
}else{
    return "no";
}
}
?>
    </body>
</html>