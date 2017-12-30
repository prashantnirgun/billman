<?php
if(!isset($datepicker))
{
	$header_data['datepicker'] 	= TRUE;
}

if($load_header)
{
	$this->load->view('adminlte/site_header', $header_data);
	$this->load->view('adminlte/sidebar', $header_data);	
	$this->load->view($content_view, $data);
	$this->load->view('adminlte/site_footer');
}else{
	//$this->load->view('adminlte/site_header', $header_data);
	///$this->load->view('adminlte/sidebar', $header_data);	
	$this->load->view($sub_view, $data);
	//$this->load->view('adminlte/site_footer');
	
}
 //var_dump($header_data);
	/*$this->load->view('adminlte/site_header', $header_data);
	$this->load->view('adminlte/sidebar', $header_data);	
	$this->load->view($content_view, $data);
	$this->load->view('adminlte/site_footer');
*/
//echo 'header'.$load_header;
?>
