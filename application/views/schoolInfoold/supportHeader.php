<div class="container">	
    <div class="wrapper">	
        <div class="arrow-steps clearfix">
            <div onclick="<?php  ?>progressTransfer('p1')<?php ?>" class="step <?php echo $this->uri->segment(3,0)==1?'current':''; ?>"> <span>BASIC</span> </div>
            <div onclick="<?php  ?>progressTransfer('p2')<?php ?>" class="step <?php echo $this->uri->segment(3,0)==2?'current':''; ?>"> <span>SCHOOL</span> </div>
            <div onclick="<?php  ?>progressTransfer('p3')<?php ?>" class="step <?php echo $this->uri->segment(3,0)==3?'current':''; ?>"> <span>TRAINING</span> </div>
            <div onclick="<?php  ?>progressTransfer('p4')<?php ?>" class="step <?php echo $this->uri->segment(3,0)==4?'current':''; ?>"> <span>COMMITTEE</span> </div>
            <div onclick="<?php  ?>progressTransfer('p5')<?php ?>" class="step <?php echo $this->uri->segment(3,0)==5?'current':''; ?>"> <span>LAND</span> </div>
            <div onclick="<?php  ?>progressTransfer('p6')<?php ?>" class="step <?php echo $this->uri->segment(3,0)==6?'current':''; ?>"> <span>INVENTORY</span> </div>
            <?php if(($this->session->userdata('school_manage')>1 && $this->session->userdata('school_manage')<5) || $this->session->userdata('emis_school_id')=='') { ?>
            <div onclick="<?php ?>progressTransfer('p7')<?php ?>" class="step <?php echo $this->uri->segment(3,0)==7?'current':''; ?>"> <span>FEES &amp; FUND</span> </div>
            <?php } ?>
        </div>
    </div>
</div>