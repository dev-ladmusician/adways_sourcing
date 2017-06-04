<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CORE_Controller {
    function __construct()
    {
        parent::__construct();
        $this->__require_admin_login();
        $this->load->model('main_model');
    }

    function index() {
        $items = $this->main_model->gets();
        $this->__get_views('_MAIN/index.php', array('items' => $items));
    }

    function detail() {
        $slide_id = $this->input->get('slideId');
        $item = $this->main_model->get_by_id($slide_id);

        if (count($item) > 0) {
            $this->__get_views('_MAIN/detail.php', array('item' => $item[0]));
        } else {
            redirect('/main/index');
        }
    }




    /***************** API *****************/
    function update() {
        $input_data = array (
            '_slideid' => $this->input->post('slide-id'),
            'title' => $this->input->post('slide-title'),
            'desc' => $this->input->post('slide-desc'),
            'for_userid' => $this->input->post('user-id'),
        );
        $flash_str = "";
        $rtv = $this->main_model->update($input_data);
        if ($rtv) {
            $file = $_FILES['slide-img'];
            if ($file['error'] != 4) {
                $upload_img_rtv = $this->image_upload($file);
                if ($upload_img_rtv['state']) {
                    $rtv = $this->main_model->update(
                            array( '_slideid' => $input_data['_slideid'],
                                   'url' => $upload_img_rtv['content']));
                    if (!$rtv) {
                        $flash_str = "사진을 변경하는데 오류가 발생했습니다.";
                    }
                } else {
                    $flash_str = "사진을 변경하는데 오류가 발생했습니다.";
                }
            }
        } else {
            $flash_str = "정보를 업데이트하는데 오류가 발생했습니다.";
        }
        if (strlen($flash_str) > 0) $this->session->set_flashdata('message', $flash_str);
        redirect('main/detail?slideId='.$input_data['slide_id']);
    }
    function image_upload($file) {
        $rtv = array('state' => FALSE, 'content' => "");
        $rtv_str = "/upload/main_slide";
        $dir_path = $_SERVER["DOCUMENT_ROOT"].$rtv_str;
        if (!is_dir($dir_path)) {
            mkdir($dir_path, 0777, true);
        }
        $file_error = $file['error'];
        if ($file_error === 0) {
            $file_name = "/".date("Y-m-d_h:i:sa").'_'.basename($file['name']);
            $upload_file = $dir_path.$file_name;
            $rtv_str = $rtv_str.$file_name;
            if (is_dir($dir_path)) {
                if (file_exists($upload_file)) {
                    $rtv['state'] = TRUE;
                    $rtv['content'] = $rtv_str;
                } else {
                    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
                        $rtv['state'] = TRUE;
                        $rtv['content'] = $rtv_str;
                    } else {
                        $rtv['content'] = "사진을 저장하는데 오류가 발생했습니다. 010-6233-8509 개발자에게 연락주세요.";
                    }
                }
            } else {
                $rtv['content'] = "폴더가 존재하지 않습니다. 010-6233-8509 개발자에게 연락주세요.";
            }

        } else if ($file_error === 2) {
            $rtv['content'] = "사진이 너무 큽니다.";
        } else if ($file_error === 3) {
            $rtv['content'] = "사진 중 일부만 전송되었습니다.";
        } else if ($file_error === 4) {
            $rtv['content'] = "사진을 설정해주세요.";
        } else {
            $rtv['content'] = "사진을 저장하는데 예상하지 못한 오류가 발생했습니다. 010-6233-8509 개발자에게 연락주세요.";
        }
        return $rtv;
    }
    function change_isdeprecated() {
        $item_id = $this->input->get('itemId');
        $isdeprecated = $this->input->get('isdeprecated') == 'true' ? true : false;

        $rtv = $this->main_model->change_isdeprecated($item_id, $isdeprecated);
        if ($rtv) {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '슬라이드를 성공적으로 삭제하였습니다.');
            } else {
                $this->session->set_flashdata('message', '슬라이드를 성공적으로 부활하였습니다.');
            }
        } else {
            if ($isdeprecated) {
                $this->session->set_flashdata('message', '슬라이드를 삭제하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            } else {
                $this->session->set_flashdata('message', '슬라이드를 부활하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            }
        }

        redirect('main/index');
    }
}
