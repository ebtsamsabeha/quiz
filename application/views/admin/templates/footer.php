
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
</div>
<!-- <div class="mb-3"></div>
 /.content-wrapper 
  <footer class="main-footer mt-6 fixed-bottom">
    <strong> Quiz System </strong> All rights reserved.
  </footer>

-->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('public/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('public/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('public/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('public/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('public/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('public/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('public/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('public/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('public/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('public/'); ?>dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('public/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Page specific script -->

<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
    $(document).ready(function () {
        $('.select2').select2();

        $('#example').dataTable({
            "bPaginate": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{=URL('MIS','get_serverside')}}",
        });
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    });
</script>


<script>

//The below is one method that will achieve this (note that this could be simplified a good bit but doing so here would make it more difficult to understand for new programers):
//    alert($('.form-panel').index($('.form-panel.active')));
    
    $('.previous').click(function () {
        var cur = $('.form-panel').index($('.form-panel.active'));
        
        $(".next").show();
        if (cur == 1) {
            $(".previous").hide();
        } 
        if (cur != 0) {
            $('.form-panel').removeClass('active');
            $('.form-panel').eq(cur - 1).addClass('active');
        }
    });
    $('.next').click(function () {
        var cur = $('.form-panel').index($('.form-panel.active'));
        $(".previous").show();
        if (cur == $('.form-panel').length - 2) {
            $(".next").hide();
            $(".submitExam").show();
        }
        if (cur != $('.form-panel').length - 1) {
            $('.form-panel').removeClass('active');
            $('.form-panel').eq(cur + 1).addClass('active');
        }
    });
    function startTimer() {
        
        var tobj = document.getElementById("timespent");
        var tobjLabel = document.getElementById("timespentLabel");
        if(tobj !=null && tobjLabel!=null){
            var t = "0:00";
            var s = 00;
            var d = new Date();

            var timeint = setInterval(function () {
                s += 1;
                d.setMinutes("0");
                d.setSeconds(s);
                min = d.getMinutes();
                sec = d.getSeconds();
                if (sec < 10)
                    sec = "0" + sec;
                document.getElementById("timespent").value = min + ":" + sec;
                document.getElementById("timespentLabel").innerHTML = min + ":" + sec;
            }, 1000);
            tobj.value = t;
            tobjLabel.innerHTML = t;
        }

    }
    if (window.addEventListener) {
        window.addEventListener("load", startTimer);
    } else if (window.attachEvent) {
        window.attachEvent("onload", startTimer);
    }

</script>
</body>
</html>

