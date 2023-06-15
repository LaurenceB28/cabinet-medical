<?php
require_once __DIR__ . '/../helpers/connect.php';

class Patient
{
  private string $_id;
  private string $_firstname;
  private string $_lastname;
  private string $_birthdate;
  private string $_mail;
  private string $_phone;


  /**
   * Summary of getId
   * @return string
   */
  public function getId()
  {
    return $this->_id;
  }

  /**
   * Summary of setId
   * @param mixed $id
   * @return void
   */
  public function setId($id)
  {
    $this->_id = $id;
  }

  public function getFirstname(): string
  {
    return $this->_firstname;
  }

  public function setFirstname(string $firstname)
  {
    $this->_firstname = $firstname;
  }

  public function getLastname(): string
  {
    return $this->_lastname;
  }

  public function setLastname(string $lastname)
  {
    $this->_lastname = $lastname;
  }

  public function getBirthdate(): string
  {
    return $this->_birthdate;
  }

  public function setBirthdate(string $birthdate)
  {
    $this->_birthdate = $birthdate;
  }

  public function getMail(): string
  {
    return $this->_mail;
  }

  public function setMail(string $mail)
  {
    $this->_mail = $mail;
  }



  public function getPhone(): string
  {
    return $this->_phone;
  }

  public function setPhone($phone)
  {
    $this->_phone = $phone;
  }

  /**
   * Summary of add
   * @return bool
   */
  public function add()
  {
    $db = connect();
    $sql = 'INSERT INTO `patients` (`lastname`,`firstname`,`birthdate`, `phone`, `mail`) 
    VALUES (:lastname,:firstname,:birthdate,:phone,:mail);';
    $sth = $db->prepare($sql);
    $sth->bindValue(':firstname', $this->_lastname);
    $sth->bindValue(':lastname', $this->_firstname);
    $sth->bindValue(':birthdate', $this->_birthdate);
    $sth->bindValue(':phone', $this->_phone);
    $sth->bindValue(':mail', $this->_mail);
    return $sth->execute();
  }

  /**
   * Summary of isExist
   * @return mixed
   */
  public function isExist()
  {
    $db = connect();
    $sql = 'SELECT `mail` FROM `patients` WHERE `mail`= :mail;'; //:mail = marqueur nominatif
    $sth = $db->prepare($sql);
    $sth->bindValue(':mail', $this->_mail);
    $sth->execute();
    return $sth->fetch();
  }

  /**
   * Summary of patientList
   * @return array
   */
  public static function patientList()
  {
    $db = connect();
    $sth = $db->query('SELECT `id`,`lastname`,`firstname`,`birthdate`, `phone`, `mail` FROM `patients`;');
    return $sth->fetchAll(PDO::FETCH_OBJ);
  }
  /**
   * Summary of get
   * @return mixed
   */
  public static function get(int $id)
  {
    $db = connect();
    $sql = 'SELECT `lastname`,`firstname`,`birthdate`, `phone`, `mail` FROM `patients` WHERE `id`= :id;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':id', $id);
    $sth->execute();
    return $sth->fetch();
  }

  /**
   * Summary of updatePatient
   * @param mixed $id
   * @return mixed
   */
  public function update():bool
  {
    $db = connect();
    $sql = 'UPDATE `patients` SET
      `lastname`= :lastname,
      `firstname`= :firstname,
      `birthdate`= :birthdate, 
      `phone` = :phone, 
      `mail` = :mail 
      WHERE `id`= :id;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':id', $this->_id);
    $sth->bindValue(':lastname', $this->_lastname);
    $sth->bindValue(':firstname', $this->_firstname);
    $sth->bindValue(':birthdate', $this->_birthdate);
    $sth->bindValue(':phone', $this->_phone);
    $sth->bindValue(':mail', $this->_mail);
    return $sth->execute();
  }

  public static function deletePatient($id)
  {
    $db = connect();
    $sql = 'DELETE FROM `patients` WHERE `id` = :id ;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    return $sth->execute();
  }
  public static function search($search)
  {
    $db = connect();
    $sql = 'SELECT * FROM `patients` WHERE `firstname` LIKE  :search OR  `lastname` LIKE :search ;';
    $sth = $db->prepare($sql);
    $sth->bindValue(':search','%'.$search.'%' ); //'%'=(commence par).$search. '%' permet la recherche soit par la premiere lettre ou par les suivantes ex: 'Lau' ou 'au'//
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_OBJ);
  }

  public static function paging()
  {
    $db = connect();
    $sql = 'SELECT * FROM `patients` ORDER BY `id` DESC LIMIT 0,10 ;';
    $sth = $db->prepare($sql);
    return $sth->execute();
  }
}

//* methode static n'HYDRATE rien, ne récupère rien d'un formulaire *//




















// function isEmailExist()
// {
//   $db = connect();
//   $sth = $db->query('SELECT `mail` FROM `patients` WHERE email = ?');
//   $sth->bindValue(1, $email);
//   $sth = execute();
//   if($sth->rowCount() > 0){
//     echo 'parfait!';
//   }else{
//     echo 'email déja existant';
//   }
// }


// public function patients-list()
// {
//     $patients-list = $this->db->query("SELECT * FROM patients");
//     $patients-list = $patients-list->fetchAll();
//     return $patients-list;
// }

// public function deletePatient() {

//   $deletePatient = $this->db->prepare("DELETE FROM patients
//   WHERE id = :id");
//   $deletePatient->bindValue(':id', $this->getId(), PDO::PARAM_INT);
//   if ($deletePatient->execute()) {
//       return true;
//   } else {
//       echo 'erreur';
//   }
