#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `hospitalE2N` CHARACTER SET 'utf8';
USE `hospitalE2N`;

#------------------------------------------------------------
# Table: patients
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `patients`(
        `id`        INT (11) AUTO_INCREMENT  NOT NULL ,
        `lastname`  VARCHAR (25) NOT NULL ,
        `firstname` VARCHAR (25) NOT NULL ,
        `birthdate` DATE NOT NULL ,
        `phone`     VARCHAR (25) ,
        `mail`      VARCHAR (100) NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;

INSERT INTO `patients`(`lastName`,`firstName`,`birthDate`,`phone`, `mail`)
VALUES ('Brennan','Guinevere','1994-02-05'),
('Dean','Ori','1973-11-23'),
('Sharpe','Nora','1983-03-10'),
('Hampton','Wade','2000-03-05'),
('Conner','Kibo','1979-11-04'),
('Klein','Hilary','1972-12-16'),
('Tyler','Lawrence','1996-05-13'),
('Dudley','Tanya','1966-12-28'),
('Terrell','Kim','1997-07-27'),
('Mclaughlin','Laura','1977-02-16'),
('Lewis','Linda','1983-07-18'),
('Ware','Gemma','1969-10-17'),
('Roth','Jolie','1981-02-24'),
('Michael','Harriet','1961-11-27'),
('Simpson','Paloma','1998-01-07');


#------------------------------------------------------------
# Table: appointments
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `appointments`(
        `id`         INT (11) AUTO_INCREMENT  NOT NULL ,
        `dateHour`   DATETIME NOT NULL ,
        `idPatients` INT (11) NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;

ALTER TABLE `appointments` ADD CONSTRAINT FK_appointments_id_patients FOREIGN KEY (`idPatients`) REFERENCES `patients`(`id`);
