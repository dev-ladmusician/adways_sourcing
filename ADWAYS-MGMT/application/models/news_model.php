<?php

class News_model extends CI_Model
{
    private $table;
    function __construct() {
        parent::__construct();
        $this->table = 'news';
    }

    function gets() {
        $this->db->select('news._newsid, news.title, news.summary, news.content,
                           news.created, news.updated, news.isdeprecated,
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->order_by('_newsid', 'desc');
        return $this->db->get()->result();
    }

    function get_by_id($slide_id) {
        $this->db->select('news._newsid, news.title, news.summary, news.content,
                           news.created, news.updated, news.isdeprecated,
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->where($this->table.'._newsid', $slide_id);
        return $this->db->get()->result();
    }

    function add($data) {
        //$security_data = $this->security->xss_clean($data);
        $this->db->insert($this->table, $data);
        $result = $this->db->insert_id();

        return $result;
    }

    function update($data) {
        try {
            $this->db->where('_newsid', $data['_newsid']);
            //$security_data = $this->security->xss_clean($data);
            $this->db->update($this->table, $data);
            return $this->db->trans_complete();
        } catch (Exception $e) {
            return false;
        }
    }

    function delete($item_id) {
        $this->db->delete($this->table, array('_newsid' => $item_id));
        return $this->db->trans_complete();
    }


    function change_isdeprecated($item_id, $isdeprecated) {
        try {
            $data = array(
                'isdeprecated' => $isdeprecated
            );
            $this->db->where('_newsid', $item_id);
            $this->db->update($this->table, $data);
            return $this->db->trans_complete();
        } catch (Exception $e) {
            return false;
        }
    }
}