<?php

class Address
{
    public function __construct(private  PDO $pdo)
    {
    }
    public  function  store(int $number, string $street, string $city, string $zipcode) {
        $query = "INSERT INTO immobilis.addresses(street, city, zipcode, number)
        VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$street, $city, $zipcode, $number]);
        return intval($this->pdo->lastInsertId());
    }
}