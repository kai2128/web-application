<?php


class Database
{
    private static $obj = null;

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'shoesy';
    private $db_port = '3306';
    private $link;

    //connect to databse
    private function __construct($config = array())
    {
        if(!empty($config)){
            $this->db_host = $config['db_host'];
            $this->db_user = $config['db_user'];
            $this->db_pass = $config['db_pass'];
            $this->db_name = $config['db_name'];
            $this->db_port = $config['db_port'];
        }

        $this->connect();
        $this->selectDb();
    }
    //eachpage connect
    public static function getInstance($config=array())
    {
        if (!self::$obj instanceof self) {
            self::$obj = new self($config);
        }

        return self::$obj;
    }

    //private sql : select
    //success return object, failed return false
    private function query($sql)
    {
        //ex: SELECT * FROM student
        //check is select
        if(substr($sql,0,6) != 'SELECT'){
            echo 'Only select can be executed';
            die();
        }

        return mysqli_query($this->link, $sql);
    }
    //check connect to database
    private function connect(){
        if(!$this->link = new mysqli($this->db_host,$this->db_user,$this->db_pass)){
            echo "Connection to database failed";
            die();
        }
    }

    private function selectDb(){
        if(!mysqli_select_db($this->link, $this->db_name)){
            echo "Selection of database failed";
            die();
        }
    }

    public function exec($sql){
        //check is select
        if(substr($sql,0,6) == 'SELECT'){
            echo 'Cannot execute select';
            die();
        }

        return mysqli_query($this->link, $sql);
    }
    //fetch one row, type indicate return type
    public function fetch($sql, $type=MYSQLI_ASSOC){
        $result = $this->query($sql);

        return mysqli_fetch_array($result,$type);
    }

    public function fetchAll($sql, $type=MYSQLI_ASSOC){
        $result = $this->query($sql);

        return mysqli_fetch_all($result,$type);
    }

    //get row count of the command
    public function rowCount($sql)
    {
        $result = $this->query($sql);

        return mysqli_num_rows($result);
    }
    public function getResult($sql){
        return $this->query($sql);
    }
}








