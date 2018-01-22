<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

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
			$this->load->model('adminModel');
			$this->load->database();
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function adminLogin()
	{
		$data = $this->adminModel->getAdminLogin();
		echo json_encode($data);
	}

	public function projectManagerOfDev()
	{
		$data = $this->adminModel->getProjectManagerOfDev();
		echo json_encode($data);
	}


	public function adminLogout()
	{
		unset($_SESSION['uEmail']);
		unset($_SESSION['uType']);
		unset($_SESSION['uId']);
		unset($_SESSION['uName']);

		redirect(base_url()."index.php/adminDashboard/index");
	}

	public function home()
	{
		if($_SESSION['uType'] == 'developer')
		{
			$data['records'] = $this->adminModel->getProjectsOfDeveloper();
			$data['location'] = $this->adminModel->getDevProjectLocation();
			// $data['projectMgr'] = $this->adminModel->getProjectManagerOfDev();
			$this->load->view('admin/devHome',$data);
		}
		elseif($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getDevOfAdminList();
			$this->load->view('admin/adminHome',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function devOfAdminList()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getDevOfAdminList();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}		
	}

	public function projectsbyBuilder()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getProjectbyBuilder();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}		
	}


	


	public function devProjectDetail()
	{
		if($_SESSION['uType'] == 'developer')
		{
			$data['records'] = $this->adminModel->getDevProjectDetail();
			$this->load->view('admin/dev-project-detail',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function devAddProject()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$this->load->view('admin/addProject');
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function addProjectForm()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAddProjectForm();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function addListing()
	{
		if($_SESSION['uType'] == 'developer')
		{
			$data['records'] = $this->adminModel->getAddListing();
			$this->load->view('admin/addListing',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function addListingForm()
	{
		if($_SESSION['uType'] == 'developer')
		{
			$data = $this->adminModel->getAddListingForm();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function nearbyLocationList()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getNearbyLocationList();
			$this->load->view('admin/nearbyList',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function deleteNearbyLocation()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getDeleteNearbyLocation();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}

	}

	public function featuredPagesList()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getFeaturedPagesList();
			$this->load->view('admin/featuredPagesList',$data);			
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function addFeaturedPage()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAddFeaturedPage();
			redirect(base_url()."index.php/AdminDashboard/featuredPagesList");
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function addFeaturedProject()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAddFeaturedProject();
			echo json_encode($data);			
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function featuredPagesDetail()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getFeaturedPagesDetail();
			$this->load->view('admin/featuredPagesDetail',$data);
			//echo '<pre>';print_r($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function updateFeaturedPages()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getUpdateFeaturedPages();
			redirect(base_url()."index.php/AdminDashboard/featuredPagesList");
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function deleteFeaturedProject()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getDeleteFeaturedProject();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function contactBuilderList()
	{
		$data['records'] = $this->adminModel->getContactBuilderList();
		$this->load->view('admin/contactBuilderList',$data);
	}

	public function facilitiesList()
	{
		if($_SESSION['uType'] == 'admin')
		{
			if(isset($_POST['id'])!= null)
			{
				$data = $this->adminModel->getFacillitiesList();
				echo json_encode($data);
			}
			else
			{
				$data['records'] = $this->adminModel->getFacillitiesList();
				$this->load->view('admin/facilitiesList',$data);			
			}	
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function addFacilities()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAddFacilities();
			if($data == true)
			{
				redirect(base_url()."index.php/AdminDashboard/facilitiesList");			
			}
			else
			{
				echo 'Error in inserting the record for facilities';
			}
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function editFacilities()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getEditFacilities();
			if($data == true)
			{
				redirect(base_url()."index.php/AdminDashboard/facilitiesList");			
			}
			else
			{
				echo 'Error in updating the record for facilities';
			}
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function sendEmail()
	{
		$data = $this->adminModel->getEmail();
		echo $data;
	}

	///////////////////////////////////////////////////////////////
	////////////////////////COMMON STUFF///////////////////////////
	///////////////////////////////////////////////////////////////

	public function devProjectLocation()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getDevProjectLocation();
			echo json_encode($data);			
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function devPropertyType()
	{
		if($_SESSION['uType'] == 'admin' || $_SESSION['uType'] == 'developer')
		{
			$data = $this->adminModel->getDevPropertyType();
			echo json_encode($data);			
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function devFacilities()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getDevFacilities();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function devKeywords()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getDevKeywords();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}


	////////////////////////////////////////////////////////////
	/////////////////////////ADMIN//////////////////////////////
	////////////////////////////////////////////////////////////

	public function addNewDevForm()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAddNewDevForm();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function adminDevDetail()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getAdminDevDetail();
			$this->load->view('admin/admin-dev-detail',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}

	}

	public function adminEditDevForm()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$devId = $_POST['developer_id'];
			$data = $this->adminModel->getAdminEditDevForm();
			$msg = $data['msg'];
			redirect(base_url()."index.php/adminDashboard/adminDevDetail?id=$devId/$msg");
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function adminLocationList()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getAdminLocationList();
			$this->load->view('admin/adminLocationView',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function adminAddLocationForm()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAdminAddLocationForm();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function adminProjectShowcase()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getAdminProjectShowcase();
			$this->load->view('admin/adminProjectShowcase',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}	
	}

	public function adminEditProjectShowcase()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAdminEditProjectShowcase();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function adminQuickLinks()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records']= $this->adminModel->getAdminQuickLinks();
			$this->load->view('admin/adminQuickLinks',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function adminEditQuickLinks()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAdminEditQuickLinks();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function askExpertList()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getAskExpertList();
			$this->load->view('admin/adminAskExpertView',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function editListing()
	{
		if($_SESSION['uType'] == 'developer')
		{
			$data['records'] = $this->adminModel->getEditListing();
			$this->load->view('admin/edit-listing-view',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function editListingForm()
	{
		if($_SESSION['uType'] == 'developer')
		{
			$data = $this->adminModel->getEditListingForm();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function editProject()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getUpdateProject();
			$this->load->view('admin/edit-project-view',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function updateProjectForm()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getUpdateProjectForm();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function projectListView()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data['records'] = $this->adminModel->getProjectListView();
			$this->load->view('admin/projectListView',$data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function adminAllProjects()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAdminAllProjects();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function updateFeaturedSlot()
    {
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getUpdateFeaturedSlot();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}
	
	public function addDeveloper()
    {
		if($_SESSION['uType'] == 'admin')
		{
			$this->load->view('admin/addDeveloperForm');
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
    }

    public function addslider()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$this->load->view('admin/addslider');
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function addImgForm()
	{
		if($_SESSION['uType'] == 'admin')
		{
			$data = $this->adminModel->getAddImgForm();
			echo json_encode($data);
		}
		else
		{
			redirect(base_url()."index.php/adminDashboard/index");
		}
	}

	public function getFooterImgList()
	{
		$data = $this->adminModel->FooterImgList();
		echo json_encode($data);	
	}

	public function removeFooterImg()
	{
		$data = $this->adminModel->removeFooterImg();
		if($data == true)
		{
			
			echo json_encode(array('status' => 'true'));

		}
		else
		{

			echo json_encode(array('status' => 'false'));

		}	
	}
	public function removeDevUpload()
	{
		$data = $this->adminModel->removeDevUpload();
		if($data == true)
		{
			
			echo json_encode(array('status' => 'true'));

		}
		else
		{

			echo json_encode(array('status' => 'false'));

		}	
	}
	
	public function export_projects_list(){
	  $query = $this->uri->segment(3);
	  if(!empty($query)){
	    $data = $this->adminModel->exportQueryProjects($query);
		$cnt = 0;
		foreach($data as $dq){
		
			$dqPid = $dq['id'];
			$result = $this->adminModel->getDevUploads($dqPid);
			if(empty($result)){
				$data[$cnt]['brochure'] = null;
				$data[$cnt]['project_images'] = null;
			}
			//echo "<pre>"; print_r($result);
			$flag_brochure = 0;
			$projectimages = array();
			if(count($result)>0){
				foreach($result as $rs){
					if($rs['brochure']=='yes'){
						$flag_brochure = 1;
						$projectBrochure = $rs['path'];
					}else{
						$projectimages[] = $rs['path'];
					}
				}
				$data[$cnt]['brochure'] = $projectBrochure;
				if($flag_brochure == 0){
					$data[$cnt]['brochure'] = '';
				}
				$data[$cnt]['project_images'] = implode(",",$projectimages);
			}
			$cnt++;
		}
	  }else{
	    $data = $this->adminModel->exportProjects();
		$cnt = 0;
		foreach($data as $dq){
		
			$dqPid = $dq['id'];
			$result = $this->adminModel->getDevUploads($dqPid);
			if(empty($result)){
				$data[$cnt]['brochure'] = null;
				$data[$cnt]['project_images'] = null;
			}
			//echo "<pre>"; print_r($result);
			$flag_brochure = 0;
			$projectimages = array();
			if(count($result)>0){
				foreach($result as $rs){
					if($rs['brochure']=='yes'){
						$flag_brochure = 1;
						$projectBrochure = $rs['path'];
					}else{
						$projectimages[] = $rs['path'];
					}
				}
				$data[$cnt]['brochure'] = $projectBrochure;
				if($flag_brochure == 0){
					$data[$cnt]['brochure'] = '';
				}
				$data[$cnt]['project_images'] = implode(",",$projectimages);
			}
			$cnt++;
		}
	  }
	  $fields = array(
			'id'   => 'id',
			'project_name' => 'project_name',
			'developer_name'  => 'developer_name',
			'location_name'  => 'location_name',
			'property_type'  => 'property_type',
			'manager_name'  => 'manager_name',
			'manager_email'  => 'manager_email',
			'manager_phone'  => 'manager_phone',
			'project_address'  => 'project_address',
			'minimum_price'  => 'minimum_price',
			'maximum_price'  => 'maximum_price',
			'total_units'  => 'total_units',
			'size_min'  => 'size_min',
			'size_max'  => 'size_max',
			'latitude'  => 'latitude',
			'longitude'  => 'longitude',
			'description'  => 'description',
			'category'  => 'category',
			'gated_community'  => 'gated_community',
			'image_name'  => 'image_name',
			'status'  => 'status',
			'bhk'  => 'bhk',
			'bathrooms'  => 'bathrooms',
			'price'  => 'price',
			'sqft_price'  => 'sqft_price',
			'size'  => 'size',
			'super_build_area'  => 'super_build_area',
			'carpet_area'  => 'carpet_area',
			'listing_description'  => 'listing_description',
			'available_listings'  => 'available_listings',
			'brochure'  => 'brochure',
			'project_images'  => 'project_images'
		);
		//echo "<pre>"; print_r($fields); echo "<br>";
		//echo "<pre>"; print_r($data); die;
	  $this->load->helper('export_csv');
	  echo arrayToCSV($data, $fields, "Projects");
	  /*$this->load->dbutil();
	  $this->load->helper('file');
	  $this->load->helper('download');
	  $delimiter = ",";
	  $newline = "\r\n";
	  $filename = "projects.csv";
	  $dataFile = $this->dbutil->csv_from_result($data, $delimiter, $newline);
	  force_download($filename, $dataFile);*/
	  redirect(base_url()."index.php/adminDashboard/projectListView");
	  
	}
	
	public function import_projects_list(){
	  $this->load->library('form_validation');
	  $response= false;
	  if(empty($_FILES['fileupload']['name'])){
	 	$this->form_validation->set_rules('fileupload','Import CSV','required');
	  }else{
	    $filename = $_FILES["fileupload"]["tmp_name"];
	    if($_FILES['fileupload']['size'] > 0){
	      $file = fopen($filename,"r");
	      $is_header_removed = FALSE;
	      while(($importdata = fgetcsv($file, 10000, ",")) !== FALSE){
	        if(!$is_header_removed){
	          $is_header_removed = TRUE;
	          continue;
	        }
			$checkDuplicaeProject = $this->adminModel->checkDuplicaeEntry($importdata[0]);
			if(empty($checkDuplicaeProject)){
				$row = array(
				  'name'    =>  !empty($importdata[0])?$importdata[0]:'',
				  'developer_id'     =>  !empty($importdata[1])?$importdata[1]:'',
				  'location_id'     =>  !empty($importdata[2])?$importdata[2]:'',
				  'property_type_id'     =>  !empty($importdata[3])?$importdata[3]:'',
				  'project_mgr_name'     =>  !empty($importdata[4])?$importdata[4]:'',
				  'project_mgr_email'     =>  !empty($importdata[5])?$importdata[5]:'',
				  'project_mgr_phone'     =>  !empty($importdata[6])?$importdata[6]:'',
				  'address'     =>  !empty($importdata[7])?$importdata[7]:'',
				  'price_min'     =>  !empty($importdata[8])?$importdata[8]:'',
				  'price_max'     =>  !empty($importdata[9])?$importdata[9]:'',
				  'total_units'     =>  !empty($importdata[10])?$importdata[10]:'',
				  'size_min'     =>  !empty($importdata[11])?$importdata[11]:'',
				  'size_max'     =>  !empty($importdata[12])?$importdata[12]:'',
				  'latitude'     =>  !empty($importdata[13])?$importdata[13]:'',
				  'longitude'     =>  !empty($importdata[14])?$importdata[14]:'',
				  'description'     =>  !empty($importdata[15])?$importdata[15]:'',
				  'category'     =>  !empty($importdata[16])?$importdata[16]:'',
				  'gated_community'     =>  !empty($importdata[17])?$importdata[17]:'',
				  'img_path'     =>  !empty($importdata[18])?$importdata[18]:'',
				  'status'     =>  !empty($importdata[21])?$importdata[21]:''
				);
				//echo "<pre>"; print_r($row); die;
				$this->db->trans_begin();
				$lId = $this->adminModel->importCsvProjects($row);
				if(!empty($importdata[19])){
					$project_images = $importdata[19];
					$pImg = explode(',',$project_images);
					foreach($pImg as $pI){
						$insertImage = array(
							'project_id' => $lId,
							'path' => $pI,
							'brochure' => 'no'
						);
						$imgUpload = $this->adminModel->uploadProjctImages($insertImage);
					}
				}
				if(!empty($importdata[20])){
					$brochurePdf = $importdata[20];
					$insertBrochure = array(
						'project_id' => $lId,
						'path' => $brochurePdf,
						'brochure' => 'yes'
					);
					$brochrUpload = $this->adminModel->uploadProjctBrochure($insertBrochure);
				}
				$row_new = array(
				  'developer_id'     =>  !empty($importdata[1])?$importdata[1]:'',
				  'project_id'     =>  $lId,
				  'bhk'     =>  !empty($importdata[22])?$importdata[22]:'',
				  'bathrooms'     =>  !empty($importdata[23])?$importdata[23]:'',
				  'price'     =>  !empty($importdata[24])?$importdata[24]:'',
				  'sqft_price'     =>  !empty($importdata[25])?$importdata[25]:'',
				  'size'     =>  !empty($importdata[26])?$importdata[26]:'',
				  'super_build_area'     =>  !empty($importdata[27])?$importdata[27]:'',
				  'carpet_area'     =>  !empty($importdata[28])?$importdata[28]:'',
				  'description'     =>  !empty($importdata[29])?$importdata[29]:'',
				  'available_listings'     =>  !empty($importdata[30])?$importdata[30]:'',
				  'property_type_id' => !empty($importdata[31])?$importdata[31]:'',
				  'property_status' => !empty($importdata[32])?$importdata[32]:'',
				  'status'     =>  'enabled'
				);
				$this->adminModel->importCsvListings($row_new);
				if(!$this->db->trans_status()){
				  $msgs = 'failed';
				  $this->db->trans_rollback();
				  $response['status']='error';
				  $response['message']='Something went wrong while saving your data';
				  break;
				}else{
				
				 $msgs = 'pass';
				  $this->db->trans_commit();
				  $response['status']='success';
				  $response['message']='Successfully added new record.';
				}
			}else{
				$msgs = 'duplicate';
				  $this->db->trans_rollback();
				  $response['status']='error';
				  $response['message']='Something went wrong while saving your data';
				  break;
			}
	      }
	      fclose($file);
	    }
	  }
	  
	  redirect(base_url()."index.php/adminDashboard/projectListView/".$msgs);
	}
	
	public function delete_project($id=null,$status1)
	{
		 
		if($id!=null){
			if($status1=='0'){
				$status = array('status'=> 'disabled');
			}else{
				$status = array('status'=> 'enabled');
			}
			$res = $this->adminModel->delete_project_by_id($id,$status);
			
			if($res==true){
				redirect(base_url()."index.php/adminDashboard/projectListView/");
			}
		} else {
			redirect(base_url()."index.php/adminDashboard/projectListView/");
		}
		
	}
	
	public function removeProjctCover(){
		$data = $this->adminModel->removeProjctCover();
		if($data == "true")
		{
			
			echo json_encode(array('status' => 'true'));

		}
		else
		{

			echo json_encode(array('status' => 'false'));

		}
	}
	
	public function listSearchAds(){
		$data = array();
		$data['records'] = $this->adminModel->getSearchAds();
		$this->load->view('admin/listSearchAds',$data);
	}
	public function addNewAd(){
		if(empty($_POST)){
			$data = array();
			$data['devs'] = $this->adminModel->getPaidDevp();
			$this->load->view('admin/addNewAd',$data);
		}else{
			$data = $this->adminModel->getaddNewAdForm();
			echo json_encode($data);
		}
	}
	
	public function getDevProjects(){
		$data = $this->adminModel->getDevProjects();
		echo json_encode($data);
	}
	
	public function editAd(){
		$id = $this->uri->segment(3);
		if(!empty($id)){
			$data = array();
			$data['devs'] = $this->adminModel->getPaidDevp();
			$data['record'] = $this->adminModel->getAdRecord($id);
			$this->load->view('admin/editAd',$data);
		}else{
			$this->load->view('admin/listSearchAds');
		}
	}
	
	public function editNewAdForm(){
		 $data = $this->adminModel->getEditAdForm();
		 if($data=='true'){
			$msg = 'pass';
		 }else{
			$msg = 'fail';
		 }
		 redirect(base_url().'index.php/adminDashboard/editAd/'.$_POST['aid'].'/'.$msg);
	
	}
	
	public function delete_ad($id=null,$status1)
	{
		 
		if($id!=null){
			if($status1=='0'){
				$status = array('status'=> 'disabled');
			}else{
				$status = array('status'=> 'enabled');
			}
			$res = $this->adminModel->delete_ad_by_id($id,$status);
			
			if($res==true){
				redirect(base_url()."index.php/adminDashboard/listSearchAds/");
			}
		} else {
			redirect(base_url()."index.php/adminDashboard/listSearchAds/");
		}
		
	}
	
}