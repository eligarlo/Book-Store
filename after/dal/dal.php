<?php
// Data access layer 
// IMPORTANT dal will be the only one talking with db!!

//final class no one can acces from the outside singletone
final class DataAccessLayer {

	private $host = '127.0.0.1';
	private $db   = 'book_store';
	private $user = 'root';
	private $pass = '';
	private $charset = 'utf8';
    private $dsn;
    private $opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    private static $inst;
    // private __constructor so you can just use it inside the class
    private function __construct() {

        $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
    }
    // the result of the constractor you can bring it outside the class with the public Instance()
    public static function Instance() {
        
        if (DataAccessLayer::$inst === null) {
            DataAccessLayer::$inst = new DataAccessLayer();
        }
        // var_dump(self::$inst);
        return DataAccessLayer::$inst;
    }

    public function select($query) {
        $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        // Gets data from sql (db)
        $stmt = $pdo->query($query);

        return $stmt;
    }
    public function insert($query, $params) {
        $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        // Send data to sql (db)
        $statement = $pdo->prepare($query);
        $statement->execute($params);
    }
}
?>