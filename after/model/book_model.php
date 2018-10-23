<?php

    class BookModel /* extends Model */ {
        
        // private $book_id;       // auto increment
        private $arr;
        private $book_name;
        private $author;
        private $price;

        public function __construct($arr){

            if (!empty($arr)) {

                // $this->book_id = $arr['id'];
                $this->book_name = $arr['book_name'];
                $this->author = $arr['author'];
                $this->price = $arr['price'];
            }
        }

        // function getBookId(){
        //     return $this->book_id;
        // }

        function getBookName(){
            return $this->book_name;
        }
        function getBookAuthor(){
            return $this->author;
        }
        function getBookPrice(){
            return $this->price;
        }
    }

?>