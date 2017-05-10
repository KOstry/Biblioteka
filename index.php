<?php


require_once 'api/connection.php';

$books = book::loadAllBooks($conn); 

$book = new book($conn);
$book->setAuthor("Tolkien");
$book->setTitle("Władca Pierscieni");
$book->setYear(1889);

$book2 = new book($conn);
$book2->loadBook(30);
$book2->setYear(2000);
$book2->updateRecord();

$book3 = new book($conn);
$book3->loadBook(28);
$book3->deleteRecord();
var_dump($book3);





















//$sql = "SELECT id, title FROM books";
//$result = $conn->query($sql);
//if ($result->num_rows > 0) {
//    // Wypisz na ekran dane
//    while($row = $result->fetch_assoc()) {
//        echo("id " . $row["id"]) .
//        " tytuł " . $row["title"] ."<br>";
//    }
//}
//else {
//    echo("Brak wyników");
//}
//
//$book = new book($conn);
//$book->insertRecordsToDB('Nędznicy', 'W. Hugo', 1862);
