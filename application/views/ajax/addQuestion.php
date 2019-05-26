<?php
$i = 1;
if(isset($questionList)):

	foreach ($questionList->result() as $row):
		//print_r($row);
?>
		<div class="text-white text-sm pull-left space10">
			<span id="name2" Style="color:red;"></span>
			<input type="text" id="questionValue<?php echo $i;?>" size="13" value="<?php echo $row->question;?>" onkeyup="Validate1()"  onkeyup="myFunction()" >
			<input type="hidden" id="questionId<?php echo $i;?>" size="13" value="<?php echo $row->id; ?>">
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
		    		var questionId = $('#questionId<?php echo $j; ?>').val();	
		    		var questionName = $('#questionValue<?php echo $j; ?>').val();
		    		alert("your Question is successfully updated");
		    		var form_data = {
							questionId : questionId,
							questionName : questionName
						};
				$.ajax({
					url: "<?php echo site_url("examconfiguration/updateQuestion") ?>",
					type: 'POST',
					data: form_data,
					success: function(msg){
						$("#questionAdd1").html(msg);
					}
				});
		        });
	
			    $("#delete<?php echo $j; ?>").click(function(){
		    		var questionId = $('#questionId<?php echo $j; ?>').val();	
		    		//alert(streamName);
		    		$.post("<?php echo site_url('examconfiguration/deleteQuestion') ?>", {questionId : questionId}, function(data){
		                $("#questionAdd1").html(data);
		                //alert(data);
		    		})
		        });
	                  var input = document.getElementById("questionValue<?php echo $j;?>");
                         input.addEventListener("keyup", function () {
                         var text_value = document.getElementById("questionValue<?php echo $j;?>").value;
                                    if (!text_value.match(/^[A-Za-z]+$/)) {
                                        document.getElementById("name2").innerHTML = "Only Alphabets Allow";
                                         $('#edit<?php echo $j;?>').attr('disabled', 'disabled');

                                           $(document).on('click', 'a', function(e) {
                                          if ($(this).attr('disabled') == 'disabled') {
                                             e.preventDefault();
                                                }
                                                window.location.reload();
                                            });
                                        document.getElementById("questionValue<?php echo $j;?>").focus();
                                        if (text_value == "") {
                                            document.getElementById("name2").innerHTML = " ";
                                             window.location.reload();
                                            document.getElementById("questionValue<?php echo $j;?>").focus();
                                        }
                                    }
                         });

                         input.addEventListener("keyup", function () {
                          var x = document.getElementById("questionValue<?php echo $j;?>");
                             x.value = x.value.toUpperCase();
                         
                  });
                    <?php } ?>   
</script>