<?php

class AddressDAO extends AbstractDAO
{

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "addresses", Address::class);
    }

    public function countPersonsByAdresses(){
        $sql = "SELECT  a.id, a.street, 
                        a.zip_code, a.city, 
                        count(p.id) as nb_personne 
                        FROM addresses as a 
                        LEFT JOIN persons as p 
                        ON p.address_id=a.id
                        GROUP BY a.id";

        $query = $this->pdo->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
