<?php 

namespace VismaApp\Src\Services;

use DateTime;
use Exception;

class ValidationService
{
    public function __construct(){
    }
    
    public function validateAll($arguments)
    {
        $email = $arguments['email'] ?? null;
        $phone_number = $arguments['phone_number'] ?? null;
        $date = $arguments['date'] ?? null;

        (empty($email)) ?: $this->validateEmail($email);
        (empty($phone_number)) ?: $this->validateNumber($phone_number);
        (empty($date)) ?: $this->validateDate($date);
    }

    public function validateEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Incorrect Email Format.');
        }
    }

    public function validateNumber($number){
        if(!$this->isDigits($number)){
            throw new Exception('Incorrect Mobile Number Format.');
        }
    }

    public function validateDate($date){
        if(!$this->isDate($date)){
            throw new Exception('Incorrect Date Format.');
        }
    }

    public function validateRequired($arguments)
    {
        if(empty($arguments['name']) || empty($arguments['email']) || empty($arguments['phone_number'])
        || empty($arguments['apartment_address']) || empty($arguments['date']) || empty($arguments['time']))
            throw new Exception('Argument count must be 6 (Name, Email, Phone Number, Apartment Address, Date, Time)');
    }

    function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool {
        return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
    }

    function isDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}
?>