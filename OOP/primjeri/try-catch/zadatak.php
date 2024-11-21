<?php
/*
Napisati PHP skriptu koja obrađuje registraciju korisnika na web stranici.
Registracija zahtijeva unos korisničkog imena, e-maila i lozinke.
Program treba osigurati da korisničko ime sadrži samo alfanumeričke znakove i da je e-mail adresa valjana.
Ako korisničko ime ili e-mail nisu valjani, treba baciti iznimku.
Ako su podaci ispravni, treba ispisati poruku o uspješnoj registraciji.
*/

class RegistracijaException extends Exception {}

class Registracija {
    public string $username;
    public string $password;
    public string $mail;

    public function __construct(string $username, string $password, string $mail){
        $this -> username = $username;
        $this -> password = $password;
        $this -> mail = $mail;

        if(ctype_alnum($this -> username) && filter_var($this -> mail, FILTER_VALIDATE_EMAIL)){
            echo "Usernme: " . $this -> username . "\n";
            echo "Password: " . $this -> password . "\n";
            echo "E-mail: " . $this -> mail . "\n";
            echo "Uspješna registracija \n";
        }
        else{
            throw new RegistracijaException("Neuspješna registracija, neispravan username i/ili mail. \n");
        }
    }
}

try{
$korisnik = new Registracija("filip", "abc123", "filip@gmail.com");}
    catch(RegistracijaException $e){
        echo "Exception: " . $e->getMessage();
}


    
    
    





