<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_model
{
	public function __construct()
	{
	   parent::__construct();
	}

    public function data_attribute_dropown($result)
    {
        if(sizeof($result) > 0 )
        {
          $keys = array_keys($result[0]); 
          $size = sizeof($keys) - 1;
        }
        
        $output = '';
        foreach ($result as $rows  )
        {
            $output .= '<option ';
            for ($i = $size; $i >= 0; $i--) 
            {
              $key = $keys[$i];
              switch ($i) {
                case 0:
                  $output .=   $rows[$keys[$i]] .'</option>';
                  break;
                case 1:
                  $output .=  'value="' . $rows[$keys[$i]] . '">';
                  break;
                default:
                  $output .=  'data-'.$key . '="' . $rows[$keys[$i]] .'"';
                  break;
              }
            }
            
        }
        return $output;
    }
    /*
    public function data_dropown($result)
    {
        foreach ($result as $row  )
        {
            $data[$row['id']] = $row['name'];
        }
        return $data;
    }    
    */
    public function get($tname, $result_type = 'OBJ')
    {
        return $this->get_data($tname, '', 0, '', '', '', $result_type);
    }

    public function get_by_where($tname, $where, $result_type = 'OBJ')
    {
        return $this->get_data($tname, '', 0, $where, '', '', $result_type);
    }

    public function get_by_custom($tname, $custom_query = null, $result_type = 'OBJ')
    {
        return $this->get_data($tname, $custom_query, 0, '', '', '', $result_type);  
    }

    public function get_by_custom_where($tname, $custom_query, $where, $result_type = 'OBJ')
    {
        return $this->get_data($tname, $custom_query, 0, $where, '', '', $result_type);
    }

    public function get_by_column($tname, $custom_column = null, $result_type = 'OBJ')
    {
        return $this->get_data($tname, '', 0, '', $custom_column, '', $result_type);
    }

    public function get_by_column_where($tname, $custom_column = null, $where, $result_type = 'OBJ')
    {
        return $this->get_data($tname, '', 0, $where, $custom_column, '', $result_type);
    }

    public function get_data($tname, $custom_query = null, $soft_delete = 0, $where = null, 
        $custom_column = null, $custom_order_by, $result_type = 'OBJ' )
    {      
        $data = array();
        try 
        {
            $sql = "call get_all_sp('$tname','$custom_query',1,1, $soft_delete, '$where','$custom_column','$custom_order_by' )";
           //echo $sql;
            switch (strtoupper($result_type)) 
            {
                case 'ASSOC':
                    $data = $this->db->conn_id->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                    break;
                case 'KEY':
                    $data = $this->db->conn_id->query($sql)->fetchAll(PDO::FETCH_KEY_PAIR);
                    break;
                case 'BOTH':
                    $data = $this->db->conn_id->query($sql)->fetchAll(PDO::FETCH_BOTH);
                    break;
                default:
                    $data = $this->db->conn_id->query($sql)->fetchAll(PDO::FETCH_OBJ);
                    break;
            }
            return $data;
        } 
        catch (PDOException $e) 
        {
            echo 'exception ' . $e->getMessage();
        }
    }
 }
