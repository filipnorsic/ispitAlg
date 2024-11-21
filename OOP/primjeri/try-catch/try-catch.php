<?php


try {
    throw new Exception("Došlo je do greške");
    } catch (Exception $e) {
    echo $e->getMessage();
    } finally {
    echo "Ovo se uvijek izvodi.";
    }

  /*************************************************************************************/  
    
    try {
    $file = fopen("ne_postoji.txt", "r");
    if (!$file) {
    throw new Exception("Datoteka ne postoji.");
    }
    } catch (Exception $e) {
    echo "Greška: " . $e->getMessage();
    }

    /*************************************************************************************/
    
    class MyCustomException extends Exception {
    // Prilagođene funkcije ili poruke
    }

   /*************************************************************************************/ 
    
    function validateAge($age) {
    if ($age < 0) {
    throw new InvalidArgumentException("Starost ne može biti negativna.");
    }
    echo "Valjana starost";
    }
    try {
    validateAge(-1);
    } catch (InvalidArgumentException $e) {
    echo "Greška: " . $e->getMessage();
    }

/*************************************************************************************/


    function processFile($filename) {
        try {
        $file = fopen($filename, "r");
        if (!$file) {
        throw new Exception("Datoteka ne može biti otvorena.");
        }
        // Obradi podatke iz datoteke
        while (!feof($file)) {
        $line = fgets($file);
        // Pretpostavimo da postoji neka specifična logika obrade ovdje
        }
        fclose($file);
        /*  } catch (FileNotFoundException $e) {    */
        // Specifična obrada za slučaj kada datoteka nije pronađena
        echo "Greška: " . $e->getMessage();
        } catch (Exception $e) {
        // Opća obrada za sve ostale iznimke
        echo "Došlo je do greške: " . $e->getMessage();
        } finally {
        echo "Proces obrade je završen.";
        }
        }

/*************************************************************************************/
    