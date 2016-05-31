<?php

class Controller_Pc_Home extends Controller_Pc_Application
{
  public function action_index() {
    $this->template->content = View::forge('pc/home/index');
  }

  public function action_detail() {
    $this->template->content = View::forge('pc/home/detail');
  }
}
