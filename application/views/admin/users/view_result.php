
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo  htmlspecialchars($test->title); ?> Results </h1>
                <h5> Score : <?php echo $result[0]->correct_ans . " of " . $result[0]->Total_question; ?> </h5>
                <h3><?php echo intval($result[0]->correct_ans / $result[0]->Total_question*100) . " %  Correct" ; ?> </h3>

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<hr/>
<!-- Main content -->
<?php foreach ($questions as $key => $question) { ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo ($key + 1) . " - " . htmlspecialchars($question->title) ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="<?php
                            if ($question->correct_ans == 1 && $question->ans == 1) {
                                echo "card-success";
                            } elseif ($question->correct_ans == 1 && $question->ans != 1) {
                                echo "card-primary";
                            } elseif ($question->correct_ans != 1 && $question->ans == 1) {
                                echo "card-danger";
                            } elseif ($question->correct_ans != 1 && $question->ans != 1) {
                                echo "card-light";
                            }
                            ?> card-outline  ">
                                <a class="d-block w-100">
                                    <div class="card-header">
                                        <h4 class="card-title w-100"><?php if ($question->ans == 1 && $question->ans == $question->correct_ans ) { ?><i class="fa fa-check"></i><?php } elseif ($question->ans == 1 && $question->ans != $question->correct_ans) { ?><i class="fa fa-times"></i><?php } ?>
    <?php echo htmlspecialchars($question->ans_1) ?>
                                        </h4>
                                        <?php if ($question->correct_ans == 1 && $question->ans == 1) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">Your correct answer</span>
                                            </div>
                                        <?php } elseif ($question->correct_ans == 1 && $question->ans != 1) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">correct answer</span>
                                            </div>
    <?php } elseif ($question->correct_ans != 1 && $question->ans == 1) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">Wrong answer</span>
                                            </div>
                            <?php } ?>
                                    </div>
                                </a>
                            </div>
                            <br/>
                            <div class="<?php
                                            if ($question->correct_ans == 2 && $question->ans == 2) {
                                                echo "card-success";
                                            } elseif ($question->correct_ans == 2 && $question->ans != 2) {
                                                echo "card-primary";
                                            } elseif ($question->correct_ans != 2 && $question->ans == 2) {
                                                echo "card-danger";
                                            } elseif ($question->correct_ans != 2 && $question->ans != 2) {
                                                echo "card-light";
                                            }
                                            ?>
                                 card-outline">
                                <a class="d-block w-100">
                                    <div class="card-header">
                                        <h4 class="card-title w-100"><?php if ($question->ans == 2 && $question->ans == $question->correct_ans ) { ?><i class="fa fa-check"></i><?php } elseif ($question->ans == 2 && $question->ans != $question->correct_ans) { ?><i class="fa fa-times"></i><?php } ?>
    <?php echo htmlspecialchars($question->ans_2) ?>
                                        </h4>
    <?php if ($question->correct_ans == 2 && $question->ans == 2) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">Your correct answer</span>
                                            </div>
                            <?php } elseif ($question->correct_ans == 2 && $question->ans != 2) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">correct answer</span>
                                            </div>
    <?php } elseif ($question->correct_ans != 2 && $question->ans == 2) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">Wrong answer</span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </a>
                            </div>
                            <br/>
                            <div class="<?php
                                        if ($question->correct_ans == 3 && $question->ans == 3) {
                                            echo "card-success";
                                        } elseif ($question->correct_ans == 3 && $question->ans != 3) {
                                            echo "card-primary";
                                        } elseif ($question->correct_ans != 3 && $question->ans == 3) {
                                            echo "card-danger";
                                        } elseif ($question->correct_ans != 3 && $question->ans != 3) {
                                            echo "card-light";
                                        }
                                        ?>
                                 card-outline">
                                <a class="d-block w-100">
                                    <div class="card-header">
                                        <h4 class="card-title w-100"><?php if ($question->ans == 3 && $question->ans == $question->correct_ans ) { ?><i class="fa fa-check"></i><?php } elseif ($question->ans == 3 && $question->ans != $question->correct_ans) { ?><i class="fa fa-times"></i><?php } ?>
    <?php echo htmlspecialchars($question->ans_3) ?>
                                        </h4>
    <?php if ($question->correct_ans == 3 && $question->ans == 3) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">Your correct answer</span>
                                            </div>
                                            <?php } elseif ($question->correct_ans == 3 && $question->ans != 3) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">correct answer</span>
                                            </div>
    <?php } elseif ($question->correct_ans != 3 && $question->ans == 3) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">Wrong answer</span>
                                            </div>
    <?php } ?>
                                    </div>
                                </a>
                            </div>
                            <br/>
                            <div class="<?php
                                        if ($question->correct_ans == 4 && $question->ans == 4) {
                                            echo "card-success";
                                        } elseif ($question->correct_ans == 4 && $question->ans != 4) {
                                            echo "card-primary";
                                        } elseif ($question->correct_ans != 4 && $question->ans == 4) {
                                            echo "card-danger";
                                        } elseif ($question->correct_ans != 4 && $question->ans != 4) {
                                            echo "card-light";
                                        }
                                        ?>
                                 card-outline">
                                <a class="d-block w-100">
                                    <div class="card-header">
                                        <h4 class="card-title w-100"><?php if ($question->ans == 4 && $question->ans == $question->correct_ans ) { ?><i class="fa fa-check"></i><?php } elseif ($question->ans == 4 && $question->ans != $question->correct_ans) { ?><i class="fa fa-times"></i><?php } ?>
    <?php echo htmlspecialchars($question->ans_4) ?>
                                        </h4>
    <?php if ($question->correct_ans == 4 && $question->ans == 4) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">Your correct answer</span>
                                            </div>
    <?php } elseif ($question->correct_ans == 4 && $question->ans != 4) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">correct answer</span>
                                            </div>
    <?php } elseif ($question->correct_ans != 4 && $question->ans == 4) { ?>
                                            <div class="card-tools">
                                                <span class="answercomment">Wrong answer</span>
                                            </div>
    <?php } ?>
                                    </div>
                                </a>
                            </div>
                            <br/>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
<?php } ?>


