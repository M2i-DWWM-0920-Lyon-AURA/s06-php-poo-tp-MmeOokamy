<?php

require_once './App/Models/CommonFeature.php';
require_once './App/Models/Platform.php';
require_once './App/Models/Developer.php';


final class VideoGame extends CommonFeature
{
    
    protected $title;
    protected $releaseDate;
    protected $developperId;
    protected $platformId;

    /**
     * Create new VideoGame object
     * 
     * @param int $id VideoGame database ID
     * @param string $name VideoGame name
     * @param string $link VideoGame link
     */
    public function __construct(
        ?int $id = null,
        string $title = '',
        string $releaseDate = '',
        string $link = '',
        ?int $developerId = null,
        ?int $platformId = null
    )
    {
        parent::__construct(
            $id,
            $link
        );

        $this->title = $title;
        $this->releaseDate = $releaseDate;
        $this->developerId = $developerId;
        $this->platformId = $platformId;
        
    }

     /**
     * Save current object's properties in database
     */
     public function save()
     {
         // Si la configuration n'existe pas encore dans la base de données
         if (is_null($this->id)) {
             // Enregistre une nouvelle configuration en base de données
             $this->create();
         } else {
             // Modifie la configuration déjà existante en base de données
             $this->update();
         }
     }
 
     /**
      * Create a new record in database based on this object's properties
      */
     protected function create()
     {
         global $dbVideoGames;
 
         $statement = $dbVideoGames->prepare('
             INSERT INTO `game` (
                 `title`,
                 `release_date`,
                 `link`,
                 `developer_Id`,
                 `platform_Id`

             )
             VALUES (
                 :title,
                 :release_date,
                 :link,
                 :developer_,
                 :platform
             )
         ');
         $statement->execute([
             ':title' => $this->title,
             ':release_date' => $this->releaseDate,
             ':link' => $this->link,
             ':developer' => $this->developerId,
             ':platform' => $this->platformId,
         ]);
 
         $this->id = $dbVideoGames->lastInsertId();
     }
 
     /**
      * Update existing record in database based on this object's properties
      */
     protected function update()
     {
         global $dbVideoGames;
 
         $statement = $dbVideoGames->prepare('
             UPDATE `game`
             SET
                 `title` = :title,
                 `release_date` = :release_date,
                 `link` = :link,
                 `developer_id` = :developer_id,
                 `platform_id` = :platform_id
             WHERE `id` = :id;
         ');
         $statement->execute([
             ':id' => $this->id,
             ':title' => $this->title,
             ':release_date' => $this->releaseDate,
             ':link' => $this->link,
             ':developer_id' => $this->developerID,
             ':platform_id' => $this->platformId,
         ]);
     }
 
     /**
      * Delete matching database record
      */
     public function delete()
     {
         global $dbVideoGames;
 
         $dbVideoGames->exec('DELETE FROM `game` WHERE `id` = ' . $this->id);
     }
 


    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

	public function getReleaseDate() { 
 		return $this->releaseDate; 
	} 

	public function setReleaseDate($releaseDate) {  
		$this->releaseDate = $releaseDate; 
	} 

    public function getDeveloper(): ?Developer 
    { 
 		return fetchDeveloperById($this->developerId); 
	} 

	public function setDeveloper(Developer $developer) {  
        $this->developerId = $developer->getId();
        return $this; 
	} 

    public function getPlatform(): ?Platform 
    { 
 		return fetchPlatformById($this->platformId); 
	} 

	public function setPlatform(Platform $platform) {  
        $this->platformId = $platform->getId();
        return $this; 
    } 
    

}

function createVideoGame($id, $title, $releaseDate, $link, $developerId, $platformId) {
    return new VideoGame($id, $title, $releaseDate, $link, $developerId, $platformId);
}


function fetchAllVG(){
    global $dbVideoGames;

    $stmt = $dbVideoGames->query('SELECT * FROM `game`');

    return $stmt->fetchAll(PDO::FETCH_FUNC, 'createVideoGame');
}

function fetchVideoGameById(int $id): ?VideoGame {
    global $dbVideoGames;

    $statement = $dbVideoGames->prepare('SELECT * FROM `game` WHERE `id` = :id');
    $statement->execute([ ':id' => $id ]);
    $result = $statement->fetchAll(PDO::FETCH_FUNC, 'createVideoGame');

    if (empty($result)) {
        return null;
    }

    return $result[0];
}
