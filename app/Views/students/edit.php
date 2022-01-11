<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5> Edit Student <a href="<?= base_url('students') ?>" class="btn btn-danger btn-sm float-end">BACK</a>
                    </h5>
                </div>    
                <div class="card-body">
                    <form action="<?= base_url('student/update/'.$student['id']) ?>" method="POST">
                        <input type="hidden" name="_method" value="PUT" />
                      
                       <div class="form-group mb-2">
                           <label>Name</label>
                           <input type="text" name="name" value="<?= $student['Name']; ?>" class="form-control" placeholder="Enter Name" required>
                       </div>  
                       <div class="form-group mb-2">
                           <label>Email</label>
                           <input type="text" name="email"  value="<?= $student['Email']; ?>" class="form-control" placeholder="Enter Email" required>
                       </div>  
                       <div class="form-group mb-2">
                           <label>Contact No.</label>
                           <input type="text" name="phone"  value="<?= $student['ContactNo']; ?>" class="form-control" placeholder="Enter Contact No." required>
                       </div>    

                       <div class="form-group mb-2">
                           <label>Course</label>
                           <input type="text" name="course"  value="<?= $student['Course']; ?>" class="form-control" placeholder="Enter Course" required>
                       </div>    
                       
                      
                       <div class="form-group">
                           
                           <button type="submit"  class="btn btn-primary mt-2" >Update</button>
                       </div>  
                    </form>  
                </div>    
            </div> 
        </div>
    </div>
</div>      


  
  



<?= $this->endSection() ?>