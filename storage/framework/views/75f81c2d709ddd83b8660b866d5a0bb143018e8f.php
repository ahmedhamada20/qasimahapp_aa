<?php if(session()->has('message')): ?>
    <div style="text-align: center" class="alert alert-success">
        <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/ahmedhamada/public_html/ahmedhamada/resources/views/admin/layout/message.blade.php ENDPATH**/ ?>