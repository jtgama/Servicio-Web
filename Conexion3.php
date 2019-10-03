<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

class db
{
	
  private $host = 'localhost';
  private $dbName = 'Angelesbici';
  private $user = 'root';
  private $pass = '';
  
  private $dbh;
  private $error;
  private $qError;
  
  private $stmt;
  
  public function __construct(){
      //dsn for mysql
    $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName.";charset=utf8";
	//$dsn='mysql:host=$host;dbname=$dbName;charset=utf8';
    $options = array(
        PDO::ATTR_PERSISTENT    => true,
        PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
		//PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf-8'
        );
		
    
    try{
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    }
    //catch any errors
    catch (PDOException $e){
        $this->error = $e->getMessage();
    }
    
  }
  
  public function query($query){
      $this->stmt = $this->dbh->prepare($query);
  }
  
  public function bind($param, $value, $type = null){
      if(is_null($type)){
          switch (true){
              case is_int($value):
                $type = PDO::PARAM_INT;
                break;
              case is_bool($value):
                  $type = PDO::PARAM_BOOL;
                  break;
              case is_null($value):
                  $type = PDO::PARAM_NULL;
                  break;
              default:
                  $type = PDO::PARAM_STR;
          }
      }
    $this->stmt->bindValue($param, $value, $type);
  }
  
  public function execute(){
      return $this->stmt->execute();
      
      $this->qError = $this->dbh->errorInfo();
        if(!is_null($this->qError[2])){
	        echo $this->qError[2];
        }
        echo 'done with query';
  }

  public function resultado(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }
  
  public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
  }
  
  public function rowCount(){
      return $this->stmt->rowCount();
  }
  
  public function lastInsertId(){
      return $this->dbh->lastInsertId();
  }
  
  public function beginTransaction(){
      return $this->dbh->beginTransaction();
  }
  
  public function commit(){
      return $this->dbh->commit();
  }
  
  public function rollBack(){
      return $this->dbh->rollBack();
  }
  
  public function debugDumpParams(){
      return $this->stmt->debugDumpParams();
  }
  
  public function queryError(){
      $this->qError = $this->dbh->errorInfo();
      if(!is_null($this->qError[2])){
          echo qError[2];
      }
  }
  
}//end class db
?>