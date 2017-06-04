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
                        <input type="hidden" id="isContinue" value="<?php if(isset($item->is_continue)) echo $item->is_continue; ?>">
                        <form id="aw-form"
                              class="box-body" method="post" enctype="multipart/form-data"
                              action="<?= site_url('career/submit_update')?>">
                            <input name="career-id" type="hidden" value="<?php if(isset($item->_careerid)) echo $item->_careerid; ?>">
                            <input id="career-start" type="hidden" value="<?php if(isset($item->_careerid)) echo substr($item->start, 0, 10); ?>">
                            <input id="career-end" type="hidden" value="<?php if(isset($item->_careerid)) echo substr($item->end, 0, 10); ?>">
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
                                           value="<?php if (isset($item->title)) echo $item->title ?>">
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
                                    <textarea name="career-content" id="summernote"><?php if (isset($item->content)) echo $item->content ?></textarea>
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

    <section class="content-header">
        <h1>
            지원자
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-body table-responsive">
                        <table id="data-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>이름</th>
                                <th>구분</th>
                                <th>직무</th>
                                <th>이메일</th>
                                <th>연락처</th>
                                <th>확인자</th>
                                <th>확인일</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item->_applicantid ?></td>
                                    <td><a href="<?= site_url('applicant/detail?applicantId=' . $item->_applicantid) ?>">
                                            <?php
                                                echo $item->name;
                                                echo strpos($item->name, '<!');
                                            ?>

                                        </a></td>
                                    <td>
                                        <?php
                                            echo $item->label;
                                        //echo strspn($item->label, '<!');
//                                            if (strspn($item->label, '<!') != false) {
//                                                echo $item->label;
//                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $item->title ?></td>
                                    <td><?php echo $item->email ?></td>
                                    <td><?php echo $item->phone ?></td>
                                    <td><?php echo $item->username ?></td>
                                    <td><?php echo substr($item->checked, 0, 10) ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>