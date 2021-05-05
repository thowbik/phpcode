<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'/third_party/mpdf/mpdf.php';

class M_pdf{

    public $param;
    public $pdf;

    public function __construct($param = '"UTF-8","A4","","",10,10,10,10,6,3')
    {
        echo($param."<br>");
        $this->param =$param;
        $this->pdf = new mPDF($this->param);
    }
}
