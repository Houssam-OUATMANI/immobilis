<?php

class PropertyOption
{
        public function __construct(private PDO $pdo)
        {
        }


        public  function store(int $propertyId, array $optionsIds) {
            foreach ($optionsIds as $optionId) {
                $query = "INSERT INTO immobilis.properties_options(properties_id, options_id) VALUES (?, ?)";
                $stmt = $this->pdo->prepare($query);
                return  $stmt->execute([$propertyId, $optionId]);
            }
        }
}