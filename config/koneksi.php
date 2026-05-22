<?php

class Database {

    private $connection;

    public function getConnection() {

        $this->connection = mysqli_connect(
            "localhost",
            "ojokerro_blambangan",
            "royhan1888@abcd",
            "ojokerro_tanahblambangandb"
        );

        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        mysqli_set_charset($this->connection, "utf8");

        return $this->connection;
    }
}
?>