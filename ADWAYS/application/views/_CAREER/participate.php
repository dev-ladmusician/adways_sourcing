<section class="aw-career-fs-section fs-bg-transparent-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="career-title fadeInDown animated">
                    WE VALUE OUR PEOPLE MOST
                </div>
                <div class="career-title-desc fadeInDown animated aw-lang-kr">
                    글로벌 마케팅 트렌드를 선도하는 자부심,
                    <br>
                    ADWAYS에서 빛나는 당신의 능력
                </div>
                <div class="career-content fadeInUp animated aw-lang-kr">
                    인재상(Our people at ADWAYS KOREA)
                </div>
                <div class="career-title-desc fadeInDown animated aw-lang-en">
                    Pride in leading a global marketing trend, your competence shining at ADWAYS.
                </div>
                <div class="career-content fadeInUp animated aw-lang-en">
                    Our people at ADWAYS KOREA
                </div>
                <div class="career-content-desc fadeInUp animated">
                    Adwaysers are Professional, Self-Driven, Highly-Motivated,
                    <br class="onlyWeb">
                    Adventurous and Pleasant. Our people are our biggest asset and here
                    <br class="onlyWeb">
                    we build a true community where we inspire one another and grow together.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PARTICIPATE -->
<section class="aw-career-participate-section">
    <div class="container">
        <div class="row">
            <div class="resume-container col-sm-12">
                <div class="resume-title ft-bebas">
                    <span>JOB APPLY</span>
                </div>
                <div class="resume-desc-pannel resume-type">
                    <span class="title">구분</span>
                    <span class="desc">
                        <?php if ($item->for_categoryid == 1) { ?>
                            |신입|
                        <?php } else { ?>
                            |경력|
                        <?php } ?>
                    </span>
                </div>
                <div class="resume-desc-pannel resume-category">
                    <span class="title">채용직무</span>
                    <span class="desc">
                        <?php echo $item->title; ?>
                    </span>
                </div>
                <div class="resume-desc-pannel resume-category resume-data-pannel">
                    <span class="title">모집기간</span>
                    <span class="desc">
                        <?php
                        if (isset($item->is_continue)) {
                            if ($item->is_continue) {
                                echo "채용시";
                            } else {
                                $sub_str_start_date = substr($item->start, 0 , 10);
                                $date_arr = explode('-', $sub_str_start_date);

                                $sub_str_end_date = substr($item->end, 0 , 10);
                                $date_arr = explode('-', $sub_str_end_date);

                                echo substr($date_arr[0], 2, 4).'.'.$date_arr[1].'.'.$date_arr[2]. '~' . substr($date_arr[0], 2, 4).'.'.$date_arr[1].'.'.$date_arr[2];
                            }

                        }
                        ?>
                    </span>
                </div>
<!--                <div class="resume-desc-pannel resume-summary-pannel resume-summary">-->
<!--                    <span class="title resume-summary-title">모집요강</span>-->
<!--                    <span class="desc resume-summary-title">-->
<!--                        --><?php //echo $item->content; ?>
<!--                    </span>-->
<!--                </div>-->

                <form id="aw-form"
                      class="box-body" method="post" enctype="multipart/form-data"
                      action="<?= site_url('career/submit')?>">
                    <input type="hidden" name="careerId" value="<?php echo $item->_careerid; ?>">
                    <div class="resume-content-pannel resume-name clearboth">
                        <span>이름</span>
                        <input id="aw-name" type="text" placeholder="" name="name" value="<?php if(isset($data->name)) echo $data->name; ?>">
                    </div>
                    <div class="resume-content-pannel resume-email">
                        <span>이메일</span>
                        <input id="aw-email" type="text" placeholder="" name="email" value="<?php if(isset($data->email)) echo $data->email; ?>">
                    </div>
                    <div class="resume-content-pannel resume-phone">
                        <span>연락처</span>
                        <input id="aw-phone" type="text" placeholder="" name="phone" value="<?php if(isset($data->phone)) echo $data->phone; ?>">
                    </div>
                    <div class="resume-content-pannel resume-content">
                        <span style="float: left;">내용</span>
                        <textarea id="aw-content" name="content"><?php if(isset($data->content)) echo $data->content; ?></textarea>
                    </div>
                    <div class="resume-content-pannel resume-file">
                        <span>지원서</span>
                        <input id="aw-file" name="resume" type="file" placeholder="" value="">
                    </div>
                    <div class="resume-submit">
                        <a id="aw-form-submit">지원하기</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>