     <?php 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Blockmodel');
    $block_id=$this->session->userdata('emis_block_id');
    $blockprofile = $this->Blockmodel->getblockprofiledetails($block_id);
    $blockname  = $blockprofile[0]->block_name;
    $blockmobile  = $blockprofile[0]->block_mobile;
    $blockemail  = $blockprofile[0]->block_email;
    $blockdepartment  = $blockprofile[0]->block_department;
     ?>                              
                                      <div class="row">               
                                           <div class="col-md-12"><br/>
                                           <i class="fa fa-sitemap fa-5x font-green-haze"></i>
                                               <h1 class="number font-red"><?php if($blockname!=""){ echo $blockname; } ?></h1>
                                               
                                           </div>
                                         <ul class="list-inline">
                                               <li>
                                           <font style="color:#9b9b9b;"><i class="fa fa-envelope-o"></i> Block Email :</font>
                                               <?php if($blockemail!=""){ echo $blockemail; } ?> </li>
                                               <li>
                                           <font style="color:#9b9b9b;"><i class="fa fa-mobile"></i> Block Mobile Number :</font> <?php if($blockmobile!=""){ echo $blockmobile; } ?> </li>
                                               <li>
                                           <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Department :</font> <?php if($blockdepartment!=""){ echo $blockdepartment; } ?> </li>
                                           </ul><br/>
                                       </div>