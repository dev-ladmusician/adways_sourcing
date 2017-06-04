</div>
<div class="aw-footer footer-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img class="aw-ci-img" src="<?=site_url('static/img/common/adways_ci_korea.png')?>">
            </div>
            <div class="aw-ft-txt col-sm-6 col-xs-12 ft-nanumbarunpen aw-lang-kr">
                서울시 서초구 강남대로 51길 1 대현블루타워 6층 (1층 커피빈 위치) <br>
                6F Daehyun Blue Tower 1 Ganam-Daero 51 gil <br class="onlyMobile">Seocho-gu Seaoul, Korea 06628 <br>
                E-mail, salesteam@adways.kr <br class="onlyMobile">Tel.+82-70-4420-6699 <br class="onlyMobile">Fax. +82-2-508-8894

            </div>
            <div class="aw-ft-txt col-sm-6 col-xs-12 ft-arial aw-lang-en" style="margin-top: 12px;">
                6F Daehyun Blue Tower 1 Ganam-Daero 51 gil <br class="onlyMobile">Seocho-gu Seaoul, Korea 06628 <br>
                E-mail, salesteam@adways.kr <br class="onlyMobile">Tel.+82-70-4420-6699 <br class="onlyMobile">Fax. +82-2-508-8894
                <div class="aw-ft-social-container onlyMobile">
                    <a href="https://www.facebook.com/adwayskorea1/" target="_blank">
                        <img src="<?=site_url('static/img/common/ic_facebook.png')?>">
                    </a>
                    <a href="https://www.facebook.com/adwayskorea1/" target="_blank">
                        <img src="<?=site_url('static/img/common/ic_linkedin.png')?>">
                    </a>
                    <a href="https://www.facebook.com/adwayskorea1/" target="_blank">
                        <img src="<?=site_url('static/img/common/ic_blog.png')?>">
                    </a>
                </div>
            </div>

            <div class="aw-ft-txt col-sm-4 col-xs-12 ft-arial ft-family-container">
                <div class="title">Global Network</div>
                <div class="desc">
                    <a href="http://adways.net/" target="_blank">Japan(headquarter)</a>
                    /
                    <a href="http://adways.com.cn/" target="_blank">China</a>
                    /
                    <a href="http://www.js-adways.com.tw/" target="_blank">Taiwan</a>
                    /
                    <a href="http://adways-indonesia.co.id/" target="_blank">Indonesia</a>
                    /
                    <a href="http://www.th-adwayslabs.com/" target="_blank">Thailand</a>
                    <br>
                    <a href="https://www.adways.net/philippines/" target="_blank">Philippines</a>
                    /
                    <a href="https://www.adways.net/vietnam/" target="_blank">Vietnam</a>
                    /
                    <a href="https://www.adways.net/us/" target="_blank">USA</a>
                    /
                    Hongkong
                    /
                    Shingapore
                </div>
            </div>

            <div class="aw-ft-social-container col-xs-12 onlyMobile">
                <a href="https://www.facebook.com/adwayskorea1/" target="_blank">
                    <img src="<?=site_url('static/img/common/ic_facebook.png')?>">
                </a>
                <a href="https://www.facebook.com/adwayskorea1/" target="_blank">
                    <img src="<?=site_url('static/img/common/ic_linkedin.png')?>">
                </a>
                <a href="https://www.facebook.com/adwayskorea1/" target="_blank">
                    <img src="<?=site_url('static/img/common/ic_blog.png')?>">
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/js/ajaxBody.js"></script>
<script src="/static/js/smoothscroll.js"></script>
<!--<script src="/static/lib/owlcarousel/js/owl.carousel.min.js"></script>-->
<!--<script src="/static/lib/owlcarousel/js/owl.carousel.min.js"></script>-->
<script src="<?=site_url('static/lib/wow/wow.js')?>""></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script>
<script src="<?php echo base_url()?>static/js/common.js"></script>

    <?php
    $total_url = $_SERVER['PHP_SELF'];
    $arr_splitted_url = explode('/', $total_url);

    if ($arr_splitted_url[count($arr_splitted_url) - 1] === "") {
        unset($arr_splitted_url[count($arr_splitted_url) - 1]);
    }

    $ctrl_name = $arr_splitted_url[count($arr_splitted_url) - 2];
    $view_name = $arr_splitted_url[count($arr_splitted_url) - 1];
    $filename = "";

    if ($ctrl_name == 'index.php') {
        $filename = 'static/js/'.strtolower($view_name).'/index.js';
    } else {
        $filename = 'static/js/'.strtolower($ctrl_name).'/'.strtolower($view_name).'.js';
    }

    if(file_exists($filename)) {
    ?>
        <script src="<?=site_url()?><?php echo $filename;?>"></script>
    <?php
    }
    if (strpos($filename, 'index.php')) {
    ?>
        <script src="<?=site_url()?>/static/js/home/index.js"></script>
    <?php
    }
    ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/static/lib/bootstrap/js/ie10-viewport-bug-workaround.js">
</body>
</html>