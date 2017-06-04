<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relation extends CORE_Controller {
    function __construct () {
        parent::__construct();
        $this->load->model('notice_model');
        $this->load->model('news_model');
    }

    function test() {
        var_dump(mb_strwidth("김동진", "UTF-8"));
        var_dump(mb_strwidth("dddd", "UTF-8"));
    }

    function make_pagination_login($total, $page) {
        $per_page = 7;

        $last = ceil($total / $per_page);
        $rtv = [];

        if ($page - 2 <= 0) {
            $last_page = 5;
            if ($last <= 5) {
                $last_page = $last;
            }
            for($i = 1; $i <= $last_page; $i++) {
                array_push($rtv, $i);
            }
        } else {
            if ($last - $page > 2) {
                $last_page = $page + 2;
            } else {
                $last_page = $last;
            }
            for($i = $page -2; $i <= $last_page; $i++) {
                array_push($rtv, $i);
            }
        }

        return $rtv;
    }

    function index() {
        $per_page = 7;

        $notice_page = $this->input->get('nt_page');
        $news_page = $this->input->get('nw_page');

        if (!$notice_page) $notice_page = 1;
        if (!$news_page) $news_page = 1;
        
        $notices = $this->notice_model->gets_pagination($notice_page, $per_page);
        $news = $this->news_model->gets_pagination($news_page, $per_page);

        $notice_total_count = $this->notice_model->get_total_count();
        $news_total_count = $this->news_model->get_total_count();

        $notice_last_page = ceil($notice_total_count / $per_page);
        $news_last_page = ceil($news_total_count/ $per_page);

        $this->__get_views('_RELATION/index', array('news' => $news,
                                                    'notices' => $notices,
                                                    'notice_page_arr' => $this->make_pagination_login($notice_total_count, $notice_page),
                                                    'news_page_arr' => $this->make_pagination_login($news_total_count, $news_page),
                                                    'notice_current_page' => $notice_page,
                                                    'news_current_page' => $news_page,
                                                    'notice_last_page' => $notice_last_page,
                                                    'news_last_page' => $news_last_page));
    }
    function news() {
        $news_id = $this->input->get('newsId');
        if (!$news_id) redirect('relation/index');

        $item = $this->news_model->get_by_id($news_id);
        $prev = $this->news_model->get_previous_row($news_id);
        $next = $this->news_model->get_next_row($news_id);

        if (count($item) > 0) {
            $this->__get_views('_RELATION/news', array('item' => $item[0]
                                                        ,'prev' => count($prev) > 0 ? $prev[0] : null
                                                        ,'next' => count($next) > 0 ? $next[0] : null));
        } else {
            redirect('/relation');
        }
    }
    function notice() {
        $notice_id = $this->input->get('noticeId');
        if (!$notice_id) redirect('relation/index');

        $item = $this->notice_model->get_by_id($notice_id);
        $prev = $this->notice_model->get_previous_row($notice_id);
        $next = $this->notice_model->get_next_row($notice_id);
        if (count($item) > 0) {
            $this->__get_views('_RELATION/notice', array('item' => $item[0]
            ,'prev' => count($prev) > 0 ? $prev[0] : null
            ,'next' => count($next) > 0 ? $next[0] : null));
        } else {
            redirect('/relation');
        }
    }
}
