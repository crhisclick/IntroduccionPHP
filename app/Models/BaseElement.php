<?php
namespace App\Models;
require_once 'Printable.php';

class BaseElement implements Printable{
    protected $title;
    public $description;
    public $visible=true;
    public $months;

    public function __construct($title, $description)
    {
      $this->SetTitle($title);
      $this->description=$description;
    }

    public function setTitle($t){
      if($t===''){
        $this->title='n/a';
      }else{
      $this->title=$t;
      }
    }
    public function getTitle(){
      return $this->title;
    }
    public function getDurationAsString(){
      $years= floor($this->months  / 12);
      $extramonths= $this->months % 12;
    return "$years years $extramonths months";
    }
    
    public function getDescription(){
      return $this->description;
  }
}