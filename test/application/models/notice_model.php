<?php

class Notice_model extends CI_Model {
    private $table;
    function __construct() {
        parent::__construct();
        $this->table = 'notice';
    }

    function get_previous_row($notice_id) {
        $query_str = "SELECT * FROM notice
                      LEFT JOIN user 
                      ON user._userid = notice.for_userid
                      WHERE notice.isdeprecated = 0 AND notice._noticeid = 
                      (SELECT MAX(a._noticeid) FROM notice a
                      WHERE a._noticeid < ".$notice_id.")";
        $query = $this->db->query($query_str);
        return $query->result();
    }

    function get_next_row($notice_id) {
        $query_str = "SELECT * FROM notice
                      LEFT JOIN user 
                      ON user._userid = notice.for_userid
                      WHERE notice.isdeprecated = 0 AND notice._noticeid = 
                      (SELECT MIN(a._noticeid) FROM notice a
                      WHERE a._noticeid > ".$notice_id.")";
        $query = $this->db->query($query_str);
        $query = $this->db->query($query_str);
        return $query->result();
    }

    function gets_current() {
        $this->db->select('notice._noticeid, notice.title, notice.summary, notice.content,
                           notice.created, notice.updated, notice.isdeprecated,
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->where($this->table.'.isdeprecated', false);
        $this->db->order_by('_noticeid', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

    function gets_pagination($page, $per_page) {
        $this->db->select('notice._noticeid, notice.title, notice.summary, notice.content,
                           notice.created, notice.updated, notice.isdeprecated,
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->where($this->table.'.isdeprecated', false);
        $this->db->order_by('_noticeid', 'desc');
        $this->db->limit($per_page, ($page - 1) * $per_page);
        return $this->db->get()->result();
    }

    function get_total_count() {
        $this->db->select('notice._noticeid');
        $this->db->from($this->table);
        $this->db->where($this->table.'.isdeprecated', false);
        return count($this->db->get()->result());
    }

    function gets() {
        $this->db->select('notice._noticeid, notice.title, notice.summary, notice.content,
                           notice.created, notice.updated, notice.isdeprecated,
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->order_by('_noticeid', 'desc');
        return $this->db->get()->result();
    }

    function get_by_id($slide_id) {
        $this->db->select('notice._noticeid, notice.title, notice.summary, notice.content,
                           notice.created, notice.updated, notice.isdeprecated,
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->where($this->table.'._noticeid', $slide_id);
        return $this->db->get()->result();
    }

    function add($data) {
        $this->db->insert($this->table, $data);
        $result = $this->db->insert_id();

        return $result;
    }

    function update($data) {
        try {
            $this->db->where('_noticeid', $data['_noticeid']);
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
            $this->db->where('_noticeid', $item_id);
            $this->db->update($this->table, $data);
            return $this->db->trans_complete();
        } catch (Exception $e) {
            return false;
        }
    }
}