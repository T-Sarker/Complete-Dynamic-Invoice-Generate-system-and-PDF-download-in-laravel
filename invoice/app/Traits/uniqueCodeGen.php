<?php
namespace App\Traits;
use IlluminateHttpRequest;

trait UniqueCodeGen {

    public function codeGenerate() {
        // Fetch all the students from the 'student' table.
        $length = 12;    
        return substr(str_shuffle('0123456789ABCDEFGHIJKLabcdefghijklMNOPQRSTUVWXYZmnopqrstuvwxyz'),1,$length);
    }
}