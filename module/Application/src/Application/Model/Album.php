<?php

namespace Application\Model;
use Zend\Stdlib\Hydrator\ClassMethods;

class Album {
    private $id;
    private $artist;
    private $title;
    
    public function exchangeArray(Array $options = array())
    {
        $hidrator = new ClassMethods();
        $hidrator->hydrate($options, $this);
        
    }
    
    public function getId() 
    {
        return $this->id;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function getTitle() 
    {
        return $this->title;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function setArtist($artist) 
    {
        $this->artist = $artist;
    }

    public function setTitle($title) 
    {
        $this->title = $title;
    }

    public function toArray()
    {
       $hidrator = new ClassMethods();
       return $hidrator->extract($this);
    }

    
}
