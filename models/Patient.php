<?php
require_once __DIR__ . '/../helpers/connect.php';

class Patient{
    private string $_id;
    private string $_firstname;
    private string $_lastname;
    private string $_birthdate;
    private string $_mail;
    private string $_phoneNumber;

    public function __construct($id,$lastname, $firstname, $birthdate, $mail, $phoneNumber)
    {
        $this->_id = $id;
        $this-> _lastname = $lastname;
        $this-> _firstname = $firstname;
        $this-> _birthdate = $birthdate;
        $this-> _mail = $mail;
        $this-> _phoneNumber = $phoneNumber;
        // parent::__construct();
    }

    public function getFirstname(): string {
		return $this->_firstname;
	}

    public function setFirstname(string $firstname){
		$this->_firstname = $firstname;
	}

    public function getLastname(): string {
		return $this->_lastname;
	}

    public function setLastname(string $lastname){
		$this->_lastname = $lastname;
	}

    public function getBirthdate(): string {
		return $this->_birthdate;
	}

    public function setBirthdate(string $birthdate){
		$this->_birthdate = $birthdate;
	}

    public function getEmail(): string {
		return $this->_mail;
	}

    public function setEmail(string $mail){
		$this->_mail = $mail;
	}

    

    public function getPhone(): string{
		return $this->_phoneNumber;
	}

    public function setPhoneNumber($phoneNumber){
		$this->_phoneNumber = $phoneNumber;
	}
}