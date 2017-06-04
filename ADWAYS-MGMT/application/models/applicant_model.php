<?php

class Applicant_model extends CI_Model
{
    private $table;
    function __construct() {
        parent::__construct();
        $this->table = 'applicant';
    }

    function gets() {
        $this->db->select('applicant.*,
                           user.username,
                           career._careerid, career.title,
                           career_category.label');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.last_check_userid', 'left');
        $this->db->join('career', 'career._careerid = '.$this->table.'.for_careerid', 'left');
        $this->db->join('career_category', 'career_category._categoryid= career.for_categoryid', 'left');
        $this->db->order_by('_applicantid', 'desc');
        return $this->db->get()->result();
    }

    function get_by_id($slide_id) {
        $this->db->select('applicant.*,
                           user.username,
                           career._careerid, career.title,
                           career_category.label');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.last_check_userid', 'left');
        $this->db->join('career', 'career._careerid = '.$this->table.'.for_careerid', 'left');
        $this->db->join('career_category', 'career_category._categoryid= career.for_categoryid', 'left');
        $this->db->where($this->table.'._applicantid', $slide_id);
        return $this->db->get()->result();
    }

    function gets_by_career_id($career_id) {
        $this->db->select('applicant.*,
                           user.username,
                           career._careerid, career.title,
                           career_category.label');
        $this->db->from($this->table);
        $this->db->join('user', 'user._userid = '.$this->table.'.last_check_userid', 'left');
        $this->db->join('career', 'career._careerid = '.$this->table.'.for_careerid', 'left');
        $this->db->join('career_category', 'career_category._categoryid= career.for_categoryid', 'left');
        $this->db->where($this->table.'.for_careerid', $career_id);
        return $this->db->get()->result();
    }

    function update($data) {
        try {
            $this->db->where('_applicantid', $data['_applicantid']);
            $this->db->update($this->table, $data);
            return $this->db->trans_complete();
        } catch (Exception $e) {
            return false;
        }
    }
    
    function delete($applicant_id) {
        $this->db->delete($this->table, array('_applicantid' => $applicant_id));
        return $this->db->trans_complete();
    }

    function change_isdeprecated($item_id, $isdeprecated) {
        try {
            $data = array(
                'isdeprecated' => $isdeprecated
            );
            $this->db->where('_applicantid', $item_id);
            $this->db->update($this->table, $data);
            return $this->db->trans_complete();
        } catch (Exception $e) {
            return false;
        }
    }
}