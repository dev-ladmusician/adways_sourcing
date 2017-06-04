<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CORE_Controller {
    function __construct() {
        parent::__construct();
    }

    function image_upload() {
        $file = $_FILES['image'];
        $type = $_POST['type'];
        $dir_name = $_POST['dir_name'];
        $rtv = array('state' => FALSE, 'content' => "");

        $root_path = $_SERVER["DOCUMENT_ROOT"] . "/upload/" . $type . '/';
        $dir_path = $root_path . $dir_name;

        if (!is_dir($dir_path)) {
            mkdir($dir_path, 0777, true);
        }

        $file_error = $file['error'];
        if ($file_error === 0) {
            $upload_file = $dir_path . "/" . basename($file['name']);

            if (is_dir($dir_path)) {
                if (file_exists($upload_file)) {
                    $return_url = '/upload/'.$type.'/'.$dir_name.'/'.basename($file['name']);
                    $rtv['state'] = TRUE;
                    $rtv['content'] = $return_url;
                } else {
                    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
                        $return_url = '/upload/'.$type.'/'.$dir_name.'/'.basename($file['name']);
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
            $rtv['content'] = "사진이 너무 큽니다.";
        } else if ($file_error === 3) {
            $rtv['content'] = "사진 중 일부만 전송되었습니다.";
        } else if ($file_error === 4) {
            $rtv['content'] = "사진을 설정해주세요.";
        } else {
            $rtv['content'] = "사진을 저장하는데 예상하지 못한 오류가 발생했습니다.";
        }
        echo json_encode($rtv, JSON_PRETTY_PRINT);
    }
}
