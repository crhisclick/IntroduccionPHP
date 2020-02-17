<?php

namespace App\Controllers;
use App\Models\{Job,Project};

class IndexController extends BaseController{
    public function indexActions(){
        $jobs= Job::all();
        $project1 = new Project('project 1', 'description');
        $projects=[
        $project1
        ];

        $name = "Crhistian Mendoza";
        $limitMonths=2000;
        return $this->renderHTML( 'index.twig',[
            'name' => $name,
            'jobs' => $jobs
        ]);
    }
}