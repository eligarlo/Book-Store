<?php

    require_once 'bl.php';
    require_once '../model/book_model.php';

    class BusinessLogicBooks extends BusinessLogic
    {
        
        public function get(){

            $q = 'SELECT * FROM `books`';

            $result = $this->getDal()->select($q);
            $resultsArray = [];

            while ($row = $result->fetch()) {
                array_push($resultsArray, new BookModel($row));
            }
            var_dump($resultsArray);
            return $resultsArray;
            //return $this->getDal()->select();
        }

        public function set($b){

            $query = "INSERT INTO books (book_name, author, price) 
            VALUES (:bn, :ba, :bp)";
            
            $params = array(
                "bn" => $b->getBookName(),     
                "ba" => $b->getBookAuthor(),   
                "bp" => $b->getBookPrice()
            
            );       
            print_r($params);

            $this->getDal()->insert($query, $params);
        }

        public function delete(){


        }
}



?>