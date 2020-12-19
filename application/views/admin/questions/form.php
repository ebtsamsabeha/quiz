
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<?php if (isset($error)) : ?>
        <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                </div>
        </div>
<?php endif; ?>
  
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Question</h3>
        <div class="pull-right">
        <button  class="btn btn-default" align="center"><a href="<?php echo base_url('admin/questions');?>"> Questions</a></button>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    
    <form method="post" accept-charset="utf-8" action="<?php echo base_url('admin/questions/validate');?>">
        <div class="card-body">
            
            <input type="hidden" name="formAction" value="<?php echo $formAction;?>">
            <input type="hidden" name="id" value="<?php if (isset($question->id)){ echo $question->id; } ?>">
            <div class="form-group">
                <label for="title">Question Title</label>
                <input type="text" class="form-control" name="title" id="title" 
                       value="<?php if (isset($question->title)){echo $question->title;}?>"
                       placeholder="Enter Question Title">
            </div>
            <div class="form-group ">

                <div class="form-group ">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radio1" name="correct_ans" value="1" <?php if (isset($question->correct_ans) && $question->correct_ans==1 ) {  echo "checked";} ?>>
                        <label for="radio1">
                            Answer one
                        </label>
                    </div>
                </div>
                <input type="text" class="form-control" name="ans_1" id="ans_1" 
                       value="<?php if (isset($question->ans_1)) {echo $question->ans_1;} ?>"
                       placeholder="Enter Answer .. ">
            </div>

            <div class="form-group ">
                <div class="form-group ">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radio2" name="correct_ans" value="2" <?php if (isset($question->correct_ans) && $question->correct_ans==2 ) {  echo "checked";} ?>>
                        <label for="radio2">
                            Answer Two
                        </label>
                    </div>
                </div>
                <input type="text" class="form-control" name="ans_2" id="ans_2" 
                       value="<?php if (isset($question->ans_2)) {  echo $question->ans_2;} ?>"
                       placeholder="Enter Answer .. ">
            </div>
            
            <div class="form-group ">
                <div class="form-group ">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radio3" name="correct_ans" value="3" <?php if (isset($question->correct_ans) && $question->correct_ans==3 ) {  echo "checked";} ?>>
                        <label for="radio3">
                            Answer Three
                        </label>
                    </div>
                </div>
                <input type="text" class="form-control" name="ans_3" id="ans_3" 
                       value="<?php if (isset($question->ans_3)) {  echo $question->ans_3;} ?>"
                       placeholder="Enter Answer .. ">
            </div>
            <div class="form-group ">
                <div class="form-group ">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radio4" name="correct_ans" value="4" <?php if (isset($question->correct_ans) && $question->correct_ans==4 ) {  echo "checked";} ?>>
                        <label for="radio4">
                            Answer Four
                        </label>
                    </div>
                </div>
                <input type="text" class="form-control" name="ans_4" id="ans_4" 
                       value="<?php if (isset($question->ans_4)) {  echo $question->ans_4;} ?>"
                       placeholder="Enter Answer .. ">
            </div>
            <div class="form-group">
                  <label>Tests</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a Test" name="test_id[]" style="width: 100%;">
                    <?php foreach ($tests as  $test) {?>
                      <option value="<?php echo $test->id;?>" <?php if (isset($question_tests)){foreach ($question_tests as  $question_test) {if($question_test==$test->id){echo"selected";}}}?>><?php echo $test->title;?></option>
                    <?php }?>
                  </select>
                </div>
            
            
            
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type='submit' name='submit' value='Submit' class="btn btn-primary">Submit</button>
            
        </div>
    </form>
</div>

