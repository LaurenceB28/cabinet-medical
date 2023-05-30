<?php
require_once __DIR__ . '/../helpers/connect.php';

class Patient{
    private string $_firstname;
    private string $_lastname;
    private string $_birthdate;
    private string $_email;
    private string $_phoneNumber;

    public function __construct($lastname, $firstname, $birthdate, $email, $phoneNumber)
    {
        $this-> _lastname = $lastname;
        $this-> _firstname = $firstname;
        $this-> _birthdate = $birthdate;
        $this-> _email = $email;
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
		return $this->_email;
	}

    public function setEmail(string $email){
		$this->_email = $email;
	}

    

    public function getPhone(): string{
		return $this->_phoneNumber;
	}

    public function setPhoneNumber($phoneNumber){
		$this->_phoneNumber = $phoneNumber;
	}
}