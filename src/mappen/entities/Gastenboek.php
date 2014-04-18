<?php

namespace mappen\entities;

class Gastenboek {

    private $gastenboekid;
    private $email;
    private $bericht;
    private $datum;

    public function __construct($gastenboekid, $email, $bericht, $datum) {
        $this->gastenboekid = $gastenboekid;
        $this->email = $email;
        $this->bericht = $bericht;
        $this->datum = $datum;
    }

    public function getGastenboekid() {
        return $this->gastenboekid;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getBericht() {
        return $this->bericht;
    }

    public function setBericht($bericht) {
        $this->bericht = $bericht;
    }

    public function getDatum() {
        return $this->datum;
    }

    public function setDatum($datum) {
        $this->datum = $datum;
    }

}
