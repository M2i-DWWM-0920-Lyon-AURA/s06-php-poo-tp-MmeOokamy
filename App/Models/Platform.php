<?php

require_once './App/Models/CommonFeature.php';

final class Platform extends CommonFeature
{
    
    protected $name;

    /**
     * Create new Platform object
     * 
     * @param int $id Platform database ID
     * @param string $name Platform name
     * @param string $link Platform link
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

