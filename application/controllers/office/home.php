<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
    
    
    public function index()
    {
        $aData = $this->_showMenu();
        
	/*
        $this->load->model ( "collection_model", "mCollection" );
        $this->load->model ( "vest_style_model", "mVestStyle" );
        
        
        $collections = $this->mCollection->getAll();
        $bestSellers = $this->mVestStyle->getBestSellerList();
        $recommends = $this->mVestStyle->getRecommendList();
        $newArrivals = $this->mVestStyle->getNewArrivalList();
        */
	
        $aData['menu_home'] = true;
	/*
        $aData['collections'] = $collections;
        $aData['bestSellers'] = $bestSellers;
        $aData['recommends'] = $recommends;
        $aData['newArrivals'] = $newArrivals;
        */
        
        $this->load->view('admin/home/index', $aData);
    }
    
    
    
}