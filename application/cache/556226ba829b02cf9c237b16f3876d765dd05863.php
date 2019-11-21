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
                                    <li class="active">Tambah Data</li>
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
                            <h4>Tambah Data</h4>
                            <div class="card-header-right-icon">
                                <ul>
                                    <a href="<?php echo e(site_url('sistem/role')); ?>" type="button" class="btn btn-default m-b-10 m-l-5">Kembali</a>
                                </ul>
                            </div>
                        </div>

                        
                        <?php echo $__env->make('template/notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        
                        <hr>
                        <div class="card-body" style="margin-top:20px">
                            <div class="card-content">
                            <div class="main">
                                    <div class="horizontal-form-elements">
                                            <form class="form-horizontal" action="<?php echo e(site_url('sistem/role/add_process')); ?>" method="post">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Group</label>
                                                            <div class="col-sm-10">
                                                                <select name="group_id" class="form-control">
                                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($group['group_id']); ?>"><?php echo e($group['group_name']); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Role</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="role_nm" class="form-control" placeholder="Nama role...">
                                                            </div>
                                                        </div>
                                                    </div><!-- /# column -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Deskripsi</label>
                                                            <div class="col-sm-10">
                                                                <textarea rows="5" class="col-sm-12" name="role_desc" placeholder="Deskripsi role..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                    <div class="card-footer text-right">
                                                        <button type="submit" class="btn btn-primary btn-rounded m-b-10 m-l-5">Simpan</button>
                                                        <button type="reset" class="btn btn-dark btn-rounded m-b-10 m-l-5">Reset</button>
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
    