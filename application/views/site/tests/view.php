<style>
    .form-panel:not(.active) {
        display:none;
    }
</style>


<div class="row">
    <section class="content col-sm-3 "></section>
    <section class="content col-sm-6 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        
                        <form method="post" accept-charset="utf-8" action="<?php echo base_url('tests/result'); ?>">
                            <div class="card-header">

                                <h2 class="card-title"><?php echo $test->title; ?></h2>
                                <div class="card-tools">
                                    <label id="timespentLabel">0:00</label>
                                    <input type="hidden" name="test_id" value="<?php echo $test->id; ?>">

                                    <input type="hidden" readonly="" name="duration" id="timespent" value="0:00">
                                    <input type="hidden" readonly="" name="start_time"  value="<?php echo $start_time; ?>">

                                </div>
                            </div>
                            <div class="card-body">
                                <?php
            if (isset($questions)) {
                foreach ($questions as $key => $question) {
                    ?>
                    <div class="form-panel <?php if ($key == 0) {
                        echo "active";
                    } ?>">
                        <p id="qtext"><?php echo $question->title; ?></p>
                        <input type="hidden" name="correct_ans[<?php echo $question->id ?>][id]" value="<?php
                       if (isset($question->id)) {
                           echo $question->id;
                       }
                       ?>">

                        <div class="form-group ">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radio_<?php echo $key; ?>_1" name="correct_ans[<?php echo $question->id ?>][answer]" value="1" >
                                <label for="radio_<?php echo $key; ?>_1">
        <?php echo htmlspecialchars($question->ans_1); ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radio_<?php echo $key; ?>_2" name="correct_ans[<?php echo $question->id ?>][answer]" value="2" >
                                <label for="radio_<?php echo $key; ?>_2">
        <?php echo htmlspecialchars($question->ans_2); ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radio_<?php echo $key; ?>_3" name="correct_ans[<?php echo $question->id ?>][answer]" value="3" >
                                <label for="radio_<?php echo $key; ?>_3">
        <?php echo htmlspecialchars($question->ans_3); ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radio_<?php echo $key; ?>_4" name="correct_ans[<?php echo $question->id ?>][answer]" value="4" >
                                <label for="radio_<?php echo $key; ?>_4">
                    <?php echo htmlspecialchars($question->ans_4); ?>
                                </label>
                            </div>
                        </div>
                    </div>
    <?php }
}
?>
                            </div>
                            <div class="card-footer">
                                <input type='button' class="btn btn-default previous" value="<< Previous" style="display: none;">
                                <input type='button' class=" btn btn-primary next" value="Next >>">
                                <div class="text-right">
                                <button type='submit' name='submit' value='Submit' class="btn btn-success submitExam" style="display: none;" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




