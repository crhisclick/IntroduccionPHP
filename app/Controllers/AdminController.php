<?php

namespace App\Controllers;
use App\Models\{Job,Project};

class AdminController extends BaseController{
    public function getIndex(){
 //       echo $_SESSION['userId'];

       return $this->renderHTML( 'admin.twig');
    }
}