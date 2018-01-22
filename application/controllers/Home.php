<?php
//print_r($_SERVER);
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('homeModel');
        $this->load->database();
    }
    
    public function index()
    {
        // Home Page
        $data['trending'] = $this->homeModel->getTrendingSlider();
        $data['newprojects'] = $this->homeModel->getNewprojectSlider();
        $data['luxury'] = $this->homeModel->getLuxurySlider();
        $data['affordable'] = $this->homeModel->getAffordableSlider();
        $data['featuredproject'] = $this->homeModel->featuredNewProjects(); 


        $data['quickLinks'] = $this->homeModel->getQuickLinks(); 
        $data['newListings'] = $this->homeModel->getNewListingsList();       
        $this->load->view('home/home',$data);
    }

    public function home()
    {
        
        //$data['showcase'] = $this->homeModel->getProjectShowcase();
        $data['featured'] = $this->homeModel->getFeaturedPages();
        $data['quickLinks'] = $this->homeModel->getQuickLinks();
        $data['newListings'] = $this->homeModel->getNewListingsList();
        $this->load->view('home/home',$data);
    }

    public function newListings()
    {
        $data = $this->homeModel->getNewListingsList();
        echo json_encode($data); 
    }

    public function searchLocation()
    {

        $data = $this->homeModel->getSearchLocation();
        echo json_encode($data);
    }

    public function search()
    {
        /////////////////////////////////////////////////
        /////////////PAGINATION//////////////////////////
        /////////////////////////////////////////////////

        //die();
        $this->load->library('pagination');
        $data = $this->homeModel->getSearchLocation();

        $data['records'] = $this->homeModel->getSearch(10,$this->uri->segment('3'));

        $config['total_rows'] = $data['records']['rows'];
        //$config['total_rows'] = '5';
        
        $config['base_url'] = (base_url() . 'index.php/Home/search/');
        $config['per_page'] = 10;
        $config['uri_segment'] = '3';

        $config['full_tag_open'] = '<div class="col-md-12 text-center"><div class="pagination">';
        $config['full_tag_close'] = '</div></div>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<a  style="color: #061d36;">';
        $config['first_tag_close'] = '</a>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<a  style="color: #061d36;">';
        $config['last_tag_close'] = '</a>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<a style="color: #061d36;">';
        $config['next_tag_close'] = '</a>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<a  style="color: #061d36;">';
        $config['prev_tag_close'] = '</a>';

        $config['cur_tag_open'] = '<a class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);

        
        $data['location'] = $this->homeModel->getLocations(); 

        $data['propertytype'] =  $this->homeModel->getPropertyType();

        $this->load->view('home/search_result',$data);

    }

    public function ajax_search()
    {


        /////////////////////////////////////////////////
        /////////////PAGINATION//////////////////////////
        /////////////////////////////////////////////////
        //print_r($_POST["property_type"][0]);
        //die();
        $this->load->library('pagination');

        $data = $this->homeModel->getSearch(10,$this->uri->segment('3'));

        $config['total_rows'] = $data['rows'];
        //$config['total_rows'] = '5';
        
        $config['base_url'] = (base_url() . 'index.php/Home/search/');
        $config['per_page'] = 10;
        $config['uri_segment'] = '3';

        $config['full_tag_open'] = '<div class="col-md-12 text-center"><div class="pagination">';
        $config['full_tag_close'] = '</div></div>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<a  style="color: #061d36;">';
        $config['first_tag_close'] = '</a>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<a  style="color: #061d36;">';
        $config['last_tag_close'] = '</a>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<a style="color: #061d36;">';
        $config['next_tag_close'] = '</a>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<a  style="color: #061d36;">';
        $config['prev_tag_close'] = '</a>';

        $config['cur_tag_open'] = '<a class="active">';
        $config['cur_tag_close'] = '</a>';

        $this->pagination->initialize($config);

        $this->load->view('home/search_page',$data);

        // echo json_encode($data);

    }

    public function locationCheck()
    {
        $data = $this->homeModel->getLocationCheck();
        echo json_encode($data);
    }


    public function askExpertForm()
    {
        $data = $this->homeModel->getAskExpertForm();
        echo json_encode($data);
    }


    public function projectCollections()
    {
        $data['records'] = $this->homeModel->getProjectCollections();
        $this->load->view('home/project_collections',$data);
    }

    public function projectDetails()
    {
        $data['records'] = $this->homeModel->getProjectDetail();
        $this->load->view('home/project-details',$data);
    }

    public function mycollection()
    {
        $this->load->view('home/project-handpicked');
    }


    public function search_page()
    {
        $this->load->view('home/search_page');
    }

    public function emi_calculator()
    {
        $this->load->view('home/emi_calculator');
    }

    public function quality_policy()
    {
        $this->load->view('home/quality_policy');
    }

    public function corporate_profile()
    {
        $this->load->view('home/corporate_profile');
    }
    public function ask_expert()
    {
        $this->load->view('home/ask_expert');
    }
    public function buying_home()
    {
        $this->load->view('home/buying_home');
    }
    public function partner_vendor()
    {
        $this->load->view('home/partner_vendor');
    }
    public function home_loan_faq()
    {
        $this->load->view('home/home_loan_faq');
    }
    public function career()
    {
        $this->load->view('home/career');
    }

    

    public function featuredCollection()
    {
        $data['records'] = $this->homeModel->featuredCollectionDetail();        
        $this->load->view('home/collect-details',$data);
    }

    public function allFeatured()
    {
        $data['records'] = $this->homeModel->getAllFeatured();        
        $this->load->view('home/allFeatured',$data);
    }

    public function contactBuilderForm()
    {
        $data = $this->homeModel->getContactBuilderForm();
        echo json_encode($data);
    }



    ////////////////////////////////////////////////////////
    ////////////////////////USER////////////////////////////
    ////////////////////////////////////////////////////////

    public function userLoginForm()
    {
        $data = $this->db->getUserLoginForm();
        echo json_encode($data);
    }

    public function registerForm()
    {
        $data = $this->db->getRegisterForm();
        echo json_encode($data);
    }

    public function testResult()
    {
        $this->load->view('home/test-result');

    }

    public function collectDetails()
    {
        $this->load->view('home/collect-details');
    }

    public function featuredNewProjects()
    {
        $data = $this->homeModel->featuredNewProjects();
        echo json_encode($data);
        //print_r ($data);    
    }

    public function featuredNewProjectsLimit()
    {
        $data = $this->homeModel->featuredNewProjectsLimit();
        echo json_encode($data);
        //print_r ($data);    
    }

    public function cityList()
    {
        // echo "Am herer"; exit;
        $data['cities'] = $this->homeModel->getCities();       
        echo json_encode($data);
    }
    
    public function locationList()
    {
        $data['location'] = $this->homeModel->getLocations();       
        echo json_encode($data);
    }
	
	public function searchAuto(){
		$data['location'] = $this->homeModel->getAllLocations();
		$data['projects'] = $this->homeModel->getAllProjects();
		$data['developers'] = $this->homeModel->getAllDevelopers();
		$result = array_merge($data['location'], $data['projects'], $data['developers']);
		$srVal = array();
		foreach($result as $key=>$val){
			$srVal[] = $val['name'];
		}
		echo json_encode($srVal);
	}
	
	public function srchLatLong(){
		if(!empty($_POST['srVal'])){
			$srVal = $_POST['srVal'];
			$projectSrch = $this->homeModel->projectSrch($srVal);
			$devSrch = $this->homeModel->devSrch($srVal);
			$devProjects = array();
			$newDp = array();
			if(!empty($devSrch)){
				foreach($devSrch as $ds){
					$devId = $ds['developer_id'];
					$devProjects[] = $this->homeModel->devProjects($devId);
				}
				$devProjects = array_map('array_filter', $devProjects);
				$devProjects = array_filter($devProjects);
				$i=0;
				foreach($devProjects as $devP){
					foreach($devP as $dp){
						$newDp[$i] = $dp;
						$i++;
					}
				}
			}
			$loctnSrch = $this->homeModel->loctnSrch($srVal);
			$nearbyLocProjects = array();
			$newLp = array();
			if(!empty($loctnSrch)){
				foreach($loctnSrch as $ls){
					$locId = $ls['location_id'];
					$locProjects = $this->homeModel->locProjects($locId);
				}
				//echo "<pre>"; print_r($locProjects); die;
				if(!empty($locProjects)){
					$nearbyLocProjects[] = $this->homeModel->locProjectsNearBy($locProjects[0]['location_id'], $locProjects[0]['latitude'], $locProjects[0]['longitude']);
					
					$nearbyLocProjects = array_map('array_filter', $nearbyLocProjects);
					$nearbyLocProjects = array_filter($nearbyLocProjects);
					$j=0;
					foreach($nearbyLocProjects as $locP){
						foreach($locP as $lp){
							$newLp[$j] = $lp;
							$j++;
						}
					}
				}
			}
			$dataProjects = array();
			$dataProjects = array_merge($projectSrch, $newDp, $newLp);
			//$dataProjects = array_unique($dataProjects);
			echo json_encode($dataProjects); 
			
		}else{
			echo "No results found for this search.";
		}
	}

}