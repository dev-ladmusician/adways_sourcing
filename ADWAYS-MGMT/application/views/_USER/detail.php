<div class="content-wrapper">
    <section class="content-header">
        <h1>
            유저

        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-1 control-label">id</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->_userid ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">이름</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->username ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">메일</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->email ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">관리자</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php
                                    if ($item->isadmin) {
                                        ?>
                                            O
                                        <?php
                                    } else {
                                        ?>
                                            X
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">로그인</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->logined ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">수정일</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->updated ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">생성일</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->created ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">생성일</label>

                                <form class="form-horizontal" action="<?= site_url('/user/change_password/') ?>"
                                      method="post" enctype="multipart/form-data">
                                    <div class="col-sm-11 sg-item-content">
                                        <input type="hidden" name="userId" value="<?php echo $item->_userid ?>">
                                        <input type="password" class="jamong-password-input form-control my-colorpicker1"
                                               name="password" ng-model="user.password"/>
                                        <input type="submit" value="비밀번호 변경"
                                               class="btn btn-success jamong-password-change-submit"
                                               style="margin-left: 3px; margin-bottom: 3px;"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a class="btn btn-danger pull-right" style="margin-right: 5px;"
                           href="<?= site_url('user/change_isdeprecated?userid=' . $item->_userid) . '&isdeprecated=false' ?>">
                            <i class="fa fa-credit-card"></i> 삭제
                        </a>
                        <?php
                        if ($item->isdeprecated) {
                            ?>
                            <a class="btn btn-danger pull-right" style="margin-right: 5px;"
                               href="<?= site_url('user/change_isdeprecated?userid=' . $item->_userid) . '&isdeprecated=false' ?>">
                                <i class="fa fa-credit-card"></i> 복원
                            </a>
                            <?php
                        } else {
                            ?>
                            <a class="btn btn-success pull-right" style="margin-right: 5px;"
                               href="<?= site_url('user/change_isdeprecated?userid=' . $item->_userid) . '&isdeprecated=true' ?>">
                                <i class="fa fa-credit-card"></i> 숨기기
                            </a>

                            <?php
                        }
                        ?>

                        <?php
                        if ($item->isadmin) {
                            ?>
                            <a class="btn btn-warning pull-right" style="margin-right: 5px;"
                               href="<?= site_url('user/change_admin?userid='.$item->_userid).'&isadmin=false' ?>">
                                <i class="fa fa-file-excel-o"></i> 관리자 박탈
                            </a>
                            <?php
                        } else {
                            ?>
                            <a class="btn btn-warning pull-right" style="margin-right: 5px;"
                               href="<?= site_url('user/change_admin?userid='.$item->_userid).'&isadmin=true' ?>">
                                <i class="fa fa-file-excel-o"></i> 관리자 부여
                            </a>

                            <?php
                        }
                        ?>
                        <a class="btn btn-primary pull-right" style="margin-right: 5px;"
                           href="<?= site_url('user/index') ?>">
                            <i class="fa fa-download"></i>목록보기
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>