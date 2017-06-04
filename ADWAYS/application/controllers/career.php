<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Career extends CORE_Controller {
    function __construct () {
        parent::__construct();
        $this->load->model('career_model');
    }

    function index() {
        $careers = $this->career_model->gets();
        $this->__get_views('_CAREER/index', array('items' => $careers));
    }

    function participate() {
        $career_id = $this->input->get('careerId');
        $item = $this->career_model->get_by_id($career_id);
        if (count($item) > 0) {
            $this->__get_views('_CAREER/participate', array('item' => $item[0]));
        } else {
            redirect('career/index');
        }
    }

    function submit() {
        $this->load->model('applicant_model');
        $data = array(
            'for_careerid' => $this->input->post('careerId'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'content' => $this->input->post('content')
        );

        $rtv =$this->applicant_model->add($data);

        if ($rtv > 0) {
            $resume = $_FILES['resume'];
            $file_rtv    = $this->file_upload($resume);

            if ($file_rtv['state']) {
                $data = $data = array(
                    'for_careerid' => $this->input->post('careerId'),
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'content' => $this->input->post('content'),
                    'file' => $file_rtv['content'],
                    '_applicantid' => $rtv
                );

                if ($this->applicant_model->update($data)) {
                    $this->session->set_flashdata('message', 'ADWAYS에 관심가져 주셔서 감사합니다.');
                    redirect('career/');
                } else {
                    $this->session->set_flashdata('message', '지원서를 저장하는데 오류가 발생헀습니다.');
                    $career_id = $this->input->get('careerId');
                    $item = $this->career_model->get_by_id($career_id);
                    $this->__get_views('_CAREER/participate', array('item' => $item[0], 'data'=> $data));
                }
            } else {
                $this->session->set_flashdata('message', '지원서를 저장하는데 오류가 발생헀습니다.');
                $career_id = $this->input->get('careerId');
                $item = $this->career_model->get_by_id($career_id);
                $this->__get_views('_CAREER/participate', array('item' => $item[0], 'data'=> $data));
            }
        } else {
            $this->session->set_flashdata('message', '지원서를 작성하는데 오류가 발생했습니다.');
            $career_id = $this->input->get('careerId');
            $item = $this->career_model->get_by_id($career_id);
            $this->__get_views('_CAREER/participate', array('item' => $item[0], 'data'=> $data));
        }
    }

    function file_upload($file) {
        $rtv = array('state' => FALSE, 'content' => "");

        $root_path = $_SERVER["DOCUMENT_ROOT"] . "/upload/resume/";
        $dir_path = $root_path;

        if (!is_dir($dir_path)) {
            mkdir($dir_path, 0777, true);
        }

        $file_error = $file['error'];
        if ($file_error === 0) {
            $new_file_name = "/".date("Y-m-d").'-'.basename($file['name']);
            $upload_file = $dir_path.$new_file_name;

            if (is_dir($dir_path)) {
                if (file_exists($upload_file)) {
                    $return_url = '/upload/resume'.$new_file_name;
                    $rtv['state'] = TRUE;
                    $rtv['content'] = $return_url;
                } else {
                    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
                        $return_url = '/upload/resume'.$new_file_name;
                        $rtv['state'] = TRUE;
                        $rtv['content'] = $return_url;
                    } else {
                        $rtv['content'] = "사진을 저장하는데 오류가 발생했습니다.";
                    }
                }
            } else {
                $rtv['content'] = "폴더가 존재하지 않습니다.";
            }

        } else if ($file_error === 2) {
            $rtv['content'] = "이력서가 너무 큽니다.";
        } else if ($file_error === 3) {
            $rtv['content'] = "이력서 중 일부만 전송되었습니다.";
        } else if ($file_error === 4) {
            $rtv['content'] = "이력서를 첨부해주세요.";
        } else {
            $rtv['content'] = "이력서를 첨부하는데 예상하지 못한 오류가 발생했습니다.";
        }
       return $rtv;
    }
}
