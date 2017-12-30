<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Crud_Controller extends Admin_Controller
{
	public $permission ;
	function __construct()
	{
		parent::__construct();
		//$this->get_permission();
	}

	function get_permission()
	{
		$this->load->model('users/Acl_user_permission_model','acl_user_permission_model');
		$module = $this->model->get_table_name('base');
		$user_id = $this->session->userdata('user_id');
		return $this->acl_user_permission_model->get_user_permission_by_acl_module_name($user_id, $module);
	}

	public function is_unique()
	{
		$id 			= $this->input->get('id');
		$name 			= $this->input->get('name');
		$branch_id		= $this->input->get('branch_id');
		$result 		= $this->model->is_unique($branch_id, $id, $name );
		echo json_encode($result);
	}

	public function form_validate()
	{
		if ($this->form_validation->run() == FALSE)
    	{
 			$data['status'] = FALSE;
			$var = $_POST;
			$data['result'] = $var;
			foreach(array_keys($var) as $rvar)
			{
			 	if(!form_error($rvar) == '')
			 	{
					$data['inputerror'][] = $rvar;
					$data['error_string'][] = form_error($rvar);
				}
			}
        }
        else
        {
        	$return_data['message']['message'] = $this->save();
        	$return_data['message']['SQL'] = $this->db->last_query();
        	//$return_data['message']['POST'] = $_POST;
        	//$return_data['message']['KEY'] = $this->model->get_primary_key();
        	$return_data['status'] = TRUE;
        }

        return json_encode($return_data);
	}

	public function do_magic()
	{
		return $this->model->magic();
	}
	public function save()
	{
		//$key = $this->model->get_table_name('base') . '_' . $this->model->get_primary_key();
		$primary_key =  $this->model->get_primary_key();
		$size = sizeof($primary_key);

		
		if ($size == 1 )
		{
			$data = $this->remove_table_name($this->get_data_from_post());
			$id = $data[$primary_key[0]];
			
			if ($id == 0 )
			{
				$column = $this->model->get_column_name( 'created' );
				//$data[$column] = $this->session->userdata('employee_id');
				$data[$column] = $this->session->userdata('user_id');
				$data['created_at'] = date("Y-m-d H:i:s");
				///$data['query'] = $this->model->insert($data,true);
	            return $this->model->insert($data);
			}
			else
			{
				$where_array = array();
					foreach ($primary_key  as $key => $value) {
						$where_array[$value] = $data[$primary_key[$key]];
						unset($data[$value]);
					}

				$column = $this->model->get_column_name( 'updated' );
				//$data[$column] = $this->session->userdata('employee_id');
				$data[$column] = $this->session->userdata('user_id');
				$data['updated_at'] = date("Y-m-d H:i:s");
				return $this->model->update($data,$where_array);
			}
		}else{

			$var = $_POST;
			$data = $this->remove_table_name($var);
			$crud_action = $data['crud_action'];
			unset($data['crud_action']);

			switch ($crud_action) {
				case 'C':
					$column = $this->model->get_column_name( 'created' );
					$data[$column] = $this->session->userdata('user_id');
					$data['created_at'] = date("Y-m-d H:i:s");
            		return $this->model->insert($data);
					break;
				case 'U':
					$where_array = array();
					foreach ($primary_key  as $key => $value) {
						$where_array[$value] = $data[$primary_key[$key]];
						unset($data[$value]);
					}
					
					$column = $this->model->get_column_name( 'updated' );
					$data[$column] = $this->session->userdata('user_id');
					$data['updated_at'] = date("Y-m-d H:i:s");
					return $this->model->update($data,$where_array);
					break;
				default:
					return 'Action = Retrieve';
					break;
			}
		}
	}

	public function get_data_from_post()
	{
		$data = array();
		foreach($_POST as $index => $value) {
 			$data[$index] = $value;
		}
		return $data;
	}

	public function remove_table_name($data)
	{
		$table_name = $this->model->get_table_name('base');
		$final_data = array();
		$position = strlen($table_name) + 1;

		foreach ($data as $key => $value )
		{

			$final_data[substr($key, $position)] = $value;
		}
		return $final_data;
	}

	public function add_table_name($data)
	{
		$table_name = $this->model->get_table_name('base');
		$final_data = array();
		foreach ($data as $rows => $row ) {
			foreach ($row as $key => $value)
			{
				$temp[$table_name .'_'. $key] = $value;
			}
			$final_data[$rows] = $temp;
		}
		return $final_data;
	}

	public function get($id, $output = "json")
	{
		$result = $this->model->get($id);

		$data['result'] = $this->add_table_name($result);

		if ($output == "json")
		{
			//echo 'from json';
			echo json_encode($data);
		}
		else
		{
			//echo 'from screen';
			return $data;
		}
	}

	public function delete($id) {
		$data['id'] = $id;
		if(empty($id) || $id == 0)
		{
			//error
			$data['status'] = FALSE;
		}
		else
			{
				$status = $this->db->db_debug;
				$this->db->db_debug = FALSE;
				$data['status'] = $this->model->delete($id);
				//$data['query'] = $this->db->last_query();
				if ($status) { $this->db->db_debug = TRUE;}
				//$data['status'] = TRUE;
			}
		echo json_encode($data);

	}

	public function get_all_with_order_by($order_by) { return $this->model->get_all_with_order_by($order_by); }

	public function get_max($col) { return $this->model->get_max($col); }

	function get_where_name($col, $value) { return $this->model->get_where_name($col, $value); }
	/*
	function get_with_limit($limit, $offset, $order_by) { return $this->model->get_with_limit($limit, $offset, $order_by); }

	function get_where($id)	{ return  $this->model->get_where($id); }

	function count_where($column, $value) { return $this->model->count_where($column, $value); }

	function _custom_query($mysql_query) { return $this->model->_custom_query($mysql_query); }
	*/

}
