<style>
    .form-panel:not(.active) {
        display:none;
    }
</style>
<div id="quizmain">
    <div id="quizcontainer">

        <h3><?php echo $test->title; ?></h3>
        
<!--        <form method="post" accept-charset="utf-8" action="<?php echo base_url('admin/tests/result'); ?>">
            <input type="hidden" name="test_id" value="<?php echo $test->id; ?>">-->

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
                                <input type="radio" disabled id="radio_<?php echo $key; ?>_1" name="correct_ans[<?php echo $question->id ?>][answer]" value="1" >
                                <label for="radio_<?php echo $key; ?>_1">
        <?php echo htmlspecialchars($question->ans_1); ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="icheck-primary d-inline">
                                <input type="radio" disabled id="radio_<?php echo $key; ?>_2" name="correct_ans[<?php echo $question->id ?>][answer]" value="2" >
                                <label for="radio_<?php echo $key; ?>_2">
        <?php echo htmlspecialchars($question->ans_2); ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="icheck-primary d-inline">
                                <input type="radio" disabled id="radio_<?php echo $key; ?>_3" name="correct_ans[<?php echo $question->id ?>][answer]" value="3" >
                                <label for="radio_<?php echo $key; ?>_3">
        <?php echo htmlspecialchars($question->ans_3); ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="icheck-primary d-inline">
                                <input type="radio" disabled id="radio_<?php echo $key; ?>_4" name="correct_ans[<?php echo $question->id ?>][answer]" value="4" >
                                <label for="radio_<?php echo $key; ?>_4">
                    <?php echo htmlspecialchars($question->ans_4); ?>
                                </label>
                            </div>
                        </div>
                    </div>
    <?php }
}
?>

            <div id="answerbuttoncontainer">
                <br>
                <input type='button' class="btn btn-default previous" value="<< Previous" style="display: none;">
                <input type='button' class=" btn btn-primary next" value="Next >>">
<!--                <button type='submit' name='submit' value='Submit' class="btn btn-success submitExam" style="display: none;" >Submit</button>
                <label id="timespentLabel">0:00</label>
                <input type="hidden" readonly="" name="duration" id="timespent" value="0:00">
                <input type="hidden" readonly="" name="start_time"  value="<?php echo $start_time; ?>">-->
            </div> 
        </form>

    </div>
</div>



