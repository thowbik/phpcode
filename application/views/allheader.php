<?php
    switch($this->session->userdata('user_type')){
        case 1:$this->load->view('header.php');break;
        case 2:$this->load->view('block/header.php');break;
        case 3:$this->load->view('district/header.php');break;
        case 4:break;
        case 5:$this->load->view('state/header.php');break;
        case 6:$this->load->view('beo_Block/header.php');break;
        case 7:break;
        case 8:break;
        case 9:$this->load->view('Ceo_District/header.php');break;
        case 10:$this->load->view('Deo_District/header.php');break;
        case 11:break;
        case 12:break;
        case 13:break;
        case 14:break;
        case 15:break;
    }
?>