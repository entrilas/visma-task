<?php 

namespace VismaApp\Src\Controllers;

use Exception;
use VismaApp\Src\Models\Service;
use VismaApp\Src\Services\FileReaderService;
use VismaApp\Src\Services\PrintService;
use VismaApp\Src\Services\ValidationService;

class ServiceController
{
    private $validationService;
    private $printService;
    private $fileReaderService;

    public function __construct()
    {
        $this->validationService = new ValidationService();
        $this->printService = new PrintService();
        $this->fileReaderService = new FileReaderService();
    }

    public function store($arguments){
        try{
            $this->validationService->validateRequired($arguments);
            $email = $arguments['email'] ?? null;
            $phone_number = $arguments['phone_number'] ?? null;
            $date = $arguments['date'] ?? null;
            $this->validationService->validateAll($email, $phone_number, $date);
            Service::Create($arguments);
        }catch(Exception $error){
            echo "Service has not been stored, reason:".$error->getMessage();
        }
    }

    public function import($file){
        try{
            $services = $this->fileReaderService->readFile($file);
            foreach($services as $service)
                $this->store($service);
        }catch(Exception $error){
            echo "Services has not been imported, reason:".$error->getMessage();
        }
    }

    public function update($id, $arguments){
        try{
            $email = $arguments['email'] ?? null;
            $phone_number = $arguments['phone_number'] ?? null;
            $date = $arguments['date'] ?? null;
            $this->validationService->validateAll($email, $phone_number, $date);
            $service = Service::findOrFail($id);
            $service->update($arguments);
        }catch(Exception $error){
            echo "Service has not been updated, reason:".$error->getMessage();
        }
    }

    public function delete($id){
        try{
            Service::findOrFail($id)->delete();
        }catch(Exception $error){
            echo "Service has not been deleted, reason:".$error->getMessage();
        }
    }

    public function show($date, $export){
        try{
            $data = Service::all()->where('date', '=', $date)->toArray();
            if(!$export)
                $this->printService->printTable($data);
            else
                $this->printService->exportTable($data);
        }catch(Exception $error){
            echo "Services has not been printed/exported, reason:".$error->getMessage();
        }
    }
}

?>