<?php

class Property
{
    public function __construct(private  PDO $pdo)
    {
    }

    public function store(
        string $title,
        int $price,
        int $surface,
        int $rooms,
        int $floor,
        int $bedrooms,
        int $bathrooms,
        string $description,
        string $images,
        int $typeId,
        int $addressId
    )
    {
        $query = "INSERT INTO immobilis.properties(title, description, images, surface, price,rooms, floor, bedrooms, bathrooms, property_type_id, address_id)
                  VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$title, $description, $images, $surface, $price, $rooms, $floor, $bedrooms, $bathrooms, $typeId, $addressId]);
        return intval($this->pdo->lastInsertId());

    }
}