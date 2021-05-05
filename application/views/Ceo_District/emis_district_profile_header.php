     <?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Datamodel');
    $district_id=$this->session->userdata('emis_district_id');
    if($district_id != ''){
    $districtprofile = $this->Datamodel->get_district_name($district_id);
    $districtname  = $districtprofile->district_name;
    $districtmobile  = $districtprofile->district_mobile;
    $districtemail  = $districtprofile->district_email;
    $districtdepartment  = $districtprofile->district_department;
    }
     ?>                              
                                      <div class="row">               
                                           <div class="col-md-12"><br/>
                                           <i class="fa fa-sitemap fa-5x font-green-haze"></i>
                                               <h1 class="number font-red"><?php if($districtname!=""){ echo $districtname; } ?></h1>
                                               
                                           </div>
                                         <ul class="list-inline">
                                               <li>
                                           <font style="color:#9b9b9b;"><i class="fa fa-envelope-o"></i> District Email :</font>
                                               <?php if($districtemail!=""){ echo $districtemail; } ?> </li>
                                               <li>
                                           <font style="color:#9b9b9b;"><i class="fa fa-mobile"></i> District Mobile Number :</font> <?php if($districtmobile!=""){ echo $districtmobile; } ?> </li>
                                               <li>
                                           <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Department :</font> <?php if($districtdepartment!=""){ echo $districtdepartment; } ?> </li>
                                           </ul><br/>
                                       </div>