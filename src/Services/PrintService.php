<?php 

namespace VismaApp\Src\Services;

use dekor\ArrayToTextTable;

class PrintService
{
    public function printTable($array){
        echo (new ArrayToTextTable($array))->render();
    }

    public function exportTable($array){
        $fp = fopen('export.csv', 'wb');

        foreach ($array as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }
}
?>