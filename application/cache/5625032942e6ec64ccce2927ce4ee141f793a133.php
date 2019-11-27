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
                            <h4>Daftar User</h4>
                            <div class="card-header-right-icon">
                                <ul>
                                    <a href="<?php echo e(site_url('master/user/add')); ?>" type="button" class="btn btn-primary m-b-10 m-l-5">Tambah Data</a>
                                </ul>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body" style="margin-top:20px">
                            <div class="card-content">
                                    <div class="horizontal-form-elements">
                                            <form class="form-horizontal" action="<?php echo e(site_url('master/user/search_process')); ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Nama</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="nama" class="form-control" placeholder="Isian nama..." value="<?php echo e($search['nama']); ?>">
                                                            </div>
                                                        </div>
                                                    </div><!-- /# column -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-10">
                                                                    <input type="text" name="user_mail" class="form-control" placeholder="Isian email..." value="<?php echo e($search['user_mail']); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" name="search" value="tampilkan" class="btn btn-default m-b-10 m-l-5">Cari</button>
                                                        <button type="submit" name="search" value="reset" class="btn btn-dark m-b-10 m-l-5">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        
                                        <?php echo $__env->make('template/notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                        <hr>
                                        <table class="table table-responsive table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-align text-center">No.</th>
                                                <th class="text-align text-center">Nama</th>
                                                <th class="text-align text-center">Role</th>
                                                <th class="text-align text-center">Username</th>
                                                <th class="text-align text-center">Email</th>
                                                <th class="text-align text-center">Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th class="text-align text-center"> <?php echo e($no++); ?> </th>
                                                    <td><?php echo e($rs['nama']); ?></td>
                                                    <td class="text-align text-center"><?php echo e($rs['role_nm']); ?></td>
                                                    <td><?php echo e($rs['user_name']); ?></td>
                                                    <td><?php echo e($rs['user_mail']); ?></td>
                                                    <td class="text-align text-center">
                                                        <?php if($rs['user_st'] == 0): ?>
                                                            <span class="badge badge-danger">tidak aktif</span>  
                                                        <?php elseif($rs['user_st'] == 1): ?>
                                                            <span class="badge badge-success">aktif</span> 
                                                        <?php elseif($rs['user_st'] == 2): ?>
                                                            <span class="badge badge-danger">Block</span> 
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>

                                                            <a href="<?php echo e(site_url('master/user/detail/'.$rs['user_id'])); ?>" type="button" class="btn btn-info btn-rounded m-b-10 m-l-5" title="Detail"><i class="ti-eye"></i></a>
                                                            <a href="<?php echo e(site_url('master/user/edit/'.$rs['user_id'])); ?>" class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i class="ti-pencil"></i></a>
                                                            <a href="<?php echo e(site_url('master/user/delete/'.$rs['user_id'])); ?>" class="btn btn-danger btn-rounded m-b-10 m-l-5" title="Delete"><i class="ti-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="text-right">
                                        <?php if(isset($pagination)): ?>
                                            <ul class="pagination pagination-sm">
                                                    <li class="page-item"><a class="page-link" href="#"><?php echo $pagination; ?></a></li>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        </div>
    </div>
    