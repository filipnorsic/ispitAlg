<?php 

const ZADATAK = "words.json";


function ucitajRijeci(): array {
    if (!file_exists(ZADATAK)) {
        return [];
    }
    $rijeci = file_get_contents(ZADATAK);

    return json_decode($rijeci, true);
}


function spremiRijec(array $rijeci): void {
    $jsonRijeci = json_encode($rijeci, JSON_PRETTY_PRINT);
    file_put_contents(ZADATAK, $jsonRijeci);
}

function dodajRijec(string $rijec) {
    $rijeci = ucitajRijeci();

    $rijeci[] = [
        
        "rijec" => $rijec
    ];
    spremiRijec($rijeci);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST['rijec']) && !empty($_POST['rijec'])){
        dodajRijec($_POST['rijec']);
    }

    header('Location: ' . $_SERVER['PHP_SELF']);

}

$ispis = ucitajRijeci();

function brojSlova($broj_slova){
    $broj = mb_strlen($broj_slova);
    echo $broj;
}

function brojSamoglasnika($brojSamoglanika) {
    echo substr_count($brojSamoglanika, 'a')+substr_count($brojSamoglanika, 'e')+substr_count($brojSamoglanika, 'i')+substr_count($brojSamoglanika, 'o')+substr_count($brojSamoglanika, 'u')+substr_count($brojSamoglanika, 'A')+substr_count($brojSamoglanika, 'E')+substr_count($brojSamoglanika, 'I')+substr_count($brojSamoglanika, 'O')+substr_count($brojSamoglanika, 'U');
}

function brojSuglasnika($brojSuglasnika){
    $ukupno = mb_strlen($brojSuglasnika);
    $samoglasnici = substr_count($brojSuglasnika, 'a')+substr_count($brojSuglasnika, 'e')+substr_count($brojSuglasnika, 'i')+substr_count($brojSuglasnika, 'o')+substr_count($brojSuglasnika, 'u')+substr_count($brojSuglasnika, 'A')+substr_count($brojSuglasnika, 'E')+substr_count($brojSuglasnika, 'I')+substr_count($brojSuglasnika, 'O')+substr_count($brojSuglasnika, 'U');
    $suglasnici = $ukupno - $samoglasnici;
    echo $suglasnici;
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcijalni ispit</title>
</head>
<body>

<form action="" method="post">
    Upišite riječ:
    <input type="text" name="rijec" id="rijec" >
    <button type="submit">Pošalji</button>
</form>


<table border="1px">
<tr>
    <th>Riječ</th>
    <th>Broj slova</th>
    <th>Broj suglasnika</th>
    <th>Broj samoglasnika</th>
  </tr>

  <?php foreach ($ispis as $vrijednost): ?>
    <tr>
        <td>
    <?php echo htmlspecialchars($vrijednost['rijec']); ?>
        </td>
        <td><?php brojSlova($vrijednost['rijec']) ?></td>
        <td><?php brojSuglasnika($vrijednost['rijec']) ?></td>
        <td><?php brojSamoglasnika($vrijednost['rijec']) ?></td>
    </tr>
    <?php endforeach; ?>


   
  
</table>


    
</body>
</html>