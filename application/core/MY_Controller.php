<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_controller{

	protected $folder_name;

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		echo "this is MY_controller ";
		
	}
}