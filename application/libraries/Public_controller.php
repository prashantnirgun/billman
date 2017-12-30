<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_controller extends MY_Controller{

	public function __construct(){

		parent::__construct();
		$this->folder_name ='public';

		$this->admin_theme 		= $this->config->item('admin_theme');//public
		$this->sub_admin_theme  = $this->config->item('sub_admin_theme');

		$this->admin_view 		= $this->admin_theme.'/public/main';
		$main_view              = $this->admin_theme.'/public/main' ;
		//echo '<br> insidie public contructor <br>';
	}

	public function index(){
		echo "this is Public_controller ";

	}
	public function set_view_data($title, $header, $result, $content_view, $load_header = TRUE )
	{
		$data['header_data']['title'] 		= $title;
		$data['header_data']['header'] 		= $header;
		$data['header_data']['admin_theme'] = $this->admin_theme;
		$data['header_data']['site_name'] 	= $this->config->item('site_name');

		$data['data']['data']['result'] = $result;
		$data['content_view'] 	= $content_view ;
		$data['load_header'] 	= $load_header;
		//var_dump($data);
		return $data;
	}

function generate_where($condition_array)
	{
		$condition = '';
		//$count = count($condition_array);
		$count = count($condition_array) - 1;
		if (count($condition_array) > 0)		
		{
			$condition = ' WHERE ';
			foreach ($condition_array as $row=>$value )
			{
				$condition .= $this->build_condition($value['column'],  $value['condition'], $value['value']) ;
				if ($row < $count)
				{
					$condition .= ' AND ';
				}

			}
		}
		/*
		$column = $this->model->get_table_name() . '.'. $this->model->get_column_name('deleted');

		if($this->soft_deletes)
        {
            $condition .= ( strlen($condition) > 1 ? 'AND ' : ' WHERE ' ) . $column .' IS NULL';    
        }

		//echo $condition;
		*/
		return $condition ;
	}
function build_condition($column_name, $condition, $values)
	{

		switch($condition)
		{
			case 1 : //starting with
			{
				$condition = $column_name. " LIKE '$values%'";
				break;
			}
			case 2 : //containing with
			{
				$condition = $column_name .  " LIKE '%$values%'";
				break;
			}
			case 3 : //exactly with
			{
				$condition = $column_name . " = '$values' ";
				break;
			}
			case 4 : //Ending with
			{
				$condition = $column_name . " LIKE '%$values'";
				break;
			}
			case 5 : //in
			{
				$val = '';
				foreach ($values as $value) {
					if(strlen($val) > 0){
						$val .= ', ' .$value;
					}
					else{
						$val = $value;	
					}
				}
				
				$condition = $column_name . " IN($val)";
				break;
			}
			case 6 : //not inin
			{
				$val = '';
				foreach ($values as $value) {
					if(strlen($val) > 0){
						$val .= ', ' .$value;
					}
					else{
						$val = $value;	
					}
				}
				$condition = $column_name . " NOT IN($val)";
				break;
			}
			default : //Date
			{
				$condition = $column_name . " BETWEEN '$values'";
				break;
			}
		}
		return $condition;
	}
}