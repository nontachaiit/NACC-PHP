<?php
class Examination_Level_Model extends Base_model
{
    protected $_table = "examination_level";
    
    public $id;
    public $name;
    public $detail;
    public $section;
    public $status;
    
    public function getBySection ( $sectionID ) {
        $query = $this->db->get_where (
            $this->_table,
            array (
                "section" => $sectionID,
                "status" => 1
            )
        );
        
        if ( $query->num_rows <= 0 ) return array();
        
        return $query->result();
    }
    
    public function checkLevelForSection ( $levelID, $sectionID ) {
        $query = $this->db->get_where (
            $this->_table,
            array (
                "section" => $sectionID,
                "id" => $levelID,
                "status" => 1
            )
        );
        
        if ( $query->num_rows <= 0 ) return false;
        
        return true;
    }
    
    
}