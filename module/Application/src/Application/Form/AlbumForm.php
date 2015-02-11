<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Application\Form\AlbumFilter;

class AlbumForm extends Form
{

    public function __construct()
    {
        
        parent::__construct('album', array());
        
        $this->setAttributes(array('method' => 'post', 'enctype' => 'multipart/form-data'));
        //$this->setInputFilter(new AlbumFilter());
        
        
        $artist = new Element\Text();
        $artist->setName('artist')
               ->setAttributes(array(
                    'placeholder' => 'Entre com o artista',
                    'maxlenght' => 50
                ));
        
        $title = new Element\Text();
        $title->setName('title')
              ->setAttributes(array(
                    'placeholder' => 'Entre com o título',
                    'maxlenght' => 50
                ));
        
        
        $submit = new Element\Submit();
        $submit->setName('enviar')
               ->setValue('Enviar')
               ->setAttributes(array(
                   'class' => 'btn btn-primary'
               ));
        
               $this->add($artist);
               $this->add($title);
               $this->add($submit);
    }
    
}
