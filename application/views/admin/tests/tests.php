<?php if (!empty($this->session->flashdata('message'))) { ?>
                        <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
                    <?php } ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tests</h3>
        <div class="pull-right">
        <button  class="btn btn-default" align="center"><a href="<?php echo base_url('admin/tests/add');?>">Add Test</a></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($tests)) {
                    foreach ($tests as $test) {
                        ?>
                        <tr>
                            <td><?php echo $test->id ?></td>
                            <td><?php echo $test->title ?></td>
                            <td class=" center"><a href="<?php echo base_url('admin/tests/edit/').$test->id;?>" class="editor_edit">Edit <i class="fa fa-pencil"></i></a> 
                                / <a href="<?php echo base_url('admin/tests/delete/').$test->id;?>" class="editor_remove">Delete <i class="fa fa-remove"></i>
                                / <a href="<?php echo base_url('admin/tests/view/').$test->id;?>" >View Test <i class="fa fa-eye"></i>
                                
                                </a></td>
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