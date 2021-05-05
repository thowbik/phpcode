     <?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    $school_id=$this->session->userdata('emis_school_id');
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
    $schoolname  = $schoolprofile[0]->school_name;
    $udise_code  = $schoolprofile[0]->udise_code;
    $blockname  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $schoolcate  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
    $schmanage  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $schdirector  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
     ?>                              
                                  <div class="row">
                                                        
                                                   
            <div class="col-md-12"><br/>
            <span> <i class="fa fa-bank fa-3x font-green-haze"><font style="font-size:25px;font-family: 'open sans';" class="number font-red"> <?php if($schoolname!=""){ echo $schoolname; } ?> ( <?php if($udise_code!=""){ echo $udise_code; } ?> )</font></i></span> <hr>

            </div>
          <ul class="list-inline" style="margin-left: 7px;">
             <li>
                <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Block :</font> 
               <?php if($blockname!=""){ echo $blockname; } ?> </li>
                <li>
                <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                <?php if($schoolcate!=""){ echo $schoolcate; } ?> </li>
                <li>
                <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font> <?php if($schmanage!=""){ echo $schmanage; } ?> </li>
                <li>
                <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font> <?php if($schdirector!=""){ echo $schdirector; } ?> </li>
            </ul><br/>
                                        </div>