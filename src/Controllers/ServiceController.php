<?php 

namespace VismaApp\Src\Controllers;

use Exception;
use VismaApp\Src\Models\Service;
use VismaApp\Src\Services\PrintService;
use VismaApp\Src\Services\ValidationService;

class ServiceController
{
    private $validationService;
    private $printService;

    public function __construct()
    {
        $this->validationService = new ValidationService();
        $this->printService = new PrintService();
    }

    public function store($arguments){
        try{
            $this->validationService->validateAll($arguments['email'], $arguments['phone_number'], $arguments['date']);
            Service::Create($arguments);
        }catch(Exception $error){
            throw new $error->getMessage();
        }
    }

    public function update($id, $arguments){
        try{
            $service = Service::find($id);
            $service->update($arguments);
        }catch(Exception $error){
            throw new $error->getMessage();
        }
    }

    public function delete($id){
        try{
            Service::find($id)->delete();
        }catch(Exception $error){
            throw new $error->getMessage();
        }
    }

    public function show($date, $export){
        try{
            $data = Service::all()->where('date', '=', $date)->toArray();
            print_r($export);
            if(!$export)
                $this->printService->printTable($data);
            else
                $this->printService->exportTable($data);
        }catch(Exception $error){
            throw new $error->getMessage();
        }
    }
}

?>