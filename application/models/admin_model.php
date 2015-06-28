<?php
class Admin_Model extends Base_model
{
    protected $_table = "admin";
    
    public $id;
    public $name;
    public $lastname;
    public $email;
    public $role;
    public $password;
    
    public function getByID ( $id ) {
        $query = $this->db->get_where ( $this->_table, array ( "id" => $id ));
        
        
        if ( $query->num_rows <= 0 ) return null;
        
        
        return $query->row();
    }
    
    public function checkLogin ( $email, $password ) {
        $wheres = array (
            "email"     =>  $email,
            "password"  =>  md5($password)
        );
        
        $query = $this->db->get_where ( $this->_table, $wheres );
        
        if ( $query->num_rows <= 0 ) return null;
        
        return $query->row();
    }
}