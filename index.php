<?php

use VismaApp\Src\Services\CommandService;

require "./src/db/database.php";

$commandService = new CommandService();

$arguments = getopt(null, ["name:","email:","phone_number:","apartment_address:","date:","time:"]);
$command = getopt(null, ["command:"]);
$date = getopt(null, ["date:"]);
$id = getopt(null, ["id:"]);

$commandService->runCommand($command['command'], $arguments, $id['id'], $date['date']);
