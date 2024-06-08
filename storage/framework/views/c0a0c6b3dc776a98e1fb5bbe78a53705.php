<?php echo $__env->make('Chatify::layouts.headLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $setting = \App\Models\Utility::colorset();
    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';
    if (isset($setting['color_flag']) && $setting['color_flag'] == 'true') {
        $color = 'custom-color';
    } else {
        $color = $color;
    }

?>

<?php $__env->startSection('page-title', __('Messenger')); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Messenger')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-xl-12">
        <div class="card mt-4">
            <div class="card-body">
                <div class="messenger min-h-750 overflow-hidden " style="border: 1px solid #eee; border-right: 0;">
                    
                    <div class="messenger-listView">
                        
                        <div class="m-header">
                            <nav>
                                <nav class="m-header-right">
                                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                                </nav>
                            </nav>
                            
                            <input type="text" class="messenger-search" placeholder="Search" />
                            
                            <div class="messenger-listView-tabs"> <a href="#"
                                    <?php if($route == 'user'): ?> class="active-tab" <?php endif; ?> data-view="users"> <span
                                        class="far fa-clock"></span></a> <a href="#"
                                    <?php if($route == 'group'): ?> class="active-tab" <?php endif; ?> data-view="groups"> <span
                                        class="fas fa-users"></span>
                                </a> </div>
                        </div>
                        
                        <div class="m-body">
                            
                            
                            <div class="<?php if($route == 'user'): ?> show <?php endif; ?> messenger-tab app-scroll mt-2"
                                data-view="users">

                                
                                <div class="favorites-section mt-2">
                                    <p class="messenger-title"><?php echo e(__('Favorites')); ?></p>
                                    <div class="messenger-favorites app-scroll-thin"></div>
                                </div>

                                
                                <?php echo view('Chatify::layouts.listItem', ['get' => 'saved', 'id' => $id])->render(); ?>


                                
                                <div class="listOfContacts"
                                    style="width: 100%;height: calc(100% - 200px);position: relative;"></div>


                            </div>

                            

                            <div class="all_members <?php if($route == 'group'): ?> show <?php endif; ?> messenger-tab app-scroll mt-2"
                                data-view="groups">
                                
                                <p style="text-align: center;color:grey;" class="mt-5">
                                    <?php echo e(__('Soon will be available')); ?></p>
                            </div>
                            
                            <div class=" messenger-tab app-scroll mt-2" data-view="search">
                                
                                <p class="messenger-title">Search</p>
                                <div class="search-records">
                                    <p class="message-hint center-el"><span>Type to search..</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="messenger-messagingView">
                        
                        <div class="m-header m-header-messaging">
                            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                
                                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                    <div class="avatar av-s header-avatar"
                                        style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                    </div>
                                    <a href="#" class="user-name"><?php echo e(config('chatify.name')); ?></a>
                                </div>
                                
                                <nav class="m-header-right">
                                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                    
                                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                                </nav>
                            </nav>
                            
                            <div class="internet-connection">
                                <span class="ic-connected"><?php echo e(__('Connected')); ?></span>
                                <span class="ic-connecting"><?php echo e(__('Connecting...')); ?></span>
                                <span
                                    class="ic-noInternet"><?php echo e(__('Please add pusher settings for using messenger')); ?></span>
                            </div>
                        </div>

                        
                        <div class="m-body messages-container app-scroll">
                            <div class="messages">
                                <p class="message-hint center-el"><span>Please select a chat to start messaging</span>
                                </p>
                            </div>
                            
                            <div class="typing-indicator">
                                <div class="message-card typing">
                                    <div class="message">
                                        <span class="typing-dots">
                                            <span class="dot dot-1"></span>
                                            <span class="dot dot-2"></span>
                                            <span class="dot dot-3"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <?php echo $__env->make('Chatify::layouts.sendForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    
                    <div class="messenger-infoView app-scroll">
                        
                        <nav>
                            <p>User Details</p>
                            <a href="#"><i class="fas fa-times"></i></a>
                        </nav>
                        <?php echo view('Chatify::layouts.info')->render(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Chatify::layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($color == 'theme-1'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #0CAF60 3.46%, #0CAF60 99.86%), #0CAF60 !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #0CAF60 3.46%, #0CAF60 99.86%), #0CAF60 !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #0CAF60 !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #0CAF60 3.46%, #0CAF60 99.86%), #0CAF60 !important;
        }

        .m-header svg {
            color: #0CAF60 !important;
        }

        .active-tab {
            border-bottom: 2px solid #0CAF60 !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #0CAF60 3.46%, #0CAF60 99.86%), #0CAF60 !important;
        }

        .lastMessageIndicator {
            color: #0CAF60 !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #0CAF60 !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #0CAF60 !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-2'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #584ED2 3.46%, #584ED2 99.86%), #584ED2 !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #584ED2 3.46%, #584ED2 99.86%), #584ED2 !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #584ED2 !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #584ED2 3.46%, #584ED2 99.86%), #584ED2 !important;
        }

        .m-header svg {
            color: #584ED2 !important;
        }

        .active-tab {
            border-bottom: 2px solid #584ED2 !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #584ED2 3.46%, #584ED2 99.86%), #584ED2 !important;
        }

        .lastMessageIndicator {
            color: #584ED2 !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #584ED2 !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #584ED2 !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-3'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #6fd943 3.46%, #6fd943 99.86%), #6fd943 !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #6fd943 3.46%, #6fd943 99.86%), #6fd943 !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #6fd943 !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #6fd943 3.46%, #6fd943 99.86%), #6fd943 !important;
        }

        .m-header svg {
            color: #6fd943 !important;
        }

        .active-tab {
            border-bottom: 2px solid #6fd943 !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #6fd943 3.46%, #6fd943 99.86%), #6fd943 !important;
        }

        .lastMessageIndicator {
            color: #6fd943 !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #6fd943 !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #6fd943 !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-4'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #145388 3.46%, #145388 99.86%), #145388 !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #145388 3.46%, #145388 99.86%), #145388 !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #145388 !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #145388 3.46%, #145388 99.86%), #145388 !important;
        }

        .m-header svg {
            color: #145388 !important;
        }

        .active-tab {
            border-bottom: 2px solid #145388 !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #145388 3.46%, #145388 99.86%), #145388 !important;
        }

        .lastMessageIndicator {
            color: #145388 !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #145388 !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #145388 !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-5'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #B9406B 3.46%, #B9406B 99.86%), #B9406B !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #B9406B 3.46%, #B9406B 99.86%), #B9406B !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #B9406B !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #B9406B 3.46%, #B9406B 99.86%), #B9406B !important;
        }

        .m-header svg {
            color: #B9406B !important;
        }

        .active-tab {
            border-bottom: 2px solid #B9406B !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #B9406B 3.46%, #B9406B 99.86%), #B9406B !important;
        }

        .lastMessageIndicator {
            color: #B9406B !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #B9406B !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #B9406B !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-6'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #008ECC 3.46%, #008ECC 99.86%), #008ECC !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #008ECC 3.46%, #008ECC 99.86%), #008ECC !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #008ECC !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #008ECC 3.46%, #008ECC 99.86%), #008ECC !important;
        }

        .m-header svg {
            color: #008ECC !important;
        }

        .active-tab {
            border-bottom: 2px solid #008ECC !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #008ECC 3.46%, #008ECC 99.86%), #008ECC !important;
        }

        .lastMessageIndicator {
            color: #008ECC !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #008ECC !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #008ECC !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-7'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #922C88 3.46%, #922C88 99.86%), #922C88 !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #922C88 3.46%, #922C88 99.86%), #922C88 !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #922C88 !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #922C88 3.46%, #922C88 99.86%), #922C88 !important;
        }

        .m-header svg {
            color: #922C88 !important;
        }

        .active-tab {
            border-bottom: 2px solid #922C88 !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #922C88 3.46%, #922C88 99.86%), #922C88 !important;
        }

        .lastMessageIndicator {
            color: #922C88 !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #922C88 !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #922C88 !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-8'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #C0A145 3.46%, #C0A145 99.86%), #C0A145 !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #C0A145 3.46%, #C0A145 99.86%), #C0A145 !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #C0A145 !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #C0A145 3.46%, #C0A145 99.86%), #C0A145 !important;
        }

        .m-header svg {
            color: #C0A145 !important;
        }

        .active-tab {
            border-bottom: 2px solid #C0A145 !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #C0A145 3.46%, #C0A145 99.86%), #C0A145 !important;
        }

        .lastMessageIndicator {
            color: #C0A145 !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #C0A145 !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #C0A145 !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-9'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #48494B 3.46%, #48494B 99.86%), #48494B !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #48494B 3.46%, #48494B 99.86%), #48494B !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #48494B !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #48494B 3.46%, #48494B 99.86%), #48494B !important;
        }

        .m-header svg {
            color: #48494B !important;
        }

        .active-tab {
            border-bottom: 2px solid #48494B !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #48494B 3.46%, #48494B 99.86%), #48494B !important;
        }

        .lastMessageIndicator {
            color: #48494B !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #48494B !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #48494B !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'theme-10'): ?>
    <style type="text/css">
        .m-list-active,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, #0C7785 3.46%, #0C7785 99.86%), #0C7785 !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, #0C7785 3.46%, #0C7785 99.86%), #0C7785 !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px #0C7785 !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, #0C7785 3.46%, #0C7785 99.86%), #0C7785 !important;
        }

        .m-header svg {
            color: #0C7785 !important;
        }

        .active-tab {
            border-bottom: 2px solid #0C7785 !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, #0C7785 3.46%, #0C7785 99.86%), #0C7785 !important;
        }

        .lastMessageIndicator {
            color: #0C7785 !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: #0C7785 !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: #0C7785 !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>

<?php if($color == 'custom-color'): ?>
    <style type="text/css">
        .m-list-active,
        .messenger-list-item:hover,
        .m-list-active:hover,
        .m-list-active:focus {
            background: linear-gradient(141.55deg, var(--color-customColor) 3.46%, var(--color-customColor) 99.86%), var(--color-customColor) !important;
        }

        .mc-sender p {
            background: linear-gradient(141.55deg, var(--color-customColor) 3.46%, var(--color-customColor) 99.86%), var(--color-customColor) !important;
        }

        .messenger-favorites div.avatar {
            box-shadow: 0px 0px 0px 2px var(--color-customColor) !important;
        }

        .messenger-listView-tabs a,
        .messenger-listView-tabs a:hover,
        .messenger-listView-tabs a:focus {
            color: linear-gradient(141.55deg, var(--color-customColor) 3.46%, var(--color-customColor) 99.86%), var(--color-customColor) !important;
        }

        .m-header svg {
            color: var(--color-customColor) !important;
        }

        .active-tab {
            border-bottom: 2px solid var(--color-customColor) !important;
        }

        .messenger-infoView nav a {

            color: linear-gradient(141.55deg, var(--color-customColor) 3.46%, var(--color-customColor) 99.86%), var(--color-customColor) !important;
        }

        .lastMessageIndicator {
            color: var(--color-customColor) !important;
        }

        .messenger-list-item td span .lastMessageIndicator {

            color: var(--color-customColor) !important;
            font-weight: bold;
        }

        .messenger-sendCard button svg {
            color: var(--color-customColor) !important;
        }

        .messenger-list-item.m-list-active td span .lastMessageIndicator {
            color: #fff !important;
        }
    </style>
<?php endif; ?>
<?php $__env->startPush('custom-script'); ?>
    <?php echo $__env->make('Chatify::layouts.footerLinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/vendor/Chatify/pages/app.blade.php ENDPATH**/ ?>