<?php if (!empty($this->session->flashdata('message'))) { ?>
                        <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
                    <?php } ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Questions</h3>
        <div class="pull-right">
        <button  class="btn btn-default" align="center"><a href="<?php echo base_url('admin/questions/add');?>">Add Question</a></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Correct Answer</th>
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($questions)) {
                    foreach ($questions as $question) {
                        ?>
                        <tr>
                            <td><?php echo $question->id ?></td>
                            <td><?php echo $question->title ?></td>
                            <td><?php $correct_answer='ans_'."$question->correct_ans";
                            if(isset($question->$correct_answer))echo htmlspecialchars($question->$correct_answer); ?></td>
                            <td class=" center"><a href="<?php echo base_url('admin/questions/edit/').$question->id;?>" class="editor_edit">Edit <i class="fa fa-pencil"></i></a> 
                                / <a href="<?php echo base_url('admin/questions/delete/').$question->id;?>" class="editor_remove">Delete <i class="fa fa-remove"></i></a></td>
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