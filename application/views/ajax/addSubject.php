<?php
$i = 1;
if(isset($subjectList)):

	foreach ($subjectList->result() as $row):
		//print_r($row);
?>
		<div class="text-white text-sm pull-left space10">
			<div class="row">

				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
						<span id="name2" Style="color:red;"></span>
						<input type="text" id="subjectValue<?php echo $i;?>" size="13" value="<?php echo $row->subject_name;?>" onkeyup="Validate1()"  onkeyup="myFunction()" >
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<input type="text" id="subjectQuestion<?php echo $i;?>" size="13" value="<?php echo $row->subject_ques_no;?>" onkeyup="Validate1()"  onkeyup="myFunction()" >
							<input type="hidden" id="subjectId<?php echo $i;?>" size="13" value="<?php echo $row->id; ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
						<a href="#" class="btn btn-sm subject_btn" id="edit<?php echo $i;?>"><i class="fa fa-edit"></i> Edit</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
						<a href="#" class="btn btn-sm subject_btn" id="delete<?php echo $i;?>"><i class="fa fa-trash-o"></i> Delete</a>
						</div>
					</div>
				</div>
			</div>
		
		</div>
		
<?php
	$i++;
	endforeach;
endif;
?>
<script>
	    <?php for($j = 1; $j < $i; $j++){ ?>
			    $("#edit<?php echo $j; ?>").click(function(){
		    		var subjectId = $('#subjectId<?php echo $j; ?>').val();	
		    		var subjectName = $('#subjectValue<?php echo $j; ?>').val();
		    		var questionNo = $('#subjectQuestion<?php echo $j;?>').val();
		    		alert("your Subject is successfully updated");
		    		var form_data = {
							subjectId : subjectId,
							subjectName : subjectName,
							questionNo : questionNo
						};
				$.ajax({
					url: "<?php echo site_url("examconfiguration/updateSubject") ?>",
					type: 'POST',
					data: form_data,
					success: function(msg){
						$("#streamList1").html(msg);
					}
				});
		        });
			    $("#delete<?php echo $j; ?>").click(function(){
		    		var subjectId = $('#subjectId<?php echo $j; ?>').val();	
		    		//alert(streamName);
		    		$.post("<?php echo site_url('examconfiguration/deleteSubject') ?>", {subjectId : subjectId}, function(data){
		                $("#addSubject1").html(data);
		                //alert(data);
		    		})
		        });
	                  var input = document.getElementById("subjectValue<?php echo $j;?>");
                         input.addEventListener("keyup", function () {
                         var text_value = document.getElementById("subjectValue<?php echo $j;?>").value;
                                    if (!text_value.match(/^[A-Za-z]+$/)) {
                                        document.getElementById("name2").innerHTML = "Only Alphabets Allow";
                                         $('#edit<?php echo $j;?>').attr('disabled', 'disabled');

                                           $(document).on('click', 'a', function(e) {
                                          if ($(this).attr('disabled') == 'disabled') {
                                             e.preventDefault();
                                                }
                                                window.location.reload();
                                            });
                                        document.getElementById("subjectValue<?php echo $j;?>").focus();
                                        if (text_value == "") {
                                            document.getElementById("name2").innerHTML = " ";
                                             window.location.reload();
                                            document.getElementById("subjectValue<?php echo $j;?>").focus();
                                        }
                                    }
                         });
                         input.addEventListener("keyup", function () {
                          var x = document.getElementById("subjectValue<?php echo $j;?>");
                             x.value = x.value.toUpperCase();
                  });
                    <?php } ?>   
</script>