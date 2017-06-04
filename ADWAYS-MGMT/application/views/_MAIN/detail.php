<div class="content-wrapper">
    <section class="content-header">
        <h1>
            메인 슬라이드
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="form-horizontal">
                        <form id="aw-form"
                              class="box-body" method="post" enctype="multipart/form-data"
                              action="<?= site_url('/main/update')?>">
                            <input type="hidden" name="slide-id" value="<?php echo $item->_slideid; ?>">
                            <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('userid'); ?>">
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">타이틀</label>
                                <div class="col-sm-11 sg-item-content">
                                    <input type="text"
                                           class="form-control"
                                           name="slide-title"
                                           value="<?php echo $item->title; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">내용</label>
                                <div class="col-sm-11 sg-item-content">
                                    <textarea name="slide-desc" class="form-control"><?php echo $item->desc ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">게시자</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->username ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">사진</label>
                                <div class="col-sm-11 sg-item-content">
                                    <img src="<?php echo $item->url; ?>">
                                    <input type="file" name="slide-img" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">수정일</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo substr($item->updated , 0, 10); ?>
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
                               href="<?= site_url('main/change_isdeprecated?itemId=' . $item->_slideid) . '&isdeprecated=false' ?>">
                                살리기
                            </a>
                            <?php
                        } else {
                            ?>
                            <a class="btn btn-success pull-right" style="margin-right: 5px;"
                               href="<?= site_url('main/change_isdeprecated?itemId=' . $item->_slideid) . '&isdeprecated=true' ?>">
                                삭제하기
                            </a>

                            <?php
                        }
                        ?>
                        <a class="btn btn-primary pull-right" style="margin-right: 5px;"
                           href="<?= site_url('main/index') ?>">
                            목록보기
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>