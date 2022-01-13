<?php 

namespace VismaApp\Src\Services;

use Constants;
use Exception;
use VismaApp\Src\Controllers\ServiceController;

class CommandService
{
    private $serviceController;

    public function __construct()
    {
        $this->serviceController = new ServiceController();
    }
    
    public function runCommand($command, $arguments, $id, $date, $export, $file){
        switch ($command) {
            case Constants::CREATE_COMMAND_NAME:
                $this->runCreateCommand($arguments);
                break;
            case Constants::EDIT_COMMAND_NAME:
                $this->runEditCommand($arguments, $id);
                break;
            case Constants::DELETE_COMMAND_NAME:
                $this->runDeleteCommand($id);
                break;
            case Constants::PRINT_COMMAND_NAME:
                $this->runPrintCommand($date, $export);
                break;
            case Constants::MIGRATE_COMMAND_NAME:
                $this->runMigrateCommand();
                break;
            case Constants::IMPORT_COMMAND_NAME:
                $this->runImportCommand($file);
                 break;
            default:
                throw new Exception("Command does not exist!");
        }
    }

    public function runCreateCommand($arguments){
        $this->serviceController->store($arguments);
    }

    public function runEditCommand($arguments, $id){
        $this->serviceController->update($id, $arguments);
    }

    public function runDeleteCommand($id){
        $this->serviceController->delete($id);
    }

    public function runPrintCommand($date, $export){
        $this->serviceController->show($date, $export);
    }

    public function runImportCommand($file){
        $this->serviceController->import($file);
    }

    public function runMigrateCommand(){
        require_once('src/db/migrations/Service.php');
    }
}

?>