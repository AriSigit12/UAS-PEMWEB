<?php
class User {
    private $name;
    private $email;
    private $gender;
    private $subscribe;
    private $conn;

    public function __construct($name, $email, $gender, $subscribe, $conn) {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->subscribe = $subscribe;
        $this->conn = $conn;
    }

    public function saveData() {
        $sql = "INSERT INTO users (name, email, gender, subscribe) VALUES ('$this->name', '$this->email', '$this->gender', '$this->subscribe')";
        return mysqli_query($this->conn, $sql);
    }

    public function getData() {
        $sql = "SELECT * FROM users";
        return mysqli_query($this->conn, $sql);
    }
}
?>
