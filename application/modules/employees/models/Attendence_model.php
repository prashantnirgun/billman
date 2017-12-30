<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendence_model extends MY_model
{
	
	public function __construct()
	{
        /*$this->base_table_name      = 'attendence';
        $this->table                = $this->table_prefix . $this->base_table_name;        
        $this->primary_key        = array('id');*/
        $this->base_table_name  = 'attendence';
        $this->primary_key      = array('id');
		parent::__construct();
  
	}
    public function retrive_attendence($id,$date_condition)
   {

        /*$date_condition = "$this->table.present_date BETWEEN '". date_create($in_date)->format("Y-m-d")."'".' AND '."'". date_create($out_date)->format("Y-m-d") ."'";*/
        //var_dump($date_condition);
        $sql= "SELECT id,employee_id,date_format($this->table.present_date ,'%d-%m-%Y') as present_date, date_format($this->table.check_in_time ,'%h:%i %p') as check_in_time,
            date_format($this->table.check_out_time ,'%h:%i %p') as check_out_time
            FROM $this->table
            WHERE employee_id = $id AND $date_condition 
            ORDER BY $this->table.present_date desc";
        $query = $this->db->query($sql);
       return $query->result();     
   }
    public function get_by_employee_id($id)
     {
       //var_dump($date_condition);
       $sql = "SELECT id,employee_id,date_format($this->table .present_date ,'%d-%m-%Y') AS            
                present_date,check_in_time,
                check_out_time,status_id,remark,record_lock
                FROM  $this->table 
                WHERE employee_id = $id
                ORDER BY $this->table.present_date desc";
               // echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function getVal($employee_id)
    {
        $sql= "SELECT a.id, a.name as employee_name, 
                date_format(b.present_date ,'%M-%Y') AS present_date,
                sum(if(b.status_id = 7,1,0)) AS Present , sum(if(b.status_id = 8,1,0)) AS Absent,
                sum(if(b.status_id = 9,1,0)) AS Halfday , sum(if(b.status_id = 10,1,0)) AS Sunday,
                sum(if(b.status_id = 11,1,0)) AS Holiday
                FROM employee a join attendence b
                ON( a.id = b.employee_id) where b.employee_id = $employee_id
                group by month(b.present_date), b.employee_id
                order by b.present_date desc, a.id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

     public function sign_out($id)
    {
        $this->db->where('id', $id);
        $this->db->update('attendence',array('check_out_time' => date("H:i:s")));
    }

    /* public function get_all_attendence()
    {

        $query = $this->db->query("SELECT a.id,b.name,sum(if(a.employee_id = 'P',1,0)) as Present,b.telephone_no1,b.pancard_no,b.email_id,b.birth_date,c.column_name
            ,sum(if(a.status_id = 'A',1,0)) as Absent,date_format(a.present_date ,'%d-%m-%Y') as present_date
            FROM $this->table a 
            JOIN employee b ON a.employee_id = b.id 
            JOIN client_column_property c ON (b.marital_status_id = c.id)
            WHERE a.deleted_at is NULL 
            GROUP BY a.present_date ORDER BY b.name,a.present_date desc");
    
        return $query->result();
    }*/
    
    
   
    /*
    public function get_all()
    {
        $sql = "SELECT id,employee_id,date_format($this->table.present_date ,'%M-%Y') AS present_date,check_in_time,
                    check_out_time,status_id,remark,record_lock
                    FROM  $this->table 
                ORDER BY $this->table.present_date desc,id desc";
        $query = $this->db->query($sql);
        return $query->result();

    } 
   
   
  
     public function attendence_checking()
    {
        $query =$this->db->query("select id as employee_id,curdate() as doc_date,null as check_in,null as check_out,
            if('Sunday' like  dayname(curdate()), 'S','A' ) as daily_attendence,
            null as remark,'N' as record_lock,now() as created_at,2 as created_by
            from employes where id not in(
            select employee_id from attendences 
            where doc_date = curdate() and employee_id in (select id from employes))"); 

        return $query->result_array();
    }
  
   
  
    */
}
