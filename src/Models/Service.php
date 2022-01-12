<?php 

namespace VismaApp\Src\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Service extends Eloquent
{
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
       'name', 'email', 'phone_number', 'apartment_address', 'date', 'time'
   ];
 }

?>