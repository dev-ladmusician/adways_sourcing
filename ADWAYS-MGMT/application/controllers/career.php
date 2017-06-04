<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Career extends CORE_Controller {
    function __construct() {
        parent::__construct();
        $this->__require_admin_login();
        $this->load->model('career_model');
        $this->load->model('career_category_model');
    }

    function index() {
        $items = $this->career_model->gets();
        $this->__get_views('_CAREER/index.php', array('items' => $items));
    }
    function detail() {
        $this->load->model('applicant_model');
        $career_id = $this->input->get('careerId');
        $applicants = $this->applicant_model->gets_by_career_id($career_id);
        $item = $this->career_model->get_by_id($career_id);

        $categories = $this->career_category_model->gets();
        if (count($item) > 0) {
            $this->__get_views('_CAREER/detail.php', array('item' => $item[0], 'categories' => $categories, 'items' => $applicants));
        } else {
            redirect('/career/index');
        }
    }
    function create() {
        $categories = $this->career_category_model->gets();
        $this->__get_views('_CAREER/create.php', array('item' => null, 'categories' => $categories));
    }
    function submit_create() {
        $range = $this->input->post('career-range');
        $range_arr = explode(' - ', $range);
        $input_data = array(
            'title' => $this->input->post('career-title'),
            'content' => $this->input->post('career-content'),
            'for_categoryid' => $this->input->post('career-category'),
            'start' => count($range_arr) > 1 ? $range_arr[0] : "",
            'end' => count($range_arr) > 1 ? $range_arr[1] : "",
            'for_userid' => $this->session->userdata('userid'),
            'is_continue' => count($range_arr) > 1 ? false : true
        );

        $rtv = $this->career_model->add($input_data);

        if ($rtv != null && $rtv > 0) {
            $this->session->set_flashdata('message', '글작성에 성공적으로 저장하였습니다.');
            redirect('career/index');
        } else {
            $this->session->set_flashdata('message', '글작성하는데 오류가 발생했습니다.');
            $this->__get_views('_CAREER/create.php', array('data' => $input_data));
        }
    }
    function submit_update() {
        $range = $this->input->post('career-range');
        $range_arr = explode(' - ', $range);
        $input_data = array(
            '_careerid' => $this->input->post('career-id'),
            'title' => $this->input->post('career-title'),
            'content' => $this->input->post('career-content'),
            'for_categoryid' => $this->input->post('career-category'),
            'start' => count($range_arr) > 1 ? $range_arr[0] : "",
            'end' => count($range_arr) > 1 ? $range_arr[1] : "",
            'for_userid' => $this->session->userdata('userid'),
            'is_continue' => count($range_arr) > 1 ? false : true
        );

        $rtv = $this->career_model->update($input_data);
        if ($rtv) {
            $flash_str ="글을 성공적으로 수정하였습니다.";
        } else {
            $flash_str ="글 수정하는데 오류가 발생했습니다.";
        }
        $this->session->set_flashdata('message', $flash_str);
        redirect('career/detail?careerId='.$input_data['_careerid']);
    }
    function delete() {
        $item_id = $this->input->get('careerId');
        $rtv = $this->career_model->delete($item_id);
        if (!$rtv) $this->session->set_flashdata('message', '채용정보를 삭제하는데 오류가 발생했습니다.');
        else $this->session->set_flashdata('message', '채용정보를 삭제하였습니다.');
        redirect('career/');
    }




    /***************** API *****************/
    function change_isdeprecated() {
        $item_id = $this->input->get('itemId');
        $isdeprecated = $this->input->get('isdeprecated') == 'true' ? true : false;

        $rtv = $this->career_model->change_isdeprecated($item_id, $isdeprecated);
        if ($rtv) {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '채용정보를 성공적으로 삭제하였습니다.');
            } else {
                $this->session->set_flashdata('message', '채용정보를 성공적으로 부활하였습니다.');
            }
        } else {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '채용정보를 삭제하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            } else {
                $this->session->set_flashdata('message', '채용정보를 부활하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            }
        }

        redirect('career/index');
    }
}
