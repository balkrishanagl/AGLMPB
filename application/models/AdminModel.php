<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// require 'vendor/autoload.php';
// use GuzzleHttp\Client;
//require base_url()'dompdf/autoload.inc.php';

class AdminModel extends CI_Model
{

	public function __construct()
	{
	  parent::__construct();
	  // $this->load->helper('utility_helper');
	  //$this->load->helper('crypto_helper');
	}

	public function generatePassword()
	{
		$length = 10;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-+_=';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function reArrayFiles(&$file_post) 
	{
			//return $file_post;
			$file_ary = array();
			$file_count = count($file_post['name']);
			$file_keys = array_keys($file_post);
		
			for ($i=0; $i<$file_count; $i++) 
			{
				foreach ($file_keys as $key) 
				{
					$file_ary[$i][$key] = $file_post[$key][$i];
				}
			}
		
			return $file_ary;
	}
		

	private function set_upload_options()
	{   
		
		//upload an image options
		$config = array();

		$config['upload_path'] = './assets/uploads/images/';
		$config['allowed_types'] = 'jpg|png|pdf|docx';

		$config['max_size']      = '10000';
		$config['overwrite']     = FALSE;
	
		return $config;
	}

	private function set_upload_brochure()
	{
		//upload an BROCHURE options
		$config2 = array();

		$config2['upload_path'] = './assets/uploads/brochure/';
		$config2['allowed_types'] = 'jpg|png|pdf|docx';
		
		$config2['max_size']      = '10000';
		$config2['overwrite']     = FALSE;
	
		return $config2;
	}

	public function convertCurrency($number)
	{
		$length = strlen($number);
		
		if($length == 4 || $length == 5)
		{
			// Thousand
			$number = $number / 1000;
			$number = round($number,2);
			$ext = "Thousand";
			$currency = $number." ".$ext;
		}
		elseif($length == 6 || $length == 7)
		{
			// Lakhs
			$number = $number / 100000;
			$number = round($number,2);
			$ext = "Lac";
			$currency = $number." ".$ext;
	
		}
		elseif($length == 8 || $length == 9)
		{
			// Crores
			$number = $number / 10000000;
			$number = round($number,2);
			$ext = "Cr";
			$currency = $number.' '.$ext;
		}
	
		echo $currency;
	}

	public function getAdminLogin()
	{
//print_r($_POST);  exit;
		$userEmail = $_POST['userName'];
		$password = $_POST['password'];

		$this->db->select('*');
		$this->db->from('login_admin');
		$this->db->where('user_name',$userEmail);

		$result = $this->db->get()->result_array();
		if($result[0]['password'] === sha1($password))
		{
			$userId   = $result[0]['id'];
			$userType = $result[0]['user_type'];
			$userName = $result[0]['name'];

			$_SESSION['uEmail'] = $userEmail;
			$_SESSION['uType'] = $userType;
			$_SESSION['uId'] = $userId;
			$_SESSION['uName'] = $userName;

			return array("status"=>true,"msg"=>"allow redirection","redirectURL"=>base_url()."index.php/adminDashboard/home");
		}
		else
		{
			return array("status"=>false);
		}

	}

	//////////////////////////////////////////////////////////
	/////////////////DEVELOPER////////////////////////////////
	//////////////////////////////////////////////////////////

	public function getProjectManagerOfDev()
	{
		$this->db->select('pm.pm_id, pm.name, pm.email, pm.phone');
		$this->db->from('project_managers pm');
		$this->db->where('pm.developer_id',$_SESSION['uId']);
		$this->db->where('status','enabled');

		$result = $this->db->get()->result_array();
		return $result;
	}


	public function getProjectsOfDeveloper()
	{
		$this->db->select('p.*,l.name as location_name, c.city_id as cityId, c.name as cityName');
		$this->db->from('projects p');
		$this->db->join('locations l','p.location_id = l.location_id','LEFT');
		$this->db->join('city c','l.city_id = c.city_id','LEFT');
		$this->db->where('p.developer_id',$_SESSION['uId']);

		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getDevProjectDetail()
	{
		$this->db->select('p.*,
						  pt.name as property_type_name,
						  l.name as location_name,c.name as city_name');
						  //list.bhk as list_bhk,list.description as list_desc,list.bathrooms as list_bathrooms,list.price as list_price,list.sqft_price as list_sqft_price,list.size as list_size,list.super_build_area as list_super_build_area,list.carpet_area as list_carpet_area,list.available_listings as list_available_listings,ptlist.name as list_property_type
		$this->db->from('projects p');
		$this->db->join('locations l','p.location_id = l.location_id','LEFT');
		$this->db->join('city c','l.city_id = c.city_id','LEFT');

		$this->db->join('property_types pt','p.property_type_id = pt.property_type_id','LEFT');		
	
		$this->db->where('p.project_id',decrypt($_GET['id']));
		$this->db->where('p.developer_id',$_SESSION['uId']);

		$result = $this->db->get()->result_array();

		////////////////////////////////////////////
		// Keywords
		$this->db->select('k.name as keyword_name');
		$this->db->from('keyword_maps km');
		$this->db->join('projects p','km.project_id = p.project_id','LEFT');
		$this->db->join('keywords k','k.keyword_id = km.keyword_id','LEFT');
		$this->db->where('p.project_id',decrypt($_GET['id']));

		$result['keywords'] = $this->db->get()->result_array();

		////////////////////////////////////////////
		// Facilities
		$this->db->select('f.name as facility_name');
		$this->db->from('facility_maps fm');
		$this->db->join('projects p','fm.project_id = p.project_id','LEFT');
		$this->db->join('facilities f','f.facilities_id = fm.facility_id','LEFT');
		$this->db->where('p.project_id',decrypt($_GET['id']));

		$result['facilities'] = $this->db->get()->result_array();

		//////////////////////////////////////////////////////////////////
		//property_types ptlist of listings list
		$this->db->select('list.*,ptlist.name as property_list_name_listings');
		$this->db->from('listings list');
		$this->db->join('property_types ptlist','list.property_type_id = ptlist.property_type_id','LEFT');
		$this->db->where('list.project_id',decrypt($_GET['id']));
		$result['listings'] = $this->db->get()->result_array(); 
		
		///////////////////////////////////////////////////////////////////
		$this->db->select('developer_id');
		$this->db->from('listings list');
		$this->db->where('list.developer_id',$_SESSION['uId']);
		$totalListings = $this->db->get()->result_array();
		$result['totalListings'] = count($totalListings);

		$this->db->select('allowed_listings');
		$this->db->from('developers');
		$this->db->where('developer_id',$_SESSION['uId']);
		$allowedListings= $this->db->get()->result_array();
		$result['allowedListings'] = $allowedListings[0]['allowed_listings'];

		return $result;
	}


	public function getAddProjectForm()
	{
		// !IMPORTANT!
		// NO NEED LOGIN DETAILS FOR PM. ONLY LOGINS ARE FOR ADMIN AND DEVELOPER.
		// PMs only get mail like request viewing or details about the projects.
		// ALL PROJECT DETAILS ARE ADDED BY DEVELOPER! NOPE BY SUPER ADMIN!
		// HERE, JUST CHECK IF THE PROJECT MANAGER EXISTS IN PROJECT_MANAGERS TABLE AND SEND MAIL ACCORDINGLY
		// NEW PM MAIL CONTENT: YOU HAVE BEEN APPOINTED AS PM FOR THIS PROJECT BY 'DEV_NAME'. YOU WILL RECIEVE ALL REQUESTS FOR THIS PROJECT.
		// DEVELOPER CAN ALSO EDIT PROJECT MANAGERS ANYTIME.

		// 1.ADD THE PROJECT DETAILS
		// name=Test
		// &location_id=2
		// &gated_community=on
		// &property_type=2
		// &description=test
		// &total_units=1500
		// &facilities_id=1
		// &facilities_id=2
		// &facilities_id=beach
		// &project_mgr_id=1
		// &newMgrName=
		// &newMgrEmail=
		// &size_min=1500
		// &size_max=3999
		// &price_min=4000000
		// &price_max=5000000
		//////////////////////////////////////////////////
		// GATED COMMUNITY
		
		if(isset($_POST['gated_community']))
		{
			$gated_community = '1';
		}
		else
		{
			$gated_community = '0';
		}

		//////////////////////////////////////////////////
		// FACILITIES
		if($_POST['facilities_id'] != null)
		{
			$facilities = array();
			// $newFacilityId = array();
			$_POST['facilities_id'] = array_unique($_POST['facilities_id']);
			foreach($_POST['facilities_id'] as $value)
			{
				if(is_numeric($value))
				{
					array_push($facilities,$value);
				}
				else
				{
					//if new facility, add to facility table and store the id along with old facilities
					$new = array('name'=> $value);
					$this->db->insert('facilities',$new);
					$insert_id = $this->db->insert_id();
					array_push($facilities,$insert_id);
				}
			}
			// $allFacilities = array_merge($facilities);
		}
		else
		{
			$facilities = '';
		}

		//$facilities = implode(',',$facilities);

		//////////////////////////////////////////////////
		// KEYWORDS
		// if($_POST['keyword_id'] != null)
		// {
		// 	$keywords = array();
		// 	// $newKeywordsId = array();
		// 	$_POST['keyword_id'] = array_unique($_POST['keyword_id']);
		// 	foreach($_POST['keyword_id'] as $value)
		// 	{
		// 		if(is_numeric($value))
		// 		{
		// 			array_push($keywords,$value);
		// 		}
		// 		else
		// 		{
		// 			$new = array('name'=> $value);
		// 			$this->db->insert('keywords',$new);
		// 			$insert_id = $this->db->insert_id();
		// 			array_push($keywords,$insert_id);
		// 		}
		// 	}
		// 	// $allKeywords = array_merge($keywords,$newKeywordsId);
		// }
		// else
		// {
		// 	$keywords = '';
		// }
		// DELETE KEYWORDS - NO NEED - FORGET IT AND REMOVE THE TABLE
		///////////////////////////////////////////////////

		///////////////////////////////////////////////////	
		// NEARBY Location
		if($_POST['nearby_id'] != null)
		{
			foreach ($_POST['nearby_id'] as $key => $value) {
				// check if the value is nearby to any location
				$this->db->select('*');
				$this->db->from('nearby_location_maps');
				$this->db->where('nearby_id',$value);
				$this->db->where('location_id',$_POST['location_id']);
				$nearby_result = $this->db->get()->result_array();
				if($nearby_result == null)
				{
					// if value is not near to any location,
					// check if any location is stored with value as nearby
					$this->db->select('*');
					$this->db->from('nearby_location_maps');
					$this->db->where('nearby_id',$_POST['location_id']);
					$this->db->where('location_id',$value);
					$inverse_nearby_result = $this->db->get()->result_array();
					if($inverse_nearby_result == null)
					{ 
						// if there is no trace of the value in the nearby maps table,
						// then insert
						$insert_nearby = array(
							'location_id' => $_POST['location_id'],
							'nearby_id' => $value
						);
						
						$this->db->insert('nearby_location_maps',$insert_nearby);
						// hell yea
					}
				}
			}
		}
		///////////////////////////////////////////////////


		


		//$keywords = implode(',',$keywords);
		//////////////////////////////////////////////////
		// PROJECT MANAGER
		$developerId = $_POST['developer_id'];
		$projectName = $_POST['name'];
		$locationId = $_POST['location_id'];

		$this->db->select('name as developerName');
		$this->db->from('developers');
		$this->db->where('developer_id',$developerId);
		$devName = $this->db->get()->result_array();
		$developerName = $devName[0]['developerName'];
		$newManagerEmail = $_POST['newMgrEmail'];
	

		// SEND EMAIL.
		$mesg = "You have been appointed as project manager for the Project $projectName by $developerName. You will recieve all the queries given by the clients about this project";
		$sub = "A project has been appointed to you!";
		$to = $newManagerEmail;
		/*if($this->getEmail($sub,$mesg,$to))
		{*/
		//////////////////////////////////////////////////////
		// ADD PROJECT

		$addNewProject = array(
			'developer_id' => $developerId,
			'project_mgr_name' => $_POST['newMgrName'],
			'project_mgr_email' => $newManagerEmail,
			'project_mgr_phone' => $_POST['newProjectMgrPhone'],
			'location_id' => $locationId,
			'property_type_id' => $_POST['property_type_id'],
			'name' => $projectName,
			'status' => 'enabled',
			'price_min' => $_POST['price_min'],
			'address' => $_POST['address'],
			'price_max' => $_POST['price_max'],
			'gated_community' => $gated_community,
			'total_units' => $_POST['total_units'],
			'size_min' => $_POST['size_min'],
			'size_max' => $_POST['size_max'],
			'latitude' => $_POST['latitude'],
			'longitude' => $_POST['longitude'],
			'description' => $_POST['description'],
			//img_path if needed
			'category' => $_POST['category'],
			'property_status' => $_POST['pStatus'],
			'sale_type' => $_POST['saleType'],
			'posted_by' => $_POST['postedBy'],
			// brosure if needed
			// offers if needed			
		  );

			if($this->db->insert('projects',$addNewProject))
			{
				$newProjectId = $this->db->insert_id();
				// Now insert the facilities and keywords into the mapping tables
				foreach ($facilities as $fac) 
				{
					$new = array('facility_id' => $fac,'project_id' => $newProjectId);
					$this->db->insert('facility_maps',$new);
				}

				// foreach ($keywords as $key) 
				// {
				// 	$new = array('keyword_id' => $key,'project_id' => $newProjectId);
				// 	$this->db->insert('keyword_maps',$new);
				// }

				/////////////////////////////////////////////////////
				///NOW UPLOAD IMAGES AND BROCHURES///////////////////
				/////////////////////////////////////////////////////

				$this->load->library('upload');
				$time = time();

				$dataInfo = array();
				$details = $this->reArrayFiles($_FILES['userfile']);

				$brochureInfo = array();
				$brochureDetails = $this->reArrayFiles($_FILES['userBrochure']);

				$coverInfo = array();
				$coverDetails = $this->reArrayFiles($_FILES['cover']);

				foreach ($details as $key => $detail) 
				{
					$img_name = str_replace(" ", "_", $detail['name']);
					$_FILES['userfile']['name'] = $time.$img_name;
					$_FILES['userfile']['type'] = $detail['type'];
					$_FILES['userfile']['tmp_name'] = $detail['tmp_name'];
					$_FILES['userfile']['error'] = $detail['error'];
					$_FILES['userfile']['size'] = $detail['size'];	

					$this->upload->initialize($this->set_upload_options());

					if($this->upload->do_upload('userfile')) 
					{ 
						$imageUploadData = $this->upload->data();
						$imageInfo[] = $imageUploadData['file_name'];
					}
				}

				foreach ($brochureDetails as $key => $brochure) 
				{
					$brochure_name = str_replace(" ", "_", $brochure['name']);
					$_FILES['userBrochure']['name'] = $time.$brochure_name;
					$_FILES['userBrochure']['type'] = $brochure['type'];
					$_FILES['userBrochure']['tmp_name'] = $brochure['tmp_name'];
					$_FILES['userBrochure']['error'] = $brochure['error'];
					$_FILES['userBrochure']['size'] = $brochure['size'];	

					$this->upload->initialize($this->set_upload_brochure());
					
					if($this->upload->do_upload('userBrochure'))
					{
						$brochureUploadData = $this->upload->data();
						$brochureInfo[] = $brochureUploadData['file_name'];
					}
				}

				$img_name = str_replace(" ", "_", $coverDetails[0]['name']);
				$_FILES['cover']['name'] = $time.$img_name;
				$_FILES['cover']['type'] = $coverDetails[0]['type'];
				$_FILES['cover']['tmp_name'] = $coverDetails[0]['tmp_name'];
				$_FILES['cover']['error'] = $coverDetails[0]['error'];
				$_FILES['cover']['size'] = $coverDetails[0]['size'];	
	
				$this->upload->initialize($this->set_upload_options());
	
				if($this->upload->do_upload('cover')) 
				{ 
					$coverUploadData = $this->upload->data();
					$coverInfo = $coverUploadData['file_name'];
				}
				
				$insertCover = array(
					'img_path' => $coverInfo
				);
				$this->db->where('project_id',$newProjectId);
				$this->db->update('projects',$insertCover);

				foreach ($brochureInfo as $key => $upload2)
				{
					$insertBrochure = array(
						'project_id' => $newProjectId,
						'path' => $upload2,
						'brochure' => 'yes'
					);

					$this->db->insert('project_upload',$insertBrochure);
				}

				foreach ($imageInfo as $key => $upload)
				{
					$insertImage = array(
						'project_id' => $newProjectId,
						'path' => $upload,
						'brochure' => 'no'
					);
					$this->db->insert('project_upload',$insertImage);
				}

				redirect(base_url().'index.php/adminDashboard/home');
				// Display a toast in the redirecting dashboard
			}
			else
			{
				return array("status"=>false,"msg"=>"Error in adding project!");
			}

		/*}
		else
		{
			return array("status"=>false,"msg"=>"Project Manager Email is incorrect");
		}*/
	
	}

	public function getAddListing()
	{
		$this->db->select('p.name as project_name, p.project_id as project_id, d.developer_id as developer_id, d.name as developer_name');
		$this->db->from('projects p');
		$this->db->join('developers d','p.developer_id = d.developer_id');
		$this->db->where('project_id',$_GET['id']);

		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getAddListingForm()
	{

		///////////////////////////////////////////////////////////////
		////////////////////IMAGE UPLOAD///////////////////////////////
		///////////////////////////////////////////////////////////////

		$this->load->library('upload');
		$time = time();

		$dataInfo = array();
		$details = $this->reArrayFiles($_FILES['userfile']);
		// foreach ($details as $key => $detail) 
		// {
			$img_name = str_replace(" ", "_", $details[0]['name']);
			$_FILES['userfile']['name'] = $time.$img_name;
			$_FILES['userfile']['type'] = $details[0]['type'];
			$_FILES['userfile']['tmp_name'] = $details[0]['tmp_name'];
			$_FILES['userfile']['error'] = $details[0]['error'];
			$_FILES['userfile']['size'] = $details[0]['size'];	

			$this->upload->initialize($this->set_upload_options());

			if($this->upload->do_upload('userfile')) 
			{ 
				$imageUploadData = $this->upload->data();
				$imageInfo = $imageUploadData['file_name'];
			}
		// }

			$_POST['img_url'] = $imageInfo;


		/////////////////////////////////////////////////////////////////////

		$addNewListing = array(
			'developer_id' => $_POST['developer_id'],
			'project_id' => $_POST['project_id'],
			'bhk' => $_POST['bhk'],
			'bathrooms' => $_POST['bathrooms'],
			'size' => $_POST['size'],
			'super_build_area' => $_POST['super_build_area'],
			'carpet_area' => $_POST['carpet_area'],
			'description' => $_POST['description'],
			'available_listings' => $_POST['available_listings'],
			'property_type_id' => $_POST['property_type_id'],
			'property_status' => $_POST['property_status'],
			'price' => $_POST['price'],
			'sqft_price' => $_POST['sqft_price'],
			'status' => 'enabled',
			'img_url' => $_POST['img_url']
		);


		if($this->db->insert('listings',$addNewListing))
		{
			//return array("status"=>true,"msg"=>"Listing Successfully Added!");
			redirect(base_url().'index.php/adminDashboard/home');			
		}
		else
		{
			return array("status"=>false,"msg"=>"Error in adding project!");
		}

	}

	public function getEmail($sub,$mesg,$to)
	{
		/*$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mithun@globeshout.com',
            'smtp_pass' => 'back-ups600',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('mithun@globeshout.com', 'hello');
        $this->email->to($to);
        $this->email->subject('Email Test');
        $this->email->message($mesg);

        if($this->email->send())
        {
            return true;
        }
        else
        {
            echo $this->email->print_debugger();
        }*/
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->to($to);
		$this->email->from('mithun@globeshout.com','My Property Boutique');
		$this->email->subject($sub);
		$this->email->message($mesg);
				
		if($this->email->send()){
			return true;
		}else{
			echo $this->email->print_debugger();
			
		}

	}

	public function getEditListing()
	{
		
		$this->db->select('l.*,pt.name as property_type_name');
		$this->db->from('listings l');
		$this->db->join('property_types pt','l.property_type_id = pt.property_type_id');
		$this->db->where('listing_id',decrypt($_GET['id']));
		$result = $this->db->get()->result_array();
		$result['propertyType'] = $this->getDevPropertyType();
		return $result;
	}

	public function getEditListingForm()
	{	
		$checkFile = $this->reArrayFiles($_FILES['userfile']);
		if($checkFile[0]['name'] == '')
		{
			$updateListings = array(
				'bhk' => $_POST['bhk'],
				'bathrooms' => $_POST['bathrooms'],
				'price' => $_POST['price'],
				'sqft_price' => $_POST['sqft_price'],
				'size' => $_POST['size'],
				'super_build_area' => $_POST['super_build_area'],
				'carpet_area' => $_POST['carpet_area'],
				'description' => $_POST['description'],
				'available_listings' => $_POST['available_listings'],
				'property_type_id' => $_POST['property_type_id'],
				'property_status' => $_POST['property_status']
			);
	
			$this->db->where('listing_id',$_POST['listing_id']);
			if($this->db->update('listings',$updateListings))
			{
				redirect(base_url().'index.php/adminDashboard/home');
			}
			else
			{
				return array("status"=>false, "msg"=>"Error in updating Listing!");				
			}
		}
		else
		{
			// Delete the previous image and then update the new image

			///////////////////////////////////////////////////////////////
			////////////////////IMAGE UPLOAD///////////////////////////////
			///////////////////////////////////////////////////////////////
			$this->load->library('upload');
			$time = time();

			$dataInfo = array();
			$details = $this->reArrayFiles($_FILES['userfile']);

			$img_name = str_replace(" ", "_", $details[0]['name']);
			$_FILES['userfile']['name'] = $time.$img_name;
			$_FILES['userfile']['type'] = $details[0]['type'];
			$_FILES['userfile']['tmp_name'] = $details[0]['tmp_name'];
			$_FILES['userfile']['error'] = $details[0]['error'];
			$_FILES['userfile']['size'] = $details[0]['size'];	

			$this->upload->initialize($this->set_upload_options());

			if($this->upload->do_upload('userfile')) 
			{ 
				$imageUploadData = $this->upload->data();
				$imageInfo = $imageUploadData['file_name'];
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);print_r($_FILES['userfile']['type']);exit();
			}


			$img_url = $imageInfo;
			/////////////////////////////////////////////////////////////////////
			$this->db->select('img_url');
			$this->db->from('listings');
			$this->db->where('listing_id',$_POST['listing_id']);
			$existingImage = $this->db->get()->result_array();
			$existingFile = $existingImage[0]['img_url'];

			if($existingFile != null)
			{
				$existingPath = 'assets/uploads/images/'.$existingFile;
				// delete existing file
				unlink($existingPath);
			}
			

			$updateListings = array(
				'bhk' => $_POST['bhk'],
				'bathrooms' => $_POST['bathrooms'],
				'price' => $_POST['price'],
				'sqft_price' => $_POST['sqft_price'],
				'size' => $_POST['size'],
				'super_build_area' => $_POST['super_build_area'],
				'carpet_area' => $_POST['carpet_area'],
				'description' => $_POST['description'],
				'available_listings' => $_POST['available_listings'],
				'property_type_id' => $_POST['property_type_id'],
				'property_status' => $_POST['property_status'],
				'img_url' => $img_url
			);
	
			$this->db->where('listing_id',$_POST['listing_id']);
			if($this->db->update('listings',$updateListings))
			{
				redirect(base_url().'index.php/adminDashboard/home');
			}
			else
			{
				return array("status"=>false, "msg"=>"Error in updating Listing!");				
			}


		}		 

	}

	public function getUpdateProject()
	{
		// TAKE KEYWORDS OUT
		$this->db->select('p.*,d.name as developerName');
		$this->db->from('projects p');
		$this->db->join('developers d','d.developer_id = p.developer_id');
		$this->db->where('p.project_id',decrypt($_GET['id']));
		$result = $this->db->get()->result_array();

		$this->db->select('GROUP_CONCAT(DISTINCT(fm.facility_id)) as project_facilities_id');
		$this->db->from('projects p');
		$this->db->join('facility_maps fm','fm.project_id = p.project_id');
		$this->db->where('p.project_id',decrypt($_GET['id']));
		$test['project_facilities'] = $this->db->get()->result_array();
		
		$result['project_facilities'] = explode(',',$test['project_facilities'][0]['project_facilities_id']);

		$this->db->select('GROUP_CONCAT(DISTINCT(km.keyword_id)) as project_keywords_id');
		$this->db->from('projects p');
		$this->db->join('keyword_maps km','km.project_id = p.project_id');
		$this->db->where('p.project_id',decrypt($_GET['id']));
		$test['project_keywords'] = $this->db->get()->result_array();

		$result['project_keywords'] = explode(',',$test['project_keywords'][0]['project_keywords_id']);

		$result['locations'] = $this->getDevProjectLocation();
		$result['propertyType'] = $this->getDevPropertyType();
		$result['facilities'] = $this->getDevFacilities();
		$result['keywords'] = $this->getDevKeywords();
		$result['uploads'] = $this->getDevUploads(decrypt($_GET['id']));
		return $result;
	}

	public function getUpdateProjectForm()
	{

		if(isset($_POST['gated_community']))
		{
			$gated_community = '1';
		}
		else
		{
			$gated_community = '0';
		}

		// DELETE ALL PREVIOUS FACILITIES AND ADD NEW ONES IN MAPS
		$this->db->where('project_id',$_POST['project_id']);
		$this->db->delete('facility_maps');

		// DELETE ALL PREVIOUS KEYWORDS AND ADD NEW ONES IN MAPS
		$this->db->where('project_id',$_POST['project_id']);
		$this->db->delete('keyword_maps');

		//////////////////////////////////////////////////
		// FACILITIES
		if($_POST['facilities_id'] != null)
		{
			$facilities = array();
			// $newFacilityId = array();
			$_POST['facilities_id'] = array_unique($_POST['facilities_id']);
			foreach($_POST['facilities_id'] as $value)
			{
				if(is_numeric($value))
				{
					array_push($facilities,$value);
				}
				else
				{
					//if new facility, add to facility table and store the id along with old facilities
					$new = array('name'=> $value);
					$this->db->insert('facilities',$new);
					$insert_id = $this->db->insert_id();
					array_push($facilities,$insert_id);
				}
			}
			// $allFacilities = array_merge($facilities);
		}
		else
		{
			$facilities = '';
		}

		//$facilities = implode(',',$facilities);

		//////////////////////////////////////////////////
		// KEYWORDS - REMOVE EVERYTHING
		// if($_POST['keyword_id'] != null)
		// {
		// 	$keywords = array();
		// 	// $newKeywordsId = array();
		// 	$_POST['keyword_id'] = array_unique($_POST['keyword_id']);
		// 	foreach($_POST['keyword_id'] as $value)
		// 	{
		// 		if(is_numeric($value))
		// 		{
		// 			array_push($keywords,$value);
		// 		}
		// 		else
		// 		{
		// 			$new = array('name'=> $value);
		// 			$this->db->insert('keywords',$new);
		// 			$insert_id = $this->db->insert_id();
		// 			array_push($keywords,$insert_id);
		// 		}
		// 	}
		// 	// $allKeywords = array_merge($keywords,$newKeywordsId);
		// }
		// else
		// {
		// 	$keywords = '';
		// }	
		///////////////////////////////////////////////////	
		// NEARBY Location - CANNOT EDIT NEARBY LOC IN PROJECT
		// if($_POST['nearby_id'] != null)
		// {
		// 	foreach ($_POST['nearby_id'] as $key => $value) {
		// 		// check if the value is nearby to any location
		// 		$this->db->select('*');
		// 		$this->db->from('nearby_location_maps');
		// 		$this->db->where('nearby_id',$value);
		// 		$this->db->where('location_id',$_POST['location_id']);
		// 		$nearby_result = $this->db->get()->result_array();
		// 		if($nearby_result == null)
		// 		{
		// 			// if value is not near to any location,
		// 			// check if any location is stored with value as nearby
		// 			$this->db->select('*');
		// 			$this->db->from('nearby_location_maps');
		// 			$this->db->where('nearby_id',$_POST['location_id']);
		// 			$this->db->where('location_id',$value);
		// 			$inverse_nearby_result = $this->db->get()->result_array();
		// 			if($inverse_nearby_result == null)
		// 			{ 
		// 				// if there is no trace of the value in the nearby maps table,
		// 				// then insert
		// 				$insert_nearby = array(
		// 					'location_id' => $_POST['location_id'],
		// 					'nearby_id' => $value
		// 				);
						
		// 				$this->db->insert('nearby_location_maps',$insert_nearby);
		// 				// hell yea
		// 			}
		// 		}
		// 	}
		// }
		///////////////////////////////////////////////////


		foreach ($facilities as $fac) 
		{
			$new = array('facility_id' => $fac,'project_id' => $_POST['project_id']);
			$this->db->insert('facility_maps',$new);
		}

		// foreach ($keywords as $key) 
		// {
		// 	$new = array('keyword_id' => $key,'project_id' => $_POST['project_id']);
		// 	$this->db->insert('keyword_maps',$new);
		// }


		$updateProject = array(
			'project_mgr_name' => $_POST['newMgrName'],
			'project_mgr_email' => $_POST['newMgrEmail'],
			'project_mgr_phone' => $_POST['newProjectMgrPhone'],
			'location_id' => $_POST['location_id'],
			'property_type_id' => $_POST['property_type_id'],
			'name' => $_POST['name'],
			'status' => $_POST['status'],
			'address' => $_POST['address'],
			'price_min' => $_POST['price_min'],
			'price_max' => $_POST['price_max'],
			'gated_community' => $gated_community,
			'total_units' => $_POST['total_units'],
			'size_min' => $_POST['size_min'],
			'size_max' => $_POST['size_max'],
			'latitude' => $_POST['latitude'],
			'longitude' => $_POST['longitude'],
			'description' => $_POST['description'],
			'category' => $_POST['category'],
			'property_status' => $_POST['pStatus'],
			'sale_type' => $_POST['saleType'],
			'posted_by' => $_POST['postedBy']
		);

		$checkFile = $this->reArrayFiles($_FILES['userfile']);
		$checkBrochure = $this->reArrayFiles($_FILES['userBrochure']);
		$time = time();
		$this->load->library('upload');

		$dataInfo = array();
		$details = $this->reArrayFiles($_FILES['userfile']);

		$brochureInfo = array();
		$brochureDetails = $this->reArrayFiles($_FILES['userBrochure']);
		/*if($checkFile[0]['name'] != '')
		{

			$this->db->select('id,path');
			$this->db->from('project_upload');
			$this->db->where('project_id',$_POST['project_id']);
			$this->db->where('brochure','no');
			$deleteIds = $this->db->get()->result_array();
			
			if($deleteIds != null)
			{
				foreach ($deleteIds as $key => $value) {
					$this->db->where('id',$value['id']);
					$this->db->delete('project_upload');

					$existingPath = 'assets/uploads/images/'.$value['path'];
					// delete existing file
					unlink($existingPath);
					
				}
			}
		}

		if($checkBrochure[0]['name'] != '')
		{
			$this->db->select('id,path');
			$this->db->from('project_upload');
			$this->db->where('project_id',$_POST['project_id']);
			$this->db->where('brochure','yes');
			$deleteId = $this->db->get()->result_array();
			
			if($deleteId != null)
			{
				foreach ($deleteId as $key => $value2) {
					$this->db->where('id',$value2['id']);
					$this->db->delete('project_upload');

					$existingPath2 = 'assets/uploads/brochure/'.$value2['path'];
					// delete existing file
					unlink($existingPath2);
				}
			}
		}*/



		if($checkFile[0]['name'] != '')
		{

			foreach ($checkFile as $key => $detail) 
			{
				$img_name = str_replace(" ", "_", $detail['name']);
				$_FILES['userfile']['name'] = $time.$img_name;
				$_FILES['userfile']['type'] = $detail['type'];
				$_FILES['userfile']['tmp_name'] = $detail['tmp_name'];
				$_FILES['userfile']['error'] = $detail['error'];
				$_FILES['userfile']['size'] = $detail['size'];	

				$this->upload->initialize($this->set_upload_options());

				if($this->upload->do_upload('userfile')) 
				{ 
					$imageUploadData = $this->upload->data();
					$imageInfo[] = $imageUploadData['file_name'];
				}
			}
			foreach ($imageInfo as $key => $upload)
			{
				$insertImage = array(
					'project_id' => $_POST['project_id'],
					'path' => $upload,
					'brochure' => 'no'
				);
				$this->db->insert('project_upload',$insertImage);
			}
		}
		
		if($checkBrochure[0]['name'] != '')
		{
			
			foreach ($checkBrochure as $key => $brochure) 
			{
				$brochure_name = str_replace(" ", "_", $brochure['name']);
				$_FILES['userBrochure']['name'] = $time.$brochure_name;
				$_FILES['userBrochure']['type'] = $brochure['type'];
				$_FILES['userBrochure']['tmp_name'] = $brochure['tmp_name'];
				$_FILES['userBrochure']['error'] = $brochure['error'];
				$_FILES['userBrochure']['size'] = $brochure['size'];	

				$this->upload->initialize($this->set_upload_brochure());
				
				
				if($this->upload->do_upload('userBrochure'))
				{
					$brochureUploadData = $this->upload->data();
					$brochureInfo[] = $brochureUploadData['file_name'];
				}
				
			}
			
			foreach ($brochureInfo as $key => $upload)
			{
				$insertBrochure = array(
					'project_id' => $_POST['project_id'],
					'path' => $upload,
					'brochure' => 'yes'
				);

				$this->db->insert('project_upload',$insertBrochure);
			}
		}
		///////////////////////////
		$coverInfo = array();
		$coverDetails = $this->reArrayFiles($_FILES['cover']);

		/*if($coverDetails[0]['name'] != '')
		{
			$this->db->select('img_path');
			$this->db->from('projects');
			$this->db->where('project_id',$_POST['project_id']);
			$deleteId = $this->db->get()->result_array();
			
			if($deleteId[0]['img_path'] != null)
			{
					$existingPath2 = 'assets/uploads/images/'.$deleteId[0]['img_path'];
					// delete existing file
					unlink($existingPath2);
			}
		}*/

		if($coverDetails[0]['name'] != '')
		{
			$img_name = str_replace(" ", "_", $coverDetails[0]['name']);
			$_FILES['cover']['name'] = $time.$img_name;
			$_FILES['cover']['type'] = $coverDetails[0]['type'];
			$_FILES['cover']['tmp_name'] = $coverDetails[0]['tmp_name'];
			$_FILES['cover']['error'] = $coverDetails[0]['error'];
			$_FILES['cover']['size'] = $coverDetails[0]['size'];	

			$this->upload->initialize($this->set_upload_options());

			if($this->upload->do_upload('cover')) 
			{ 
				$coverUploadData = $this->upload->data();
				$coverInfo = $coverUploadData['file_name'];
			}
			$insertCover = array(
				'img_path' => $coverInfo
			);
			$this->db->where('project_id',$_POST['project_id']);
			$this->db->update('projects',$insertCover);
		}
		//////////////////////


		$LogoInfo = array();
		$LogoDetails = $this->reArrayFiles($_FILES['projectlogo']);

		/*if($coverDetails[0]['name'] != '')
		{
			$this->db->select('img_path');
			$this->db->from('projects');
			$this->db->where('project_id',$_POST['project_id']);
			$deleteId = $this->db->get()->result_array();
			
			if($deleteId[0]['img_path'] != null)
			{
					$existingPath2 = 'assets/uploads/images/'.$deleteId[0]['img_path'];
					// delete existing file
					unlink($existingPath2);
			}
		}*/

		if($LogoDetails[0]['name'] != '')
		{
			$img_name = str_replace(" ", "_", $LogoDetails[0]['name']);
			$_FILES['projectlogo']['name'] = $time.$img_name;
			$_FILES['projectlogo']['type'] = $LogoDetails[0]['type'];
			$_FILES['projectlogo']['tmp_name'] = $LogoDetails[0]['tmp_name'];
			$_FILES['projectlogo']['error'] = $LogoDetails[0]['error'];
			$_FILES['projectlogo']['size'] = $LogoDetails[0]['size'];	

			$this->upload->initialize($this->set_upload_options());

			if($this->upload->do_upload('projectlogo')) 
			{ 
				$LogoUploadData = $this->upload->data();
				$LogoInfo = $LogoUploadData['file_name'];
			}
			$insertLogo = array(
				'project_logo' => $LogoInfo
			);
			$this->db->where('project_id',$_POST['project_id']);
			$this->db->update('projects',$insertLogo);
		}
		//////////////////////


		$this->db->where('project_id',$_POST['project_id']);
		if($this->db->update('projects',$updateProject))
		{
			redirect(base_url().'index.php/adminDashboard/projectListView');
		}
		else
		{
			return array("status"=>false, "msg"=>"Error in updating Project!");				
		}


	}

	//////////////////////////////////////////////////////////
	/////////////////PROJECT MANAGER//////////////////////////
	//////////////////////////////////////////////////////////

	// public function getProjectsOfManager()
	// {
	// 	$this->db->select('p.*,l.name as location_name,l.city as city');
	// 	$this->db->from('projects p');
	// 	$this->db->join('locations l','p.location_id = l.location_id','LEFT');
	// 	$this->db->where('p.project_mgr_id',$_SESSION['uId']);

	// 	$result = $this->db->get()->result_array();
	// 	return $result;
	// }

	// public function getMgrProjectDetail()
	// {
	// 	$this->db->select('p.*,u.name as developer_name,pt.name as property_type_name,l.name as location_name,l.city as city');
	// 	$this->db->from('projects p');
	// 	$this->db->join('login_admin u','p.developer_id = u.id','LEFT');
	// 	$this->db->join('locations l','p.location_id = l.location_id','LEFT');
	// 	$this->db->join('property_types pt','p.property_type_id = pt.property_type_id','LEFT');
	// 	$this->db->where('p.project_id',$_GET['id']);
	// 	$this->db->where('p.project_mgr_id',$_SESSION['uId']);

	// 	$result = $this->db->get()->result_array();
	// 	return $result;
	// }

	//////////////////////////////////////////////////////////
	/////////////////ADMIN////////////////////////////////////
	//////////////////////////////////////////////////////////

	public function getDevOfAdminList()
	{
		$this->db->select('d.developer_id,d.name,d.contact_phone,d.allowed_listings,d.used_listings,d.status');
		$this->db->from('developers d');
		$this->db->where('d.status','enabled');

		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getProjectbyBuilder()
	{
		$this->db->select('p.project_id,p.name');
		$this->db->from('projects p');
		$this->db->where('p.developer_id',$_GET['id']);

		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getDevOfAdminDetail()
	{
		$this->db->select('d.*');
		$this->db->from('developers d');
		$this->db->where('d.status','enabled');
		$this->db->where('d.developer_id',$_GET['id']);

		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getAddNewDevForm()
	{
		 $this->db->select('user_name');
		 $this->db->from('login_admin');
		 $this->db->where('user_name',$_POST['contact_email']);
		
		 $result = $this->db->get()->result_array();
                 //echo "<pre>"; print_r($result); die;
		 if($result == null)
		 {
			$devNewPassword = $this->generatePassword();
			 // Add user to admin table as dev
			 // gen password and send the admin a mail
			 ////////////////////////////////////////////////////////
			// Upload Image
			$this->load->library('upload');
			$time = time();
	
			$dataInfo = array();
			$details = $this->reArrayFiles($_FILES['userfile']);
			$imageInfo = '';
				$img_name = str_replace(" ", "_", $details[0]['name']);
				$_FILES['userfile']['name'] = $time.$img_name;
				$_FILES['userfile']['type'] = $details[0]['type'];
				$_FILES['userfile']['tmp_name'] = $details[0]['tmp_name'];
				$_FILES['userfile']['error'] = $details[0]['error'];
				$_FILES['userfile']['size'] = $details[0]['size'];	
	
				$this->upload->initialize($this->set_upload_options());
	
				if($this->upload->do_upload('userfile')) 
				{ 
					$imageUploadData = $this->upload->data();
					$imageInfo = $imageUploadData['file_name'];
				}
				
				//$_POST['img_url'] = $imageInfo;
			////////////////////////////////////////////////////////
			$newDeveloper = array(
				'user_name' => $_POST['contact_email'],
				'name' => $_POST['name'],
				'password' => sha1($devNewPassword),
				'user_type' => 'developer',
				'status' => 'enabled',
				'img_path' => $imageInfo
			);

			if($this->db->insert('login_admin',$newDeveloper))
			{
				$developer_id = $this->db->insert_id();

				$addDeveloper = array(
					'developer_id' => $developer_id,
					'name' => $_POST['name'],
					'contact_name' => $_POST['contact_name'],
					'contact_email' => $_POST['contact_email'],
					'contact_phone' => $_POST['contact_phone'],
					'contact_address' => $_POST['contact_address'],
					'description' => $_POST['description'],
					'allowed_listings' => $_POST['allowed_listings'],
					'status' => 'enabled'
				);
				

				$contact_email = $_POST['contact_email'];

				if($this->db->insert('developers',$addDeveloper))
				{
					$mesg = "Your Developer account has been created for MyPropertyBorique! Your username is $contact_email and password is $devNewPassword";
					$sub = "Your Developer Account has been created!";
					$to = $contact_email;
					redirect(base_url()."index.php/adminDashboard/home");
					/*if($this->getEmail($sub,$mesg,$to))
					{
						redirect(base_url()."index.php/adminDashboard/home");
						//return array("status"=>true,"msg"=>"email sent","redirectURL"=>base_url()."index.php/adminDashboard/home");
					}
					else
					{
						return array("status"=>false,"msg"=>"email not sent");
					}*/
				}
			}
		 }
		 else
		 {
			 return array("status"=>false, "msg"=>"Developer already exists");
		 }
	}

	public function getAdminDevDetail()
	{
		 $this->db->select('d.*');
		 $this->db->from('developers d');
		 $this->db->where('d.developer_id',$_GET['id']);
		
		 $result = $this->db->get()->result_array();
		 
		 $this->db->select('la.*');
		 $this->db->from('login_admin la');
		 $this->db->where('la.id',$_GET['id']);
		
		 $result['login_details'] = $this->db->get()->result_array();

		 $this->db->select('p.project_id as projectID');
		 $this->db->from('projects p');
		 $this->db->where('p.developer_id',$_GET['id']);
		 
		 $total['projects'] = $this->db->get()->result_array();

		 $this->db->select('l.listing_id as listingID');
		 $this->db->from('listings l');
		 $this->db->where('l.developer_id',$_GET['id']);

		 $total['listings'] = $this->db->get()->result_array();

		 $result['usedProjects'] = count($total['projects']);
		 $result['usedListings'] = count($total['listings']);

		 return $result;
	}

	public function getAdminEditDevForm()
	{
		$imgUpdate='';
		$this->load->library('upload');
		$time = time();

		$dataInfo = array();
		$details = $this->reArrayFiles($_FILES['dLogo']);
		$imageInfo = '';
		$img_name = str_replace(" ", "_", $details[0]['name']);
		$_FILES['dLogo']['name'] = $time.$img_name;
		$_FILES['dLogo']['type'] = $details[0]['type'];
		$_FILES['dLogo']['tmp_name'] = $details[0]['tmp_name'];
		$_FILES['dLogo']['error'] = $details[0]['error'];
		$_FILES['dLogo']['size'] = $details[0]['size'];	

		$this->upload->initialize($this->set_upload_options());

		if($this->upload->do_upload('dLogo')) 
		{ 
			$imageUploadData = $this->upload->data();
			$imageInfo = $imageUploadData['file_name'];
		}
			
		if(!empty($imageInfo)){
			$updateDeveloper = array(
				'img_path' => $imageInfo
			);
			
		$this->db->where('id',$_POST['developer_id']);
		$this->db->update('login_admin',$updateDeveloper);
		$imgUpdate = $this->db->affected_rows();
		}
		$devId= $_POST['developer_id'];
		$this->db->where('developer_id',$_POST['developer_id']); 
		unset($_POST['developer_id']);
		$this->db->update('developers',$this->input->post());
		$devUpdate = $this->db->affected_rows();
		if($imgUpdate== 1 || $devUpdate== 1)
		{
			return array("status"=>true,"msg"=>"pass");
		}
		else
		{
			return array("status"=>false,"msg"=>"fail");
		}
	}

	public function getAdminLocationList()
	{
		$this->db->select('loc.location_id,loc.name as locationName,loc.zone as zone,loc.status as status,loc.city_id as locCityId');
		$this->db->from('locations loc');
		$result['locations'] = $this->db->get()->result_array();

		$this->db->select('c.city_id as cityId, c.name as cityName');
		$this->db->from('city c');
		$result['cities'] = $this->db->get()->result_array();
		
		return $result;
	}

	public function getAdminAddLocationForm()
	{
		if(isset($_POST['eId']))
		{
			$this->db->where('location_id',$_POST['eId']);
			unset($_POST['eId']);
			$this->db->update('locations',$this->input->post());
		}
		else
		{
			$this->db->insert('locations',$this->input->post());			
		}

		if($this->db->affected_rows() == 1)
		{
			return array("status"=>true,"msg"=>"Location Updated Successfully!");
		}
		else
		{
			return array("status"=>false,"msg"=>"Error in updating Location!");
		}

	}

	public function getAdminProjectShowcase()
	{
		 $this->db->select('ps.id as showcase_id, ps.project_id as showcase_project_id');
		 $this->db->from('project_showcase ps');		
		 $result['project_showcase'] = $this->db->get()->result_array();

		 $this->db->select('p.project_id, p.name as project_name, d.name as developer_name');
		 $this->db->from('projects p');
		 $this->db->join('developers d','d.developer_id = p.developer_id');

		 $result['projects'] = $this->db->get()->result_array();
		 

		 return $result;
	}

	public function getAdminEditProjectShowcase()
	{
		 $this->db->where('id',$_POST['id']);
		 $updateShowcase = array(
			'project_id' => $_POST['project_id']
		 );
		 $this->db->update('project_showcase',$updateShowcase);
		 if($this->db->affected_rows() === 1)
		 {
			return array("status"=>true);
		 }	
		 else
		 {
			return array("status"=>false);
		 }	
	}

	public function getAdminQuickLinks()
	{
		 $this->db->select('pl.id as quick_link_id, pl.location_id as quick_link_location_id');
		 $this->db->from('popular_locations pl');		
		 $result['popular_locations'] = $this->db->get()->result_array();

		 $this->db->select('l.location_id, l.name as location_name');
		 $this->db->from('locations l');
		 $result['locations'] = $this->db->get()->result_array();

		 return $result;
	}

	public function getAdminEditQuickLinks()
	{
		 $this->db->where('id',$_POST['id']);
		 $updateQuickLinks = array(
			'location_id' => $_POST['location_id']
		 );
		 $this->db->update('popular_locations',$updateQuickLinks);
		 if($this->db->affected_rows() === 1)
		 {
			return array("status"=>true);
		 }	
		 else
		 {
			return array("status"=>false);
		 }	
	}

	public function getAskExpertList()
	{
		$this->db->select('*');
		$this->db->from('ask_experts');
		$this->db->order_by('inserted_on','desc');
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getProjectListView()
	{
		$this->db->select('p.project_id,p.name projectName,p.status,d.name as devName');
		$this->db->from('projects p');
		$this->db->join('developers d','p.developer_id = d.developer_id');
		$this->db->where('p.status','enabled');
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getNearbyLocationList()
	{
		$this->db->select('nlm.id,l.name as location, loc.name as nearby');
		$this->db->from('nearby_location_maps nlm');
		$this->db->join('locations l','l.location_id = nlm.location_id');
		$this->db->join('locations loc','loc.location_id = nlm.nearby_id');
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getDeleteNearbyLocation()
	{
		$this->db->where('id',$_POST['id']);
		if($this->db->delete('nearby_location_maps'))
		{
			return array("status"=>true);
		}
		else
		{
			return array("status"=>false);
		}
	}

	public function getFeaturedPagesList()
	{
		 $this->db->select('*');
		 $this->db->from('featured_pages');
		
		 $result = $this->db->get()->result_array();
		 return $result;
	}

	public function getFeaturedPagesDetail()
	{
		 $this->db->select('*');
		 $this->db->from('featured_pages');
		 $this->db->where('id',decrypt($_GET['id']));
		 $result['featured_page'] = $this->db->get()->result_array();		 

		 $this->db->select('p.name as projectName,p.project_id,fm.id as fpId');
		 $this->db->from('featured_pages fp');
		 $this->db->join('featured_pages_maps fm','fm.featured_page_id = fp.id');
		 $this->db->join('projects p','fm.project_id = p.project_id');
		 $this->db->where('fp.id',decrypt($_GET['id']));
		
		 $result['featured_projects'] = $this->db->get()->result_array();
		 return $result;
	}

	public function getUpdateFeaturedPages()
	{
		$this->load->library('upload');
		$coverInfo = array();
		$coverDetails = $this->reArrayFiles($_FILES['cover']);
		$time = time();
		if($coverDetails[0]['name'] != '')
		{
			$img_name = str_replace(" ", "_", $coverDetails[0]['name']);
			$_FILES['cover']['name'] = $time.$img_name;
			$_FILES['cover']['type'] = $coverDetails[0]['type'];
			$_FILES['cover']['tmp_name'] = $coverDetails[0]['tmp_name'];
			$_FILES['cover']['error'] = $coverDetails[0]['error'];
			$_FILES['cover']['size'] = $coverDetails[0]['size'];	

			$this->upload->initialize($this->set_upload_options());

			if($this->upload->do_upload('cover')) 
			{ 
				$coverUploadData = $this->upload->data();
				$coverInfo = $coverUploadData['file_name'];
			}
			$insertCover = array(
				'img_url' => $coverInfo
			);
			$this->db->where('id',$_POST['feature_id']);
			$this->db->update('featured_pages',$insertCover);
		}

		$featureContent = array(
			'name' => $_POST['feature_name'],
			'description' => $_POST['feature_description']
		);

		$this->db->where('id',$_POST['feature_id']);
		$this->db->update('featured_pages',$featureContent);
	}

	public function getAddFeaturedPage()
	{
		$this->load->library('upload');
		$coverInfo = '';
		$coverDetails = $this->reArrayFiles($_FILES['cover']);
		$time = time();
		if($coverDetails[0]['name'] != '')
		{
			$img_name = str_replace(" ", "_", $coverDetails[0]['name']);
			$_FILES['cover']['name'] = $time.$img_name;
			$_FILES['cover']['type'] = $coverDetails[0]['type'];
			$_FILES['cover']['tmp_name'] = $coverDetails[0]['tmp_name'];
			$_FILES['cover']['error'] = $coverDetails[0]['error'];
			$_FILES['cover']['size'] = $coverDetails[0]['size'];	

			$this->upload->initialize($this->set_upload_options());

			if($this->upload->do_upload('cover')) 
			{ 
				$coverUploadData = $this->upload->data();
				$coverInfo = $coverUploadData['file_name'];
			}
			
		}

		if($coverInfo != null)
		{
			$insertFeature = array(
				'name' => $_POST['featured_name'],
				'description' => $_POST['featured_description'],
				'img_url' => $coverInfo
			);
		}
		else
		{
			$insertFeature = array(
				'name' => $_POST['featured_name'],
				'description' => $_POST['featured_description']
				//'img_url' => $coverInfo
			);
		}
		
		$this->db->insert('featured_pages',$insertFeature);
	}

	public function getAddFeaturedProject()
	{
		$addFeaturedProject = array(
			'featured_page_id' => $_POST['feature_id'],
			'project_id' => $_POST['featuredProject'],
		);

		if($this->db->insert('featured_pages_maps',$addFeaturedProject))
		{
			return array("status" => true);
		}
		else
		{
			return array("status" => false);
		}

	}

	public function getDeleteFeaturedProject()
	{
		$this->db->where('id',$_POST['id']);
		if($this->db->delete('featured_pages_maps'))
		{
			return array("status" => true);
		}
		else
		{
			return array("status" => false);
		}
	}

	public function getContactBuilderList()
	{
		 $this->db->select('cb.*,dev.name as devName, p.name as projectName');
		 $this->db->from('contact_builder cb');
		 $this->db->join('developers dev','dev.developer_id = cb.developer_id');
		 $this->db->join('projects p','p.project_id = cb.project_id');
		 if($_SESSION['uType'] != 'admin')
		 {
			$this->db->where('cb.developer_id',$_SESSION['uId']);	
		 }
		 
		 $result = $this->db->get()->result_array();
		 return $result;
	}

	public function getFacillitiesList()
	{
		 $this->db->select('*');
		 $this->db->from('facilities f');
		 if(isset($_POST['id'])!= null)
		 {
			$this->db->where('facilities_id',$_POST['id']);		
		 }

		 $result = $this->db->get()->result_array();
		 return $result;
	}

	public function getAddFacilities()
	{
		$coverInfo = '';
		if($_FILES != null)
		{
			$this->load->library('upload');
			$coverDetails = $this->reArrayFiles($_FILES['cover']);
			$time = time();
			if($coverDetails[0]['name'] != '')
			{
				$img_name = str_replace(" ", "_", $coverDetails[0]['name']);
				$_FILES['cover']['name'] = $time.$img_name;
				$_FILES['cover']['type'] = $coverDetails[0]['type'];
				$_FILES['cover']['tmp_name'] = $coverDetails[0]['tmp_name'];
				$_FILES['cover']['error'] = $coverDetails[0]['error'];
				$_FILES['cover']['size'] = $coverDetails[0]['size'];	
	
				$this->upload->initialize($this->set_upload_options());
	
				if($this->upload->do_upload('cover')) 
				{ 
					$coverUploadData = $this->upload->data();
					$coverInfo = $coverUploadData['file_name'];
				}
				
			}
		}
		
		if($coverInfo != '')
		{

			$addFacilities = array(
				'name' => $_POST['facility_name'],
				'img_url' => $coverInfo
			);
		}
		else
		{
			$addFacilities = array(
				'name' => $_POST['facility_name']
			);
		}

		if($this->db->insert('facilities',$addFacilities))
		{
			return true;
			
		}
		else
		{
			return false;
		}

	}

	public function getEditFacilities()
	{
		$coverInfo = '';
		if($_FILES != null)
		{
			$this->db->select('*');
			$this->db->from('facilities');
			$this->db->where('facilities_id',$_POST['efacility_id']);
			$existingFacility = $this->db->get()->result_array();
			if($existingFacility[0]['img_url'] != '')
			{
				
				$existingFile = $existingFacility[0]['img_url'];
				$existingPath = 'assets/uploads/images/'.$existingFile;
				unlink($existingPath);
			}
			

			$this->load->library('upload');
			$coverDetails = $this->reArrayFiles($_FILES['cover']);
			$time = time();
			if($coverDetails[0]['name'] != '')
			{
				$img_name = str_replace(" ", "_", $coverDetails[0]['name']);
				$_FILES['cover']['name'] = $time.$img_name;
				$_FILES['cover']['type'] = $coverDetails[0]['type'];
				$_FILES['cover']['tmp_name'] = $coverDetails[0]['tmp_name'];
				$_FILES['cover']['error'] = $coverDetails[0]['error'];
				$_FILES['cover']['size'] = $coverDetails[0]['size'];	
	
				$this->upload->initialize($this->set_upload_options());
	
				if($this->upload->do_upload('cover')) 
				{ 
					$coverUploadData = $this->upload->data();
					$coverInfo = $coverUploadData['file_name'];
				}

				
				
			}
		}
		
		if($coverInfo != '')
		{
			$addFacilities = array(
				'name' => $_POST['efacility_name'],
				'img_url' => $coverInfo
			);
		}
		else
		{
			$addFacilities = array(
				'name' => $_POST['efacility_name']
			);
		}
		$this->db->where('facilities_id',$_POST['efacility_id']);
		if($this->db->update('facilities',$addFacilities))
		{
			return true;
			
		}
		else
		{
			return false;
		}

	}

	public function getUpdateFeaturedSlot()
    {
        $updateSlot = array(
            'slot' => $_POST['slot']
        );
         $this->db->where('id',$_POST['id']);
         if($this->db->update('featured_pages',$updateSlot))
         {
             return array("status" => true);
         }
         else
         {
            return array("status" => false);            
         }
        
    }


	/////////////////////////////////////////////////////////
	////////////////////COMMON STUFF/////////////////////////
	/////////////////////////////////////////////////////////

	public function getDevProjectLocation()
	{
		$this->db->select('l.name as locationName, l.location_id as locationId, c.city_id as cityId, c.name as cityName');
		$this->db->from('locations l');
		$this->db->join('city c','l.city_id = c.city_id');
		if(isset($_POST['id']))
		{
			$this->db->where('location_id',$_POST['id']);
		}

		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getDevPropertyType()
	{
		 $this->db->select('property_type_id,name,status');
		 $this->db->from('property_types');
		 $this->db->where('status','enabled');
		 if(isset($_POST['id']))
		 {
			$this->db->where('property_type_id',$_POST['id']);
		 }
		
		 $result = $this->db->get()->result_array();
		 return $result;
	}
	
	public function getDevFacilities()
	{
		 $this->db->select('facilities_id,name');
		 $this->db->from('facilities');
		 if(isset($_POST['id']))
		 {
			$this->db->where('facilities_id',$_POST['id']);
		 }
		
		 $result = $this->db->get()->result_array();
		 return $result;
	}

	public function getDevKeywords()
	{
		 $this->db->select('keyword_id,name');
		 $this->db->from('keywords');
		 if(isset($_POST['id']))
		 {
			$this->db->where('keyword_id',$_POST['id']);
		 }
		
		 $result = $this->db->get()->result_array();
		 return $result;
	}

	public function getDevUploads($projectId)
	{
		 $this->db->select('*');
		 $this->db->from('project_upload');
		 $this->db->where('project_id',$projectId);		
		 $result = $this->db->get()->result_array();
		 return $result;
	}

	public function getAdminAllProjects()
	{
		 $this->db->select('p.project_id,p.name as projectName,dev.name as devName');
		 $this->db->from('projects p');
		 $this->db->join('developers dev','dev.developer_id = p.developer_id');
		
		 $result = $this->db->get()->result_array();
		 return $result;
	}

	public function getAddImgForm()
	{

			/////////////////////////////////////////////////////
			///NOW UPLOAD IMAGES  FOR BANNER AND FOOTER///////////////////
			/////////////////////////////////////////////////////

			$this->load->library('upload');
			$time = time();

			if(isset($_POST['imgType']))
			{
				if($_POST['imgType'] == 'banner')
				{
					// upload banner img
					$coverInfo = array();
					$coverDetails = $this->reArrayFiles($_FILES['cover']);

					if($coverDetails[0]['name'] != '')
					{
						$this->db->select('name');
						$this->db->from('home_images');
						$this->db->where('type','banner');
						$deleteId = $this->db->get()->result_array();

						if($deleteId[0]['name'] != null)
						{
								$existingPath2 = 'assets/uploads/images/'.$deleteId[0]['name'];
								// delete existing file
								unlink($existingPath2);
						}
					}

					if($coverDetails[0]['name'] != '')
					{
						$img_name = str_replace(" ", "_", $coverDetails[0]['name']);
						$_FILES['cover']['name'] = $time.$img_name;
						$_FILES['cover']['type'] = $coverDetails[0]['type'];
						$_FILES['cover']['tmp_name'] = $coverDetails[0]['tmp_name'];
						$_FILES['cover']['error'] = $coverDetails[0]['error'];
						$_FILES['cover']['size'] = $coverDetails[0]['size'];	

						$this->upload->initialize($this->set_upload_options());

						if($this->upload->do_upload('cover')) 
						{ 
							$coverUploadData = $this->upload->data();
							$coverInfo = $coverUploadData['file_name'];
						}
						else
						{
							echo $this->upload->display_errors();die();
						}
						$insertCover = array(
							'name' => $coverInfo,
							'developer_id' => $_POST['sldr_developer'],
							'project_id' => $_POST['sldr_project'],
							'options' => $_POST['sldr_options'],
						);
						$this->db->where('type','banner');
						$this->db->insert('home_images',$insertCover);
					}
					redirect(base_url().'index.php/adminDashboard/addslider');

				}

				/*if($_POST['imgType'] == 'footer')
				{
					//upload footer img
					$dataInfo = array();
					$details = $this->reArrayFiles($_FILES['userfile']);
					//echo "<pre>"; print_r($details); echo "</pre>";die();
					foreach ($details as $key => $detail) 
					{
						$img_name = str_replace(" ", "_", $detail['name']);
						$_FILES['userfile']['name'] = $time.$img_name;
						$_FILES['userfile']['type'] = $detail['type'];
						$_FILES['userfile']['tmp_name'] = $detail['tmp_name'];
						$_FILES['userfile']['error'] = $detail['error'];
						$_FILES['userfile']['size'] = $detail['size'];	

						$this->upload->initialize($this->set_upload_options());
						//print_r($this->set_upload_options()); die();
						if($this->upload->do_upload('userfile')) 
						{ 
							$imageUploadData = $this->upload->data();
							$imageInfo[] = $imageUploadData['file_name'];
						}
						else
						{
							echo $this->upload->display_errors();die();
						}
					}
					
					foreach ($imageInfo as $key => $upload)
					{
						$insertImage = array(
							'name' => $upload,
							'type' => 'footer'
						);
						$this->db->insert('home_images',$insertImage);
					}

					redirect(base_url().'index.php/adminDashboard/home');
				}*/
			}


	}

	public function FooterImgList()
	{
		$this->db->where('type','footer');
		$result = $this->db->get('home_images')->result_array();
		return $result;
	}
	public function removeFooterImg()
	{
		$imgName = $this->input->post('name');
		$this->db->where('name' , $imgName);
		$this->db->delete('home_images');
		$result = $this->db->affected_rows();
		$existingPath2 = 'assets/uploads/images/'.$imgName;
		// delete existing file
		unlink($existingPath2);
		return $result;
	}
	public function removeDevUpload()
	{	
		$fileName = $this->input->post('path');

		$this->db->select('brochure');
		$this->db->from('project_upload');
		$this->db->where('path',$fileName);
		$type = $this->db->get()->row()->brochure;
		
		$this->db->where('path' , $fileName);
		$this->db->delete('project_upload');
		$result = $this->db->affected_rows();
		// delete existing file
		if($type == 'no')
		{
			$existingPath2 = 'assets/uploads/images/'.$fileName;
			unlink($existingPath2);
		}
		if($type == 'yes')
		{
			$existingPath2 = 'assets/uploads/brochure/'.$fileName;
			unlink($existingPath2);
		}
		return $result;
	}

	public function exportProjects(){
	
	$this->db->select('projects.project_id as id,projects.name As project_name,developers.name as developer_name,locations.name as location_name,property_types.name as property_type,projects.project_mgr_name as manager_name,projects.project_mgr_email as manager_email,projects.project_mgr_phone as manager_phone,projects.address as project_address,projects.price_min as minimum_price,projects.price_max as maximum_price,projects.total_units,projects.size_min,projects.size_max,projects.latitude,projects.longitude,projects.description,projects.category,projects.gated_community,projects.img_path as image_name,projects.status,listings.bhk,listings.bathrooms,listings.price,listings.sqft_price,listings.size,listings.super_build_area,listings.carpet_area,listings.description as listing_description,listings.available_listings');
	$this->db->from("projects");
	$this->db->join('developers','developers.id=projects.developer_id','inner');
	$this->db->join('locations','locations.location_id=projects.location_id','inner');
	$this->db->join('property_types','property_types.property_type_id=projects.property_type_id','inner');
	$this->db->join('listings','listings.project_id=projects.project_id','inner');
	$query = $this->db->get()->result_array();
	//echo $this->db->last_query();
	return $query;
	
	}
	
	public function exportQueryProjects($srQry){
	  $this->db->select('projects.project_id as id,projects.name As project_name,developers.name as developer_name,locations.name as location_name,property_types.name as property_type,projects.project_mgr_name as manager_name,projects.project_mgr_email as manager_email,projects.project_mgr_phone as manager_phone,projects.address as project_address,projects.price_min as minimum_price,projects.price_max as maximum_price,projects.total_units,projects.size_min,projects.size_max,projects.latitude,projects.longitude,projects.description,projects.category,projects.gated_community,projects.img_path as image_name,projects.status,listings.bhk,listings.bathrooms,listings.price,listings.sqft_price,listings.size,listings.super_build_area,listings.carpet_area,listings.description as listing_description,listings.available_listings');
	$this->db->from("projects");
	$this->db->join('developers','developers.id=projects.developer_id','inner');
	$this->db->join('locations','locations.location_id=projects.location_id','inner');
	$this->db->join('property_types','property_types.property_type_id=projects.property_type_id','inner');
	$this->db->join('listings','listings.project_id=projects.project_id','inner');
	$this->db->like('projects.name', $srQry);
	//$this->db->or_like('developers.name', $srQry);
	$query = $this->db->get()->result_array();
	return $query;
	}
	
	public function importCsvProjects($data){
	  //echo "<pre>"; print_r($data); die('model');
	  $this->db->insert('projects', $data);
          return $this->db->insert_id();
	
	}
	
	public function importCsvListings($data){
		$this->db->insert('listings', $data);
          return $this->db->insert_id();
	
	}
	
	public function delete_project_by_id($id,$status){
		$this->db->where('project_id', $id);
		$this->db->update('projects',$status); 
		return true;
	}
	
	public function uploadProjctImages($data){
		$this->db->insert('project_upload',$data);
		return $this->db->insert_id();
	}
	
	public function uploadProjctBrochure($data){
		$this->db->insert('project_upload',$data);
		return $this->db->insert_id();
	}
	
	public function removeProjctCover(){
		$fileName = $this->input->post('path');
		$pId = $this->input->post('pId');
		$updateSlot = array(
            'img_path' => ''
        );
		$this->db->where('project_id', $pId);
		if($this->db->update('projects',$updateSlot))
		{
             return "true";
         }
         else
         {
            return "false";            
         }
	}
	
	public function checkDuplicaeEntry($name){
		$this->db->select('*');
		$this->db->from('projects ');
		$this->db->where('name', $name);
		$this->db->where('status', 'enabled');
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function getSearchAds(){
		$this->db->select('sa.id,sa.name as adName,sa.adImage,d.developer_id,d.name as devName');
		$this->db->from('search_ads sa');
		$this->db->join('developers d','sa.developer_id = d.developer_id');
		$this->db->where('sa.status','enabled');
		$result = $this->db->get()->result_array();
		return $result;
	}
	
	public function getPaidDevp(){
		$this->db->select('developer_id,name');
		$this->db->from('developers ');
		$this->db->where('paid_ads', '1');
		$this->db->where('status', 'enabled');
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function getDevProjects(){
		$this->db->select('project_id,name');
		 $this->db->from('projects');
		 $this->db->where('status','enabled');
		 if(isset($_POST['id']))
		 {
			$this->db->where('developer_id',$_POST['id']);
		 }
		
		 $result = $this->db->get()->result_array();
		 return $result;
	}
	
	public function getaddNewAdForm()
	{
		$this->load->library('upload');
		$time = time();
		$dataInfo = array();
		$details = $_FILES['adImage'];
			$img_name = str_replace(" ", "_", $details['name']);
			$_FILES['adImage']['name'] = $time.$img_name;
			$_FILES['adImage']['type'] = $details['type'];
			$_FILES['adImage']['tmp_name'] = $details['tmp_name'];
			$_FILES['adImage']['error'] = $details['error'];
			$_FILES['adImage']['size'] = $details['size'];	

			$this->upload->initialize($this->set_upload_options());

			if($this->upload->do_upload('adImage')) 
			{ 
				$imageUploadData = $this->upload->data();
				$imageInfo = $imageUploadData['file_name'];
			}

			$_POST['adImage'] = $imageInfo;
			foreach($_POST['projects'] as $p){
				$addNewAD = array(
					'developer_id' => $_POST['dev'],
					'project_id' => $p,
					'name' => $_POST['adName'],
					'adImage' => $_POST['adImage'],
					'status' => $_POST['adSts']
				);
				if($this->db->insert('search_ads',$addNewAD))
				{
					$msg = 'pass';			
				}
				else
				{
					$msg = 'fail';	
				}
			}
		


		if($msg=='pass')
		{
			redirect(base_url().'index.php/adminDashboard/listSearchAds');			
		}
		else
		{
			return array("status"=>false,"msg"=>"Error in adding Ads!");
		}

	}



	























 }


?>
