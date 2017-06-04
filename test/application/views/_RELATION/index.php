<section class="aw-relation-fs-section fs-bg-transparent-40">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
                <div class="relation-title fadeInDown animated">
                    ADWAYS KOREA IN THE NEWS
                </div>
                <div class="relation-content fadeInUp animated aw-lang-kr">
                    글로벌 토탈 모바일 마케팅 기업
                    <br class="onlyMobile">
                    ADWAYS KOREA를 만나보세요.
                </div>
                <div class="relation-content fadeInUp animated aw-lang-en">
                    Here is a chance to meet ADWAYS KOREA, a global total mobile marketing enterprise.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NEWS -->
<section class="aw-relation-press-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="aw-relation-press-logo">
                    <span class="ft-bebas">PRESS CENTER</span>
                </div>
                <div class="aw-relation-press-title">
                    LATEST NEWS FROM ADWAYS
                </div>
                <div class="aw-relation-press-img-container">
                    <ul>
                        <li class="fadeInDown wow" data-wow-offset="30">
                            <a class="img-item press-download text-center">
                                <img src="<?=site_url('static/img/relation/ic_press_download.png')?>">
                                <div class="img-item-txt ft-arial">Download Mediakit</div>
                            </a>
                        </li>
                        <li class="fadeInDown wow" data-wow-offset="30">
                            <a class="img-item  press-blog text-center"
                                href="http://blog.naver.com/adways_kr" target="_blank">
                                <img src="<?=site_url('static/img/relation/ic_press_blog.png')?>">
                                <div class="img-item-txt ft-arial">Adways Korea Blog</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="press-content-container">
                    <?php foreach ($news as $key=>$each) { ?>
                        <item class="news-item wow fadeInDown" data-wow-offset="<?php echo $key+1; ?>0">
                            <span class="news-date">
                                <?php
                                $sub_str_date = substr($each->updated, 0 , 10);
                                $date_arr = explode('-', $sub_str_date);
                                echo $date_arr[0].'.'.$date_arr[1].'.'.$date_arr[2];
                                ?>
                            </span>
                            <span class="news-title onlyWeb">
                                <a href="<?=site_url('relation/news?newsId='.$each->_newsid)?>">
                                    <?php if(mb_strlen($each->title, "UTF-8") > 35) {
                                        echo mb_substr($each->title, 0, 33, "UTF-8").'..';
                                    } else {
                                        echo $each->title;
                                    } ?>
                                </a>
                            </span>
                            <span class="news-title onlyMobile">
                                <a href="<?=site_url('relation/news?newsId='.$each->_newsid)?>">
                                    <?php if(mb_strlen($each->title, "UTF-8") > 24) {
                                        echo mb_substr($each->title, 0, 22, "UTF-8").'..';
                                    } else {
                                        echo $each->title;
                                    } ?>
                                </a>
                            </span>
                        </item>
                    <?php } ?>
                </div>
                <div class="press-controller text-center">
                    <ul class="pagination">
                        <li class="<?php if ($news_current_page == 1) echo 'hidden'; ?>" >
                            <a href="<?php
                            $prev_page = $news_current_page -1;
                            echo site_url('relation?nw_page='.$prev_page.'&nt_page='.$notice_current_page); ?>">
                                <
                            </a>
                        </li>
                        <?php foreach ($news_page_arr as $key=>$each) { ?>
                            <li>
                                <a
                                    href="<?=site_url('relation?nw_page='.$each.'&nt_page='.$notice_current_page)?>"
                                    class="<?php if($each == $news_current_page) echo 'active'; ?>">
                                    <?php echo $each; ?>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="<?php if ($news_current_page == $news_last_page) echo 'hidden'; ?>">
                            <a href="<?php
                            $next_page = $news_current_page + 1;
                            echo site_url('relation?nw_page='.$next_page.'&nt_page='.$notice_current_page)?>">
                                >
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NOTICE -->
<section class="aw-relation-notice-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="aw-relation-press-logo">
                    <span class="ft-bebas">NOTICE</span>
                </div>
                <div class="aw-relation-press-title">
                    NOTICE FROM ADWAYS
                </div>
            </div>
            <div class="col-sm-6">
                <div class="press-content-container">
                    <?php foreach ($notices as $key=>$each) { ?>
                        <item class="news-item wow fadeInDown" data-wow-offset="<?php echo $key+1; ?>0">
                            <span class="news-date">
                                <?php
                                $sub_str_date = substr($each->updated, 0 , 10);
                                $date_arr = explode('-', $sub_str_date);
                                echo $date_arr[0].'.'.$date_arr[1].'.'.$date_arr[2];
                                ?>
                            </span>
                            <span class="news-title onlyWeb">
                                <a href="<?=site_url('relation/notice?noticeId='.$each->_noticeid)?>">
                                    <?php if(mb_strlen($each->title, "UTF-8") > 35) {
                                        echo mb_substr($each->title, 0, 33).'..';
                                    } else {
                                        echo $each->title;
                                    } ?>
                                </a>
                            </span>
                            <span class="news-title onlyMobile">
                                <a href="<?=site_url('relation/notice?noticeId='.$each->_noticeid)?>">
                                    <?php if(mb_strlen($each->title, "UTF-8") > 24) {
                                        echo mb_substr($each->title, 0, 22, "UTF-8").'..';
                                    } else {
                                        echo $each->title;
                                    } ?>
                                </a>
                            </span>
                        </item>
                    <?php } ?>
                </div>
                <div class="press-controller text-center">
                    <ul class="pagination">
                        <li class="<?php if ($notice_current_page == 1) echo 'hidden'; ?>" >
                            <a href="<?php
                                    $prev_page = $notice_current_page -1;
                                    echo site_url('relation?nw_page='.$news_current_page.'&nt_page='.$prev_page); ?>">
                                <
                            </a>
                        </li>
                        <?php foreach ($notice_page_arr as $key=>$each) { ?>
                            <li>
                                <a
                                    href="<?=site_url('relation?nw_page='.$news_current_page.'&nt_page='.$each)?>"
                                    class="<?php if($each == $notice_current_page) echo 'active'; ?>">
                                    <?php echo $each; ?>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="<?php if ($notice_current_page == $notice_last_page) echo 'hidden'; ?>">
                            <a href="<?php
                                    $next_page = $notice_current_page + 1;
                                    echo site_url('relation?nw_page='.$news_current_page.'&nt_page='.$next_page)?>">
                                >
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PICTURE -->
<section class="aw-relation-picture-section">
    <div class="container">
        <div class="row onlyWeb">
            <!-- FIRST LINE -->
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="30">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_01.png')?>">
            </div>
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="50">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_02.png')?>">
            </div>
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="70">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_03.png')?>">
            </div>
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="90">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_04.png')?>">
            </div>

            <!-- SECOND LINE -->
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="110">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_05.png')?>">
            </div>
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="120">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_06.png')?>">
            </div>
            <div class="col-sm-6 aw-relation-img-container fadeInDown wow" data-wow-offset="140">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_07.png')?>">
            </div>

            <!-- THIRD LINE -->
            <div class="col-sm-6 aw-relation-img-container fadeInDown wow" data-wow-offset="160">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_08.png')?>">
            </div>
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="180">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_09.png')?>">
            </div>
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="200">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_10.png')?>">
            </div>

            <!-- FIRTH LINE -->
            <div class="col-sm-6 aw-relation-img-container aw-relation-img-group">
                <div class="row">
                    <div class="aw-relation-img-container left-img-container col-sm-6">
                        <img class="aw-relation-img left-img left-img-first fadeInDown wow" data-wow-offset="220" src="<?=site_url('static/img/relation/relation_11.png')?>">
                        <img class="aw-relation-img left-img fadeInDown wow" data-wow-offset="240" src="<?=site_url('static/img/relation/relation_12.png')?>">
                    </div>
                    <div class="aw-relation-img-container right-img-container col-sm-6 fadeInDown wow" data-wow-offset="260">
                        <img class="aw-relation-img right-img" src="<?=site_url('static/img/relation/relation_13.png')?>">
                    </div>
                </div>

            </div>
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="280">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_14.png')?>">
            </div>
            <div class="col-sm-3 aw-relation-img-container fadeInDown wow" data-wow-offset="300">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_15.png')?>">
            </div>
            <div class="col-sm-6 aw-relation-img-container fadeInDown wow" data-wow-offset="320">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_16.png')?>">
            </div>
        </div>
        <div class="row onlyMobile">
            <!-- FIRST LINE -->
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_01.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_02.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_03.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_04.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_05.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_06.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_07.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_08.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_09.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_10.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container aw-relation-img-group">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_11.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container aw-relation-img-group">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_12.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container aw-relation-img-group">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_13.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_14.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_15.png')?>">
            </div>
            <div class="col-xs-12 aw-relation-img-container">
                <img class="aw-relation-img" src="<?=site_url('static/img/relation/relation_16.png')?>">
            </div>
        </div>
    </div>
</section>
