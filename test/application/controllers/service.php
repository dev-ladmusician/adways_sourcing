<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CORE_Controller {

    function __construct () {
        parent::__construct();
    }

    function index() {
        $this->__get_views('_SERVICE/index');
    }

    function detail() {
        $this->__get_views('_SERVICE/detail');
    }
}
