<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            메인 슬라이드
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table id="data-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>순서</th>
                                <th>이미지</th>
                                <th>타이틀</th>
                                <th>내용</th>
                                <th>게시자</th>
                                <th>삭제하기</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item->_slideid ?></td>
                                    <td><a href="<?= site_url('main/detail?slideId=' . $item->_slideid) ?>">
                                            <img src="<?php echo $item->url ?>">
                                        </a></td>
                                    <td><?php echo $item->title ?></td>
                                    <td><?php echo $item->desc ?></td>
                                    <td><?php echo $item->username ?></td>
                                    <td>
                                        <?php
                                        if ($item->isdeprecated) {
                                            ?>
                                            <a href="<?= site_url('main/change_isdeprecated?itemId=' . $item->_slideid) . '&isdeprecated=false' ?>"
                                               class="sg-item-survive">
                                                복원
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= site_url('main/change_isdeprecated?itemId=' . $item->_slideid . '&isdeprecated=true') ?>"
                                               class="sg-item-delete" style="color: red">
                                                숨기기
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </td>
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