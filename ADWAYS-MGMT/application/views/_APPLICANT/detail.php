<div class="content-wrapper">
    <section class="content-header">
        <h1>
            APPLICANT
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">이름</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->name; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">이메일</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->email; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">연락처</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->phone; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">구분</label>
                                <div class="col-sm-11 sg-item-content" style="color: red">
                                    <?php echo $item->label; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">지원 직무</label>
                                <div class="col-sm-11 sg-item-content" style="color: #3074a9">
                                    <a href="<?=site_url('career/detail?careerId='.$item->for_careerid)?>">
                                        <?php echo $item->title; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">내용</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->content; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">작성일</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo substr($item->created, 0, 10); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">확인일</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo substr($item->checked, 0, 10); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">마지막 확인자</label>
                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->username; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">지원서</label>
                                <div class="col-sm-11 sg-item-content">
                                    <a href="<?php echo $item->file; ?>" style="color: #4980ff;" target="_blank">
                                        지원서 다운로드
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a class="btn btn-primary pull-right" style="margin-right: 5px;"
                           href="<?= site_url('applicant/index') ?>">
                            목록보기
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>