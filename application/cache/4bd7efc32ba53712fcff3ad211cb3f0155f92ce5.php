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
                                    <li><a href="#">Master</a></li>
                                    <li class="active"><?php echo e($title); ?></li>
                                    <li class="active">Edit</li>
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
                            <h4>Edit</h4>
                            <div class="card-header-right-icon">
                                <ul>
                                    <a href="<?php echo e(site_url('master/user')); ?>" type="button" class="btn btn-default m-b-10 m-l-5">Kembali</a>
                                </ul>
                            </div>
                        </div>

                        
                        <?php echo $__env->make('template/notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        
                        <hr>
                        <div class="card-body" style="margin-top:20px">
                            <div class="card-content">
                            <div class="main">
                                    <div class="horizontal-form-elements">
                                            <form class="form-horizontal" action="<?php echo e(site_url('master/user/edit_process')); ?>" method="post">
                                                <input type="hidden" name="user_id" value="<?php echo e($result['user_id']); ?>">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Nama</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="nama" class="form-control" placeholder="Isian nama..." value="<?php echo e($result['nama']); ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                                            <div class="col-sm-10">
                                                            <select name="jns_kelamin" class="form-control">
                                                                <?php if($result['jns_kelamin'] == 'L'): ?>
                                                                    <option value="L" selected>Laki-laki</option>
                                                                    <option value="P">Perempuan</option>
                                                                <?php else: ?>
                                                                    <option value="L">Laki-laki</option>
                                                                    <option value="P" selected>Perempuan</option>
                                                                <?php endif; ?>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Alamat</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="col-sm-12" name="alamat" placeholder="Alamat lengkap..."><?php echo e($result['alamat']); ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Hak Akses</label>
                                                            <div class="col-sm-10">
                                                            <select name="role_id" id="role_id" class="form-control">
                                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($role['role_id']); ?>"><?php echo e($role['role_nm']); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div><!-- /# column -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-10">
                                                                    <input type="text" name="user_mail" class="form-control" placeholder="Isian email..." value="<?php echo e($result['user_mail']); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Username</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="user_name" class="form-control" placeholder="Isian username..." value="<?php echo e($result['user_name']); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="user_pass" placeholder="Isian password..." class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Status</label>
                                                            <div class="col-sm-10">
                                                            <select name="user_st" class="form-control">
                                                                <?php if($result['user_st'] == 1): ?>
                                                                    <option value="1" selected>Aktif</option>
                                                                    <option value="0">Tidak Aktif</option>
                                                                    <option value="2">Block</option>
                                                                <?php elseif($result['user_st'] == 0): ?>
                                                                    <option value="1">Aktif</option>
                                                                    <option value="0" selected>Tidak Aktif</option>
                                                                    <option value="2">Block</option>
                                                                <?php else: ?>
                                                                    <option value="1">Aktif</option>
                                                                    <option value="0">Tidak Aktif</option>
                                                                    <option value="2" selected>Block</option>
                                                                <?php endif; ?>
                                                            </select>
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

    
    <script src="<?php echo e(base_url('assets/js/lib/jquery.min.js')); ?>"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#role_id option[value=<?php echo e($result['role_id']); ?>]').attr('selected','selected');
        });
    </script>

