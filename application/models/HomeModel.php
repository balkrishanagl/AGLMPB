<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// require 'vendor/autoload.php';
// use GuzzleHttp\Client;
//require base_url()'dompdf/autoload.inc.php';

class HomeModel extends CI_Model
{

	public function __construct()
	{
	  parent::__construct();
	  // $this->load->helper('utility_helper');
	  //$this->load->helper('crypto_helper');
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
	
		return $currency;
    }

    public function getCities()
    {
        $this->db->select('name as cityName, city_id as cityId');
        $this->db->from('city');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getLocations()
    {
        $this->db->select('name as location_name, location_id');
        $this->db->from('locations');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getPropertyType()
    {
        $this->db->select('property_type_id,name');
        $this->db->from('property_types');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getSearchLocation()
    {

        /*if($this->session->userdata('search_box')){
            $_POST['search_box'] = $this->session->userdata('search_box');
        }*/
        
        $search = $_POST['search_box'];
        $search = explode(" ", $search);
        $location_array = array();
        $city_array = array();
  
        /////////////////////////////////////////////////////////
        // 1.GET LOCATION OF THE SEARCH
        $locationQuery = "SELECT * from locations where city_id = 1 AND ( ";
        
        for($i = 0 ; $i <= sizeof($search) ; $i++)
        {
            if($i == (sizeof($search)))
            {
               $locationQuery .= " ) ";                
            }
            else
            {
               $locationQuery .= "name LIKE '%".$search[$i]."%' "; 
            }

            if($i < (sizeof($search)) -1 )
            {
               $locationQuery .= " OR ";
            }
        }
 //echo $locationQuery;

        // NOW $locationQuery will look like:
        // SELECT * FROM locations WHERE 
        // ( name LIKE 'properties%'  OR name LIKE 'in%'  OR name LIKE 'kk%'  OR name LIKE 'nagar%' )


        $location_array = $this->db->query($locationQuery)->result_array();
        
        if($location_array != null)
        {
            $this->session->unset_userdata('search_box');
            $this->session->unset_userdata('property_type');
            $this->session->unset_userdata('bhk');
            $this->session->unset_userdata('property_status');
            $this->session->unset_userdata('price_range');
            $this->session->unset_userdata('posted_by');
            $this->session->unset_userdata('sale_type');
            

            $location = $location_array[0]['name']; 
            $city = $location_array[0]['city_id']; 

            // SET SESSION FOR Search box and other filters
            $this->session->set_userdata('search_box', $_POST['search_box']); 
            
            if(isset($_POST['property_type']))
            {
                $this->session->set_userdata('property_type', $_POST['property_type']);
            }
            if(isset($_POST['bhk']))
            {
                $this->session->set_userdata('bhk', $_POST['bhk']);
            }
            if(isset($_POST['property_status']))
            {
                $this->session->set_userdata('property_status', $_POST['property_status']);
            }
            if(isset($_POST['price_range']))
            {
                $this->session->set_userdata('price_range', $_POST['price_range']);
            }

            if(isset($_POST['strpostedby']))
            {
                $this->session->set_userdata('posted_by', $_POST['strpostedby']);
            }

            if(isset($_POST['saletype']))
            {
                $this->session->set_userdata('sale_type', $_POST['saletype']);
            }

            
           //print_r($_POST); exit;


            return array("status"=>true,"msg"=>"Enter Search");
        }
        else
        {
            // CHECK IF PROJECT NAME IS ENTERED
            $projectQuery = "SELECT * from projects where ( ";
            // $locationQuery = "SELECT * from locations where ( ";
            
            for($i = 0 ; $i <= sizeof($search) ; $i++)
            {
                if($i == (sizeof($search)))
                {
                    $projectQuery .= " ) ";                
                }
                else
                {
                    $projectQuery .= "name LIKE '".$search[$i]."%' "; 
                }
    
                if($i < (sizeof($search)) -1 )
                {
                    $projectQuery .= " OR ";
                }
            }

            // NOW $projectQuery will look like:
            // SELECT * FROM projects WHERE 
            // ( name LIKE 'arjun%'  OR name LIKE 'gardens%' )
            $project_array = $this->db->query($projectQuery)->result_array();

            if($project_array != null)
            {
                $this->session->unset_userdata('search_box');
                $this->session->unset_userdata('property_type');
                $this->session->unset_userdata('bhk');
                $this->session->unset_userdata('property_status');
                $this->session->unset_userdata('price_range');
                $this->session->unset_userdata('posted_by');
                $this->session->unset_userdata('sale_type');
                
    
    
                // SET SESSION FOR Search box and other filters
                $this->session->set_userdata('search_box', $_POST['search_box']);
                
                if(isset($_POST['property_type']))
                {
                    $this->session->set_userdata('property_type', $_POST['property_type']);
                }
                if(isset($_POST['bhk']))
                {
                    $this->session->set_userdata('bhk', $_POST['bhk']);
                }
                if(isset($_POST['property_status']))
                {
                    $this->session->set_userdata('property_status', $_POST['property_status']);
                }
                if(isset($_POST['price_range']))
                {
                    $this->session->set_userdata('price_range', $_POST['price_range']);
                }

                if(isset($_POST['strpostedby']))
                {
                    $this->session->set_userdata('posted_by', $_POST['strpostedby']);
                }
                if(isset($_POST['saletype']))
                {
                    $this->session->set_userdata('sale_type', $_POST['saletype']);
                }


                return array("status"=>true,"msg"=>"Enter Search");
            }
            else
            {
                // write project name query here
                return array("status"=>false,"msg"=>"Please enter a location");
            }

        } 
    

    }
    

    public function getSearch($limit=null,$offset=NULL)
    {
        //echo "Am enter"; exit;
        $bhk = '';
        if(isset($_POST['strlocation']) && $_POST['strlocation'] !=''){
              $_POST['search_box'] =  $_POST['strlocation'];
        }
        if(isset($_POST['strbhk']) && $_POST['strbhk']!='')
        {
            $this->session->unset_userdata('bhk');
            $this->session->set_userdata('bhk', $_POST['strbhk']);
        }

        if(isset($_POST['propertyType']) && $_POST['propertyType']!='')
        {
            $this->session->unset_userdata('propertyType');
            $this->session->set_userdata('propertyType', $_POST['propertyType']);
        }

        if(isset($_POST['strpricemax']) && $_POST['strpricemax']!='')
        {
            $this->session->unset_userdata('price_range');
            $this->session->set_userdata('price_range', $_POST['strpricemax']);
        }
        if(isset($_POST['property_status']) && $_POST['property_status']!='')
        {
            $this->session->unset_userdata('property_status');
            $this->session->set_userdata('property_status', $_POST['property_status']);
        }

        if(isset($_POST['strpostedby']))
        {
            $this->session->unset_userdata('posted_by');
            $this->session->set_userdata('posted_by', $_POST['strpostedby']);
        }
          
        if(isset($_POST['saletype']))
        {
            $this->session->unset_userdata('sale_type');
            $this->session->set_userdata('sale_type', $_POST['saletype']);
        }


        if(isset($_POST['search_box'])){
            $search = $_POST['search_box'];
        } else {
            $search = $this->session->userdata('search_box'); 
            $_POST['search_box'] = $this->session->userdata('search_box');         
        }

        $search = explode(" ", $search);
        $location_array = array();
        $city_array = array();
        
        // 1.GET LOCATION OF THE SEARCH
        $locationQuery = "SELECT * from locations where city_id = 1 AND ( ";
        // $locationQuery = "SELECT * from locations where ( ";
        
        for($i = 0 ; $i <= sizeof($search) ; $i++)
        {
            if($i == (sizeof($search)))
            {
                $locationQuery .= " ) ";                
            }
            else
            {
                $locationQuery .= "name LIKE '".$search[$i]."%' "; 
            }

            if($i < (sizeof($search)) -1 )
            {
                $locationQuery .= " OR ";
            }
        }

        // NOW $locationQuery will look like:
        // SELECT * FROM locations WHERE 
        // ( name LIKE 'properties%'  OR name LIKE 'in%'  OR name LIKE 'kk%'  OR name LIKE 'nagar%' )

        $location_array = $this->db->query($locationQuery)->result_array();
        //echo $this->db->last_query();
       // print_r($location_array);
        $locationId = '';
        if($location_array != null)
        {
            $location = $location_array[0]['name']; 
            $city = $location_array[0]['city_id']; 
            $locationId = $location_array[0]['location_id'];
        }
        // else check if city is entered
        $nearbyLocation = '';
        if($locationId != null)
        {
            $this->db->select('GROUP_CONCAT(nearby_id) as nearbyLocations');
            $this->db->from('nearby_location_maps');
            $this->db->where('location_id',$locationId);
            $nearby_result = $this->db->get()->result_array();
            $nearby_result = $nearby_result[0]['nearbyLocations'];
            
            $this->db->select('GROUP_CONCAT(location_id) as nearbyLocations');
            $this->db->from('nearby_location_maps');
            $this->db->where('nearby_id',$locationId);
            $nearby_result_reverse = $this->db->get()->result_array();
            $nearby_result_reverse = $nearby_result_reverse[0]['nearbyLocations'];

            if($nearby_result != null && $nearby_result_reverse != null)
            {
                $nearbyLocation = $nearby_result.','.$nearby_result_reverse;
            }
            elseif($nearby_result == null && $nearby_result_reverse != null) 
            {
                $nearbyLocation = $nearby_result_reverse;
            }
            elseif($nearby_result != null && $nearby_result_reverse == null)
            {
                $nearbyLocation = $nearby_result;
            }
            else
            {
                $nearbyLocation = '';
            }
            
            $allLocationIds = $locationId.','.$nearbyLocation;
            $allLocationIds = explode(",",$allLocationIds);
            //print_r($allLocationIds);
            // 2. Get the projects in that location
            $this->db->select('GROUP_CONCAT(p.project_id) as project_id');
            $this->db->from('projects p');
            $this->db->join('locations loc','p.location_id = loc.location_id','LEFT');
            $this->db->where_in('loc.location_id',$allLocationIds);
            $this->db->or_where("p.description LIKE '%".$_POST['search_box']."%' ");

            //$this->db->like('p.address',$location);
    
            $projectsInLocation = $this->db->get()->result_array();
           // echo $this->db->last_query();
            $projectId = explode(',',$projectsInLocation[0]['project_id']);
        }
        else
        {
            // CHECK IF PROJECT NAME IS ENTERED
            $projectQuery = "SELECT * from projects where ( ";
            // $locationQuery = "SELECT * from locations where ( ";
            
            for($i = 0 ; $i <= sizeof($search) ; $i++)
            {
                if($i == (sizeof($search)))
                {
                    $projectQuery .= " ) ";                
                }
                else
                {
                    $projectQuery .= "name LIKE '".$search[$i]."%' "; 
                }
    
                if($i < (sizeof($search)) -1 )
                {
                    $projectQuery .= " OR ";
                }
            }

            // NOW $projectQuery will look like:
            // SELECT * FROM projects WHERE 
            // ( name LIKE 'arjun%'  OR name LIKE 'gardens%' )
            $projectResult = $this->db->query($projectQuery)->result_array();
            
            $projectId = array();
            foreach ($projectResult as $key => $value) {
                $projectId[$key] = $value['project_id'];
            }

            // echo '<pre>';print_r($projectId);echo '</pre>';

        }

        



        // foreach ($search as $key => $value) 
        // {
        //     //////////////////////////////////////////////////////////
        //     /////////////////GETTING LOCATION OR CITY ////////////////
        //     //////////////////////////////////////////////////////////
        //     $this->db->select('DISTINCT(name),city_id');
        //     $this->db->from('city');
        //     $this->db->like('name',$value);
        //     $city_array = $this->db->get()->result_array();

        //     if($city_array == null)
        //     {
        //         $this->db->select('DISTINCT(name),city_id');
        //         $this->db->from('locations');
        //         $this->db->like('name',$value);
        //         $location_array = $this->db->get()->result_array();

        //     }
        //     else
        //     {
        //         $this->db->select('DISTINCT(name),location_id,city_id');
        //         $this->db->from('locations');
        //         $this->db->where('city_id',$city[0]['city_id']);    
        //         $location_array = $this->db->get()->result_array();              
        //     }


        //     // ADD NEARBY LOCATIONS HERE IF NEEDED
        //     if($location_array != null)
        //     {
        //         $location = $location_array[0]['name']; 
        //         $city = $location_array[0]['city_id']; 
        //     }
        //     // Handle error if only city is entered

        // }


        // if($city == null && $location == null)
        // {
        //     return array("status"=>false,"msg"=>"Please enter a location");
        // }


        // BHK CALCULATION => BHK = 2
        if (strpos($_POST['search_box'], 'bhk') !== false) 
        { 
            // REGEX for 2 bhk (with space) -> returns 2
            // '/([\d]+)[ ]+bhk/'
            preg_match('/([\d]+)[ ]+bhk/', $_POST['search_box'], $number);
            
            if(!empty($number))
            {
                $bhk = $number[1];
            }
            else
            {
                // REGEX for 2bhk (without space) -> returns 2
                // '/([\d]+)bhk/'
                preg_match('/([\d]+)bhk/', $_POST['search_box'], $number);
                $bhk = $number[1];
            }
        }
        
        

         // NO NEED FACILITIES IN SEARCH FOR NOW
         // 3. For each projects match keywords and facilities
         
            //   $facilities_project_filter = array();

            //   foreach ($projectId as $key => $project) {

            //       foreach ($facilities_id as $key2 => $facility) {
            //         $this->db->select('fm.project_id');
            //         $this->db->from('facility_maps fm');
            //         $this->db->where('fm.project_id',$project);
            //         $this->db->where('fm.facility_id',$facility);
            //         $tot_facility = $this->db->get()->result_array();
            //         foreach ($tot_facility as $key => $value) {
            //             array_push($facilities_project_filter,$value['project_id']); 
            //         }

            //       }

            //  }

        if(isset($_POST['property_type']))
        {
            $propertyType = array();;
            foreach ($_POST['property_type'] as $key => $value) {
                $propertyType[$key]= $value;
            }

            //$propertyType = rtrim($propertyType,',');
            //echo "test".$propertyType;

            //$propertyType = $this->session->userdata('property_type');
        }
        else
        {
            if(preg_grep("/apartment/", $search) == true ||preg_grep("/Apartment/", $search) == true )
            {
                $propertyType = 3;
            }
            elseif(preg_grep("/villa/", $search) == true ||preg_grep("/Villa/", $search) == true )
            {
                $propertyType = 2;
            }
            elseif(preg_grep("/individual/", $search) == true ||preg_grep("/Individual/", $search) == true )
            {
                $propertyType = 1;
            }
            else
            {
                $propertyType = '';
            }
        }
            
        if($projectId != null)
        {   
            $listings = array();

               
                $this->db->select('SQL_CALC_FOUND_ROWS null as rows, d.developer_id,p.img_path,p.project_id,p.size_min,p.size_max,p.price_min,p.price_max,p.property_status,p.posted_by,d.name as developerName,
                                    l.bhk as bhk,l.sqft_price,l.updated_on as updated_on,l.description as listingDescription,l.price as listingPrice,
                                    p.name as projectName,p.category as category,p.latitude, p.longitude, p.description as devDescription,
                                    loc.name as locName,loc.location_id as locId,c.name as locCity',FALSE);
                $this->db->from('projects p');
                $this->db->join('listings l','p.project_id = l.project_id','LEFT');
                $this->db->join('locations loc','p.location_id = loc.location_id','LEFT');
                $this->db->join('city c','c.city_id = loc.city_id','LEFT');
                $this->db->join('developers d','p.developer_id = d.developer_id','LEFT');
                
                if(isset($propertyType) && $propertyType != null)
                {

                    $this->db->join('property_types pt','l.property_type_id = pt.property_type_id','LEFT');
                    $this->db->where_in('pt.property_type_id',$propertyType);
                }

                $this->db->where_in('p.project_id',$projectId);
                $this->db->where('p.status','enabled'); 

                if($this->session->userdata('bhk'))
                {
                    $this->db->where_in('l.bhk',$this->session->userdata('bhk'));
                }
                if($bhk != null)
                {
                    $this->db->like('l.bhk',$bhk);                             
                }

                //$this->db->like('loc.name',$location);

                if($this->session->userdata('price_range'))
                {
                    $this->db->where('l.price <=', $this->session->userdata('price_range'));
                }

                if($this->session->userdata('property_status'))
                {
                    $this->db->where_in('p.property_status',$this->session->userdata('property_status'));
                }

                if($this->session->userdata('posted_by'))
                {
                    $this->db->where_in('p.posted_by',$this->session->userdata('posted_by'));
                }
                if($this->session->userdata('sale_type'))
                {
                    $this->db->where_in('p.sale_type',$this->session->userdata('sale_type'));
                }

                


                
                $this->db->order_by('updated_on','DESC');
                $this->db->limit($limit, $offset);
                
                $listing['listings'] = $this->db->get()->result_array();
                 //echo $this->db->last_query();

                //return $this->db->last_query();
                foreach ($listing['listings'] as $key => $value) {
                    if($value['locId'] == $locationId)
                    {
                        $listing['listings'][$key]['nearby'] = 'no';
                    }
                    else
                    {
                        $listing['listings'][$key]['nearby'] = 'yes';
                    }
                }
                // return $this->db->last_query();
                
                
        }
        
        // TRICK TO GET THE TOTAL ROWS - SQL_CALC_FOUND_ROWS null as rows
        $listing['rows'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;

        if($this->session->userdata('property_type'))
        {
            $listing['filter_property_type'] =  $this->session->userdata('property_type');
        }
        if($this->session->userdata('bhk'))
        {
            $listing['bhk'] = $this->session->userdata('bhk');
        }
        if($this->session->userdata('property_status'))
        {
            $listing['property_status'] = $this->session->userdata('property_status');
        }
        if($this->session->userdata('price_range'))
        {
            $listing['price_range'] = $this->session->userdata('price_range');
        }
        if($this->session->userdata('posted_by'))
        {
            $listing['posted_by'] = $this->session->userdata('posted_by');
        }
        if($this->session->userdata('sale_type'))
        {
            $listing['sale_type'] = $this->session->userdata('sale_type');
        }


        
         if(isset($_POST['search_box']) && ($_POST['search_box'] != null) && $this->session->userdata('search_box')) {
            $listing['search_box'] = $this->session->userdata('search_box');
        }

        // print_r($this->session->userdata); exit;
       // echo '<pre>';print_r($listing);echo '</pre>';

        return $listing;     
         
    }

    public function getLocationCheck()
    {
         $locationCheck = $_POST['locationCheck'];
         $this->db->distinct('name');
         $this->db->select('name,city');
         $this->db->from('locations');
         $this->db->like('name',$locationCheck);
         $this->db->or_like('city',$locationCheck);
        
         $result['locationCheck'] = $this->db->get()->result_array();
         if($result != null)
         {
            return $result;
         }
         else
         {
            return array('status'=>false,'msg'=>"Please enter a valid Location");
         }
    }

    public function getProjectShowcase()
    {
        $this->db->select('ps.id as psId, p.name as projectName, p.project_id as project_id');
        $this->db->from('project_showcase ps');
        $this->db->join('projects p','p.project_id = ps.project_id');
        $this->db->order_by('ps.Id','asc');
         
        $result = $this->db->get()->result_array();

        $projectId = array();
        foreach ($result as $key => $value) {
            array_push($projectId,$value['project_id']);
        }

        $project = array();

        foreach($projectId as $value) {

            $this->db->select('p.project_id,p.name as projectName,GROUP_CONCAT(DISTINCT(l.bhk)) as totBHK,p.price_min as priceMin,p.img_path,loc.name as locName');
            $this->db->from('listings l');
            $this->db->join('projects p','p.project_id = l.project_id');
            $this->db->join('locations loc','loc.location_id = p.location_id');
            $this->db->where('l.project_id',$value);
            $this->db->group_by('l.project_id');
            $result1 = $this->db->get()->result_array();
            $result1[0]['priceMin'] = $this->convertCurrency($result1[0]['priceMin']);
            array_push($project,$result1);

        }
        return $project;

    }

    public function getQuickLinks()
    {
        $this->db->select('pl.id as quickLinkId, pl.location_id as quicklinkLocationId, loc.name as locName, loc.city_id as city_id');
        $this->db->from('popular_locations pl');
        $this->db->join('locations loc','loc.location_id = pl.location_id');
        $this->db->order_by('pl.id','asc');

        $result = $this->db->get()->result_array();
        return $result;
    }


    public function getAskExpertForm()
    {
        $this->db->insert('ask_experts',$this->input->post());

        if($this->db->affected_rows() == 1)
        {
            return array('status'=>true,'msg'=>"Thank you for your request. The experts will get in touch with you shortly");
        }
        else
        {
            return array('status'=>false,'msg'=>"Please enter a valid Location");
        }

    }

    public function getProjectCollections()
    {
        $this->db->select('p.project_id,p.name as projectName,GROUP_CONCAT(DISTINCT(l.bhk)) as totBHK,p.price_min as priceMin,loc.name as locName');
        $this->db->from('listings l');
        $this->db->join('projects p','p.project_id = l.project_id');
        $this->db->join('locations loc','loc.location_id = p.location_id');
        $this->db->where('loc.name',$_GET['location']);
        $this->db->group_by('l.project_id');
        
        $result = $this->db->get()->result();

        foreach( $result as $object) {
            $object->priceMin = $this->convertCurrency($object->priceMin);
        }

        return $result;
    }

    public function getProjectDetail()
    {
        //////////////////////////////////////////////////
        //PROJECT DETAILS
        // add max and min sqft here!
        $this->db->select('p.*,d.name as developername,d.description as devdescription,d.description as devdescription,la.img_path');
        $this->db->from('projects p');
        $this->db->join('developers d','p.developer_id = d.developer_id');
        $this->db->join('login_admin la','d.name = la.name');
        $this->db->where('project_id',$_GET['id']);
        $result['project_details'] = $this->db->get()->result_array();
       /* echo $this->db->last_query();

        print "<pre>";
        print_r($result['project_details']);
        print "</pre>"; exit;*/


        $result['project_details'][0]['price_min'] = $this->convertCurrency($result['project_details'][0]['price_min']);
        $result['project_details'][0]['price_max'] = $this->convertCurrency($result['project_details'][0]['price_max']);
        
        ////////////////////////////////////////////////////
        //FACILITIES DETAILS
        //Add Facilities Image Here!
        $this->db->select('f.name as facilities_name, f.img_url,f.facilities_id,p.project_id');
        $this->db->from('projects p');
        $this->db->join('facility_maps fm','fm.project_id = p.project_id');
        $this->db->join('facilities f','f.facilities_id = fm.facility_id');
        $this->db->where('p.project_id',$_GET['id']);
        $result['facilities'] = $this->db->get()->result_array();

        /////////////////////////////////////////////////////
        //LISTINGS DETAILS
        $this->db->select('l.*,pt.name as propertyType');
        $this->db->from('projects p');
        $this->db->join('listings l','p.project_id = l.project_id');
        $this->db->join('property_types pt','l.property_type_id = pt.property_type_id');
        $this->db->where('p.project_id',$_GET['id']);
        $result['listings'] = $this->db->get()->result();
        foreach ($result['listings'] as $key => $list) {
            $list->price = $this->convertCurrency($list->price);
        }

        ///////////////////////////////////////////////////////
        //PROJECT IMAGES
        $this->db->select('path');
        $this->db->from('project_upload');
        $this->db->where('project_id',$_GET['id']);
        $this->db->where('brochure','no');
        $result['images'] = $this->db->get()->result_array();

        ///////////////////////////////////////////////////////
        //PROJECT BROCHURES
        $this->db->select('path');
        $this->db->from('project_upload');
        $this->db->where('project_id',$_GET['id']);
        $this->db->where('brochure','yes');
        $result['brochures'] = $this->db->get()->result_array();
        
        return $result;
    }

    public function featuredCollectionDetail()
    {
        $this->db->select('fp.*,p.name as projectName,p.project_id,p.img_path as projectImage,loc.name as locName');
        $this->db->from('featured_pages fp');
        $this->db->join('featured_pages_maps fm','fm.featured_page_id = fp.id');
        $this->db->join('projects p','fm.project_id = p.project_id');
        $this->db->join('locations loc','p.location_id = loc.location_id');
        $this->db->where('fp.id',$_GET['id']);
       
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getAllFeatured()
    {
         $this->db->select('*');
         $this->db->from('featured_pages');
        
         $result = $this->db->get()->result_array();
         return $result;
    }

    public function getFeaturedPages()
    {
        $this->db->select('*');
        $this->db->from('featured_pages');
        $this->db->order_by('slot','ASC');

        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getTrendingSlider()
    {
        $this->db->select('sl.*,p.name as projectname,l.name as locationsname');
        $this->db->from('home_images sl');
        $this->db->join('projects p','p.project_id = sl.project_id');
        $this->db->join('locations l','l.location_id = p.location_id');
         $this->db->where('sl.options',1);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getNewprojectSlider()
    {
        $this->db->select('sl.*,p.name as projectname,l.name as locationsname');
        $this->db->from('home_images sl');
        $this->db->join('projects p','p.project_id = sl.project_id');
        $this->db->join('locations l','l.location_id = p.location_id');
         $this->db->where('sl.options',2);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getLuxurySlider()
    {
        $this->db->select('sl.*,p.name as projectname,l.name as locationsname');
        $this->db->from('home_images sl');
        $this->db->join('projects p','p.project_id = sl.project_id');
        $this->db->join('locations l','l.location_id = p.location_id');
         $this->db->where('sl.options',3);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getAffordableSlider()
    {
        $this->db->select('sl.*,p.name as projectname,l.name as locationsname');
        $this->db->from('home_images sl');
        $this->db->join('projects p','p.project_id = sl.project_id');
        $this->db->join('locations l','l.location_id = p.location_id');
         $this->db->where('sl.options',4);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getContactBuilderForm()
    {
        $addContactBuilder = array(
            'customer_name' => $_POST['customer_name'],
            'customer_email' => $_POST['customer_email'],
            'customer_phone' => $_POST['customer_number'],
            'developer_id' => $_POST['dev_id'],
            'project_id' => $_POST['project_id']
        );

        if($this->db->insert('contact_builder',$addContactBuilder))
        {
            return array("status"=>true);
        }
        else
        {
            return array("status"=>true);            
        }

    }


    ////////////////////////////////////////////////////////
    ///////////////////////USER/////////////////////////////
    ////////////////////////////////////////////////////////

    public function getUserLoginForm()
    {
        $this->db->select('user_name,password,id');
        $this->db->from('login_user');
        $this->db->where('user_name',$_POST['email']);
        $result = $this->db->get()->result_array();

        if(count($result) == 1)
        {
            if($result[0]['password'] === sha1($_POST['password']))
            {
                $_SESSION['Uname'] = $_POST['user_name'];
                $_SESSION['type'] = 'user';
                $_SESSION['Uid'] = $records[0]['id'];
                return array("status"=>true,"msg"=>"Login Successful!");
            }
            else
            {
                return array("status"=>false,"msg"=>"Login Failed");
            }
        }
        else
        {
            return array("status"=>false,"msg"=>"Login Failed");
        }
    }

    public function getRegisterForm()
    {
        $this->db->select('user_name');
        $this->db->from('login_user');
        $this->db->where('user_name',$_POST['user_name']);
        $result = $this->db->get()->result_array();

        if(count($result) === 0)
        {   $_POST['password'] = sha1($_POST['password']);
            unset($_POST['confirm_password']);
            if($this->db->insert('login_user',$_POST))
            {
                return array("status"=>true,"msg"=>"Registered Successfully");                            
            }
            else
            {
                return array("status"=>false,"msg"=>"Error in registering!");                            
            }
        }
        else
        {
            return array("status"=>false,"msg"=>"User Already Exists");
        }
    }

    public function getAddToWishlist()
    {
        $this->db->select('*');
        $this->db->from('user_wishlist');
        $this->db->where('user_id',$_SESSION['Uid']);
        $result = $this->db->get()->result_array();

        if(in_array($result,$_POST['project_id']))
        {

        }
        else
        {
            $addWishlist = array(
                'user_id' => $_SESSION['Uid'],
                'project_id' => $_POST['project_id']
            );
            if($this->db->insert('user_wishlist',$addWishList))
            {
                return array("status"=>true,"msg"=>"Wishlist Added");                
            }
            else
            {
                return array("status"=>false,"msg"=>"Error in adding to Wishlist");
            }

        }

    }

    public function getNewListingsList()
    {
        $this->db->select('p.name,l.bhk');
        $this->db->from('projects p');
        $this->db->join('listings l','l.project_id = p.project_id');
        $this->db->order_by('l.updated_on','DESC');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function featuredNewProjects()
    {
        $this->db->select('p.project_id,p.img_path,p.name as projName, p.price_min as min, p.price_max as max, l.name as locName');
        $this->db->from('projects p');
        $this->db->join('locations l', 'l.location_id = p.location_id' , 'left');
        $this->db->order_by('p.posted_date','DESC');
        $this->db->limit(5);
        $data_post = $this->db->get()->result();

        foreach ($data_post as $value) {
            
            $value->min = $this->convertCurrency($value->min);
            $value->max = $this->convertCurrency($value->max);
        }
        

        return $data_post;
    }

    public function featuredNewProjectsLimit()
    {
        $query = $this->db->get('projects');
        $rowcount = $query->num_rows();
        return $rowcount;
    }
	
	public function getAllProjects(){
		$this->db->select('name');
        $this->db->from('projects');
        $this->db->where('status','enabled');
        $result = $this->db->get()->result_array();
		return $result;
	}
	
	public function getAllDevelopers(){
		$this->db->select('name');
        $this->db->from('developers');
        $this->db->where('status','enabled');
        $result = $this->db->get()->result_array();
		return $result;
	}
	
	public function getAllLocations(){
		$this->db->select('name');
        $this->db->from('locations');
        $this->db->where('status','enabled');
        $result = $this->db->get()->result_array();
		return $result;
	}
	
	public function projectSrch($srQry){
		$this->db->select('project_id,name,latitude,longitude,description');
		$this->db->from('projects');
		$this->db->like('projects.name', $srQry);
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function devSrch($srQry){
		$this->db->select('developer_id');
		$this->db->from('developers');
		$this->db->like('developers.name', $srQry);
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function devProjects($devId){
		$this->db->select('project_id,name,latitude,longitude,description');
		$this->db->from('projects');
		$this->db->where('developer_id',$devId);
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function loctnSrch($srQry){
		$this->db->select('location_id');
		$this->db->from('locations');
		$this->db->like('locations.name', $srQry);
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function locProjects($locId){
		$this->db->select('location_id, project_id,name,latitude,longitude,description');
		$this->db->from('projects');
		$this->db->where('location_id',$locId);
		$this->db->limit(1);
		$result = $this->db->get()->result_array();
		return $result;
	}
	public function locProjectsNearBy($locId,$lat,$long){
		$this->db->select('location_id, project_id,name,latitude,longitude,description');
		$this->db->from('projects');
		$this->db->where('latitude >',$lat-0.5);
		$this->db->where('latitude <',$lat+0.5);
		$this->db->where('longitude >',$long-0.5);
		$this->db->where('longitude <',$long+0.5);
		$this->db->where('location_id <',$locId);
		$result = $this->db->get()->result_array();
		return $result;
	}
}?>