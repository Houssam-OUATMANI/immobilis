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


    public function findAll() {
        $query = "SELECT p.id, p.title, p.images, p.price, a.city, pt.name
                  FROM immobilis.properties p
                  JOIN immobilis.property_types pt on p.property_type_id = pt.id
                  JOIN addresses a on a.id = p.address_id
                  ";
        $stmt =  $this->pdo->query($query);
        return $stmt->fetchAll();
    }

    public function findById(int $id) {
        $query = <<<EOF
                    SELECT JSON_OBJECT(
                            'id', p.id,
                            'title', p.title,
                            'description', p.description,
                            'images', p.images,
                            'surface', p.surface,
                            'price', p.price,
                            'rooms', p.rooms,
                            'floor', p.floor,
                            'bedrooms', p.bedrooms,
                            'bathrooms', p.bathrooms,
                            'type', pt.name,
                            'address', (
                                SELECT JSON_OBJECT(
                                    'street', ad.street,
                                    'number', ad.number,
                                    'city', ad.city,
                                    'zipcode', ad.zipcode
                                )
                                FROM immobilis.addresses ad
                                WHERE p.address_id = ad.id
                            ),
                            'options', (
                                SELECT JSON_ARRAYAGG(o.name)
                                FROM immobilis.options o
                                JOIN properties_options po on o.id = po.options_id
                                WHERE po.properties_id = p.id
                            )
                        
                    ) as property
                    FROM immobilis.properties p
                    JOIN immobilis.property_types pt on p.property_type_id = pt.id
                    JOIN addresses a on a.id = p.address_id
                    WHERE p.id = ?
                 EOF;


        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


    public function contact (string $firstname, string $lastname, string $email, string $message, int $propertyId)
    {
        $query = "INSERT INTO immobilis.contacts(firstname, lastname, email, message, property_id)
                    VALUES (?,?,?,?,?)
                ";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$firstname, $lastname, $email, $message, $propertyId]);
    }
}