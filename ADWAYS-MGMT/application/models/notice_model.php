<?php

class Notice_model extends CI_Model {
    private $table;
    function __construct() {
        parent::__construct();
        $this->table = 'notice';
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

    function delete($item_id) {
        $this->db->delete($this->table, array('_noticeid' => $item_id));
        return $this->db->trans_complete();
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