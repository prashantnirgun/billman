<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller{

	public function __construct()
	{
        parent::__construct();
  	}

  public function f1()
  {
    $this->load->view('test_view');
  }

	public function index()
	{
		echo ENVIRONMENT;
    //$this->load->view('test_view');
   // $this->load->view('timeline1_view');
    //$this->load->view('vertical_timeline');
		$this->load->view('toggle');
	}

  public function f2()
  {
    $this->load->view('timeline1_view');
  }

	public function tt2()
  {
    $primary_key = array('id');
    $data = array('id'=> 1, 'name'=>'abc');
    var_dump($data);
    echo '<br/>';
    foreach ($primary_key  as $key => $value) {
            $where_array[$value] = $data[$primary_key[$key]];
            unset($data[$value]);
          }
    var_dump($where_array);
     echo '<br/>';
    var_dump($data);
  }

}
