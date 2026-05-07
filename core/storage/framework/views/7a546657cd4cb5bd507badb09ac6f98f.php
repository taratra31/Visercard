<?php $__env->startSection('app'); ?>
    <div class="dashboard position-relative">
        <div class="dashboard__inner flex-wrap">
            <?php echo $__env->make('Template::partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="dashboard__right">
                <?php echo $__env->make('Template::partials.topbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xxl-10">
                            <div class="dashboard-body">
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('script'); ?>
        <script>
            $(document).ready(function() {
                $('.sidebar-menu-toggle').on('click', function() {
                    const $item = $(this).closest('.sidebar-menu-list__item');
                    const $submenu = $item.find('.sidebar-menu-list__sub-menu');
                    if ($item.hasClass('open')) {
                        $submenu.css({
                            maxHeight: 0,
                            opacity: 0
                        });
                    } else {
                        const scrollHeight = $submenu[0].scrollHeight; // Get actual content height
                        $submenu.css({
                            maxHeight: scrollHeight + 'px',
                            opacity: 1
                        });
                    }
                    $item.toggleClass('open');
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Template::layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/andriamihaja/Desktop/langue/visercard/core/resources/views/templates/basic/layouts/master.blade.php ENDPATH**/ ?>