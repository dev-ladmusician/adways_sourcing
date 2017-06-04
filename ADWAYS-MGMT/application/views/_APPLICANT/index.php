<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            지원자
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
                                <th>이름</th>
                                <th>구분</th>
                                <th>직무</th>
                                <th>이메일</th>
                                <th>연락처</th>
                                <th>확인자</th>
                                <th>확인일</th>
                                <th>숨기기</th>
                                <th>삭제</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item->_applicantid ?></td>
                                    <td><a href="<?= site_url('applicant/detail?applicantId=' . $item->_applicantid) ?>">
                                            <?php echo $item->name ?>
                                        </a></td>
                                    <td><?php echo $item->label ?></td>
                                    <td><?php echo $item->title ?></td>
                                    <td><?php echo $item->email ?></td>
                                    <td><?php echo $item->phone ?></td>
                                    <td><?php echo $item->username ?></td>
                                    <td><?php echo substr($item->checked, 0, 10) ?></td>
                                    <td>
                                        <?php
                                        if ($item->isdeprecated) {
                                            ?>
                                            <a href="<?= site_url('applicant/change_isdeprecated?itemId=' . $item->_applicantid.'&isdeprecated=false') ?>"
                                               class="sg-item-survive">
                                                복원
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= site_url('applicant/change_isdeprecated?itemId=' . $item->_applicantid.'&isdeprecated=true') ?>"
                                               class="sg-item-delete" style="color: red">
                                                숨기기
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a id="<?php echo $item->_applicantid;?>" class="delete-item sg-item-delete">삭제</a>
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