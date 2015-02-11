<?php

namespace Application\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class AlbumFilter extends InputFilter 
{
    
    public function __construct() 
    {
        
        $artist = new Input('artist');
        $artist->setRequired(true)
            ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $artist->getValidatorChain()->attach(new NotEmpty());
        
        $title = new Input('title');
        $title->setRequired(true)
            ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $title->getValidatorChain()->attach(new NotEmpty());
        
        $this->add($artist)->add($title);
        
    }
    
}
