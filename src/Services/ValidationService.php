<?php 

namespace VismaApp\Src\Services;

use Exception;

class ValidationService
{
    public function __construct(){
    }
    
    public function validateAll($email, $number, $date)
    {
        $this->validateEmail($email);
        //$this->validateNumber($number);
        $this->validateDate($date);
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
        $date_split  = explode('-', $date);
        if(!checkdate($date_split[2], $date_split[1], $date_split[0])){
            throw new Exception('Incorrect Date Format.');
        }
    }

    function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool {
        return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
    }
}
?>