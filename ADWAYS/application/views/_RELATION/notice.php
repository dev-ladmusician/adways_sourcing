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

<section class="aw-notice-section">
    <div class="container">
        <div class="row">
            <div class="notice-logo col-sm-12">
                <span class="ft-bebas">ADWAYS NOTICE</span>
            </div>
            <div class="notice-title col-sm-12">
                <?php echo $item->title; ?>
            </div>
            <div class="notice-date col-sm-12">
                <?php
                $sub_str_date = substr($item->updated, 0 , 10);
                $date_arr = explode('-', $sub_str_date);
                echo $date_arr[0].'.'.$date_arr[1].'.'.$date_arr[2];
                ?>
            </div>
            <div class="notice-content col-sm-12">
                <?php echo $item->content; ?>
            </div>
            <div class="notice-controller col-sm-12 text-center">
                <ul>
                    <?php if(isset($prev) && isset($prev->_noticeid)) { ?>
                        <li><a href="<?=site_url('relation/notice?noticeId='.$prev->_noticeid)?>">이전글</a></li>
                    <?php } ?>

                    <li><a href="<?=site_url('relation')?>">목록으로</a></li>

                    <?php if(isset($next) && isset($next->_noticeid)) { ?>
                        <li><a href="<?=site_url('relation/notice?noticeId='.$next->_noticeid)?>">다음글</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>