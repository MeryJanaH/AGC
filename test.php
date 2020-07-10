<?php

if($_POST['op']=="test"){
  echo implode(" // ",$_POST);
}elseif ($_POST['op']=="show") {
  echo '[{
      title: "Hey!",
      start: new Date($.now() + 158e6),
      className: "bg-warning"
  }, {
      title: "See John Deo",
      start: t,
      end: t,
      className: "bg-success"
  }, {
      title: "Meet John Deo",
      start: new Date($.now() + 168e6),
      className: "bg-info"
  }, {
      title: "Buy a Theme",
      start: new Date($.now() + 338e6),
      className: "bg-primary"
  }]';
}


//session_start();
//echo $_SESSION['current_page'];
