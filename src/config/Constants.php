<?php

final class Constants{

    const CREATE_COMMAND_NAME = "create";
    const EDIT_COMMAND_NAME = "edit";
    const DELETE_COMMAND_NAME = "delete";
    const PRINT_COMMAND_NAME = "print";
    const MIGRATE_COMMAND_NAME = "migrate";
    const EXPORT_COMMAND_NAME = "export";
    const IMPORT_COMMAND_NAME = "import";
    const EXPORT_FILE_NAME = 'export.csv';
    const EXPORT_FILE_DIR = 'src/resources/';

    private function __construct(){
        throw new Exception("Can't get an instance of Constants");
    }
}