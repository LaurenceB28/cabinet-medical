<?php
require_once __DIR__ . '/../helpers/connect.php';

class Appointment
{
  private int $_id;
  private string $_dateHour;
  private int $_idPatients;

  public function getId(): int
  {
    return $this->_id;
  }
  public function setId(int $id)
  {
    $this->_id = $id;
  }
  public function getDateHour()
  {
    return $this->_dateHour;
  }
  public function setDateHour($dateHour)
  {
    $this->_dateHour = $dateHour;
  }
  public function getIdPatients()
  {
    return $this->_idPatients;
  }
  public function setIdPatients(int $idPatients)
  {
    $this->_idPatients = $idPatients;
  }


  /**
   * Summary of add
   * @return bool
   */
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
   * @return array
   */
  public static function appointmentsList(): array
  {
    $db = connect();
    $sql = 'SELECT
        `appointments`.`id` AS `idAppointments`,
        `patients`.`firstname`,
        `patients`.`lastname`, 
        `appointments`.`dateHour`
        FROM `appointments` INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id`;';
    $sth = $db->query($sql);
    return $sth->fetchall();
  }

  /**
   * Summary of appointmentInfos
   * @param mixed $id
   * @return mixed
   */
  public static function appointmentInfo($id)
  {
    $db = connect();
    $sql = 'SELECT
    `appointments`.`id` AS `idAppointments`,
    `patients`.`firstname`,
    `patients`.`lastname`, 
    `appointments`.`dateHour`,
    `appointments`.`idPatients`
    FROM `appointments`INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id` 
    WHERE appointments.id = :idAppointments ;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':idAppointments', $id);
    $sth->execute();
    return $sth->fetch();
  }
  /**
   * Summary of modify
   * @param mixed $id
   * @return mixed
   */
  public function modify(): mixed
  {
    $db = connect();
    $sql = 'UPDATE `appointments` 
SET `appointments`.`dateHour` = :dateHour,
`appointments`.`idPatients` = :idPatients
WHERE `appointments`.`id` = :id;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':id', $this->_id, PDO::PARAM_INT);
    $sth->bindValue(':dateHour', $this->_dateHour);
    $sth->bindValue(':idPatients', $this->_idPatients, PDO::PARAM_INT);
    return $sth->execute();
  }

  /**
   * Summary of displayAppointments
   * @param mixed $id
   * @return array
   */
  public static function displayAppointments($idPatients)
  {
    $db = connect();
    $sql = 'SELECT `appointments`.`id` AS `idAppointments`,
      `appointments`.`dateHour`,
    `appointments`.`idPatients` 
    FROM `appointments` 
    WHERE  `idPatients` = :idPatients;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':idPatients', $idPatients, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetchAll();
  }

  /**
   * Summary of deleteAppointment
   * @return bool
   */
  public static function deleteAppointment($id) /* supprime un rdv via son id de rdv*/
  {
    $db = connect();
    $sql = 'DELETE FROM `appointments` 
    WHERE `id` = :id ;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    return $sth->execute();
  }

  public static function deleteAll($id) /* supprime tout les rendez vous d'un patient, donc doit être un id de patient */
  {
    $db = connect();
    $sql = 'DELETE FROM `appointments` 
    WHERE `idPatients` = :id ;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    return $sth->execute();
  }

  
}

