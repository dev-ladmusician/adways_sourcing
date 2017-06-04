<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CORE_Controller {

    function __construct () {
        parent::__construct();
        $this->__require_admin_login();
    }
    function index() {

        redirect('main/');
        //$this->__get_views('_HOME/index');
    }
}
