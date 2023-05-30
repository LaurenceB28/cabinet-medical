<?php
require_once __DIR__ . '/../helpers/connect.php';

class Appointment{
    private string $_dateAppointment;

    public function __construct($dateAppointment)
    {
        $this-> _dateAppointment = $dateAppointment;
    }
    public function getFirstname(): string {
		return $this->_dateAppointment;
	}
    public function setFirstname(string $dateAppointment){
		$this->_dateAppointment = $dateAppointment;
}
}