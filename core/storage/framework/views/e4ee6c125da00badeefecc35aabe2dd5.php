<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> <?php echo e(gs()->siteName(__($pageTitle))); ?></title>

    <?php echo $__env->make('partials.seo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/all.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/select2.min.css')); ?>">

    <?php echo $__env->yieldPushContent('style-lib'); ?>

    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) . 'css/main.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) . 'css/custom.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) . 'css/color.php')); ?>?color=<?php echo e(gs('base_color')); ?>&secondColor=<?php echo e(gs('secondary_color')); ?>" />
    <?php echo $__env->yieldPushContent('style-lib'); ?>
    <?php echo $__env->yieldPushContent('style'); ?>
</head>
<?php echo loadExtension('google-analytics') ?>

<body>
    <?php echo $__env->make('Template::partials.preloader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="body-overlay"></div>
    <div class="sidebar-overlay"></div>
    <a class="scroll-top"><i class="fas fa-angle-double-up"></i></a>

    <?php echo $__env->yieldContent('app'); ?>

    <?php
        $cookie = App\Models\Frontend::where('data_keys', 'cookie.data')->first();
    ?>

    <?php if($cookie->data_values->status == Status::ENABLE && !\Cookie::get('gdpr_cookie')): ?>
        <div class="cookies-card hide">
            <div class="cookies-card__icon">
                <i class="las la-cookie-bite"></i>
            </div>
            <p class="mt-3 cookies-card__content"><?php echo e($cookie->data_values->short_desc); ?> <a
                    href="<?php echo e(route('cookie.policy')); ?>" target="_blank"><?php echo app('translator')->get('learn more'); ?></a></p>
            <div class="cookies-card__btn mt-3">
                <a href="javascript:void(0)" class="btn btn--base btn--sm policy"><?php echo app('translator')->get('Allow'); ?></a>
            </div>
        </div>
    <?php endif; ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(asset('assets/global/js/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/select2.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script-lib'); ?>

    <!-- main js -->
    <script src="<?php echo e(asset(activeTemplate(true) . 'js/main.js')); ?>"></script>

    <?php echo $__env->make('partials.notify', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo loadExtension('tawk-chat') ?>



    <?php if(gs('pn')): ?>
        <?php echo $__env->make('partials.push_script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('script'); ?>

    <script>
        (function($) {
            "use strict";
            $(".langSel").on("change", function() {
                window.location.href = "<?php echo e(route('home')); ?>/change/" + $(this).val();
            });

            $('.policy').on('click', function() {
                $.get('<?php echo e(route('cookie.accept')); ?>', function(response) {
                    $('.cookies-card').addClass('d-none');
                });
            });

            setTimeout(function() {
                $('.cookies-card').removeClass('hide')
            }, 2000);


            var inputElements = $('[type=text],select,textarea');
            $.each(inputElements, function(index, element) {
                element = $(element);
                element.closest('.form-group').find('label').attr('for', element.attr('name'));
                element.attr('id', element.attr('name'))
            });

            $.each($('input, select, textarea'), function(i, element) {
                var elementType = $(element);
                if (elementType.attr('type') != 'checkbox') {
                    if (element.hasAttribute('required')) {
                        $(element).closest('.form-group').find('label').addClass('required');
                    }
                }

            });

            function formatState(state) {
                if (!state.id) return state.text;
                let gatewayData = $(state.element).data();
                return $(
                    `<div class="d-flex gap-2">${gatewayData.imageSrc ? `<div class="select2-image-wrapper"><img class="select2-image" src="${gatewayData.imageSrc}"></div>` : '' }<div class="select2-content"> <p class="select2-title">${gatewayData.title}</p><p class="select2-subtitle">${gatewayData.subtitle}</p></div></div>`
                );
            }

            $('.select2').each(function(index, element) {
                $(element).select2();
            });


            $('.select2-basic').each(function(index, element) {
                $(element).select2({
                    dropdownParent: $(element).closest('.select2-parent')
                });
            });

        })(jQuery);
    </script>


    <script>
        (function($) {
            "use strict";

            var inputElements = $('[type=text],[type=password],select,textarea');
            $.each(inputElements, function(index, element) {
                element = $(element);
                element.closest('.form-group').find('label').attr('for', element.attr('name'));
                element.attr('id', element.attr('name'))
            });

            $.each($('input:not([type=checkbox]):not([type=hidden]), select, textarea'), function(i, element) {

                if (element.hasAttribute('required')) {
                    $(element).closest('.form-group').find('label').addClass('required');
                }

            });


            $('.showFilterBtn').on('click', function() {
                $('.responsive-filter-card').slideToggle();
            });


            Array.from(document.querySelectorAll('table')).forEach(table => {
                let heading = table.querySelectorAll('thead tr th');
                Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
                    Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
                        colum.setAttribute('data-label', heading[i].innerText)
                    });
                });
            });


            let disableSubmission = false;
            $('.disableSubmission').on('submit', function(e) {
                if (disableSubmission) {
                    e.preventDefault()
                } else {
                    disableSubmission = true;
                }
            });


            $('.subscribeForm').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var url = $(this).attr('action');
                var formData = new FormData(this);
                var $submitBtn = $(this).find('[type="submit"]');
                var originalBtnHtml = $submitBtn.html();

                $.ajax({
                    url: url,
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Loading...').prop(
                            'disabled', true);
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            form[0].reset();
                            notify('success', response.message);

                        } else {
                            notify('error', response.message);
                        }
                    },
                    complete: function() {
                        $submitBtn.html(originalBtnHtml).prop('disabled', false);
                    }
                });
            });

        })(jQuery);
    </script>
</body>

</html>
<?php /**PATH /Users/andriamihaja/Desktop/langue/visercard/core/resources/views/templates/basic/layouts/app.blade.php ENDPATH**/ ?>