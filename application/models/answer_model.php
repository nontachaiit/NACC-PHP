<?php
class Answer_Model extends Base_model
{
    protected $_table = "answer";
    
    public $id;
    public $question;
    public $answer;
    public $is_right;
    public $is_fix_position;
    
    public function insert ( ) {
        $attrs = array (
            "question" => $this->question,
            "answer" => $this->answer,
            "is_right" => $this->is_right,
            "is_fix_position" => $this->is_fix_position
        );
        
        $this->db->insert ( $this->_table, $attrs );
        
        return $this->db->insert_id();
    }
    
    public function update () {
        $attrs = array (
            "question" => $this->question,
            "answer" => $this->answer,
            "is_right" => $this->is_right,
            "is_fix_position" => $this->is_fix_position
        );
        
        $this->db->update ( $this->_table, $attrs, array ( "id" => $this->id ));
        
        return $this->id;
    }
    
    public function getByQuestion ( $questionID ) {
        $query = $this->db->get_where (
                                       $this->_table,
                                       array (
                                              "question" => $questionID,
                                        )
                );
        
        if ( $query->num_rows == 0 ) return array();
        
        return $query->result();
    }
}