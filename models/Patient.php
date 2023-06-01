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

  // public function __construct($id, $firstname, $lastname, $birthdate, $phone, $mail)
  // {
  //   $this->_id = $id;
  //   $this->_firstname = $firstname;
  //   $this->_lastname = $lastname;
  //   $this->_birthdate = $birthdate;
  //   $this->_phone = $phone;
  //   $this->_mail = $mail;
  // }

  public function getId()
  {
    return $this->_id;
  }

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

  public function add()
  {
    $db = connect();
    $sql = 'INSERT INTO `patients` (`lastname`,`firstname`,`birthdate`, `phone`, `mail`) 
    VALUES (:lastname,:firstname,:birthdate,:phone,:mail)';
    $sth = $db->prepare($sql);
    $sth->bindValue(':firstname', $this->_lastname);
    $sth->bindValue(':lastname', $this->_firstname);
    $sth->bindValue(':birthdate', $this->_birthdate);
    $sth->bindValue(':phone', $this->_phone);
    $sth->bindValue(':mail', $this->_mail);
    return $sth->execute();
  }

  public function isExist()
  {
    $db = connect();
    $sql = "SELECT `mail` FROM `patients` WHERE `mail`= :mail";
    $sth = $db->prepare($sql);
    $sth->bindValue(':mail', $this->_mail);
    $sth->execute();
    return $sth->fetchColumn();
  }
} 


















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
