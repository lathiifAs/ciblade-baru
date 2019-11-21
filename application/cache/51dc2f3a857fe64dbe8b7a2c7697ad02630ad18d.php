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
                                            <a href="<?php echo e(site_url('sistem/navigation')); ?>" type="button"
                                                class="btn btn-default m-b-10 m-l-5">Kembali</a>
                                        </ul>
                                    </div>
                                </div>

                                
                                <?php echo $__env->make('template/notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                <hr>
                                <div class="card-body" style="margin-top:20px">
                                    <div class="card-content">
                                        <div class="main">
                                            <div class="horizontal-form-elements">
                                                <form class="form-horizontal"
                                                    action="<?php echo e(site_url('sistem/navigation/add_process')); ?>" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Induk Menu</label>
                                                                <div class="col-sm-10">
                                                                    <select name="parent_id" id="single"
                                                                        class="form-control select2-single">
                                                                        <option value='0'>Tidak ada</options>
                                                                        <?php $__currentLoopData = $rs_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($menu['nav_id']); ?>">
                                                                            <?php if($menu['parent_id'] == 0): ?>
                                                                            <?php echo e($menu['nav_title']); ?>

                                                                            <?php else: ?>
                                                                            -- <?php echo e($menu['nav_title']); ?>

                                                                            <?php endif; ?>
                                                                        </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Judul Menu</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_title"
                                                                        class="form-control" placeholder="Judul...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Deskripsi</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_desc"
                                                                        class="form-control" placeholder="Deskripsi...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Alamat
                                                                    Menu</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_url"
                                                                        class="form-control" placeholder="Alamat...">
                                                                </div>
                                                            </div>
                                                        </div><!-- /# column -->
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Urutan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_no"
                                                                        class="form-control" placeholder="Urutan...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Digunakan</label>
                                                                <div class="col-sm-10">
                                                                    <select name="active_st" class="form-control">
                                                                        <option value="1">Ya</options>
                                                                        <option value="0">Tidak</options>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label">Ditampilkan</label>
                                                                <div class="col-sm-10">
                                                                    <select name="display_st" class="form-control">
                                                                        <option value="1">Ya</options>
                                                                        <option value="0">Tidak</options>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Icon Menu</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_icon"
                                                                        class="form-control" placeholder="Icon...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="card-footer text-right">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-rounded m-b-10 m-l-5">Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-dark btn-rounded m-b-10 m-l-5">Reset</button>
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

            <?php $__env->startPush('ext_js'); ?>
            <script>
                $(document).ready(function () {
                    $(".select2-single").select2({
                        placeholder: placeholder,
                        width: '100%',
                        containerCssClass: ':all:'
                    });
                });
            </script>
            <?php $__env->stopPush(); ?>