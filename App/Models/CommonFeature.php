<?php



abstract class CommonFeature
{
    protected $id;
    protected $link;


    /**
     * Create new CommonFeature object
     * 
     * @param int $id CommonFeature database ID
     * @param string $name CommonFeature name
     */
    public function __construct(
        int $id = null,
        string $link = ''
    )
    {
        $this->id = $id;
        $this->setLink($link);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link)
    {
        if(!filter_var($link, FILTER_VALIDATE_URL)){
            throw new Error('CommonFeature::link property must be a valid URL.');
        }

        $this->link = $link;

        return $this;
    }

}