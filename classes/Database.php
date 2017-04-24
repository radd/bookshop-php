<?php
class Database {

    private $db_host = DB_HOST;
    private $db_name = DB_NAME;
    private $db_user = DB_USER;
    private $db_password = DB_PASSW;

    private static $instance = null;
 
    public $connection;
    public $error;
    public $insert_id;
    public $isConnected = false;

   public function __construct() {
        if ($connection = mysql_connect($this->db_host, $this->db_user, $this->db_password)) {
            if(mysql_select_db($this->db_name, $connection)) {
                $this->connection = $connection;
                $this->isConnected = true;
            }
            else {
                $this->error = mysql_error();
                $this->isConnected = false;
            }
        }
        else {
            $this->error = mysql_error();
            $this->isConnected = false;
        }
    }

    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function select($sql) {
        if ($this->connection) {
            if (isset($sql) && $sql != '') {
                if($result = mysql_query($sql)) {
                    return $result;
                } else {
                    $this->error = mysql_error();
                    return false; 
                }
            } 
            else {
                $this->error = 'Brak zapytania SQL';
                return false;
            }
        }
        else {
            $this->error = 'Błąd połączenia z bazą danych';
            return false; 
        }
    }

    public function select_object($sql) {
        $results = $this->select($sql);
        $i=0;
        if($results) {
            $return=array();
            while ($row = mysql_fetch_object($results)) {
                $return[$i] = $row;
                $i++;
            }
        }
        else {
            echo $this->error;
        }
	    return ($i > 0) ? $return : false;
    }
  
    public function insert($sql) {
        if ($this->connection) {
            if (isset($sql) && $sql != '') {
                if($result = mysql_query($sql)) {
		            $this->insert_id = mysql_insert_id($this->connection);
                    return $this->insert_id;
                } else {
                    $this->error = mysql_error();
                    return false; 
                }
            } 
            else {
                $this->error = 'Brak zapytania SQL';
                return false;
            }
        }
        else {
            $this->error = 'Błąd połączenia z bazą danych';
            return false; 
        }
    }

    public function update($sql) {
        return query($sql);
    }
  
    public function delete($sql) {
        return query($sql);
    }
 
    public function query($sql) {
        if (isset($sql) && $sql != '') {
            if ($this->connection) {
                if (mysql_query($sql)) {
                    return true;
                } 
                else {
                    $this->error = mysql_error();
                    return false;
                }  
            }
            else {
                $this->error = 'Brak zapytania SQL';
                return false;
            }
        }
        else {
            $this->error = 'Błąd połączenia z bazą danych';
            return false; 
        }
    }
 
    public function close() {
        if ($this->connection){
            if (mysql_close($this->connection)) {
                $this->isConnected = false;
                return true;
            } 
            else {
                $this->error = mysql_error();
                return false;
            }
        } 
        else {
            $this->error = 'Błąd połączenia z bazą danych';
            return false;
        }
    }

}