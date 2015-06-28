<?php
class Section_Model extends Base_model
{
    protected $_table = "section";
    
    public $id;
    public $name;
    public $alias;
    public $detail;
    public $status;
    
    
    public function getByAlias ( $alias ) {
        $query = $this->db->get_where ( $this->_table, array ( "alias" => $alias));
        
        if ( $query->num_rows == 0 ) return null;
        
        return $query->row();
    }
}