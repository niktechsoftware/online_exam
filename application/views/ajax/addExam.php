<?php
$i = 1;
if(isset($examList)):

	foreach ($examList->result() as $row):
		//print_r($row);
?>
		<div class="text-white text-sm pull-left space10">
			<span id="name2" Style="color:red;"></span>
			<input type="text" id="examValue<?php echo $i;?>" size="13" value="<?php echo $row->exam_head;?>" onkeyup="Validate1()"  onkeyup="myFunction()" >
			<input type="hidden" id="examId<?php echo $i;?>" size="13" value="<?php echo $row->id; ?>">
			<a href="#" class="btn btn-sm btn-light-green" id="edit<?php echo $i;?>"><i class="fa fa-edit"></i> Edit</a>
			<a href="#" class="btn btn-sm btn-light-green" id="delete<?php echo $i;?>"><i class="fa fa-trash-o"></i> Delete</a>
		</div>
		
<?php
	$i++;
	endforeach;
endif;
?>


<script>
	    <?php for($j = 1; $j < $i; $j++){ ?>
			    $("#edit<?php echo $j; ?>").click(function(){
		    		var examId = $('#examId<?php echo $j; ?>').val();	
		    		var examName = $('#examValue<?php echo $j; ?>').val();
		    		alert("your stream is successfully updated");
		    		var form_data = {
							examId : examId,
							examName : examName
						};
				$.ajax({
					url: "<?php echo site_url("examconfiguration/updateExam") ?>",
					type: 'POST',
					data: form_data,
					success: function(msg){
						$("#streamList1").html(msg);
					}
				});
		        });
	
			    $("#delete<?php echo $j; ?>").click(function(){
		    		var examId = $('#examId<?php echo $j; ?>').val();	
		    		//alert(streamName);
		    		$.post("<?php echo site_url('examconfiguration/deleteExam') ?>", {examId : examId}, function(data){
		                $("#streamList1").html(data);
		                //alert(data);
		    		})
		        });
	 
                       

	                  var input = document.getElementById("examValue<?php echo $j;?>");
                         input.addEventListener("keyup", function () {
                         var text_value = document.getElementById("examValue<?php echo $j;?>").value;
                                    if (!text_value.match(/^[A-Za-z]+$/)) {
                                        document.getElementById("name2").innerHTML = "Only Alphabets Allow";
                                         $('#edit<?php echo $j;?>').attr('disabled', 'disabled');

                                           $(document).on('click', 'a', function(e) {
                                          if ($(this).attr('disabled') == 'disabled') {
                                             e.preventDefault();
                                                }
                                                window.location.reload();
                                            });
                                        document.getElementById("examValue<?php echo $j;?>").focus();
                                        if (text_value == "") {
                                            document.getElementById("name2").innerHTML = " ";
                                             window.location.reload();
                                            document.getElementById("examValue<?php echo $j;?>").focus();
                                        }
                                    }
                         });

                         input.addEventListener("keyup", function () {
                          var x = document.getElementById("examValue<?php echo $j;?>");
                             x.value = x.value.toUpperCase();
                         
                  });
                    <?php } ?>   
</script>