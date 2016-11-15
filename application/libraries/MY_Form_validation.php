<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class My_Form_validation extends CI_Form_Validation
{
	
	/*function __construct(argument)
	{
		parent::__construct();
		$this->CI =& get_instance();
	}*/
	public function is_database($str, $field)
	{
		sscanf($field, '%[^.].%[^.]', $table, $field);
		return isset($this->CI->db)
		? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 0)
		: FALSE;

	}

}

?>
