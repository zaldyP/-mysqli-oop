<?php   

class Database
{

    protected $_link;
    protected $_result;
    protected $_numRows;
    private $host;
    private $username;
    private $password;
    private $db;  

    public function __construct()
    {
        $this->db_connect();
    }

    private function db_connect()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->db = 'cms';
        
        $this->_link = new mysqli($this->host, $this->username, $this->password, $this->db);
        return $this->_link; 
    }

    public function disconnect()
    
    {
        mysqli_close($this->_link);
    }

    public function query($sql)
    
    {
        $this->_result = mysqli_query($this->_link,$sql);
        $this->_numRows = mysqli_num_rows($this->_result);

    }


    public function numRows()
    
    {
        return $this->_numRows;
    }


    public function rows()
    
    {
        $rows = array();
        for($x = 0; $x < $this->numRows(); $x++){
            $rows[] = mysqli_fetch_assoc($this->_result);
            
        }
        return $rows;

    }



}