<?php

class Controller_Pc_Application extends Controller_Template
{
  public $template = 'pc/layout/application';

  //-----------------------------------------------------------------------
  public function before() {
    parent::before();

    $this->template->title = 'GPS Vehicle';
    $this->template->headers = View::forge('pc/layout/headers');
    $this->template->footers = View::forge('pc/layout/footers');
  }
}
