<?php

namespace Application\Model;

use Zend\Db\TableGateway\Exception\InvalidArgumentException;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class AlbumTable extends AbstractTableGateway
{
    protected $table = 'albums';
    
    public function __construct(Adapter $adapter, ResultSet $resultset, $mapping)
    {
        
        if(!is_object($mapping))
        {
            throw new InvalidArgumentException("O mapeamento precisa ser do tipo objeto");
        }
        
        
        $this->adapter = $adapter;
        $this->resultSetPrototype = $resultset;
        $this->resultSetPrototype->setArrayObjectPrototype($mapping);
        $this->initialize();
        
    }
    
    
    public function fetchAll()
    {
        
        return $this->select();
        
    }
    
    public function findBy(Array $param = array())
    {
        $row = $this->select($param)->current();
        
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
        
    }
    
    public function save($mapping)
    {
        if(!is_object($mapping))
        {
            throw new InvalidArgumentException("O mapeamento precisa ser do tipo objeto");
        }
        
        $id = (int) $mapping->getId();
        
        if($id == 0 && $this->insert($mapping->toArray()))
        {
            return true;
        }
        
        $row = $this->select(array('id' => $id))->current();
        
        if($row && $this->update($mapping->toArray()))
        {
         return true;   
        }
        
        return false;
        
        
    }
    
    public function remove(Array $param = array())
    {
        
        if($this->delete($param))
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    
}
