<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <!-- jika Anda ingin membuat breadcrumb tambahkan disini -->
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <?= $this->session->flashdata('message'); ?>
               </div>
           </div>             <!-- /.col -->
           <div class="row">
               <div class="col-md-12">
                <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                           <div class="text-center">
                            BGST
                        </div>
                    <!-- /.card-body -->
                    </div>
                <!-- /.card -->
               </div>
        <!-- /.row -->
           </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->