
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  
<div class="card">
    <div class="card-header">
        <div class="pull-right">
        <button  class="btn btn-default" align="center"><a href="<?php echo base_url('admin/users');?>"> Users</a></button>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    
    <form method="post" accept-charset="utf-8" action="<?php if($formAction=="Add")echo base_url('admin/users/add');elseif($formAction=="Update")echo base_url('admin/users/edit/'.$user->id);?>">
        <div class="card-body">
            
            <input type="hidden" name="formAction" value="<?php echo $formAction;?>">
            <input type="hidden" name="id" value="<?php if (isset($user->id)){ echo $user->id; } ?>">
            <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($user->username)){ echo $user->username; } ?>" placeholder="Enter a username">
                    <p class="help-block">At least 4 characters, letters or numbers only</p>
            </div>
            <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php if (isset($user->email)){ echo $user->email; } ?>" >
                    <p class="help-block">A valid email address</p>
            </div>
            <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter a password" value="<?php if (isset($user->password)){ echo $user->password; } ?>" >
                    <p class="help-block">At least 6 characters</p>
            </div>
            <div class="form-group">
                    <label for="password_confirm">Confirm password</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password" value="<?php if (isset($user->password_confirm)){ echo $user->password_confirm; } ?>">
                    <p class="help-block">Must match your password</p>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="type" >
                    <option></option>
                    <option value="1" <?php if (isset($user->type) && $user->type==1){echo "selected";}?>>Admin </option>
                    <option value="0" <?php if (isset($user->type) && $user->type==0){echo "selected";}?>>User</option>
                </select>

            </div>
            <div class="form-group">
                <label>Tests</label>
                <select class="select2" multiple="multiple" data-placeholder="Select a Test" name="test_id[]" style="width: 100%;">
                  <?php foreach ($tests as  $test) {?>
                    <option value="<?php echo $test->id;?>" <?php if(isset($user_tests)){foreach ($user_tests as  $user_test) {if($user_test==$test->id){echo"selected";}}}?>><?php echo $test->title;?></option>
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

