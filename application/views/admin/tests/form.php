
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Test</h3>
        <div class="pull-right">
        <button  class="btn btn-default" align="center"><a href="<?php echo base_url('admin/tests');?>"> Tests</a></button>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    
    <form method="post" accept-charset="utf-8" action="<?php echo base_url('admin/tests/validate');?>">
        <div class="card-body">
            
            <input type="hidden" name="formAction" value="<?php echo $formAction;?>">
            <input type="hidden" name="id" value="<?php if (isset($test->id)){ echo $test->id;}?>">
            <input type="hidden" name="title_old" value="<?php if (isset($test->title_old)){ echo $test->title_old;}elseif (isset($test->title)){ echo $test->title;}?>">
            <div class="form-group">
                <label for="title">Test Title</label>
                <input type="text" class="form-control" name="title" id="title" 
                       value="<?php if (isset($test->title)){echo $test->title;}?>"
                       placeholder="Enter Test Title">
            </div>
            <div class="form-group">
                <label for="status">Test status</label>
                <select class="form-control" name="status" id="status" >
                    <option></option>
                    <option value="1" <?php if (isset($test->status) && $test->status==1){echo "selected";}?>>Active </option>
                    <option value="0" <?php if (isset($test->status) && $test->status==0){echo "selected";}?>>InActive</option>
                </select>

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type='submit' name='submit' value='Submit' class="btn btn-primary">Submit</button>
            
        </div>
    </form>
</div>

