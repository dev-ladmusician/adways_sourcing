<?php

class Main_model extends CI_Model
{
    private $table;
    function __construct() {
        parent::__construct();
        $this->table = 'main_slide';
    }

    function gets() {
        $this->db->select('main_slide._slideid, main_slide.title, main_slide.desc, 
                           main_slide.url, main_slide.updated, main_slide.isdeprecated, 
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->where($this->table.'.isdeprecated', false);
        $this->db->order_by('_slideid', 'asc');
        return $this->db->get()->result();
    }

    function get_by_id($slide_id) {
        $this->db->select('main_slide._slideid, main_slide.title, main_slide.desc, 
                           main_slide.url, main_slide.updated, main_slide.isdeprecated, 
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->where($this->table.'._slideid', $slide_id);
        return $this->db->get()->result();
    }

    function update($data) {
        try {
            $this->db->where('_slideid', $data['_slideid']);
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
            $this->db->where('_slideid', $item_id);
            $this->db->update($this->table, $data);
            return $this->db->trans_complete();
        } catch (Exception $e) {
            return false;
        }
    }
}