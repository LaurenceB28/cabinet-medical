<?php
require_once __DIR__ . '/../helpers/connect.php';

class Appointment{
    private int $_id;
    private string $_dateHour;
    private int $_idPatients;

    public function getId(): int {
		return $this->_id;
	}
    public function setId(int $id){
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
    public function setIdPatients(int $idPatients){
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
  /**
   * Summary of appointmentsList
   * @return mixed
   */
//   public function appointmentsList()
//   {
//     $db = connect();
//     $sql = 'SELECT `appointments`.`dateHour`, `appointments`.`idPatients`AS`appointment`, `patients`.`id`AS`patient`
//     FROM `appointments` 
//     INNER JOIN `patients` 
//     ON `appointments`.`idPatients`, `appointments`.`dateHour` = `patients`.`id`;';
//     $sth = $db->prepare($sql);
//     return $sth->fetchAll(PDO::FETCH_OBJ);
//   }
// }

public static function appointmentsList()
    {
        $db = connect();
        $sql = 'SELECT patients.id,
        patients.firstname,
        patients.lastname,
        patients.phone,
        patients.mail, 
        appointments.dateHour

        FROM appointments LEFT JOIN patients ON appointments.idPatients = patients.id;';
        $sth = $db->query($sql);
        $sth->execute();
        return $sth->fetchall();

    }
  }




// SELECT `languages`.`name` AS `language`, `frameworks`. `name` AS `framework`
// FROM `languages`
// INNER JOIN `frameworks` ON `languages`.`id` = `frameworks`.`languagesId`;

