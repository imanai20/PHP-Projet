<?php 

require_once 'ouiview.php';

function display_tasks(){
    $tasks = ["zarar","aefae"];
  
    $html = display_tasks_view($tasks);
    echo $html;

}
   