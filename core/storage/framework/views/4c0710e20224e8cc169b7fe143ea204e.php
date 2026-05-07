<div class="sidebar-menu">
    <div class="sidebar-menu__inner">
        <span class="sidebar-menu__close d-lg-none d-block"><i class="fas fa-times"></i></span>
        <div class="sidebar-logo">
            <a href="<?php echo e(route('user.home')); ?>" class="sidebar-logo__link">
                <img src="<?php echo e(siteLogo('dark')); ?>" alt="<?php echo app('translator')->get('logo'); ?>" />
            </a>
        </div>

        <ul class="sidebar-menu-list">
            <li class="sidebar-menu-list__item <?php echo e(menuActive('user.home')); ?>">
                <a href="<?php echo e(route('user.home')); ?>" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-border-all"></i></span>
                    <span class="text"><?php echo app('translator')->get('Dashboard'); ?></span>
                </a>
            </li>

            <li class="sidebar-menu-list__item <?php echo e(menuActive('user.card.*')); ?>">
                <a href="<?php echo e(route('user.card.index')); ?>" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-credit-card"></i></span>
                    <span class="text"><?php echo app('translator')->get('Cards'); ?></span>
                </a>
            </li>

            <!---->
            <!--<li class="sidebar-menu-list__item <?php echo e(menuActive('user.card.checker')); ?>">-->
            <!--    <a href="<?php echo e(route('user.card.checker')); ?>" class="sidebar-menu-list__link">-->
            <!--        <span class="icon"><i class="las la-search"></i></span>-->
            <!--        <span class="text"> <?php echo app('translator')->get('Card Checker'); ?></span>-->
            <!--    </a>-->
            <!--</li>-->

            <li class="sidebar-menu-list__item <?php echo e(menuActive('user.topup.*')); ?>">
                <a href="<?php echo e(route('user.topup.index')); ?>" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-money-bill"></i></span>
                    <span class="text"><?php echo app('translator')->get('Topup'); ?></span>
                </a>
            </li>

            <li class="sidebar-menu-list__item <?php echo e(menuActive('user.developer.*')); ?>">
                <a href="<?php echo e(route('user.developer.index')); ?>" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-code"></i></span>
                    <span class="text">Developer</span>
                </a>
            </li>

            <li
                class="sidebar-menu-list__item <?php echo e(menuActive('user.deposit.*')); ?> <?php echo e(menuActive('user.deposit.*', class: 'open')); ?>">
                <a href="#" class="sidebar-menu-list__link sidebar-menu-toggle">
                    <span class="icon">
                        <i class="las la-credit-card"></i>
                    </span>
                    <p class="d-flex align-items-center justify-content-between w-100">
                        <span class="text"><?php echo app('translator')->get('Deposit'); ?></span>
                        <span class="icon dropdown-icon"><i class="las la-angle-down"></i></span>
                    </p>
                </a>

                <ul class="sidebar-menu-list__sub-menu">
                    <li class="sidebar-menu-list__sub-menu-item <?php echo e(menuActive('user.deposit.history')); ?>">
                        <a href="<?php echo e(route('user.deposit.history')); ?>" class="sidebar-menu-list__sub-menu-link">
                            <span class="text"><?php echo app('translator')->get('Deposit History'); ?></span>
                        </a>
                    </li>
                    <li class="sidebar-menu-list__sub-menu-item <?php echo e(menuActive('user.deposit.index')); ?>">
                        <a href="<?php echo e(route('user.deposit.index')); ?>" class="sidebar-menu-list__sub-menu-link">
                            <span class="text"><?php echo app('translator')->get('New Deposit'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-list__item <?php echo e(menuActive('user.transactions')); ?>">
                <a href="<?php echo e(route('user.transactions')); ?>" class="sidebar-menu-list__link">
                    <span class="icon">
                        <i class="las la-file-invoice"></i>
                    </span>
                    <span class="text"><?php echo app('translator')->get('Transactions'); ?></span>
                </a>
            </li>
            <li class="sidebar-menu-list__item <?php echo e(menuActive('user.profile.setting')); ?>">
                <a href="<?php echo e(route('user.profile.setting')); ?>" class="sidebar-menu-list__link">
                    <span class="icon"> <i class="las la-cog"></i> </span>
                    <span class="text"> <?php echo app('translator')->get('Settings'); ?> </span>
                </a>
            </li>
            <li class="sidebar-menu-list__item <?php echo e(menuActive('ticket.*')); ?>">
                <a href="<?php echo e(route('ticket.index')); ?>" class="sidebar-menu-list__link">
                    <span class="icon">
                        <i class="las la-question-circle"></i>
                    </span>
                    <span class="text"><?php echo app('translator')->get('Support'); ?></span>
                </a>
            </li>
        </ul>
    </div>
</div><?php /**PATH /Users/andriamihaja/Desktop/langue/visercard/core/resources/views/templates/basic/partials/sidebar.blade.php ENDPATH**/ ?>