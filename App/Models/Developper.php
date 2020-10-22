<?php

require_once './App/Models/CommonFeature.php';

final class Developper extends CommonFeature
{
    
    protected $name;

    /**
     * Create new Developper object
     * 
     * @param int $id Developper database ID
     * @param string $name Developper name
     * @param string $link Developper link
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

