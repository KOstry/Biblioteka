<?php

class Book {

    private $db = null, 
            $id = -1,
            $title,
            $author,
            $year;
    
    public function insertRecordsToDB() {
        $insertQuery = "INSERT INTO books (title, author, year) VALUES ('{$this->title}', '{$this->author}', $this->year)";
        $this->db->query($insertQuery);
        $this->id = $this->db->insert_id;
        
    }
    
    public function loadBook($id) {
        $loadBookQuery = "SELECT * FROM books WHERE id={$id}";
        $book = $this->db->query($loadBookQuery)->fetch_assoc();
        var_dump($book);
        $this->id = $book["id"];
        $this->setAuthor($book['author']);
        $this->setTitle($book["title"]);      
        $this->setYear($book["year"]);    
        return $this;
    }
    
    
    
    public static function loadAllBooks($db) {  //funkcja niestatyczna odwoływałaby się do obiektu
        $loadArray = [];
        $load = "SELECT * FROM books";
        $result = $db->query($load);
        if ($result->num_rows > 0) {
            // Wypisz na ekran dane
            while($row = $result->fetch_assoc()) {
                
                $loadArray[]=$row;
                
            }
        }
        return $loadArray;
    }
    
    public function updateRecord(){
        $updateQuery = "UPDATE books SET title='$this->title', author='$this->author', year=$this->year WHERE id='$this->id'";
        echo $updateQuery;
        $this->db->query($updateQuery);
        return $this;
    }
    
    public function deleteRecord() {
        $deleteQuery = "DELETE FROM books WHERE id='$this->id'";
        $this->db->query($deleteQuery);
        return $this;
        
    }
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getAuthor() {
        return $this->author;
    }

    function getYear() {
        return $this->year;
    }

    
   function __construct($db) {
        $this->db = $db;
        
    }
    function setTitle($title) {
        $this->title = $title;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setYear($year) {
        $this->year = $year;
    }


//
//    public function getBookId($book) {
//        return $this->
//    }

}
