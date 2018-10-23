<?php
    require_once '../dal/dal.php';

abstract class BusinessLogic {

    private $dal;

    public function __construct() {
        // var_dump($dal);
        $this->dal = DataAccessLayer::Instance();
    }

    public function getDal(){
        return $this->dal;
    }

    //These are option that are obligated to use JUST when need it, VERY IMPORTANT!!!
    // Not because I take a lantern to a trip I need to use it but HAVE to take it!
    
    abstract function get();
    abstract function set($book);
    abstract function delete();
}

?>