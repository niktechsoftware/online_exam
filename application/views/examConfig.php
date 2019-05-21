 <div class="page-body">

   <div class="row">
     <div class="col-sm-12">
       <!-- Material tab card start -->
       <div class="card">
         <div class="card-header">
           <h5 style="color:#8e24aa;"><?php echo $subtitle; ?></h5>

         </div>
         <div class="card-block">
           <!-- Row start -->
           <div class="row m-b-30">
             <div class="col-lg-12 col-xl-12">

               <!-- Nav tabs -->
               <ul class="nav nav-tabs md-tabs" role="tablist">
                 <li class="nav-item">
                   <a class="nav-link active" data-toggle="tab" href="#examadd" role="tab">Add Exam Head</a>
                   <div class="slide"></div>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" data-toggle="tab" href="#addtestPanel" role="tab">Add Test</a>
                   <div class="slide"></div>
                 </li>
                  <li class="nav-item">
                   <a class="nav-link" data-toggle="tab" href="#addsub" role="tab">Add Subject</a>
                   <div class="slide"></div>
                 </li>
               </ul>
               <!-- Tab panes -->
               <div class="tab-content card-block">

                 <div class="tab-pane active" id="examadd" role="tabpanel">
                 <div class="row exam_panel">
                   <div class="col-sm-6">
                   <!--  <form method="post" action="<?php echo base_url();?>examconfiguration/addExam"> -->
                      <div class="panel panel-calendar  exam_panel_body">
                        <div class="panel-heading bg_info border-light">
                          <h5 class="panel-title">Add Exam Head</h5>
                        </div>
                        <div class="panel-body">
                          <div class="text-black text-large exam_panel ">
                            <span id="name" style="color:red;"></span>
                            <input type="text" id="addExam"  onkeyup="myFunction()">
                            <a href="#" class="btn btn-sm btn-round btn-primary" id="addExamButton"><i class="ion-checkmark-round"></i>
                              Add Exam Head</a><!--<br--><br><br>
                            <div class="alert alert-warning"> Type a Exam Head name and press Add Exam Head.If Exam Head added
                              successfully then it show in right side panel where you can change the name and Delete it.
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- </form> -->
                    </div>
                     <div class="col-sm-6">
                      <div class="panel panel-calendar  exam_panel_body">
                        <div class="panel-heading bg_info border-light">
                          <h5 class="panel-title"> Exam List</h5>
                        </div>
                        <div class="panel-body" id="examAdd1">
                         <!--  <div class="text-black text-large exam_panel">
                            <span id="name" style="color:red;"></span>
                            <input type="text" id="addStream" onkeyup="myFunction()">
                            <a href="#" class="btn btn-sm btn-round btn-primary" id="addStreamButton"><i class="ion-checkmark-round"></i>
                              Edit</a><!--<br--><!-- &nbsp;&nbsp;<a href="#" class="btn btn-sm btn-round btn-primary" id="addStreamButton"><i class="ion-checkmark-round"></i>
                              Delete</a><br><br>
                           
                          </div> --> 
                        </div>
                      </div>
                    </div>
                 </div>
                 </div>

                 <div class="tab-pane" id="addtestPanel" role="tabpanel">
                  <div class="row">
                        <div class="col-md-12">
                          <div class="tab-content card-block">
                           <div class="tab-pane active" id="quesadd" role="tabpanel">
                              <div class="row" >
                                <div class="col-sm-6">
                                  <div class="panel">
                                    <div class="panel-heading bg_info">
                                      <h6 class="panel-title ">Exam Head</h6>
                                    </div>
                                    <div class="panel-body">
                                      <div class="form-group">
                                        <?php 
                                     $view=   $this->db->get("exam_head")->result(); 
                                     ?>
                                        <select id="examListshow" class="form-control">
                                          <option value="">Select Exam Head</option>
                                          <?php foreach($view as $row)
                                        { ?>
                                          <option value="<?php echo $row->id;?>"><?php echo $row->exam_head;?></option>
                                            <?php  }?>
                                        </select>
                                    
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="row exam_panel" >
                   <div class="col-sm-6">
                      <div class="panel panel-calendar  exam_panel_body">
                        <div class="panel-heading bg_info border-light">
                          <h5 class="panel-title">Add Test Name</h5>
                        </div>
                        <div class="panel-body">
                          <div class="text-black text-large exam_panel">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">Test Name</div>
                                <div class="col-md-8">
                                  <input type="text" id="addTest" onkeyup="myFunction()">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">Test Description</div>
                                <div class="col-md-8">
                                  <input type="text" id="descTest" onkeyup="myFunction()">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">Test Marks</div>
                                <div class="col-md-8">
                                  <input type="text" id="marksTest" onkeyup="myFunction()">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-12">
                                 <a href="#" class="btn btn-sm btn-round btn-primary" id="addTestButton"><i class="ion-checkmark-round"></i>
                              Add Test Description</a>
                                </div>
                              </div>
                            </div>
                            <div class="alert alert-warning"> Type a Test name and press Add Test Name.If Test Name added
                              successfully then it show in right side panel where you can change the name and Delete it.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      
                      <div class="panel panel-calendar  exam_panel_body">
                        <div class="panel-heading bg_info border-light">
                          <h5 class="panel-title"> Test Name List</h5>
                        </div>
                        <div class="panel-body" id="addTest1">
                          
                        </div>
                      </div>
                    </div>
                 </div>
                 </div>
                 <!----3 tab start--->
                 <div class="tab-pane" id="addsub" role="tabpanel">
                  <!-----exam and subject section start--->
                  <div class="row">
                        <div class="col-md-12">
                          <div class="tab-content card-block">
                           <div class="tab-pane active" id="quesadd" role="tabpanel">
                              <div class="row" >
                                <div class="col-sm-6">
                                  <div class="panel">
                                    <div class="panel-heading bg_info">
                                      <h6 class="panel-title ">Exam Head</h6>
                                    </div>
                                    <div class="panel-body">
                                      <div class="form-group">
                                        <?php 
                                     $view=   $this->db->get("exam_head")->result(); 
                                     ?>
                                        <select id="examListShow" class="form-control">
                                          <option value="">Select Exam Head</option>
                                          <?php foreach($view as $row){ 
                                          ?>
                                          <option value="<?php echo $row->id;?>"><?php echo $row->exam_head;?></option>
                                            <?php  }?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="panel">
                                    <div class="panel-heading bg_info">
                                      <h6 class="panel-title ">Test Name</h6>
                                    </div>
                                    <div class="panel-body">
                                      <div class="form-group">
                                        <?php 
                                     $view = $this->db->get("test_name")->result(); 
                                     ?>
                                        <select id="testListshow" class="form-control">
                                          <option value="">Select Test</option>
                                          <?php foreach($view as $row)
                                        { ?>
                                          <option value="<?php echo $row->id;?>"><?php echo $row->test_name;?></option>
                                            <?php  }?>
                                        </select>
                                    
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  <!----exam and subject section end------->
                    <div class="row exam_panel">
                   <div class="col-sm-6">
                      <div class="panel panel-calendar  exam_panel_body">
                        <div class="panel-heading bg_info border-light">
                          <h5 class="panel-title">Add Subject Name</h5>
                        </div>
                        <div class="panel-body">
                          <div class="text-black text-large exam_panel">
                            <div class="form-group">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Subject Name</label>
                              </div>
                              <div class="col-md-8">
                                <span id="name" style="color:red;"></span>
                                 <input type="text" id="addSubject" onkeyup="myFunction()">
                              </div>
                            </div>
                          </div>
                            <div class="form-group">
                             <div class="row">
                              <div class="col-md-4">
                                <label>Question No</label>
                              </div>
                              <div class="col-md-8">
                                <span id="name" style="color:red;"></span>
                                <input type="number" id="addQuestion" onkeyup="myFunction()">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-12">
                                 <a href="#" class="btn btn-sm btn-round btn-primary" id="addSubjectButton"><i class="ion-checkmark-round"></i>
                              Add Subject</a>
                              </div>
                            </div>
                          </div>
                            <!--<br--><!-- <br><br> -->
                            <div class="alert alert-warning"> Type a subject  and press Add Subject.If Subject added successfully then it show in right side panel where you can change the name and Delete it.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <div class="panel panel-calendar  exam_panel_body">
                        <div class="panel-heading bg_info border-light">
                          <h5 class="panel-title"> Subject List</h5>
                        </div>
                        <div class="panel-body" id="addSubject1">
                          
                        </div>
                      </div>
                    </div>
                 </div>
                 </div>
                 <!---- 3 tab end ---->
               </div>
             </div>
           </div>

         </div>
         <!-- Row end -->

       </div>
     </div>
     <!-- Material tab card end -->
   </div>
 </div>