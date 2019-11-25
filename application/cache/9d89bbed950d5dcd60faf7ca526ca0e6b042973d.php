
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
                            <h4>Daftar Navigation</h4>
                            <div class="card-header-right-icon">
                                <ul>
                                    <a href="<?php echo e(site_url('sistem/navigation/add')); ?>" type="button" class="btn btn-primary m-b-10 m-l-5">Tambah Data</a>
                                </ul>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body" style="margin-top:20px">
                            <div class="card-content">
                                    <div class="horizontal-form-elements">
                                            <form class="form-horizontal">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Navigation</label>
                                                            <div class="col-sm-9">
                                                            <select name="nav_id" id="single" class="form-control select2-single">
                                                            <option value='0'>Tidak ada</options>
                                                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($rs['nav_id']); ?>"><?php echo e($rs['nav_title']); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button type="button" class="btn btn-default m-b-10 m-l-5">Cari</button>
                                                        <button type="button" class="btn btn-dark m-b-10 m-l-5">Reset</button>
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
                                                <th class="text-align text-center">Judul Navigasi</th>
                                                <th class="text-align text-center">URL Navigasi</th>
                                                <th class="text-align text-center">Menu Client</th>
                                                <th class="text-align text-center">Digunakan</th>
                                                <th class="text-align text-center">Ditampilkan</th>
                                                <th class="text-align text-center"></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th class="text-align text-center"> <?php echo e($no++); ?> </th>
                                                    <td>
                                                    <?php if($rs['parent_id'] == 0): ?>
                                                        <?php echo e($rs['nav_title']); ?>    
                                                    <?php else: ?>
                                                        -- <?php echo e($rs['nav_title']); ?>

                                                    <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($rs['nav_url']); ?></td>
                                                    <td class="text-align text-center">
                                                        <?php if($rs['client_st'] == 1): ?>
                                                        <span class="label label-primary">Ya</span>
                                                        <?php else: ?>
                                                        <span class="label label-danger">Tidak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-align text-center">
                                                        <?php if($rs['active_st'] == 1): ?>
                                                        <span class="label label-primary">Ya</span>
                                                        <?php else: ?>
                                                        <span class="label label-danger">Tidak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-align text-center">
                                                        <?php if($rs['display_st'] == 1): ?>
                                                        <span class="label label-primary">Ya</span>
                                                        <?php else: ?>
                                                        <span class="label label-danger">Tidak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                            <a href="<?php echo e(site_url('sistem/navigation/edit/'.$rs['nav_id'])); ?>" class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i class="ti-pencil"></i></a>
                                                            <a href="<?php echo e(site_url('sistem/navigation/delete/'.$rs['nav_id'])); ?>" class="btn btn-danger btn-rounded m-b-10 m-l-5" title="Delete"><i class="ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="text-right">
                                        <?php if(isset($pagination)): ?>
                                            <?php echo $pagination; ?>

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
    <!-- script untuk js external -->
<?php $__env->startPush('ext_js'); ?>
<script>
    $(document).ready(function () {
        $( ".select2-single" ).select2( {
				placeholder: placeholder,
                width: '100%',
				containerCssClass: ':all:'
			} );
    });
</script>
<?php $__env->stopPush(); ?>