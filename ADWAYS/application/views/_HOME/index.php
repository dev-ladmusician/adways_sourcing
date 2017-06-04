<section class="aw-fs-section">
    <?php foreach ($slides as $key=>$each) { ?>
        <input type="hidden" class="aw-main-slide-img" id="aw-main-slide-img-<?php echo $key + 1;?>" value="<?php echo $each->url;?>">
        <input type="hidden" class="aw-main-slide-title" id="aw-main-slide-title-<?php echo $key + 1;?>" value="<?php echo $each->title;?>">
        <input type="hidden" class="aw-main-slide-content" id="aw-main-slide-content-<?php echo $key + 1;?>" value="<?php echo $each->desc;?>">
    <?php } ?>
    <pannel class="fs-pannel fs-left-section fs-bg-transparent-30">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-7">  
                <div class="aw-fs-txt-container">
                    <?php foreach ($slides as $key=>$each) { ?>
                        <div id="<?php echo 'aw-main-title-'.$key; ?>"
                             class="aw-fs-title fadeInDown wow" <?php if ($key != 0) echo 'style="display: none;"' ?>
                             data-wow-offset="10">
                            <?php echo $each->title; ?>
                        </div>
                        <div id="<?php echo 'aw-main-content-'.$key; ?>"
                             class="aw-fs-content fadeInUp wow" <?php if ($key != 0) echo 'style="display: none;"' ?>
                             data-wow-offset="10">
                            <?php echo $each->desc; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- CONTROL PANNEL -->
        <ul class="aw-main-nav">
            <?php foreach ($slides as $key=>$each) { ?>
                <li class="aw-main-nav-item" id="<?php echo $key; ?>">
                    <span class="aw-main-nav-item-span <?php if ($key == 0) echo 'selected'; ?>"></span>
                </li>
            <?php } ?>
        </ul>
    </pannel>
    <pannel class="fs-pannel fs-right-section">
        <div class="aw-news-section">
            <div class="aw-news-title">
                NEWS
            </div>
            <div class="aw-new-carousel owl-theme">
                <?php foreach ($news as $each) { ?>
                    <div class="news-item">
                        <div class="row">
                            <div class="news-date col-sm-2">
                                <?php
                                $sub_str_date = substr($each->updated, 0 , 10);
                                $date_arr = explode('-', $sub_str_date);
                                echo substr($date_arr[0],2,4).'.'.$date_arr[1].'.'.$date_arr[2];
                                ?>
                            </div>
                            <div class="news-summary col-sm-10">
                                <a href="<?=site_url('relation/news?newsId='.$each->_newsid)?>">
                                    <?php echo $each->summary; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="aw-notice-section">
            <div class="aw-notice-title">
                NOTICE
            </div>
            <div class="aw-notice-carousel owl-theme">
                <?php foreach ($notices as $each) { ?>
                    <div class="notice-item">
                        <div class="row">
                            <div class="notice-date col-sm-2">
                                <?php
                                $sub_str_date = substr($each->updated, 0 , 10);
                                $date_arr = explode('-', $sub_str_date);
                                echo substr($date_arr[0],2,4).'.'.$date_arr[1].'.'.$date_arr[2];
                                ?>
                            </div>
                            <div class="notice-summary col-sm-10">
                                <a href="<?=site_url('relation/notice?noticeId='.$each->_noticeid)?>" style="color: #fff; font-weight: 100;">
                                    <?php echo $each->summary; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </pannel>
</section>

<section class="aws-main-section">
    <div class="container">
        <div class="row">
            <div class="aw-main-item-pannel-container col-sm-4">
                <pannel class="aw-main-item-pannel aw-main-item-pannel-aboutus
                               zoomIn animated text-center" data-wow-delay="0.4s">
                    <div class="aw-main-item-pannel-content">
                        <a href="<?=site_url('aboutus')?>">
                            ABOUT US
                        </a>
                    </div>
                </pannel>
            </div>
            <div class="aw-main-item-pannel-container col-sm-2">
                <pannel class="aw-main-item-pannel aw-main-item-pannel-culture
                            zoomIn animated text-center" data-wow-delay="0.6s">
                    <div class="aw-main-item-pannel-content">
                        <a href="<?=site_url('aboutus#vision')?>">
                            CULTURE
                        </a>
                    </div>
                </pannel>
            </div>
            <div class="aw-main-item-pannel-container col-sm-2">
                <pannel class="aw-main-item-pannel aw-main-item-pannel-service
                               zoomIn animated text-center" data-wow-delay="0.8s">
                    <div class="aw-main-item-pannel-content">
                        <a href="<?=site_url('service')?>">
                            SERVICE
                        </a>
                    </div>
                </pannel>
            </div>
            <div class="aw-main-item-pannel-container col-sm-4">
                <pannel class="aw-main-item-pannel aw-main-item-pannel-career
                               zoomIn animated text-center" data-wow-delay="0.10s">
                    <div class="aw-main-item-pannel-content">
                        <a href="<?=site_url('career')?>">
                            CAREER
                        </a>
                    </div>
                </pannel>
            </div>
            <div class="aw-main-item-pannel-container col-sm-4">
                <pannel class="aw-main-item-pannel aw-main-item-pannel-public
                               zoomIn animated text-center" data-wow-delay="0.12s">
                    <div class="aw-main-item-pannel-content">
                        <a href="<?=site_url('relation')?>">
                            PUBLIC RELATIONS
                        </a>
                    </div>
                </pannel>
            </div>
            <div class="aw-main-item-pannel-container col-sm-4">
                <pannel class="aw-main-item-pannel aw-main-item-pannel-blog
                               zoomIn animated text-center" data-wow-delay="0.14s">
                    <div class="aw-main-item-pannel-content">
                        <a href="http://blog.naver.com/adways_kr" target="_blank">
                            BLOG
                        </a>
                    </div>
                </pannel>
            </div>
            <div class="aw-main-item-pannel-container col-sm-4">
                <pannel class="aw-main-item-pannel aw-main-item-pannel-contact
                               zoomIn animated text-center" data-wow-delay="0.16s">
                    <div class="aw-main-item-pannel-content">
                        <a href="<?=site_url('contact')?>">
                            CONTACT
                        </a>
                    </div>
                </pannel>
            </div>
        </div>
    </div>
</section>