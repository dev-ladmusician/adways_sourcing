<div class="content-wrapper">
    <section class="content-header">
        <h1>
            CAREER
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="form-horizontal">
                        <form id="aw-form"
                              class="box-body" method="post" enctype="multipart/form-data"
                              action="<?= site_url('career/submit_create')?>">
                            <input type="hidden" name="dir_name" id="sg-create-date"
                                   value="<?php echo date("Y-m-d") . '_' . date("h:i:sa"); ?>"/>

                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">게시자</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $this->session->userdata('username'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">구분</label>
                                <div class="col-sm-11 sg-item-content">
                                    <select id="career-category"
                                            class="form-control select2"
                                            name="career-category">
                                        <?php
                                        foreach ($categories as $each) {
                                            ?>
                                            <option
                                                <?php if ($item != null && isset($item->for_categoryid)) {
                                                    if ($item->for_categoryid == $each->_categoryid) { ?>
                                                        selected
                                                    <?php }
                                                } ?>
                                                value="<?php echo $each->_categoryid; ?>"><?php echo $each->label; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">직무</label>
                                <div class="col-sm-11 sg-item-content">
                                    <input type="text"
                                           id="title"
                                           class="form-control"
                                           name="career-title"
                                           value="<?php if (isset($data->title)) echo $data->title ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">기간</label>
                                <div class="col-sm-11 sg-item-content">
                                    <input type="text" class="form-control active"
                                           name="career-range"
                                           id="career-range">
                                    <input type="checkbox" id="career-range-continue">
                                    채용시
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">내용</label>
                                <div class="col-sm-11">
                                    <textarea name="career-content" id="summernote"><?php if (isset($data->content)) echo $data->content ?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="submit" id="ng-submit"
                               class="btn btn-danger pull-right" value="저장하기">
                        <a class="btn btn-primary pull-right" style="margin-right: 5px;"
                           href="<?= site_url('career/index') ?>">
                            목록보기
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>