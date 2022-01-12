<?php 

namespace VismaApp\Src\Controllers;

use Exception;
use VismaApp\Src\Models\Service;
use VismaApp\Src\Services\ValidationService;

class ServiceController
{
    private $validationService;

    public function __construct()
    {
        $this->validationService = new ValidationService();
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

    public function show($date){
        try{
            print_r(Service::all());
        }catch(Exception $error){
            throw new $error->getMessage();
        }
    }
}

?>