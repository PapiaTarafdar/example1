<?php

namespace App\Controllers;

class ProductController extends BaseController
{
    public function feature()
    {
        echo 'I am Product Controller';
      //  return view('frontend/product');
    }

    public function find($prod_name)
    {
       // echo 'Single Product:' ,$prod_name;
       //$data['name']=$prod_name;
       $product_name=$prod_name;
       $product_name=json_encode($product_name);
       $data=array('name'=>$product_name);

       $data['prod_list'] = ['nokia','mi','samsung'];
       
      //$name= array($prod_name);
     // $some_data= $prod_name;
     // $some_data= json_encode($some_data);
    //  $data= array('some_data'=> $some_data);

      
       return view('frontend/product',$data);
    }

    public function user_profile($user_name,$surname)
    {
        echo 'I am ',$user_name,' ',$surname,'\'s profile' ;
    }
}