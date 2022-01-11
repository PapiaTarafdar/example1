<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>
<div class="container mt-4" >
    <div class="row"> 
        <div class="col-md-12">

        <?php
            if(session()->getFlashdata('status'))
            {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Hey!</strong> <?= session()->getFlashdata('status'); ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
            }
        ?>

        
    
       


            <div class="card">
                <div class="card-header">
                    <h5>Student Data</h5>
                     <a href="<?= base_url('students/create') ?>" class="btn btn-info btn-sm float-end">Add</a>
                </div>    
                <div class="card-body"> 
                 <table class="table table-bordered" id="mydatatable" >
                     <thead>
                         <tr>  
                             <th>ID</th> 
                             <th>Name</th>
                             <th>Email</th>
                             <th>Contact No.</th>
                             <th>Course</th>
                             
                             <th style='white-space: nowrap'>Action</th>
                             <th>Del-Method</th>
                             <th>Confirm-Del</th>
                         </tr> 
                     </thead>  
                     <tbody> 
                     <?php if($s): ?>
                            <?php foreach($s as $row): ?>
                            <tr>
                                <td> <?php echo $row['id']; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['ContactNo']; ?></td>
                                <td><?php echo $row['Course']; ?></td>
                                <td style='white-space: nowrap'>
                                   
                                    <a href="<?= base_url('student/edit/'.$row['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="<?= base_url('student/getDelete/'.$row['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                                <td>
                                    <form action="<?= base_url('student/delete-method/'.$row['id']) ?>" method="POST">
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    
                                    </form>
                                </td>  
                                <td>
                                    <?php $selectedrow = array($row['id'], $row['Name']); ?>
                                    <input type="hidden" id="abcId" name="abcName" value="<?=  $row['Name'] ; ?>">
                                    <button type="button"  data-value="<?=  $row['Name']; ?>" value="<?=  $row['id']; ?>" class="confirm_del_btn btn btn-danger btn-sm">Delete</button>
                                    
                                </td>
                               
                            </tr>
                            <?php endforeach; ?>
                          <?php endif; ?>
                     </tbody>      

                 </table>   
                </div>   
            </div>
        </div>
    </div> 
</div>

 
 
 
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>

 /*$(document).ready(function(){
      $('.confirm_del_btn').click(function (e){
          e.preventDefault();
          var id= $(this).val();

          swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
            })
        .then((willDelete) => {
        if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});

      });
}); */                
   
  $(document).ready(function(){
      $('.confirm_del_btn').click(function (e){
          e.preventDefault();
        
         // var buttom = document.querySelector("button");
         //var dataValue = $(this).getAttribute('data-value');
         var dataId = $(this).attr("data-value");
          var id=$(this).val();

          swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) 
  {
    $.ajax({
                 url:"/student/confirm-delete/"+id,
                 success: function(response)
                 {
                    swal({
                    title: response.status ,
                    text: response.status_text ,
                    icon: response.status_icon,
                    button: "OK",
                    
                     }).then((confirmed) => {
                        window.location.reload();
                     });

                 }
             })
  } 
  else 
  {
    swal("You have cancelled deleting this data!");
  }
});
           //var name=document.getElementById('abcId').value;
         // var name1 = $(this).find('input:hidden').val());
     
         /* if(confirm("Do you want to delete this data?"))
          {
             // alert(id);
             $.ajax({
                 url:"/student/confirm-delete/"+id,
                 success: function(response){
                     window.location.reload();
                     alert("Data Deleted"+" "+dataId);

                 }
             })
          }*/
      });
  });
</script>

<?= $this->endSection() ?>