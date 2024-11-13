<?php

const BOOKS_FILE = "books.json";

//učitavanje knjiga iz json datoteke

function loadBooks(string $path = BOOKS_FILE):array{
    if(!file_exists($path)){
        return [];
    }
    $books = file_get_contents($path);
    return json_decode($books, true);

}


//spremanje knjiga u json datotku

function saveBooks(array $books, string $path = BOOKS_FILE): void {
    $jsonBooks = json_encode($books, JSON_PRETTY_PRINT);
    file_put_contents($path, $jsonBooks);
}

//dodavanje nove knjige

function addBook(string $title, string $author, int $year):int{
    $books = loadBooks();
    $newId = empty($books) ? 1 : max(array_column($books, "id")) + 1;   //provjeri da li ima koja knjiha(id), ako nema vrati 1, ako ima uzme najveci i poveca ga za 1
    $books[] = [
        "id" => $newId,
        "title" => $title,
        "author" => $author,
        "year" => $year
    ];
    saveBooks($books);

    return $newId;

}


//ažuriranje postojeće knjige

function updateBook(int $id, ?string $title = null, ?string $author = null, ?int $year = null):bool{     //ovi sa upitnicima mogu biti string ili NULL

    $books = loadBooks();
    foreach ($books as &$book){             //referenca
        if($books["id"] === $id){
            $book["title"] = $title ?? $book["title"]; //da li je u title null
            $book["author"] = $title ?? $book["author"];
            $book["year"] = $title ?? $book["year"];   
            saveBooks($books);
            return true;
        }
    }
    return false;
}

//dohvati knjigu po id-u

function getBookById (int $id) : ?array{

    $books = loadBooks();
    foreach ($books as $book) {
        if ($book['id'] === $id) {
            return $book;
        } }
    return null;

}

//brisanje knjige po id-u

function deleteBook(int $id): bool{
    $books = loadBooks();
    $newBooks = array_filter($books, function($book) use ($id){
        return $book["id"] !== $id;
    });
    if(count($books)=== count($newBooks)){
        return false;
    }
    saveBooks($newBooks);
    return true;
}





