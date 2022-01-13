<?php

use VismaApp\Src\Services\CommandService;

require "./src/db/database.php";

$commandService = new CommandService();

$options = array(
    "name:",
    "email:",
    "phone_number:",
    "apartment_address:",
    "date:",
    "time:",
    "command:",
    "export:",
    "file:",
    "id:"
);

$data = getopt(null, $options);
$date = $data['date'] ?? null;
$id = $data['id'] ?? null;
$export = strtolower($data['export'] ?? null) == 'true' ? true : false;
$file = $data['file'] ?? null;
$command = $data['command'] ?? null;

$commandService->runCommand($command, $data, $id, $date, $export, $file);
