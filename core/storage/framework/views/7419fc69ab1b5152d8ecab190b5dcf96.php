<div class="dashboard-header">
    <div class="dashboard-header__inner flex-between align-items-center">
        <div class="dashboard-header__left d-lg-block d-none">
            <h5 class="title"><?php echo app('translator')->get('Hey'); ?> <?php echo e(auth()->user()->fullname); ?>!</h5>
            <small><?php echo app('translator')->get('Welcome to your dashboard'); ?></small>
        </div>

        <div class="dashboard-body__bar d-lg-none d-block">
            <span class="dashboard-body__bar-icon"><i class="fas fa-bars"></i></span>
        </div>

        <div class="user-info">
            <div class="user-info__right">
                <div class="user-info__button">
                    <div class="user-info__thumb">
                        <img id="profilePreview"
                            src="<?php echo e(getImage(getFilePath('userProfile') . '/' . auth()->user()->image, getFileSize('userProfile'))); ?>"
                            alt="<?php echo app('translator')->get('Profile Image'); ?>">
                    </div>
                    <div class="user-info__profile">
                        <p class="user-info__name"><?php echo e(auth()->user()->fullname); ?></p>
                        <span class="user-info__desc">
                            <?php echo e(showAmount(auth()->user()->balance)); ?>

                        </span>
                    </div>
                </div>
            </div>
            <ul class="user-info-dropdown">
                <li class="user-info-dropdown__item">
                    <a class="user-info-dropdown__link" href="<?php echo e(route('user.profile.setting')); ?>">
                        <span class="icon me-2"><i class="far fa-user-circle"></i></span>
                        <span class="text"><?php echo app('translator')->get('My Profile'); ?></span>
                    </a>
                </li>
                <li class="user-info-dropdown__item">
                    <a class="user-info-dropdown__link" href="<?php echo e(route('user.twofactor')); ?>">
                        <span class="icon me-2"><i class="fa fa-shield-alt"></i></span>
                        <span class="text"><?php echo app('translator')->get('2FA'); ?></span>
                    </a>
                </li>
                <li class="user-info-dropdown__item">
                    <a class="user-info-dropdown__link" href="<?php echo e(route('user.logout')); ?>">
                        <span class="icon me-2"><i class="fa fa-sign-out-alt"></i></span>
                        <span class="text"><?php echo app('translator')->get('Logout'); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /Users/andriamihaja/Desktop/langue/visercard/core/resources/views/templates/basic/partials/topbar.blade.php ENDPATH**/ ?>