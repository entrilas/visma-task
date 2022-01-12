<?php 

namespace VismaApp\Src\Services;

use dekor\ArrayToTextTable;

class PrintService
{
    public function printTable($array){
        echo (new ArrayToTextTable($array))->render();
    }
}
?>