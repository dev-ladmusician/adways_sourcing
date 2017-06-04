<?php

class Career_model extends CI_Model
{
    private $table;
    function __construct() {
        parent::__construct();
        $this->table = 'career';
    }

    function gets() {
        $this->db->select('career._careerid, career.title, career.content, career.start, career.end,
                           career.created, career.updated, career.isdeprecated, career.for_categoryid,
                           user.username,
                           career_category.label');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->join('career_category', 'career_category._categoryid= '.$this->table.'.for_categoryid', 'left');
        $this->db->where($this->table.'.isdeprecated', false);
        $this->db->order_by('_careerid', 'desc');
        return $this->db->get()->result();
    }

    function get_by_id($slide_id) {
        $this->db->select('career._careerid, career.title, career.content, career.start, career.end,
                           career.created, career.updated, career.isdeprecated, career.for_categoryid,
                           career.start, career.end,
                           user.username,
                           career_category.label');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->join('career_category', 'career_category._categoryid= '.$this->table.'.for_categoryid', 'left');
        $this->db->where($this->table.'._careerid', $slide_id);
        return $this->db->get()->result();
    }

    function add($data) {
        $this->db->insert($this->table, $data);
        $result = $this->db->insert_id();

        return $result;
    }

    function update($data) {
        try {
            $this->db->where('_careerid', $data['_careerid']);
            $this->db->update($this->table, $data);
            return $this->db->trans_complete();
        } catch (Exception $e) {
            return false;
        }
    }


    function change_isdeprecated($item_id, $isdeprecated) {
        try {
            $data = array(
                'isdeprecated' => $isdeprecated
            );
            $this->db->where('_careerid', $item_id);
            $this->db->update($this->table, $data);
            return $this->db->trans_complete();
        } catch (Exception $e) {
            return false;
        }
    }
}