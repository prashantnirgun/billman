<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public $table = NULL;
    public $base_table_name = NULL;

    public $primary_key = array('id');
    public $table_prefix = '';

    protected $timestamps = TRUE;
    protected $timestamps_format = 'Y-m-d H:i:s';

    protected $_created_at_field;
    protected $_updated_at_field;
    protected $_deleted_at_field;

    protected $created_by_field;
    protected $updated_by_field;
    protected $deleted_by_field;


    protected $soft_deletes = FALSE;

    public function __construct()
    {

        parent::__construct();
        $this->table_prefix = $this->config->item('table_prefix');
        $this->table = $this->table_prefix . $this->base_table_name;
        $this->created_by_field = 'created_by_user_id';
        $this->updated_by_field = 'updated_by_user_id';
        $this->deleted_by_field = 'deleted_by_user_id';
        //echo '************* my_model constructor begin ***********<br/>';
        //echo $this->table;
       // echo $this->base_table_name;
       // echo '************* my_model constructor end ***********<br/>';
    }

    public function is_unique($branch_id, $id, $name )
    {   $table_name = $this->get_table_name();
        $sql = "SELECT is_unique_f($branch_id, $id, '$table_name', '$name') as count";
        $query =$this->db->query($sql);
        $result = $query->row(1)->count;
        //echo $result .'<br>';
        return ($result == '1' ? TRUE : FALSE);
    }

    //get column name
    public function get_column_name($column)
    {
        switch ($column) {
            case 'created':
                return $this->created_by_field;
                break;
            case 'updated':
                return $this->updated_by_field;
                break;
            default:
                return $this->deleted_by_field;
                break;
        }
    }

    //retrive base table name
    public function get_table_name($option = "base"){ return ($option == 'base') ? $this->base_table_name : $this->table ; }

    
    //retrive primary key
    public function get_primary_key(){ return $this->primary_key; }

    /*
        Function Name : searching data
        argument      : array(
                                array('column_name' => 'member_name', 'condition' => 'Ending', 'value' => 'Patil'),
                                array('column_name' => 'city_name', 'condition' => 'Ending', 'value' => 'Juhu'),
                                array('column_name' => 'sap_id', 'condition' => 'Equql', 'value' => '23232323'),
                                array('column_name' => 'member_name', 'condition' => 'Ending', 'value' => 'Patil'),
                            )
        Return       : String "member_name like '%patil' AND ....."
    */

    function set_date_condition($column_name ,$start_date, $end_date)
    {
        $date_condition = '';
        if( !(empty($start_date) AND empty($end_date)) )
        {
            $date_condition = $column_name ." BETWEEN '". date_create($start_date)->format("Y-m-d") .' AND '. date_create($end_date)->format("Y-m-d") ."'";
        }
        return $date_condition;
    }

    function get($id){ 
    return $this->db->query("SELECT * FROM $this->table WHERE ". current($this->primary_key)." = $id")->result_array();

     }

    function delete($id)
    { 
        if($this->soft_deletes)
        {
            $timestamps = date("Y-m-d H:i:s");

            $sql  = "UPDATE $this->table ";
            $sql .= "SET deleted_at = '". $timestamps. "', ". $this->deleted_by_field . " = " . $this->session->userdata('user_id');;
            $sql .= " WHERE ". current($this->primary_key) ." = $id";

            $this->db->query($sql); 
        }
        else
        {
            $this->db->query("DELETE FROM $this->table WHERE ". current($this->primary_key) ." = $id"); 
        }
        
        return ($this->db->affected_rows() > 0) ? TRUE :  FALSE ; 
    }

    public function insert($data,$last_query=FALSE)
    {
      $this->db->insert($this->table, $data);
       /*if($last_query)
        {
            echo $this->db->last_query();
        }*/
      return ($this->db->affected_rows() > 0) ? TRUE :  FALSE ;
    }
   
    public function update($data,$where,$last_query=FALSE)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
        
        return ($this->db->affected_rows() >= 0) ? TRUE :  FALSE ;
    }

    public function get_all_with_order_by($order_by){ return $this->db->query("SELECT * FROM $this->table ORDER BY $order_by")->result(); }
   //public function get_all(){ return $this->db->query("SELECT * FROM $this->table")->result(); }
    public function get_with_where($condition){ return $this->db->query("SELECT * FROM $this->table $condition")->result(); }

    function get_max($col) { return $this->db->query("SELECT max($this->primary_key) as max FROM $this->table")->row()->$col->result(); }

    public function get_where_name($col, $value) { return $this->db->query("SELECT * FROM $this->table WHERE $col = '$value' ")->result();  }

    public function get_column_name_list($tname = NULL)
    {
        if($tname == NULL)
        {
            $tname = $this->get_table_name();
        }
        return $this->db->list_fields($tname);
    }
    /*

    function get_with_limit($limit, $offset, $order_by) { return $this->db->query("SELECT * FROM $this->table ORDER BY $order_by LIMIT $limit, $offset")->result(); }

    function count_where($column, $value){ return $this->db->query("SELECT count($this->primary_key) as count FROM $this->table WHERE $this->primary_key = $id")->result()->field('count'); }
    function get_max() { return $this->db->query("SELECT max($this->primary_key) as max FROM $this->table WHERE $this->primary_key = $id")->field('max')->result(); }
    function count_all()  { return $this->db->query("SELECT count($this->primary_key) as count FROM $this->table")->result()->field('count'); }
    function _custom_query($mysql_query)  {
        return $this->db->query($mysql_query); }

*/
}
