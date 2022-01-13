<?php 

namespace VismaApp\Src\Services;

class FileReaderService
{
    public function readFile($file)
    {
        $csvFile = file($file);
        $header = $this->getHeader($file);
        $data = [];
        foreach (array_slice($csvFile,1) as $row) {
            $row_data = str_getcsv($row);
            $data[] = array_combine($header,$row_data);
        }
        return $data;
    }

    public function getHeader($file)
    {
        $csvFile = file($file);
        return str_getcsv($csvFile[0]);
    }
}
?>