<?php
class User {

    public $login,
            $ID,
            $email,
            $name,
            $lastName,
            $gender,
            $birthYear,
            $desc,
            $img;

    public function __construct($data = null) {   
        if($data != null)
            $this->setData($data);
    }

    private function setData($data) {
        $this->ID = $data->id_czytelnik;
        $this->login = $data->login;
        $this->email = $data->email;
        $this->name = $data->imie;
        $this->lastName = $data->nazwisko;
        $this->gender = $data->plec;
        $this->birthYear = $data->rok_urodzenia;
        $this->desc = $data->opis_czytelnika;
        $this->img = $data->zdjecie;
    }

    public function getName() {
        $output = '';
        if($this->name != '' || $this->lastName != '')
            $output =  $this->name . " " . $this->lastName;
        else
            $output =  $this->login;

        return $output;
    }


}