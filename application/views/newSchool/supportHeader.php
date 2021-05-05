

        <div class="wizard">
            <div class="wizard-inner" style="margin-top: -45px;">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist" >

                    <li role="presentation" class="<?php echo $this->uri->segment(3,0)==3?'active':'disabled';?>" >
                        <a href="<?php echo base_url().'Registration/newSchool/3';?>" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                1
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="<?php echo $this->uri->segment(3,0)==4?'active':'disabled';?>">
                        <a href="<?php echo base_url().'Registration/newSchool/4';?>" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                2
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="<?php echo $this->uri->segment(3,0)==5?'active':'disabled';?>">
                        <a href="<?php echo base_url().'Registration/newSchool/5';?>" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                3
                            </span>
                        </a>
                    </li>
                    
                    <li role="presentation" class="<?php echo $this->uri->segment(3,0)==6?'active':'disabled';?>">
                        <a href="<?php echo base_url().'Registration/newSchool/6';?>" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                4
                            </span>
                        </a>
                    </li>

                    <!--<li role="presentation" class="<?php //echo $this->uri->segment(3,0)==7?'active':'disabled';?>">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="fa fa-check"></i>
                            </span>
                        </a>
                    </li>-->
                </ul>
            </div>
            <p>&nbsp;</p>

