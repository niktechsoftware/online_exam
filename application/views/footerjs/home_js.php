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
        $('#branchlist').DataTable();
    } );

    $(document).ready(function() {
    <?php 

      $i = $this->db->count_all("stock_products");
    ?>
    <?php for($j = 1; $j <= $i; $j++):?>
                             $("#send<?php echo $j;?>").click(function(){
                              // var smstodue = $("#rem<?php echo $i;?>").val();
                               var  hsn = $("#hsn<?php echo $j;?>").val();
                              var pname = $("#pname<?php echo $j;?>").val();
                              var total = $("#total<?php echo $j;?>").val();
                                var rid = $("#rid<?php echo $j;?>").val();
                                var pquan = $("#pquan<?php echo $j;?>").val();

                                   var rem = total-pquan ;
                               alert(pname+total+rid+pquan+rem+hsn);
                    $.post("<?php echo site_url('product/pwallet_value')?>",
                       {
             pname : pname,
             rid : rid,
             pquan : pquan,
             rem : rem,
             hsn : hsn
            },
            function(data){
              $("#send<?php echo $j;?>").html(data);
              alert(pquan+' Quantity Successfully Sended');
              window.location.reload();
            }
        );
      });
      $('#rem<?php echo $j;?>').mouseover(
          function(){
            var name = $('#total<?php echo $j;?>').val();
            var name1 = $('#pquan<?php echo $j;?>').val();
            var a = name - name1;       
            document.getElementById('rem<?php echo $j;?>').value=a;
          });
     
      <?php endfor; ?>


       function namevalidation() {
                                var text_value = document.getElementById("cname").value;
                                value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
                                document.getElementById("cname").value=value;
                                 }

                                  function namevalidation1() {
                                var text_value = document.getElementById("sub_cname").value;
                                value = text_value.replace(/[ ]+/g," ").replace(/[^(A-Za-z )]*/g, "");
                                document.getElementById("sub_cname").value=value;
                                 }

       
                 
              $("#stud").hide();
              $("#emp").hide();
               $("#adminproduct").hide();
                $("#branchproduct").hide();
                $("#subbranchproduct").hide();
          $("#checkid").change(function(){

                var cat = $("#checkid").val(); 
                if(cat==1)
                {  
                    $("#stud").hide();
                  $("#emp").hide();
                    $("#branchproduct").hide();
                    $("#subbranchproduct").hide();
             $("#adminproduct").show();
                }
                
                    if(cat==2)
                      {
                        $("#emp").hide();
                        $("#adminproduct").hide();
                         $("#stud").show();
                            $("#subbranchproduct").hide();
              $("#checkid1").change(function(){

          var branchid = $("#checkid1").val();
          alert(branchid);
        $.post("<?php echo site_url('product/branchproduct')?>",{ branchid : branchid,  }, function(data){
           $("#branchproduct").show();
              $("#branchproduct").html(data);
              
            }
        ); 
                        
              
                    });
            }
                        if(cat==3)
                            { 
                                $("#stud").hide();
                                 $("#adminproduct").hide();
                                   $("#branchproduct").hide();
                                $("#emp").show();
                                 $("#sub_branch").change(function(){

          var branchid = $("#sub_branch").val();
          alert(branchid);
          $.post("<?php echo site_url('product/shopproduct')?>",{ branchid : branchid,  }, function(data){
           $("#subbranchproduct").show();
              $("#subbranchproduct").html(data);
              
            }
        ); 
                        
              
                    });
                              
                            
                            }
                    
            });


            $("#branch").change(function(){
                    var classv = $("#branch").val();
                    //alert(classv);
                    $.post("<?php echo site_url("/product/getsubbranch") ?>",{classv : classv}, function(data){
                          $("#sub_branch").html(data);
                         //alert("data");
                       
                    });
                });
     
               





                $("#studsend").hide();
                $("#empsend").hide();
    
          $("#sendcheckid").change(function(){

                var cat =Number($("#sendcheckid").val());
                //alert("rahul");
                
                if(cat===1)
                {  
                    $("#studsend").hide();
                    $("#empsend").hide(); 
                    }
                
                    if(cat===2)
                      {
                        $("#empsend").hide();
                         $("#studsend").show();
              
                    }
                        if(cat===3)
                            { 
                                $("#studsend").hide();
                                $("#empsend").show();
                              
                            
                            }
                    
            });
            $("#branch1").change(function(){
                    var classv = $("#branch1").val();
                   // alert(classv);
                    $.post("<?php echo site_url("/product/getsubbranch") ?>",{classv : classv}, function(data){
                          $("#sub_branch1").html(data);
                         //alert("data");
                       
                    });
                });







} );

  </script>

</body>

</html>
