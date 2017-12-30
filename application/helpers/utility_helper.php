<?php


if ( ! function_exists('get_menu'))
{
	/*
	function get_menu()
	{
		$CI = & get_instance();  //get instance, access the CI superobject
		$isLoggedIn = $CI->session->userdata('logged_in');
		if($isLoggedIn){
			if($CI->session->userdata['logged_in']['status']){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	*/
	function encrypt($value)
	{
		$ci = & get_instance();
		$salt = $ci->config->item('encryption_key');
		return crypt("1", $salt);

	}

	function currency_format($number, $symbol = FALSE)
	{
	  if($symbol)
	  {
	    return money_format('&#x20b9; %!i', $number);
	  }
	  else {
	    return money_format('%!i', $number);
	  }

	}
	function date_display($date)
	{
		$ci = & get_instance();
		return  date_create($date)->format($ci->session->userdata('date_format'));
	}

	function str_to_mysql_date($value)
	{
		return  date_create($value)->format('Y-m-d');
	}

	function var_dump_pre($mixed = null)
	{
	  echo '<pre>';
	  var_dump($mixed);
	  echo '</pre>';
	  return null;
	}

	function last_query()
	{
		 //get main CodeIgniter object
       $ci = & get_instance();
       //load databse library
       //$ci->load->database();
		var_dump_pre($ci->db->last_query());
	}

	function generate_otp()
	{
		//return "abc123";

		//$otp_code = strtoupper(bin2hex(openssl_random_pseudo_bytes(4)));
		$otp_code = strtoupper(bin2hex(openssl_random_pseudo_bytes(2)));
		return $otp_code;
	}

	function send_sms($sender, $message)
	{
		$ci = & get_instance();

		If(strlen($message) > 0)
		{
			$ci->load->helper('file');

			$username 	= $ci->config->item('username');
			$password 	= $ci->config->item('password');
		 	$url 		= $ci->config->item('url');
		 	$route 		= $ci->config->item('route');
		 	$senderid 	= $ci->config->item('senderid');

		 	//$path_upload =  $this->config->item('upload_path');
			$path = FCPATH .'uploads/aaiscrsoc/out_sms.txt';

		 	$url = $url . "?username=".$username."&password=".$password."&senderid=".$senderid."&route=".$route."&number=".$sender."&message=".$message;

			$ci->load->library('guzzle');

			try {
		    # guzzle post request example with form parameter
		    $response = $ci->guzzle->client->request( 'GET',
		                                   $url);
				//echo $response->getStatusCode(); // 200
	 	    //echo $response->getReasonPhrase(); // OK
	 	    //echo $response->getProtocolVersion(); // 1.1
	 	    $campaign_id = $response->getBody().'<br>';
	 	  } catch (GuzzleHttp\Exception\BadResponseException $e) {
	 	    #guzzle repose for future use
	 	    $response = $e->getResponse();
	 	    $responseBodyAsString = $response->getBody()->getContents();
	 	    print_r($responseBodyAsString);
	 	  }
			$data = date("Y-m-d H:i:s").' ('. $campaign_id .')'. $message . PHP_EOL;
			write_file($path, $data ,'a');
		}
	}


	function get_user_image_filename($parent = '')
	{
		$ci = & get_instance();

		$path =  $ci->config->item('upload_path').'user/';
		$file_name =  $path . $ci->session->userdata('user_id').'.jpg';

	    //echo FCPATH . $file_name . '<br/>';
	    if(!file_exists(FCPATH .$file_name))
	    
	    //if(!file_exists(base_url() .$file_name))
	    {
	      $file_name =  $path .'face.png';
	    }
	    
		return base_url() . $file_name;
	}
/*
	function create_link($action = 'Edit', $link)
	{
		$CI = & get_instance();  //get instance, access the CI superobject
		if($action == 'Edit'){
			$class = 'btn btn-primary';
		}else{
			$class = 'btn btn-warning';
		}

		$str = '<a href="<?=base_url()?>'.$link.'>"><button type="button" class="'.$class.'">'.$action.'</button></a>';
		return $str;
	}

	function create_button($action = 'Edit', $link)
	{
		$CI = & get_instance();  //get instance, access the CI superobject
		if($action == 'Edit'){
			$button_class = 'btn btn-primary';
			$glyphicon_class ='glyphicon glyphicon-pencil';
		}else{
			$button_class = 'btn btn-warning ';
			$glyphicon_class ='glyphicon glyphicon-trash';

		}

		$str = '<a href="'.base_url().$link.'"><button type="button" class="'.$button_class.'">
		<span class="'.$glyphicon_class.'" aria-hidden="true"></span>
		</button></a>';
		return $str;
	}

		*/
}
?>
