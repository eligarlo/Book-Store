<?php

    require_once 'bl.php';
    require_once '../model/book_model.php';

    class BusinessLogicBooks extends BusinessLogic
    {
        
        public function get(){

            $q = 'SELECT * FROM `books`';

            $result = $this->dal->select($q);
            $resultsArray = [];

            while ($row = $result->fetch()) {
                array_push($resultsArray, new BookModel($row));
            }

            return $this->dal->get();
        }

        public function set($b){

            $query = "INSERT INTO `books`(`book_name`, `author`, `price`) 
            VALUES (':bn', ':ba', :bp)";

            $params = array(
                "bn" => $b->getBookName(),     
                "ba" => $b->getBookAuthor(),   
                "bp" => $b->getBookPrice()
            );

            $this->dal->insert($query, $params);
        }

        public function delete(){


        }
}



?>