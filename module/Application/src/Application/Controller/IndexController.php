<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    
    protected $entity;


    public function indexAction()
    {
        $data = $this->getEntity()->fetchAll();
        
        /*foreach($data as $values)
        {
            var_dump($values);
        }*/
                
        return new ViewModel();

    }
    
    public function addAction()
    {
        
        $form = new \Application\Form\AlbumForm();
        
        $inputFilter = new \Application\Form\FormFilter();
        
        $request = $this->getRequest();
        
     if($request->isPost())
     {
       $params = $request->getPost()->toArray();
        
       
       $form->setData($params);
       
       $form->setInputFilter($inputFilter->getInputFilter());
        
       if($form->isValid())
       {
           //die('vcalido');
       }
       
     }  
     else
     {
     
         echo "Nao Postou";
     }
        return new ViewModel(array('form' => $form));
    }
    
    public function getEntity()
    {
        
        if(!$this->entity)
        {
            $this->entity = $this->getServiceLocator()->get('Entity');
        
            return $this->entity;
            
        }
        
    }
    
}
