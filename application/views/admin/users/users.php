<?php if (!empty($this->session->flashdata('message'))) { ?>
                        <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
                    <?php } ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Users</h3>
        <div class="pull-right">
        <button  class="btn btn-default" align="center"><a href="<?php echo base_url('admin/users/add');?>">Add User</a></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Edit / Delete / Tests</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($users)) {
                    foreach ($users as $user) {
                        ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->username ?></td>
                            <td><?php echo $user->email ?></td>
                            <td><?php if($user->type==1)echo 'Admin';else echo 'user'; ?></td>
                            <td class=" center"><a href="<?php echo base_url('admin/users/edit/').$user->id;?>" class="editor_edit">Edit <i class="fa fa-pencil"></i></a> 
                                / <a href="<?php echo base_url('admin/users/delete/').$user->id;?>" class="editor_remove">Delete <i class="fa fa-remove"></i></a>
                                    / <a href="<?php echo base_url('admin/users/tests/').$user->id;?>" >Tests <i class="fa fa-question"></i></a>
                            
                            </td>
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