<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CORE_Controller {
    function __construct() {
        parent::__construct();
        $this->__require_admin_login();
        $this->load->model('notice_model');
    }
    function index() {
        $items = $this->notice_model->gets();
        $this->__get_views('_NOTICE/index.php', array('items' => $items));
    }
    function detail() {
        $notice_id = $this->input->get('noticeId');
        $item = $this->notice_model->get_by_id($notice_id);

        if (count($item) > 0) {
            $this->__get_views('_NOTICE/detail.php', array('item' => $item[0]));
        } else {
            redirect('/main/index');
        }
    }
    function create() {
        $this->__get_views('_NOTICE/create.php', array());
    }
    function submit_create() {
        $input_data = array(
            'title' => $this->security->xss_clean($this->input->post('notice-title')),
            'summary' => $this->security->xss_clean($this->input->post('notice-desc')),
            'content' => $this->input->post('content'),
            'for_userid' => $this->session->userdata('userid'),
        );

        $rtv = $this->notice_model->add($input_data);

        if ($rtv != null && $rtv > 0) {
            $this->session->set_flashdata('message', '글작성에 성공적으로 저장하였습니다.');
            redirect('notice/index');
        } else {
            $this->session->set_flashdata('message', '글작성하는데 오류가 발생했습니다.');
            $this->__get_views('_NOTICE/create.php', array('data' => $input_data));
        }
    }
    function submit_update() {
        $input_data = array(
            '_noticeid' => $this->input->post('notice-id'),
            'title' => $this->security->xss_clean($this->input->post('notice-title')),
            'summary' => $this->security->xss_clean($this->input->post('notice-desc')),
            'content' => $this->input->post('content'),
            'for_userid' => $this->session->userdata('userid')
        );

        $rtv = $this->notice_model->update($input_data);
        if ($rtv) {
            $flash_str ="글을 성공적으로 수정하였습니다.";
        } else {
            $flash_str ="글 수정하는데 오류가 발생했습니다.";
        }
        $this->session->set_flashdata('message', $flash_str);
        redirect('notice/detail?noticeId='.$input_data['_noticeid']);
    }
    function delete() {
        $notice_id = $this->input->get('noticeId');
        $rtv = $this->notice_model->delete($notice_id);
        if (!$rtv) $this->session->set_flashdata('message', '공지사항을 삭제하는데 오류가 발생했습니다.');
        else $this->session->set_flashdata('message', '공지사항을 삭제하였습니다.');
        redirect('notice/');
    }




    /***************** API *****************/
    function change_isdeprecated() {
        $item_id = $this->input->get('itemId');
        $isdeprecated = $this->input->get('isdeprecated') == 'true' ? true : false;

        $rtv = $this->notice_model->change_isdeprecated($item_id, $isdeprecated);
        if ($rtv) {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '공지사항을 성공적으로 삭제하였습니다.');
            } else {
                $this->session->set_flashdata('message', '공지사항을 성공적으로 부활하였습니다.');
            }
        } else {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '공지사항을 삭제하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            } else {
                $this->session->set_flashdata('message', '공지사항을 부활하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            }
        }

        redirect('notice/index');
    }
}
