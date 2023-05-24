<?php
    class Product_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function getOne($where=array())
        {
            $this->db->select("*");
            $this->db->where($where);
            $query = $this->db->get("product");
            return $query->row_array(); //return associatve arrary
        }

        public function get_where($where=array())
        {
            //query builder
            $this->db->select("*");
            $this->db->where($where);
            $query = $this->db->get("product");
            return $query->result_array(); //return multidimensional arrary
        }
    }


?>