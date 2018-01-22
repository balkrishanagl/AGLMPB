<?php
if(!function_exists('encrypt_decrypt'))
{
	function encrypt_decrypt($action, $string)
	{
		$output = false;

		$encrypt_method = "AES-256-CBC";
		// $secret_key = 'This_is_delta_salt_key';
		// $secret_iv = 'This_is_delta_salt_iv';
		$secret_key = 'djsbjkljdsfnbj!@$#@#&#';
		$secret_iv = 'nvucjsokefsuhas!#%%*$%';

    // hash
		$key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encrypt' )
		{
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' )
		{
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}

		return $output;
	}
}
if(!function_exists('encrypt'))
{
	function encrypt($text)
	{
		return encrypt_decrypt('encrypt',$text);
	}
}
if(!function_exists('decrypt'))
{
	function decrypt($text)
	{
		return  encrypt_decrypt('decrypt',$text);
	}
}
if(!function_exists('pre'))
{
	function pre($array)
	{
		echo '<pre>';
		print_r($array);
	}
}
if(!function_exists('starRating'))
{

	function starRating($overallRating)
	{
		$roundRating=round($overallRating * 2) / 2; 
		return '
		<div class="view-rating" title="'.$roundRating.' out of 5'.'">
			<label class = "full '.star($roundRating,1).'" for="star1" ></label>
			<label class = "full '.star($roundRating,2).'" for="star2"></label>
			<label class = "full '.star($roundRating,3).'" for="star3"></label>
			<label class = "full '.star($roundRating,4).'" for="star4"></label>
			<label class = "full '.star($roundRating,5).'" for="star5"></label>
		</div>';
	}
}
if(!function_exists('star'))
{
	function star($rating,$currentPlace)
	{
		$class='';
		if($rating>$currentPlace || $rating==$currentPlace)
			$class='on';
		else if($rating>$currentPlace-1  && $rating<$currentPlace+1)
			$class='semi-on';
		return $class;	
	}
}
if(!function_exists('DBTime'))
{
	function DBTime()
	{
		$ci =& get_instance();
		$ci->load->database();
		$sql = "select DATE_FORMAT(NOW(), '%d/%m/%Y %H:%i:%s') as dateTime " ;
		$result = $ci->db->query($sql)->result_array();
		return $result[0]['dateTime'];	
	}
}
if(!function_exists('productHandlingGrade'))
{
	function productHandlingGrade($modelIds)
	{
		$ci =& get_instance();
		$ci->load->database();
		$sql = "SELECT max(rht.grade) as grade FROM `models` m JOIN request_handling_type as rht ON rht.id=m.request_handling_type_id WHERE m.id in (".$modelIds.")" ;
		$result = $ci->db->query($sql)->result_array();
		if(empty($result))
			return 1;
		else
			return $result[0]['grade'];	
	}
}
if(!function_exists('experienceGrade'))
{

	function experienceGrade($years)
	{
		if($years>5)
			return 4;
		else if($years>3)
			return 3;
		else if($years>1)
			return 2;
		else 
			return 0;
	}
}
if(!function_exists('assesmentScoreGrade'))
{
	function assesmentScoreGrade($percentage)
	{
		if($percentage>0.85)
			return 4;
		else if($percentage>0.7)
			return 3;
		else if($percentage>0.6)
			return 2;
		else if($percentage>0.45)
			return 1;
		else 
			return 0;
	}
}
if(!function_exists('grade'))
{
	function grade($overallScore)
	{
		
		if($overallScore<1.5)
			return 'ALPHA';
		else if($overallScore<2.5)
			return 'BETA';
		else if($overallScore<3.5)
			return 'GAMMA';
		else 
			return 'DELTA';
	}
}
if(!function_exists('technicianGradeCalc'))
{
	function technicianGradeCalc($technicianId)
	{
		$ci =& get_instance();
		$ci->load->database();
		$sql="SELECT ((models_handling_grade*0.1)+(experience_grade*0.1)+(eta_grade*0.2)+(industrial_certification_grade*0.1)+(repeat_grade*0.2)+(customer_experience_grade*0.2)+(pre_assessment_grade*0.1)) as overallScore FROM `technicians` WHERE id=".$technicianId;
		$result = $ci->db->query($sql)->result_array();
		$overallScore=0;
		if(!empty($result))
		{
			$overallScore=$result[0]['overallScore'];
		}
		$grade=grade($overallScore);

		$updateQuery="update technicians set rank='".$grade."' where id=".$technicianId;
		$ci->db->query($updateQuery);

	}
}
if(!function_exists('push_notification')){

	function push_notification($pushData){

		//$notification = array("title" => "notification title test","body" => "test" ,"click_action" => json_encode(array("data1"=>"sample test from om","sample"=>"test params")));

		$notification = $pushData['body'];
		/*$notification = array("title" => 'My Waiter',"body" => 'text',
		'click_action'=>json_encode(array('name'=>'offer','store_id'=>"store_id",'store_name'=>"name")));*/
		//$notification = array("title" => 'EPL', "body" =>"12' |Arsenal 2:1 Chelsea| Neymar from Brazil misses from Penalty shoot out!");
		//$data = array("Nick" => 'data test',"Room" => 'testing');
		//$data = array("newsType" => '2',"Details" =>'1' );
		$data=$pushData['body'];
		// Set POST variables
		$url="https://fcm.googleapis.com/fcm/send";
		//$fcmRegistrationToken='dibD-3SalRs:APA91bEjMQ6Qhm71rMrXGfYckymZ1GLFLNazfFIxFrTlqbgCVEX2_qilmF0f_bB5dlH56DNrYyWCx7z_KZmV0pBR4OYJt_ACkJZOgNvz6xszDqFv_IZUlh9prRcMC1Xxml-M2t8lIm7k';
		//$fcmRegistrationToken='ePDHjwNxhfU:APA91bELC4OXrxI5wIeZuLCP-L4ahBL2vh7IwFYarXAPcLoy7LmZTENqpmYwDD6Jk9_iBiFffB3ImRglBpOY6jm8RCtNTh6OS5v8mzA5vcy1z8TUvC3Id2CWQeEVg15v4AxpRhI_zv63';
		$fcmRegistrationToken = $pushData['fcm_key'];

		if(is_array($fcmRegistrationToken))
		{
			$fields = array(
				'registration_ids' => $fcmRegistrationToken,
				'notification' => $notification,
				'data' => $data,
				"priority"=> "high",
				);
		}
		else
		{
			$fields = array(
				'to' => $fcmRegistrationToken,
				'notification' => $notification,
				'data' => $data,
				"priority"=> "high",
				);	
		}
		
		$google_api_key=FCM_SERVER_KEY;

		$headers = array(
			'Authorization: key=' .  $google_api_key,
			'Content-Type: application/json'
			);
        //print_r($headers);
        // Open connection
		$ch = curl_init();

        // Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}

        // Close connection
		curl_close($ch);
		//echo $result;



	}
}
if(!function_exists('defaultController'))
{
	function defaultController()
	{
		if($_SESSION['admin']['user_type']=='super_admin')
		{
			$defaultController='NewCases';
		}
		else if($_SESSION['admin']['user_type']=='floor_manager')
		{
			$defaultController='NewCases';
		}
		else if($_SESSION['admin']['user_type']=='call_agent')
		{	
			$defaultController='NewCases';
		}
		return $defaultController;
	}
}
if(!function_exists('adminPrivilege'))
{
	function adminPrivilege($method)
	{
		$super_admin = array('index','login','NewCases','checkNewCases','AcceptedCases','Unassigned','Assigned','DeferCases','TechnicianCases','UserCases','PendingCases','completedCases','toBeCancelCases','cancelCases','earlyWarningCases','CasesDetailed','CasesDetailed1','UnassignedDetailed','unassignedChangeStatus','acceptCase','changestatus','users','partnerRequest','PartnerRequestDetailed','DocumentVerification','TrainingRequest','ProductType','addProductType','checkProductType','Brand','addBrand','checkBrand','BrandProduct','addBrandProduct','Models','BrandProductDetailed','changeModel','updateModel','addModel','checkModel','editTechnicianType','editAdminType','editProductType','editBrand','ManageIssue','editManageIssue','addManageIssue','SparePart','addSparePart','editSparePart','checkSpare','UserManagement','UserAddress','UserDetailed','TechnicianRevenue','addRevenue','SpareInventory','checkInventorySerial','checkEmail','addSpareInventory','editSpareInventory','ExamCategory','checkExamCategory','addExamCategory','editExamCategory','AgentCustomerLocation','RequestCases','RequestCasesDetailed','TechnicianLocation','manualAssignAgent','editCustomerClass','editCustomerPriority','editCasePriority','checkBrandProduct','changeBrandProductStatus','addQuiz','result','addBank','logout','addAdmin','addBankDetails','addAgent','edit','result1','addadminsubmit','addAgentsubmit','setting','submitsetting','memberView','agentview','addTechnicians','addtechsubmit','updatetechsubmit','updatetechsubmitVerify','uploadTechnicians','uploadcaseattachment','uploadcaseattachment1','uploadcaseattachment2','uploadcaseattachment3','editTechnicians','submitpath','edituploadTechnicians','log','technicianMap','Refund','RefundGateway','test');
		$floor_manager = array('index','login','NewCases','checkNewCases','AcceptedCases','Unassigned','Assigned','DeferCases','TechnicianCases','UserCases','PendingCases','completedCases','toBeCancelCases','cancelCases','earlyWarningCases','CasesDetailed','CasesDetailed1','UnassignedDetailed','unassignedChangeStatus','acceptCase','changestatus','users','partnerRequest','PartnerRequestDetailed','DocumentVerification','TrainingRequest','ProductType','addProductType','checkProductType','Brand','addBrand','checkBrand','BrandProduct','addBrandProduct','Models','BrandProductDetailed','changeModel','updateModel','addModel','checkModel','editTechnicianType','editAdminType','editProductType','editBrand','ManageIssue','editManageIssue','addManageIssue','SparePart','addSparePart','editSparePart','checkSpare','UserManagement','UserAddress','UserDetailed','TechnicianRevenue','addRevenue','SpareInventory','checkInventorySerial','checkEmail','addSpareInventory','editSpareInventory','ExamCategory','checkExamCategory','addExamCategory','editExamCategory','AgentCustomerLocation','RequestCases','RequestCasesDetailed','TechnicianLocation','manualAssignAgent','editCustomerClass','editCustomerPriority','editCasePriority','checkBrandProduct','changeBrandProductStatus','addQuiz','result','addBank','logout','addAdmin','addBankDetails','addAgent','edit','result1','addadminsubmit','addAgentsubmit','setting','submitsetting','memberView','agentview','addTechnicians','addtechsubmit','updatetechsubmit','updatetechsubmitVerify','uploadTechnicians','uploadcaseattachment','uploadcaseattachment1','uploadcaseattachment2','uploadcaseattachment3','editTechnicians','submitpath','edituploadTechnicians','log','technicianMap','Refund','RefundGateway','test');
		$call_agent = array('index','login','NewCases','checkNewCases','AcceptedCases','Unassigned','Assigned','DeferCases','TechnicianCases','UserCases','PendingCases','completedCases','toBeCancelCases','cancelCases','earlyWarningCases','CasesDetailed','CasesDetailed1','UnassignedDetailed','unassignedChangeStatus','acceptCase','changestatus','users','partnerRequest','PartnerRequestDetailed','DocumentVerification','TrainingRequest','ProductType','addProductType','checkProductType','Brand','addBrand','checkBrand','BrandProduct','addBrandProduct','Models','BrandProductDetailed','changeModel','updateModel','addModel','checkModel','editTechnicianType','editAdminType','editProductType','editBrand','ManageIssue','editManageIssue','addManageIssue','SparePart','addSparePart','editSparePart','checkSpare','UserManagement','UserAddress','UserDetailed','TechnicianRevenue','addRevenue','SpareInventory','checkInventorySerial','checkEmail','addSpareInventory','editSpareInventory','ExamCategory','checkExamCategory','addExamCategory','editExamCategory','AgentCustomerLocation','RequestCases','RequestCasesDetailed','TechnicianLocation','manualAssignAgent','editCustomerClass','editCustomerPriority','editCasePriority','checkBrandProduct','changeBrandProductStatus','addQuiz','result','addBank','logout','addAdmin','addBankDetails','addAgent','edit','result1','addadminsubmit','addAgentsubmit','setting','submitsetting','memberView','agentview','addTechnicians','addtechsubmit','updatetechsubmit','updatetechsubmitVerify','uploadTechnicians','uploadcaseattachment','uploadcaseattachment1','uploadcaseattachment2','uploadcaseattachment3','editTechnicians','submitpath','edituploadTechnicians','log','technicianMap','Refund','RefundGateway','test');

		if(isset($_SESSION['admin']['user_type']))
		{

			if($_SESSION['admin']['user_type']=='super_admin')
			{
				$currentUserPrivilege=$super_admin;
			}
			else if($_SESSION['admin']['user_type']=='floor_manager')
			{
				$currentUserPrivilege=$floor_manager;
			}
			else if($_SESSION['admin']['user_type']=='call_agent')
			{	
				$currentUserPrivilege=$call_agent;
			}
			if(in_array($method, $currentUserPrivilege))
				return true;
		}
		return false;

	}
}
