<?php
/*
Zadatak Napravite PHP klasu pod nazivom Book koja predstavlja knjigu u knjižnici. 
Klasa bi trebala ima� sljedeća svojstva i metode: Svojstva:
 - $�tle: Naslov knjige - $author: Autor knjige -
  $isbn: ISBN broj knjige - $available: Booleova vrijednost koja pokazuje je li knjiga dostupna za posudbu (točno ili netočno).
  
  Metode: __construct($�tle, $author, $isbn): Metoda konstruktora za postavljanje naslova, autora i ISBN broja nakon stvaranja objekta. 
  Knjiga bi trebala bi� dostupna prema zadanim postavkama. 
  borrow(): Metoda za posuđivanje knjige. Ako je knjiga dostupna, postavite $available na false i vra�te true. A
  ko knjiga nije dostupna, vra� false. returnBook(): Metoda za vraćanje knjige. Ovo postavlja $available na true. 
  getInfo(): Tekstualni prikaz koji sadrži informacije o knjizi (naslov, autor, ISBN). 


*/



class Book{
    public $title;
    public $author;
    public $ISBN;
    public bool $available;

public function __construct($title, $author, $ISBN){
    $this->title = $title;
    $this->author = $author;
    $this->ISBN = $ISBN;
    $this->available = true;
}

public function borrow(){
    if($this->available){
        $this->available = false;
        return true;
    }else{return false;}
    }

public function returnBook(){
    $this->available = true;
}

public function getInfo(){
    echo "Naslov: " . $this->title . "<br>";
    echo "Autor: " . $this->author . "<br>";
    echo "ISBN: " . $this->ISBN . "<br>";
    if($this->available){
        echo "Knjiga je dostupna" . "<br>";
}   else{
        echo "Knjiga nije dostupna" . "<br>";}
    }


}

$book1 = new Book("Naslov1", "Autor1", "ISBN1");

$book1->getInfo();
$book1->borrow();
$book1->getInfo();
$book1->returnBook();
$book1->getInfo();