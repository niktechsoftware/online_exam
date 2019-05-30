<?php
$i = 1;
if(isset($testList)):

?>
	<div class="text-white text-sm pull-left space10">
			<table class=" table-bordered table-hover table">
				<tr style="color:black;">
					<th>Test Name </th>
					<th>Test Descripton</th>
					<th>Test Marks</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			<?php
				foreach ($testList->result() as $row):
			?>
				<tr>
					<td>
						<input type="text" id="testValue<?php echo $i;?>" size="13" value="<?php echo $row->test_name;?>" onkeyup="Validate1()"  onkeyup="myFunction()" >
						<input type="hidden" id="testId<?php echo $i;?>" size="13" value="<?php echo $row->id; ?>">
					</td>
					<td>
						<input type="text" id="testDesc<?php echo $i;?>" size="13" value="<?php echo $row->test_description;?>"  onkeyup="this.value = this.value.toUpperCase();" >
						<input type="hidden" id="testId<?php echo $i;?>" size="13" value="<?php echo $row->id; ?>">
					</td>
					<td>
						<input type="number" id="testMarks<?php echo $i;?>" size="13" value="<?php echo $row->test_marks;?>" onkeyup="Validate1()"  onkeyup="myFunction()" >
						<input type="hidden" id="testId<?php echo $i;?>" size="13" value="<?php echo $row->id; ?>">
					</td>
					<td>
						<a href="#" class="btn btn-sm subject_btn" id="edit<?php echo $i;?>"><i class="fa fa-edit"></i> Edit</a>
						</td>
						<td>
						<a href="#" class="btn btn-sm subject_btn" id="delete<?php echo $i;?>"><i class="fa fa-trash-o"></i> Delete</a>
					</td>
				</tr>
		<?php
			$i++;
			endforeach;
			?>
			</table>
				</div>
			<?php
		endif;
		?>

<script>
	    <?php for($j = 1; $j < $i; $j++){ ?>
			    $("#edit<?php echo $j; ?>").click(function(){
		    		var testId = $('#testId<?php echo $j; ?>').val();	
		    		var testName = $('#testValue<?php echo $j; ?>').val();

		    		var testDescription = $('#testDesc<?php echo $j; ?>').val();
		    		var testMarks = $('#testMarks<?php echo $j; ?>').val();
		    		alert("your test is successfully updated");
		    		
		    		var form_data = {
							testId : testId,
							testName : testName,
							testDescription : testDescription,
							testMarks : testMarks
						};
				$.ajax({
					url: "<?php echo site_url("examconfiguration/updateTest") ?>",
					type: 'POST',
					data: form_data,
					success: function(msg){
						$("#streamList1").html(msg);
					}

				});
		        });
			    $("#delete<?php echo $j; ?>").click(function(){
		    		var testId = $('#testId<?php echo $j; ?>').val();	
		    		//alert(streamName);
		    		$.post("<?php echo site_url('examconfiguration/deleteTest') ?>", {testId : testId}, function(data){
		                $("#addTest1").html(data);
		                //alert(data);
		    		})
		        });
	                  var input = document.getElementById("testValue<?php echo $j;?>");
                         input.addEventListener("keyup", function () {
                         var text_value = document.getElementById("testValue<?php echo $j;?>").value;
                                    if (!text_value.match(/^[A-Za-z]+$/)) {
                                        document.getElementById("name2").innerHTML = "Only Alphabets Allow";
                                         $('#edit<?php echo $j;?>').attr('disabled', 'disabled');
                                           $(document).on('click', 'a', function(e) {
                                          if ($(this).attr('disabled') == 'disabled') {
                                             e.preventDefault();
                                                }
                                                window.location.reload();
                                            });
                                        document.getElementById("testValue<?php echo $j;?>").focus();
                                        if (text_value == "") {
                                            document.getElementById("name2").innerHTML = " ";
                                             window.location.reload();
                                            document.getElementById("testValue<?php echo $j;?>").focus();
                                        }
                                    }
                         });
                         input.addEventListener("keyup", function () {
                          var x = document.getElementById("testValue<?php echo $j;?>");
                             x.value = x.value.toUpperCase();
                           // var d = document.getElementById("testDesc<?php echo $j;?>");
                           // 	d.value = d.value.toUpperCase();  
                  });
                         // input.addEventListener("keyup",function(){
                         // 	var test = document.getElementById("addTest");
                         // 	test.value = test.value.toUpperCase();
                         // });
                    <?php } ?>   
</script>