<?php 

namespace VismaApp\Src\Services;

use Exception;
use VismaApp\Src\Controllers\ServiceController;

class CommandService
{
    const CREATE_COMMAND_NAME = "create";
    const EDIT_COMMAND_NAME = "edit";
    const DELETE_COMMAND_NAME = "delete";
    const PRINT_COMMAND_NAME = "print";
    const MIGRATE_COMMAND_NAME = "migrate";

    private $serviceController;

    public function __construct()
    {
        $this->serviceController = new ServiceController();
    }
    
    public function runCommand($command, $arguments, $id){
        switch ($command) {
            case self::CREATE_COMMAND_NAME:
                $this->runCreateCommand($arguments);
                break;
            case self::EDIT_COMMAND_NAME:
                $this->runEditCommand($arguments, $id);
                break;
            case self::DELETE_COMMAND_NAME:
                $this->runDeleteCommand($id);
                break;
            case self::PRINT_COMMAND_NAME:
                $this->runPrintCommand($arguments);
                break;
            case self::DELETE_COMMAND_NAME:
                $this->runMigrateCommand($command);
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

    public function runPrintCommand($arguments){
        
    }

    public function runMigrateCommand($command){
        require_once('src/db/migrations/Service.php');
    }
}

?>