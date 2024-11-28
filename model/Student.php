<?php 
class Student {
    private $id;
    private $firstName;
    private $secondName;
    private $lastName;
    private $secondLastName;
    private $phone;
    private $email;
    private $status;

    public function __construct(
        $id = -1,
        $firstName = '', 
        $secondName = '', 
        $lastName = '', 
        $secondLastName = '',
        $phone = '', 
        $email = '', 
        $status = true
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->lastName = $lastName;
        $this->secondLastName = $secondLastName;
        $this->phone = $phone;
        $this->email = $email;
        $this->status = $status;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getSecondName() {
        return $this->secondName;
    }

    public function setSecondName($secondName) {
        $this->secondName = $secondName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getSecondLastName() {
        return $this->secondLastName;
    }

    public function setSecondLastName($secondLastName) {
        $this->secondLastName = $secondLastName;
    }
    
    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
?>