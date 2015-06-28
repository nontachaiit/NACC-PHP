<?php
class Base_model extends CI_Model
{
    protected $_table;

    const STATUS_NORMAL = 1;
    const STATUS_DELETED = 0;
    
    
    public $id;
	
    function __construct ( ) {
        parent::__construct();
    }
	
    public function getAll()
    {
        $query = $this->db->select( "*" )
                          ->from( $this->_table )
			  ->where ( "status", self::STATUS_NORMAL )
                          ->get();
						  
	if ( $query->num_rows <= 0 ) return array();
	$res = $query->result();
	return $res;
    }
	
    public function getByID( $id, $args = array() ) 
    {
	$query = $this->db->select( "*" )
                          ->from( $this->_table )
                          ->where( "id", $id )
                          ->get();
                          
	if ( $query->num_rows <= 0 ) return null;
	$res = $query->result();
	return $res[0];
    }
	
    public function insert() {}
	
    public function update() {}
	
    public function save() {
	$id = 0;
		
        if( $this->id == 0 ) {
            $id = $this->insert();
        } else {
            $id = $this->update();
	}
	return $this->getByID( $id );
    }
	
    public function _convertImage( $data ) {
        
        $iimage = new iimage( );
		
	if( is_null( $data ) ) {
            return null;
	}
		
	if( is_array( $data ) ) {
            $items = array();
            
            for( $i = 0 ; $i < count( $data ) ; $i++ )  {
                $obj = $data[$i];
                $obj = $this->_imageSet( $iimage, $obj );
                $items[] = $obj;
            }

            return $items;
        } else {
	    $obj = $data;
            $obj = $this->_imageSet( $iimage, $obj );
            return $obj;
	}
    }
	
    protected function _imageSet( $iimage, $obj ) {}
	
    public function getDataKey() {
        $aRes = $this->getAll();

        $aData = array();
        
        for( $i = 0 ; $i < count( $aRes ) ; $i++ ) {
            $cRes = $aRes[$i];
            $aData[ $cRes->id ] = $cRes;
        }
	
        return $aData;
    }
    
}