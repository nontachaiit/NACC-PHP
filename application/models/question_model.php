<?php
class Question_Model extends Base_model
{
    protected $_table = "question";
    
    public $id;
    public $section;
    public $question;
    public $examination_level;
    public $status;
    
    public function insert ( ) {
        $attrs = array (
            "section" => $this->section,
            "question" => $this->question,
            "examination_level" => $this->examination_level
        );
        
        $this->db->insert ( $this->_table, $attrs );
        
        return $this->db->insert_id();
    }
    
    public function update () {
        $attrs = array (
            "section" => $this->section,
            "question" => $this->question,
            "examination_level" => $this->examination_level
        );
        
        $this->db->update ( $this->_table, $attrs, array ( "id" => $this->id ));
        
        return $this->id;
    }
    
    public function getBySection ( $sectionID, $levelID) {
        $query = $this->db->get_where (
                                       $this->_table,
                                       array (
                                              "section" => $sectionID,
                                              "examination_level" => $levelID,
                                              "status" => 1
                                        )
                );
        
        if ( $query->num_rows == 0 ) return array();
        
        return $query->result();
    }
    
    public function disable ( $questionID ) {
        $wheres = array (
            "id" => $questionID
        );
        
        $this->db->update ( $this->_table, array ( "status" => 0), $wheres);
    }
}