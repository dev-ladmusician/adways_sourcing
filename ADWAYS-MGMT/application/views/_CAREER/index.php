<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CAREER
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
                                <th>직무</th>
                                <th>구분</th>
                                <th>기한</th>
                                <th>수정일</th>
                                <th>숨기기</th>
                                <th>삭제</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item->_careerid ?></td>
                                    <td><a href="<?= site_url('career/detail?careerId=' . $item->_careerid) ?>">
                                            <?php echo $item->title ?>
                                        </a></td>
                                    <td><?php echo $item->label ?></td>
                                    <td>
                                        <?php
                                            if (isset($item->is_continue)) {
                                                if ($item->is_continue) echo "채용시";
                                                else echo substr($item->start, 0, 10).'~'.substr($item->end, 0, 10);
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo substr($item->updated, 0, 10) ?></td>
                                    <td>
                                        <?php
                                        if ($item->isdeprecated) {
                                            ?>
                                            <a href="<?= site_url('career/change_isdeprecated?itemId=' . $item->_careerid.'&isdeprecated=false') ?>"
                                               class="sg-item-survive">
                                                복원
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= site_url('career/change_isdeprecated?itemId=' . $item->_careerid.'&isdeprecated=true') ?>"
                                               class="sg-item-delete" style="color: red">
                                                숨기기
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a id="<?php echo $item->_careerid;?>" class="delete-item sg-item-delete">삭제</a>
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
                <a href="<?= site_url('career/create') ?>" class="btn btn-primary pull-right">
                    <i class="fa fa-download"></i> 생성하기
                </a>
            </div>
        </div>
    </section>

</div>