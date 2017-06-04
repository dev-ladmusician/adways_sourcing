<nav class="navbar navbar-default navbar-fixed-top aw-navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="aw-nav-ci-container navbar-brand " href="<?=site_url('home/index')?>">
                <img class="aw-nav-ci-img" src="<?=site_url('static/img/common/adways_ci_korea.png')?>">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav navbar aw-navbar-menu">
                <li><a href="<?php if($lang != "") echo site_url('aboutus?lang='.$lang); else echo site_url('aboutus/'); ?>">ABOUT US</a></li>
                <li><a href="<?php if($lang != "") echo site_url('service?lang='.$lang); else echo site_url('service/'); ?>">SERVICES</a></li>
                <li><a href="<?php if($lang != "") echo site_url('relation?lang='.$lang); else echo site_url('relation/'); ?>">PUBLIC RELATIONS</a></li>
                <li><a href="<?php if($lang != "") echo site_url('career?lang='.$lang); else echo site_url('career/'); ?>">CAREER</a></li>
                <li><a href="<?php if($lang != "") echo site_url('contact?lang='.$lang); else echo site_url('contact/'); ?>">CONTACT</a></li>
                <li>
                    <a class="aw-lang" href="#">
                        <span class="<?php if ($lang == "kr" || $lang == "") echo 'selected'; ?>">KO</span> &nbsp;|&nbsp;
                        <span class="<?php if ($lang == "en") echo 'selected'?>">EN</span>
                    </a>
                </li>
                <li class="aw-web-menu social">
                    <a href="https://www.facebook.com/adwayskorea1/" target="_blank">
                        <img src="<?=site_url('static/img/common/ic_facebook.png')?>">
                    </a>
                </li>
                <li class="aw-web-menu social">
                    <a href="https://www.linkedin.com/company/10403215?trk=tyah&trkInfo=clickedVertical%3Acompany%2CentityType%3AentityHistoryName%2CclickedEntityId%3Acompany_company_company_company_10403215%2Cidx%3A0" target="_blank">
                        <img src="<?=site_url('static/img/common/ic_linkedin.png')?>">
                    </a>
                </li>
                <li class="aw-web-menu social">
                    <a href="http://blog.naver.com/adways_kr" target="_blank">
                        <img src="<?=site_url('static/img/common/ic_blog.png')?>">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>