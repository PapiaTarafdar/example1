<?php namespace App\Models;
 
  use CodeIgniter\Model;
  use Faker\Generator;

  class Student_Model extends Model 
      {
          public function __construct()
          {
             parent::__construct();
       
          } 

       
       protected $table= 'students';
          protected $primaryKey='id';

              protected $allowedFields=['Name','Email','ContactNo','Course'];
      
      
      
}


  

?>