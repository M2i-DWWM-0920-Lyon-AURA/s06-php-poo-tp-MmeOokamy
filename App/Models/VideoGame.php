<?php

require_once './App/Models/CommonFeature.php';

final class VideoGames extends CommonFeature
{
    
    protected $title;
    protected $releaseDate;
    protected $developperId;
    protected $platformId;

    /**
     * Create new Platform object
     * 
     * @param int $id Platform database ID
     * @param string $name Platform name
     * @param string $link Platform link
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

	function getReleaseDate() { 
 		return $this->releaseDate; 
	} 

	function setReleaseDate($releaseDate) {  
		$this->releaseDate = $releaseDate; 
	} 

	function getDevelopperId() { 
 		return $this->developperId; 
	} 

	function setDevelopperId($developperId) {  
		$this->developperId = $developperId; 
	} 

	function getPlatformId() { 
 		return $this->platformId; 
	} 

	function setPlatformId($platformId) {  
		$this->platformId = $platformId; 
	} 
}