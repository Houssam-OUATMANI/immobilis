<?php

class PropertyOption
{
        public function __construct(private PDO $pdo)
        {
        }


        public  function store(int $propertyId, array $optionsIds) {
            $result =false;
            foreach ($optionsIds as $optionId) {
                $query = "INSERT INTO immobilis.properties_options(properties_id, options_id) VALUES (?, ?)";
                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute([$propertyId, $optionId]);
            }
            return $result;
        }
}