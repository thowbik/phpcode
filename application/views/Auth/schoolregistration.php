


<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('head.php'); ?>
</head>

<body>

<div class="container">
      <div class="container">    
        
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-5 col-md-offset-4 col-sm-7 col-sm-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title text-center">Sign Up <i class="fa fa-user-plus"></i></div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">School Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-sm" name="school_name" placeholder="Enter the School Name">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-4 control-label">Address</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-sm" name="address" placeholder="Enter the Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-4 control-label">District</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-sm" name="lastname" placeholder="Enter the District">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-4 control-label">Block</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-sm" name="block" placeholder="Enter the Block">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-4 control-label">Invitation Code</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-sm" name="icode" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-4 col-md-8">
                                        <button id="btn-signup" type="button" class="btn btn-primary btn-sm"> Sign Up <i class="fa fa-user-plus"></i></button>
                                        <!--<span style="margin-left:8px;">or</span>  -->
                                    </div>
                                </div>
                                
                               
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Do you have an account! 
                                        <a href="#">
                                            Login Here
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    
</div>

</body> 
</html>
