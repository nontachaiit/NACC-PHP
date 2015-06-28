<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

    public function __construct () {
        parent::__construct();
        
	// clear cache
	header ( "Cache-Control: no-cache, must-revalidate");
	header ( "Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    }
    
    
    private function _showMenu ( $aData = array () ) {
        $this->load->model ( "section_model", "mSection" );
        
        $aData['allSections'] = $this->mSection->getAll();
        
        return $aData;
    }
    
    public function manage ( $alias ) {
        
    }
}