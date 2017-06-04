<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Applicant extends CORE_Controller {
    function __construct() {
        parent::__construct();
        $this->__require_admin_login();
        $this->load->model('applicant_model');
    }
    function index() {
        $items = $this->applicant_model->gets();
        $this->__get_views('_APPLICANT/index.php', array('items' => $items));
    }
    function detail() {
        $applicant_id = $this->input->get('applicantId');
        $item = $this->applicant_model->get_by_id($applicant_id);
        if (count($item) > 0) {
            $applicant = $item[0];
            $applicant->checked = date("Y-m-d h:i:sa");
            $applicant->last_check_userid = $this->session->userdata('userid');
            $applicant->username = $this->session->userdata('username');

            $data = array (
                '_applicantid' => $applicant->_applicantid,
                'checked' => $applicant->checked,
                'last_check_userid' => $applicant->last_check_userid
            );
            if($this->applicant_model->update($data)) {
                $this->__get_views('_APPLICANT/detail.php', array('item' => $applicant));
            } else {
                redirect('/applicant/index');
            }
        } else {
            redirect('/applicant/index');
        }
    }
    function delete() {
        $applicant_id = $this->input->get('applicantId');
        $rtv = $this->applicant_model->delete($applicant_id);
        if (!$rtv) $this->session->set_flashdata('message', '지원자 기록을 삭제하는데 오류가 발생했습니다.');
        else $this->session->set_flashdata('message', '지원자 기록을 삭제하였습니다.');
        redirect('applicant/');
    }
    /***************** API *****************/
    function change_isdeprecated() {
        $item_id = $this->input->get('itemId');
        $isdeprecated = $this->input->get('isdeprecated') == 'true' ? true : false;

        $rtv = $this->applicant_model->change_isdeprecated($item_id, $isdeprecated);
        if ($rtv) {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '지원자 기록을 성공적으로 삭제하였습니다.');
            } else {
                $this->session->set_flashdata('message', '지원자 기록을 성공적으로 부활하였습니다.');
            }
        } else {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '지원자 기록을 삭제하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            } else {
                $this->session->set_flashdata('message', '지원자 기록을 부활하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            }
        }
        redirect('applicant/');
    }
}
