<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Job extends Model{
    protected $table='jobs';

    public function getDurationAsString(){
        $years= floor($this->months  / 12);
        $extramonths= $this->months % 12;
      return "JOB DURATION: $years years $extramonths months";
      }

}