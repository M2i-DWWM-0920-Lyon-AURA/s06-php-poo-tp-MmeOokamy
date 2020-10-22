<?php

require_once './App/Models/CommonFeature.php';

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
        int $id = null,
        string $title = '',
        string $releaseDate = '',
        string $link = '',
        int $developperId = null,
        int $platformId = null
    )
    {
        parent::__construct(
            $id,
            $link
        );

        $this->title = $title;
        $this->releaseDate = $releaseDate;
        $this->developperId = $developperId;
        $this->platformId = $platformId;
        
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

	public function getDevelopperId() { 
 		return $this->developperId; 
	} 

	public function setDevelopperId($developperId) {  
		$this->developperId = $developperId; 
	} 

	public function getPlatformId() { 
 		return $this->platformId; 
	} 

	public function setPlatformId($platformId) {  
		$this->platformId = $platformId; 
    } 
    

}

function createVideoGame($id, $title, $releaseDate, $link, $developperId, $platformId) {
    return new VideoGame($id, $title, $releaseDate, $link, $developperId, $platformId);
}


function fetchAllVG(){
    global $dbVideoGames;

    $stmt = $dbVideoGames->query('SELECT * FROM `game`');

    return $stmt->fetchAll(PDO::FETCH_FUNC, 'createVideoGame');
}
