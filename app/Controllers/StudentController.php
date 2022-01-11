<?php namespace App\Controllers;

use App\Models\Student_Model;

class StudentController extends BaseController
{
 

  
    public function index()
    {

        $student=new Student_Model();
      
        $data['s']=$student->findAll();
        return view('students/index.php',$data);
    }

    public function create()
    {
        return view('students/create');
    }

    public function store()
    {
      $students=new Student_Model();
     
      $data=array(
      'Name' => $this->request->getPost('name'),
      'Email' => $this->request->getPost('email'),
      'ContactNo' => $this->request->getPost('phone'),
      'Course' => $this->request->getPost('course'),
     );
     $PrintData="Data of" . " ". $this->request->getPost('name') ;
     $students->save($data);
     return redirect('students')->with('status',   $PrintData. '  inserted successfully'  );

    }

    public function edit($id=null)
    {
      $student= new Student_Model();
      $data['student']= $student->find($id);
      return view('students/edit',$data);
    }

    public function update($id=null)
    {
      $student= new Student_Model();
      $data=[
        'Name' => $this->request->getPost('name'),
        'Email' => $this->request->getPost('email'),
        'ContactNo' => $this->request->getPost('phone'),
        'Course' => $this->request->getPost('course'),
      ];  
      $student->update($id, $data);
      session()->setFlashdata('status_text','Your Student Data has been Updated');
      return redirect()->to(base_url('students'))
      ->with('status_icon','success')
      ->with('status',$data['Name']. '\'s  data upated successfully');
    }

    public function Delete($id=null)
    {
     
      $student= new Student_Model();
      $data['student']= $student->find($id);
      //print_r($data['student']['Name']);
      $DeletedName=$data['student']['Name'];
      //echo $DeletedName;
  

      $student->delete($id);
      return redirect()->back()->with('status',$DeletedName.'\'s Data Deleted Successfully');
    }

   public function ConfirmDelete($id=null)
   {
     $student= new Student_Model();
     $data['student']= $student->find($id);
     $DeletedName=$data['student']['Name'];
     $student->delete($id);
     $data= [
       'status'=> 'Deleted Successfully',
       'status_text' => $DeletedName.'\'s data has been deleted successsfully',
        'status_icon' => 'success'
      ];

     return $this->response->setJSON($data);
    // return;
     //return redirect()->back()->with('status',$DeletedName.'\'s Data Deleted Successfully');
   }
}
