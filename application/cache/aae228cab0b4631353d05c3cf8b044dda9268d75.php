<div class="content-wrap">
    <div class="main">
        <!-- breadcrum -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                        <h1><?php echo e($title); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Sistem</a></li>
                                <li class="active"><?php echo e($title); ?></li>
                                <li class="active">Delete</li>
                            </ol>
                        </div>
                    </div>
                </div>
            <div>
        </div>
        <!-- akhir breadcrum -->
        <div class="main-content">
        <!-- /# row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card alert">
                    <div class="card-header">
                        <h4>Delete</h4>
                        <div class="card-header-right-icon">
                            <ul>
                                <a href="<?php echo e(site_url('sistem/group')); ?>" type="button" class="btn btn-default m-b-10 m-l-5">Kembali</a>
                            </ul>
                        </div>
                    </div>

                    
                    <?php echo $__env->make('template/notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="alert alert-danger" style="margin-top: 20px">
                            <label >Data yang telah terhapus tidak akan dapat dikembalikan lagi,<strong> Yakin hapus data ini?</strong></label>
                    </div>
                    <hr>
                    <div class="card-body" style="margin-top:20px">
                        <div class="card-content">
                        <div class="main">
                                <div class="horizontal-form-elements">
                                    <form class="form-horizontal" action="<?php echo e(site_url('sistem/group/delete_process')); ?>" method="post">
                                        <input type="hidden" name="group_id" value="<?php echo e($result['group_id']); ?>">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                                <label class="control-label"><b> Group </b></label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                                <label class="control-label"><?php echo e($result['group_name']); ?></label>
                                                        </div>
                                                    </div>
                                                </div><!-- /# column -->
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                                <label class="control-label"><b> Deskripsi </b></label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                                <label class="control-label"><?php echo e($result['group_desc']); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                            <div class="col-lg-12">
                                                                    <label class="control-label"><b> Created by </b></label>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                    <label class="control-label"><?php echo e($result['mdb_name']); ?></label>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                            <div class="col-lg-12">
                                                                    <label class="control-label"><b> Date update </b></label>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                    <label class="control-label"><?php echo e($result['mdd']); ?></label>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="card-footer text-right">
                                                <button type="submit" class="btn btn-danger btn-rounded m-b-10 m-l-5">Hapus</button>
                                            </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </div>
</div>
