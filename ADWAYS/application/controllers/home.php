<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CORE_Controller {

    function __construct () {
        parent::__construct();
        $this->load->model('main_model');
        $this->load->model('notice_model');
        $this->load->model('news_model');
    }

    function index() {
        $mains = $this->main_model->gets();
        $notices = $this->notice_model->gets_current();
        $news = $this->news_model->gets_current();
        $this->__get_views('_HOME/index', array('slides' => $mains, 'notices' => $notices, 'news' => $news));
    }
    function test() {
        $mains = $this->main_model->gets();
        $notices = $this->notice_model->gets_current();
        $news = $this->news_model->gets_current();
        $this->__get_views('_HOME/index', array('slides' => $mains, 'notices' => $notices, 'news' => $news));
    }

    function change_lang() {
        try {
            $lang = $this->input->get('lang');

            $this->session->set_userdata('lang', $lang);

            echo json_encode(true, JSON_PRETTY_PRINT);
        } catch(Exception $e) {
            echo json_encode(false, JSON_PRETTY_PRINT);
        }
    }
}
