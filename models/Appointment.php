<?php
require_once __DIR__ . '/../helpers/connect.php';

class Appointment{
    private string $_id;
    private string $_dateHour;
    private string $_idPatients;

    public function getId(): string {
		return $this->_id;
	}
    public function setId(string $id){
		$this->_id = $id;
}
    public function getDateHour(){
    return $this->_dateHour;
  }
    public function setDateHour($dateHour){
    $this-> _dateHour = $dateHour;
  }
  public function getIdPatients(){
    return $this->_idPatients;
  }
    public function setIdPatients($idPatients){
    $this-> _idPatients = $idPatients;
  }
  public function add()
  {
    $db = connect();
    $sql = 'INSERT INTO `appointments` (`dateHour`,`idPatients`)
    VALUES (:dateHour,:idPatients);';
    $sth = $db->prepare($sql);
    $sth->bindValue(':dateHour', $this->_dateHour);
    $sth->bindValue(':idPatients', $this->_idPatients);
    return $sth->execute();
  }
}







// public function appointment()
//   {
//     $db = connect();
//     $sql = 'SELECT `lastname`= :lastname,
//     `firstname`= :firstname, `id` = :id
//     FROM `patients` 
//     LEFT JOIN `appointments` 
//     ON `patients`.`id` = `appointments`.`idPatients`;';
//     $sth = $db->prepare($sql);
//     $sth->bindValue(':idPatients', $this->_id);
//     $sth->bindValue(':lastname', $this->_lastname);
//     $sth->bindValue(':firstname', $this->_firstname);
//     $sth->execute();
//     return $sth->fetch();
//   }