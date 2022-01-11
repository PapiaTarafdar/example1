<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Papia's Coding</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" >
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <link  rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>

</head>
<body>

  <div class="app">
      <?= $this->include('layouts/inc/navbar.php')?>
      <?= $this->renderSection('content') ?>
  </div>    
  
 <script src="<?= base_url('assets/js/jquery-3.6.0.js');?>"></script>
 <script src="<?= base_url('assets/js/popper.min.js');?>" ></script>
 <script src="<?= base_url('assets/js/bootstrap.min.js');?>" ></script>
 
 <!-- DataTables CDN link -->
 <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
 
 <script>
     $(document).ready( function () {
    $('#mydatatable').DataTable();
} );
 </script>    



 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
 <script>
     $(document).ready(function(){
         <?php if(session()->getFlashdata('status')) { ?>
        alertify.set('notifier','position', 'top-right');
       // alertify.success('Current position : ' + alertify.get('notifier','position'));
        alertify.success("<?= session()->getFlashdata('status') ?>");
        <?php } ?>
     });
 </script>  
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
 
 <script>
     $(document).ready(function(){
       
         <?php if(session()->getFlashdata('status')) { ?>

            swal({
            title: "<?= session()->getFlashdata('status') ?>",
            text: "<?= session()->getFlashdata('status_text') ?>",
            icon: "<?= session()->getFlashdata('status_icon') ?>",
            button: "OK!",
            });
       
        <?php } ?>
     });
 </script>   

 <?= $this->renderSection('scripts') ?>
</body>
</html>