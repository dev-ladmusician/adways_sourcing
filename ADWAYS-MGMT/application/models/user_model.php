<?php

class User_model extends CI_Model
{

    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = 'user';
    }

    function gets()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    function gets_admin()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where(array('isadmin' => true));
        return $this->db->get()->result();
    }

    function gets_non_isdeprecated()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where(array('isdeprecated' => false));
        return $this->db->get()->result();
    }

    function logined($user)
    {
        $user->logined = date("Y-m-d H:i:sa");
        $this->db->update($this->table, $user, array('_userid' => $user->_userid));
    }

    function get_user_by_email($option)
    {
        return $this->db->get_where($this->table, array('email' => $option['email']))->row();
    }

    function get_user_by_id($userid)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where(array('_userid' => $userid));
        return $this->db->get()->row();
    }

    function change_password($user_id, $password){
        try {
            $data = array(
                'password' => $password
            );

            $this->db->where('_userid', $user_id);
            $this->db->update($this->table, $data);

            return $this->db->affected_rows();
        } catch (Exception $e) {
            return false;
        }
    }

    function change_admin($user_id, $isadmin)
    {
        try {
            $data = array(
                'isadmin' => $isadmin
            );

            $this->db->where('_userid', $user_id);
            $this->db->update($this->table, $data);

            return $this->db->affected_rows();
        } catch (Exception $e) {
            return false;
        }
    }

    function change_isdeprecated($user_id, $isdeprecated)
    {
        try {
            $data = array(
                'isdeprecated' => $isdeprecated
            );

            $this->db->where('_userid', $user_id);
            $this->db->update($this->table, $data);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function add($data)
    {
        $input_data = array(
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
            'isadmin' => FALSE,
            'isdeprecated' => FALSE,
        );

        $security_data = $this->security->xss_clean($input_data);
        $this->db->insert($this->table, $security_data);
        $result = $this->db->insert_id();

        return $result;
    }

    function update($data)
    {
        try {
            $input_data = array(
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                'profile_uri' => $data['profile_uri'],
                'isadmin'=>$data['isadmin'],
                'isdeprecated'=>$data['isdeprecated']
            );

            $this->db->where('_userid', $data['userid']);
            $security_data = $this->security->xss_clean($input_data);
            $this->db->update($this->table, $security_data);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function delete($item_id) {
        $this->db->delete($this->table, array('_userid' => $item_id));
        return $this->db->trans_complete();
    }
}