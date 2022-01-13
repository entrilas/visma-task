<?php 

namespace VismaApp\Src\Services;

use Constants;
use dekor\ArrayToTextTable;

class PrintService
{
    public function printTable($array){
        echo (new ArrayToTextTable($array))->render();
    }

    public function exportTable($array){
        $fp = fopen(Constants::EXPORT_FILE_DIR.Constants::EXPORT_FILE_NAME, 'wb');

        foreach ($array as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }
}
?>