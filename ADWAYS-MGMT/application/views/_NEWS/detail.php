<div class="content-wrapper">
    <section class="content-header">
        <h1>NEWS</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="form-horizontal">
                        <form id="aw-form"
                              class="box-body" method="post" enctype="multipart/form-data"
                              action="<?= site_url('news/submit_update')?>">
                            <input type="hidden" name="dir_name" id="sg-create-date"
                                   value="<?php echo date("Y-m-d") . '_' . date("h:i:sa"); ?>"/>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">게시자</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->username ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">수정일</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo substr($item->updated , 0, 10); ?>
                                </div>
                            </div>
                            <input type="hidden" name="news-id" value="<?php echo $item->_newsid; ?>">
                            <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('userid'); ?>">
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">타이틀</label>
                                <div class="col-sm-11 sg-item-content">
                                    <input type="text"
                                           id="title"
                                           class="form-control"
                                           name="news-title"
                                           value="<?php echo $item->title; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">간략한 내용</label>
                                <div class="col-sm-11 sg-item-content">
                                    <textarea id="summary" name="news-desc" class="form-control"><?php echo $item->summary ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">내용</label>
                                <div class="col-sm-11">
                                    <textarea name="content" id="summernote"><?php if (isset($item->content)) echo $item->content ?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="submit" id="ng-submit"
                               class="btn btn-danger pull-right" value="수정하기">
                        <?php
                        if ($item->isdeprecated) {
                            ?>
                            <a class="btn btn-success pull-right" style="margin-right: 5px;"
                               href="<?= site_url('news/change_isdeprecated?itemId='.$item->_newsid).'&isdeprecated=false' ?>">
                                살리기
                            </a>
                            <?php
                        } else {
                            ?>
                            <a class="btn btn-success pull-right" style="margin-right: 5px;"
                               href="<?= site_url('news/change_isdeprecated?itemId='.$item->_newsid).'&isdeprecated=true' ?>">
                                삭제하기
                            </a>
                            <?php
                        }
                        ?>
                        <a class="btn btn-primary pull-right" style="margin-right: 5px;"
                           href="<?= site_url('news/index') ?>">
                            목록보기
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>