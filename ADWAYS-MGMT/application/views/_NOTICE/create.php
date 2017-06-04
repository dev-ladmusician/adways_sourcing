<div class="content-wrapper">
    <section class="content-header">
        <h1>
            NOTICE
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="form-horizontal">
                        <form id="aw-form"
                              class="box-body" method="post" enctype="multipart/form-data"
                              action="<?= site_url('notice/submit_create')?>">
                            <input type="hidden" name="dir_name" id="sg-create-date"
                                   value="<?php echo date("Y-m-d") . '_' . date("h:i:sa"); ?>"/>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">게시자</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $this->session->userdata('username'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">타이틀</label>
                                <div class="col-sm-11 sg-item-content">
                                    <input type="text"
                                           id="title"
                                           class="form-control"
                                           name="notice-title"
                                           value="<?php if (isset($data->title)) echo $data->title ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">간략한 내용</label>
                                <div class="col-sm-11 sg-item-content">
                                    <textarea id="summary" name="notice-desc" class="form-control"><?php if (isset($data->summary)) echo $data->summary ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">내용</label>
                                <div class="col-sm-11">
                                    <textarea name="content" id="summernote"><?php if (isset($data->content)) echo $data->content ?></textarea>
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
                           href="<?= site_url('notice/index') ?>">
                            목록보기
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>