<?php 
         $school_id= "";
        $student_id= "";

    if($this->session->userdata('emis_school_id') || $this->session->userdata('emis_idcard_generate_stuid')){

        $school_id=$this->session->userdata('emis_school_id');
        $student_id=  $this->session->userdata('emis_idcard_generate_stuid');

      }else{
        $school_id= "";
        $student_id= "";
      }

      $this->db->select('*'); 
      $this->db->from('students_child_detail');
      $this->db->where('school_id',$school_id);
      $this->db->where('unique_id_no',$student_id);
      $query =  $this->db->get();
       $studsdetails= $query->result();

       // echo json_encode($studsdetails);
         
        ?>
        <div class="col-md-12">
         <?php if(!empty($studsdetails)){ ?> 
          <?php foreach($studsdetails as $stu){ ?>

          <?php $photo=""; if($this->Homemodel->getidcardupdatestudent($stu->unique_id_no)){
                                        $stuprofile2  = $this->Homemodel->getstuprofileimages($stu->unique_id_no); 
                                          $photo =  $stuprofile2[0]->photo;
                                           
                                      }  ?>

           <div class="col-md-4">
             
          <img style="width: 170px; height:225px;" class="thumbnail" src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $photo ); ?>";  alt="" />
          </div>
         <div class="col-md-8">
           
         <h4><?php echo $stu->name.'-'.$stu->unique_id_no; ?></h4>

        <p class="title"><h4><?php $this->db->select('*'); 
                     $this->db->from('baseapp_class_studying');
                     $this->db->where('id', $stu->class_studying_id);  
                     $query =  $this->db->get();
                     $classs=$query->row('class_studying');
                     $classsec = 'Class : '.$classs.' - '.$stu->class_section; echo $classsec; ?>
                       <?php $this->db->select('*'); 
                     $this->db->from('baseapp_bloodgroup');
                     $this->db->where('id', $stu->bloodgroup);
                     $query =  $this->db->get();
                     $commm=$query->row('group');
                     $blodgrp=" | Blood Group - ".$commm;
                     echo $blodgrp; ?>
                     </h4></p>
         <p ><?php echo '<b>Aadhaar</b> : '.$stu->aadhaar_uid_number.'  <b>DOB</b> :'.$stu->dob; ?></p>  
         <p><?php if($stu->gender==1){ echo "<b>Gender</b> : Male"; }else if($stu->gender==2){ echo "<b>Gender</b> : Female"; }else if($stu->gender==3){ echo "<b>Gender</b> : Transgender"; } ?><?php if($stu->father_name!=""){ echo "  <b>Father name</b> : ".$stu->father_name; }elseif ($stu->mother_name!="") {
                                      echo "  <b>Mother name</b> : ".$stu->mother_name;
                                  }elseif ($stu->guardian_name!="") {
                                      echo "  <b>Guardian name</b> : ".$stu->guardian_name;
                                  } ?></p>  
            <p><?php echo '<b>Address</b> : '.$stu->house_address.','.$stu->street_name.','.$stu->area_village.','.$stu->pin_code;; ?></p>        
       
          </div>
 
          <center>
          <div class="btn-group">
            <a class="btn green btn-md dropdown-toggle" href="<?php echo base_url().'Home/emis_school_stulist_idcard_edit/'.$stu->unique_id_no;?>">Edit </a>
           </div>
           <div class="btn-group">
           <?php if($stu->idapproove=="1"){ ?>
          <button type="button" class="btn  green btn-md dropdown-toggle" onclick="aproovedataall('<?php echo $stu->unique_id_no; ?>')" disabled> ID Approoved</button>
          <?php }else{ ?>
           <button type="button" class="btn  red btn-md dropdown-toggle" onclick="aproovedataall('<?php echo $stu->unique_id_no; ?>')"> ID Approove</button>
          <?php } ?>
           </div>                                 
          <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
      </center>
          <?php } ?>  <?php } ?>

          </div>
