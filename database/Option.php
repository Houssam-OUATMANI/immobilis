<?php

class Option
{
     public function __construct(private PDO $pdo){}


    public function findAll() {
         $query = "SELECT * FROM immobilis.options";
         $stmt = $this->pdo->query($query);
         return $stmt->fetchAll();
    }

    public function store(string $name) {
         $query = "INSERT INTO immobilis.options(name) VALUES (?)";
         $stmt = $this->pdo->prepare($query);
         return $stmt->execute([$name]);
    }

    public function updateById(int $id, string $name){
         $query = "UPDATE immobilis.options SET name = ? WHERE id = ?";
         $stmt = $this->pdo->prepare($query);
         return $stmt->execute([$name, $id]);
    }

    public  function  findById(int $id) {
         $query = "SELECT * FROM immobilis.options WHERE id = ?";
         $stmt = $this->pdo->prepare($query);
         $stmt->execute([$id]);
         return $stmt->fetch();
    }

    public function deleteById(int $id) {
         $query = "DELETE FROM immobilis.options WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$id]);
    }
}