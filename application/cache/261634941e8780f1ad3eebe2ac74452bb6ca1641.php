
<script src="<?php echo e(base_url('assets/js/lib/jquery.min.js')); ?>"></script>
<?php if(!empty($js)): ?>
        <?php $__currentLoopData = $js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url_js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(base_url($url_js)); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<script></script> 
<script src="<?php echo e(base_url('assets/js/lib/jquery.plugin.js')); ?>"></script>
<!-- jquery vendor -->
<script src="<?php echo e(base_url('assets/js/lib/jquery.nanoscroller.min.js')); ?>"></script>
<!-- nano scroller -->
<script src="<?php echo e(base_url('assets/js/lib/sidebar.js')); ?>"></script>
<!-- sidebar -->
<script src="<?php echo e(base_url('assets/js/lib/bootstrap.min.js')); ?>"></script>
<!-- bootstrap -->
<script src="<?php echo e(base_url('assets/js/lib/mmc-common.js')); ?>"></script>

<!--  Chart js -->




<script src="<?php echo e(base_url('assets/js/lib/datamap/d3.min.js')); ?>"></script>
<script src="<?php echo e(base_url('assets/js/lib/datamap/topojson.js')); ?>"></script>
<script src="<?php echo e(base_url('assets/js/lib/datamap/datamaps.world.min.js')); ?>"></script>




<script src="<?php echo e(base_url('assets/js/scripts.js')); ?>"></script>
<?php echo $__env->yieldPushContent('ext_js'); ?>

</body>

</html>