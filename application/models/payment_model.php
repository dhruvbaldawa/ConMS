<<<<<<< HEAD
<?php
	class Payment_model extends Model{
		$this->_payments_table='payment';
		function __construct(){
			parent::__construct();
		}

		function make_payment($data)
		{
			$query=$this->db->get_where($table,$data);
			if($query->num_rows>0)
			{
				echo('Payment already made');
				reurn FALSE;
			}
			else
			{
				$this->db->insert($table,$data);
				return TRUE;
			}
		}
	
		function get_payment($data)
		{
			$query=$this->db->get_where($table,$data);
			if($query->num_rows()==0)
				return FALSE;
			else
				return ($query->result() as $row);
		}
		
		function findrem($data)
		{
			$query=$this->db->get_where($table,$data);
			return ($query->result() as $row);
		}

		function payment_status($data){
			$this->db->select('Payment_status');
			$query=$this->db->where($table,$data);
			return ($query->result() as $row);
		}
		
	        function update($data,$where){
		         $this->db->update($this->_table,$data,$where);
        	}
	
		function author_details($data){
                $CI =& get_instance();
                $CI->load->model('authors_model');
		$CI->authors_model->get_details($data);
                $this->_authors_model = $CI->authors_model;		
		}
	
		function paper_details($data){
                $CI =& get_instance();
                $CI->load->model('Paper_model');
		$query=$CI->Paper_model->get($data);
                $this->_Paper_model = $CI->Paper_model;
		return $query->row_array();
		}
	}

/* End of file payment_model.php */
=======
<?php
	class Payment_model extends Model{
		$this->_payments_table='payment';
		function Payment_model(){
			parent::Model();
		}

		function make_payment($data)
		{
			$query=$this->db->get_where($table,$data);
			if($query->num_rows>0)
			{
				echo('Payment already made');
				reurn FALSE;
			}
			else
			{
				$this->db->insert($table,$data);
				return TRUE;
			}
		}
	
		function get_payment($data)
		{
			$query=$this->db->get_where($table,$data);
			if($query->num_rows()==0)
				return FALSE;
			else
				return ($query->result() as $row);
		}
		
		function findrem($data)
		{
			$query=$this->db->get_where($table,$data);
			return ($query->result() as $row);
		}

		function payment_status($data){
			$this->db->select('Payment_status');
			$query=$this->db->where($table,$data);
			return ($query->result() as $row);
		}
		
	        function update($data,$where){
		         $this->db->update($this->_table,$data,$where);
        	}
	
		function author_details($data){
                $CI =& get_instance();
                $CI->load->model('authors_model');
		$CI->authors_model->get_details($data);
                $this->_authors_model = $CI->authors_model;		
		}
	
		function paper_details($data){
                $CI =& get_instance();
                $CI->load->model('Paper_model');
		$query=$CI->Paper_model->get($data);
                $this->_Paper_model = $CI->Paper_model;
		return $query->row_array();
		}
	}

/* End of file payment_model.php */
>>>>>>> 7091785391c7d4ae033bf43b0be85ea6720ad999
/* Location: ./system/application/models/payment_model.php */