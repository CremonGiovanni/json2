<html>

<head>
    <title>visualizza</title>
</head>

<body>
    <table border="1" name="tb">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Prezzo</th>
            <th>Quantita</th>
            <th>Disponibilita</th>
        </tr>
        <?php
        $filename = "listaOggetti.json";
        $f = fopen($filename, "r");
        $fileJSON = fread($f, filesize($filename));
        $json = json_decode($fileJSON);
        fclose($f);

        $oggetto = $json->{"oggetti"};
        for ($i = 0; $i < $json->{"counter"}; $i++) {

            echo "<tr>
                    <td>" . $oggetto[$i]->{"id"} . "</td>
                    <td>" . $oggetto[$i]->{"nome"} . "</td>
                    <td>" . $oggetto[$i]->{"descrizione"} . "</td>
                    <td>" . $oggetto[$i]->{"prezzo"} . "</td>
                    <td>" . $oggetto[$i]->{"quantita"} . "</td>
                    <td>" . $oggetto[$i]->{"disponibilita"} . "</td>
                  </tr>";
        }

        ?>
    </table>

    <form action="frstPage.html">
        <button>indietro</button>
    </form>
</body>

</html>