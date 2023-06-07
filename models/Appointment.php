<?php
require_once __DIR__ . '/../helpers/connect.php';

class Appointment{
    private string $_dateAppointment;

    public function __construct($dateAppointment)
    {
        $this-> _dateAppointment = $dateAppointment;
    }
    public function getAppointment(): string {
		return $this->_dateAppointment;
	}
    public function setAppointment(string $dateAppointment){
		$this->_dateAppointment = $dateAppointment;
}
}

public function appointment()
  {
    $db = connect();
    $sql = 'SELECT `lastname`= :lastname,
    `firstname`= :firstname, `id` = :id
    FROM `patients` 
    LEFT JOIN `appointments` 
    ON `patients`.`id` = `appointments`.`idPatients`;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':idPatients', $this->_id);
    $sth->bindValue(':lastname', $this->_lastname);
    $sth->bindValue(':firstname', $this->_firstname);
    $sth->execute();
    return $sth->fetch();
  }