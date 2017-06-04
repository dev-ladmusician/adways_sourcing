<?php

class Career_category_model extends CI_Model
{
    private $table;
    function __construct() {
        parent::__construct();
        $this->table = 'career_category';
    }

    function gets() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('_categoryid', 'desc');
        return $this->db->get()->result();
    }
}