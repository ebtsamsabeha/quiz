<?php if (!empty($this->session->flashdata('message'))) { ?>
                        <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
                    <?php } ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Users Tests</h3>
        <div class="pull-right">
        <button  class="btn btn-default" align="center"><a href="<?php echo base_url('users');?>"> Users</a></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Test Title</th>
                    <th>Start Time</th>
                    <th>Duration</th>
                    <th>Total Question</th>
                    <th>Correct Answers</th>
                    <th>Wrong Answers</th>
                    <th>view </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($tests)) {
                    foreach ($tests as $test) {
                        ?>
                        <tr>
                            <td><?php echo $test->title ?></td>
                            <td><?php echo $test->start_time ?></td>
                            <td><?php echo $test->duration ?></td>
                            <td><?php echo $test->result->Total_question ?></td>
                            <td><?php echo $test->result->correct_ans ?></td>
                            <td><?php echo $test->result->wrong_ans ?></td>
                            <td class=" center"><a href="<?php echo base_url('admin/users/test_result/').$test->id;?>" class="editor_edit">view <i class="fa fa-eye"></i></a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>