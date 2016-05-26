<?php
return array(
  '_root_'  => 'pc/home/index',  // The default route

  'login' => 'pc/session/index',
  'logout' => 'pc/session/destroy',
  'login/check' => 'pc/session/create',

  'api' => 'pc/session/test',

  // '(:any)' => function () {
  //               return View::forge('404');
  //             }
);
