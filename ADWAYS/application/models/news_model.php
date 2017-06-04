<?php

class News_model extends CI_Model
{
    private $table;
    function __construct() {
        parent::__construct();
        $this->table = 'news';
    }

    function gets_current() {
        $this->db->select('news._newsid, news.title, news.summary, news.content,
                           news.created, news.updated, news.isdeprecated,
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->where($this->table.'.isdeprecated', false);
        $this->db->order_by('_newsid', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

    function gets_pagination($page, $per_page) {
        $this->db->select('news._newsid, news.title, news.summary, news.content,
                           news.created, news.updated, news.isdeprecated,
                           user.username');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.for_userid', 'left');
        $this->db->where($this->table.'.isdeprecated', false);
        $this->db->order_by('_newsid', 'desc');
        $this->db->limit($per_page, ($page - 1) * $per_page);
        return $this->db->get()->result();
    }

    function get_total_count() {
        $this->db->select('news._newsid');
        $this->db->from($this->table);
        $this->db->where($this->table.'.isdeprecated', false);
        return count($this->db->get()->result());
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

    function get_previous_row($news_id) {
        $query_str = "SELECT * FROM news
                      LEFT JOIN user 
                      ON user._userid = news.for_userid
                      WHERE news.isdeprecated = 0 AND news._newsid = 
                      (SELECT MAX(a._newsid) FROM news a
                      WHERE a._newsid < ".$news_id.")";
        $query = $this->db->query($query_str);
        return $query->result();
    }

    function get_next_row($news_id) {
        $query_str = "SELECT * FROM news
                      LEFT JOIN user 
                      ON user._userid = news.for_userid
                      WHERE news.isdeprecated = 0 AND news._newsid = 
                      (SELECT MIN(a._newsid) FROM news a
                      WHERE a._newsid > ".$news_id.")";
        $query = $this->db->query($query_str);
        return $query->result();
    }

    function add($data) {
        $security_data = $this->security->xss_clean($data);
        $this->db->insert($this->table, $security_data);
        $result = $this->db->insert_id();

        return $result;
    }

    function update($data) {
        try {
            $this->db->where('_newsid', $data['_newsid']);
            $security_data = $this->security->xss_clean($data);
            $this->db->update($this->table, $security_data);
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
            $this->db->where('_newsid', $item_id);
            $this->db->update($this->table, $data);
            return $this->db->trans_complete();
        } catch (Exception $e) {
            return false;
        }
    }
}