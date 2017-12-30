<?php

class M_pdf 
{
  public $param;
  public $pdf;
  public function __construct($param = "'c', 'A4-L'")
  {
    $this->param =$param;
    $this->pdf = new mPDF($this->param);
  }
}

/*
function create_pdf()
    {
       $filename = time()."_order.pdf";
       $html = '<h1>Hello world!</h1>';
       $this->load->library('M_pdf');
       $this->m_pdf->pdf->WriteHTML($html);
       //download it D save F.
       $this->m_pdf->pdf->Output("./uploads/".$filename, "D");
    }
*/