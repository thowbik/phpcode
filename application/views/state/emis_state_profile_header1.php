     <?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Statemodel');
    $state_id=$this->session->userdata('emis_state_id');
    $stateprofile = $this->Statemodel->getstateprofiledetails($state_id);
    $statename  = $stateprofile[0]->state_name;
    $statemobile  = $stateprofile[0]->state_mobile;
    $stateemail  = $stateprofile[0]->state_email;
    $statedepartment  = $stateprofile[0]->state_department;
     ?>                              

    <div class="row">
                     
               
         <div class="col-md-12"><br/>
         <i class="fa fa-sitemap fa-5x font-green-haze"></i>
             <h1 class="number font-red"><?php if($statename!=""){ echo $statename; } ?></h1>         
         </div>
       <ul class="list-inline" style="margin-left: 7px;">
             <li>
         <font style="color:#9b9b9b;"><i class="fa fa-envelope-o"></i> State Email :</font>
             <?php if($stateemail!=""){ echo $stateemail; } ?> </li>
             <li>
         <font style="color:#9b9b9b;"><i class="fa fa-mobile"></i> State Mobile Number :</font> <?php if($statemobile!=""){ echo $statemobile; } ?> </li>
             <li>
         <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Department :</font> <?php if($statedepartment!=""){ echo $statedepartment; } ?> </li>
         </ul><br/>
     </div>