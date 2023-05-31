<?php
require_once __DIR__ . '/../helpers/connect.php';

class Patient
{
  private string $_id;
  private string $_firstname;
  private string $_lastname;
  private string $_birthdate;
  private string $_mail;
  private string $_phoneNumber;

  public function __construct($id, $lastname, $firstname, $birthdate, $mail, $phoneNumber)
  {
    $this->_id = $id;
    $this->_lastname = $lastname;
    $this->_firstname = $firstname;
    $this->_birthdate = $birthdate;
    $this->_mail = $mail;
    $this->_phoneNumber = $phoneNumber;
    // parent::__construct();
  }

  public function getId(){
    return $this->_id;
  }

  public function setId(){
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

  public function getEmail(): string
  {
    return $this->_mail;
  }

  public function setEmail(string $mail)
  {
    $this->_mail = $mail;
  }



  public function getPhone(): string
  {
    return $this->_phoneNumber;
  }

  public function setPhoneNumber($phoneNumber)
  {
    $this->_phoneNumber = $phoneNumber;
  }
}

public function add(){
  $db = connect();
  $sth = $db->query('INSERT INTO `patients`(firstname, lastname, birthdate, phone, mail) VALUES ()');
  $isExist = $patient;
  // var_dump($isExist); 
  if(!$isExist){
      echo 'nouveau patient enregistré';
    }else{
      'une erreur est survenue';
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





