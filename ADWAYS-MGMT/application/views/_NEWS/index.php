<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            NEWS
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-body table-responsive">
                        <table id="data-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>타이틀</th>
                                <th>간략한 내용</th>
                                <th>게시자</th>
                                <th>수정일</th>
                                <th>숨기기</th>
                                <th>삭제하기</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item->_newsid ?></td>
                                    <td class="aw-col"><a href="<?= site_url('news/detail?newsId=' . $item->_newsid) ?>">
                                            <?php echo $item->title ?>
                                        </a></td>
                                    <td class="aw-col"><?php echo $item->summary ?></td>
                                    <td><?php echo $item->username ?></td>
                                    <td><?php echo substr($item->updated, 0, 10) ?></td>
                                    <td>
                                        <?php
                                        if ($item->isdeprecated) {
                                            ?>
                                            <a href="<?= site_url('news/change_isdeprecated?itemId=' . $item->_newsid.'&isdeprecated=false') ?>"
                                               class="sg-item-survive">
                                                복원
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= site_url('news/change_isdeprecated?itemId=' . $item->_newsid.'&isdeprecated=true') ?>"
                                               class="sg-item-delete" style="color: red">
                                                숨기기
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a id="<?php echo $item->_newsid;?>" class="delete-item sg-item-delete">삭제</a>
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
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="<?= site_url('news/create') ?>" class="btn btn-primary pull-right">
                    <i class="fa fa-download"></i> 생성하기
                </a>
            </div>
        </div>
    </section>

</div>