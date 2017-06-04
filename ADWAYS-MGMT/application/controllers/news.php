<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends CORE_Controller {
    function __construct() {
        parent::__construct();
        $this->__require_admin_login();
        $this->load->model('news_model');
    }

    function index() {
        $items = $this->news_model->gets();
        $this->__get_views('_NEWS/index.php', array('items' => $items));
    }
    function detail() {
        $news_id = $this->input->get('newsId');
        $item = $this->news_model->get_by_id($news_id);

        if (count($item) > 0) {
            $this->__get_views('_NEWS/detail.php', array('item' => $item[0]));
        } else {
            redirect('/main/index');
        }
    }
    function create() {
        $this->__get_views('_NEWS/create.php', array());
    }
    function submit_create() {
        $input_data = array(
            'title' => $this->security->xss_clean($this->input->post('news-title')),
            'summary' => $this->security->xss_clean($this->input->post('news-desc')),
            'content' => $this->input->post('content'),
            'for_userid' => $this->session->userdata('userid'),
        );

        $rtv = $this->news_model->add($input_data);

        if ($rtv != null && $rtv > 0) {
            $this->session->set_flashdata('message', '글작성에 성공적으로 저장하였습니다.');
            redirect('news/index');
        } else {
            $this->session->set_flashdata('message', '글작성하는데 오류가 발생했습니다.');
            $this->__get_views('_NEWS/create.php', array('data' => $input_data));
        }
    }
    function submit_update() {
        $input_data = array(
            '_newsid' => $this->input->post('news-id'),
            'title' => $this->security->xss_clean($this->input->post('news-title')),
            'summary' => $this->security->xss_clean($this->input->post('news-desc')),
            'content' => $this->input->post('content'),
            'for_userid' => $this->session->userdata('userid')
        );

        $rtv = $this->news_model->update($input_data);
        if ($rtv) {
            $flash_str ="글을 성공적으로 수정하였습니다.";
        } else {
            $flash_str ="글 수정하는데 오류가 발생했습니다.";
        }
        $this->session->set_flashdata('message', $flash_str);
        redirect('news/detail?newsId='.$input_data['_newsid']);
    }
    function delete() {
        $news_id = $this->input->get('newsId');
        $rtv = $this->news_model->delete($news_id);
        if (!$rtv) $this->session->set_flashdata('message', '뉴스를 삭제하는데 오류가 발생했습니다.');
        else $this->session->set_flashdata('message', '뉴스를 삭제하였습니다.');
        redirect('news/');
    }




    /***************** API *****************/
    function change_isdeprecated() {
        $item_id = $this->input->get('itemId');
        $isdeprecated = $this->input->get('isdeprecated') == 'true' ? true : false;

        $rtv = $this->news_model->change_isdeprecated($item_id, $isdeprecated);
        if ($rtv) {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '뉴스를 성공적으로 삭제하였습니다.');
            } else {
                $this->session->set_flashdata('message', '뉴스를 성공적으로 부활하였습니다.');
            }
        } else {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '뉴스를 삭제하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            } else {
                $this->session->set_flashdata('message', '뉴스를 부활하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            }
        }

        redirect('news/index');
    }
}
