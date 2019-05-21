    <script data-cfasync="false" src="<?php echo base_url();?>assets/js/email-decode.min.js"></script><script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/bower_components/jquery/js/jquery.min.js"></script>
    <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/bower_components/popper.js/js/popper.min.js"></script>
    <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/bower_components/modernizr/js/modernizr.js"></script>
    <!-- Chart js -->
    <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/bower_components/chart.js/js/Chart.js"></script>
    <!-- amchart js -->
    <script src="<?php echo base_url();?>assets/pages/widget/amchart/amcharts.js" type="59edefb75604f457019ed4b6-text/javascript"></script>
    <script src="<?php echo base_url();?>assets/pages/widget/amchart/serial.js" type="59edefb75604f457019ed4b6-text/javascript"></script>
    <script src="<?php echo base_url();?>assets/pages/widget/amchart/light.js" type="59edefb75604f457019ed4b6-text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js" type="59edefb75604f457019ed4b6-text/javascript"></script>
    <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/SmoothScroll.js"></script>
    <script src="<?php echo base_url();?>assets/js/pcoded.min.js" type="59edefb75604f457019ed4b6-text/javascript"></script>
    <!-- custom js -->
    <script src="<?php echo base_url();?>assets/js/vartical-layout.min.js" type="59edefb75604f457019ed4b6-text/javascript"></script>
    <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="59edefb75604f457019ed4b6-text/javascript" src="<?php echo base_url();?>assets/js/script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="<?php echo base_url();?>assets/js/google.js" type="59edefb75604f457019ed4b6-text/javascript"></script>
<script type="59edefb75604f457019ed4b6-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="<?php echo base_url();?>assets/js/rocket-loader.min.js" data-cf-settings="59edefb75604f457019ed4b6-|49" defer=""></script>
<script src="<?php echo base_url();?>assets/js/jquery-3.4.0.min.js"></script>

<!-- Mirrored from colorlib.com//polygon/adminty/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2019 05:29:56 GMT -->
<script >
    
  $(document).ready(function() {
    // add exam code start
      $("#addExamButton").click(function(){
        var examName = $('#addExam').val();
        alert("Your exam is successfully created");
        $.post("<?php echo base_url('examconfiguration/addExam') ?>", {examName : examName}, function(data){
                $("#examAdd1").html(data);
        });
        $('#addExam').val("");
        });
      
       var examName = $('#addExam').val();
     $.post("<?php echo base_url('examconfiguration/addExam') ?>", {examName : examName}, function(data){
                $("#examAdd1").html(data);
        });
 // End exam code
      // start add test code

      $("#addTestButton").click(function(){
         var testName = $('#addTest').val();
         var examHead = $('#examListshow').val();
         var testDesc = $('#descTest').val();
         var testMarks = $('#marksTest').val();
         $.post("<?php echo base_url('examconfiguration/addTest')?>",{testName : testName,
            examHead : examHead,
            testDesc : testDesc,
            testMarks : testMarks}, function(data){
            
            $("#addTest1").html(data);
            alert("Your test succesfully add");
         });
         $("#addTest").val("");
      });
      /// side show valu in test section
      var testName = $('#addTest').val();
         var examHead = $('#examListshow').val();
         var testDesc = $('#descTest').val();
         var testMarks = $('#marksTest').val();
         $.post("<?php echo base_url('examconfiguration/addTest')?>",{testName : testName,
            examHead : examHead,
            testDesc : testDesc,
            testMarks : testMarks}, function(data){
            $("#addTest1").html(data);
           
         });

      // end add test code
      // start add subject code
       //js
      $("#examListShow").change(function(){
                    var testnm = $("#examListShow").val();
                   // alert(testnm);
                    $.post("addSubject2",{testnm : testnm}, function(data){
                    $("#testListshow").html(data);
                        });
                });
      //js end
         $("#addSubjectButton").click(function(){
        var subjectName = $('#addSubject').val(); 
         var examListshow = $('#examListShow').val();
          var testListshow = $('#testListshow').val();
          var questionNo = $('#addQuestion').val(); 
        alert("Your Subject is successfully created");
        $.post("<?php echo base_url('examconfiguration/addSubject') ?>", {
          subjectName : subjectName,
          examListshow : examListshow,
          testListshow : testListshow,
          questionNo : questionNo
        }, function(data){
                $("#addSubject1").html(data);
        });

        $('#addSubject').val("");
        });
         //show code of subject in right side panel
          var subjectName = $('#addSubject').val(); 
         var examListshow = $('#examListShow').val();
          var testListshow = $('#testListshow').val();
          var questionNo = $('#addQuestion').val(); 
        //alert("Your Subject is successfully created");
        $.post("<?php echo base_url('examconfiguration/addSubject') ?>", {
          subjectName : subjectName,
          examListshow : examListshow,
          testListshow : testListshow,
          questionNo : questionNo
        }, function(data){
                $("#addSubject1").html(data);
        });
        //js code
        // $("#examListshow").change(function(){
        //             var examnm = $("#examListshow").val();
        //             alert(examnm);
        //             $.post("addTest",{examnm: examnm}, function(data){
        //             $("#examListshow").html(data);
        //             //alert(data);
        //                 });
        //         });
        //js code end

      // end add subject code
  });

  </script>


