<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row  align-items-stretch">
                <?php foreach ($tests as $key=>$test) { ?>
                    <div class=" col-md-3  align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                <?php echo($key+1);?>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b><?php echo $test->title ?></b></h2>
                                        <p class="text-muted text-sm"><b>Q no. : </b> <?php echo $test->questions ?></p>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <?php if(count($test->result)>0){?>
                                    <a href="/result/<?php echo $test->result[0]->id?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-tasks"></i> View Result
                                    </a>
                                    <a href="/test/<?php echo $test->title?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-question"></i> Try Again
                                    </a>
                                    <?php }else{?>
                                    <a href="/test/<?php echo $test->title?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-question"></i> Test
                                    </a>
                                   <?php  }?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>

    </div>

