    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url();?>assets/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?php echo base_url();?>assets/js/plugins.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/custom/custom-script.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
  <script >
                            
    $(document).ready(function() {
    <?php 

      $i = $this->db->count_all("stock_products");
      print_r($i);
      exit();
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
                              // alert(pname+total+rid+pquan+rem+hsn);
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

                           
    

} );



  </script>

</html>