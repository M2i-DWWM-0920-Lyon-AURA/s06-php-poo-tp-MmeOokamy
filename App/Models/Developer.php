<?php

require_once './App/Models/CommonFeature.php';

final class Developer extends CommonFeature
{
    
    protected $name;

    /**
     * Create new Developer object
     * 
     * @param int $id Developer database ID
     * @param string $name Developer name
     * @param string $link Developer link
     */
    public function __construct(
        int $id = null,
        string $name = '',
        string $link = ''
    )
    {
        parent::__construct(
            $id,
            $link
        );

        $this->name = $name;
        
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

}

function createDeveloper($id, $name, $link) {
    return new Developer($id, $name, $link);
}


function fetchAllDeveloper(){
    global $dbVideoGames;

    $stmt = $dbVideoGames->query('SELECT * FROM `developer`');

    return $stmt->fetchAll(PDO::FETCH_FUNC, 'createDeveloper');
}

function fetchDeveloperById(int $id): ?Developer {
    global $dbVideoGames;

    $statement = $dbVideoGames->prepare('SELECT * FROM `developer` WHERE `id` = :id');
    $statement->execute([ ':id' => $id ]);
    $result = $statement->fetchAll(PDO::FETCH_FUNC, 'createDeveloper');

    if (empty($result)) {
        return null;
    }

    return $result[0];
}
