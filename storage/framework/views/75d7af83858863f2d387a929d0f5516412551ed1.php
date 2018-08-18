<?php $__env->startSection('mainContent'); ?>
<!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <ul class="breadcrumb-list">
                                    <li><a href="/">Home</a></li>
                                    <li>Login</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <div id="jasco-account">
                            <div class="registered-customers">
                                <h6 class="widget-title border-left mb-50">LOGIN</h6>
                                <form action="/myaccount/login" method="POST">
                                    <?php echo e(csrf_field()); ?>           
                                    <div class="login-account p-30 box-shadow">
                                        <p>Please log in with your Jasco email account.</p>
                                        <input type="text" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email Address">
                                        <input type="password" name="userPassword" placeholder="Password">
                                        <?php if(request()->forCheckOut): ?>
                                        <input type="hidden" name="forCheckOut" value="true">
                                        <?php endif; ?>
                                        <button class="submit-btn-1 btn-hover-1" type="submit">login</button>
                                    </div>
                                </form>
                            </div>
                            <br>

                          <span> No Jasco team member Account? <a id="guest-show" href="#">Click Here </a></span>
                        </div>
                        </div>
                        <div id="guest-account">
                         <div class="col-md-6">
                            <div class="registered-customers">
                                <h6 class="widget-title border-left">GUEST LOGIN</h6>
                                <span class="small-alert">&ast;Guest Login only available for team members without a Jasco login credential. </span>

                                <form action="/myaccount/guest/login" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="login-account p-30 box-shadow">
                                        <p>Login as Guest With Temporary Account.</p>
                                        <input type="text" name="name" placeholder="Name">
                                        <input type="text" name="email" placeholder="Email Address">
                                        <?php if(request()->forCheckOut): ?>
                                        <input type="hidden" name="forCheckOut" value="true">
                                        <?php endif; ?>
                                        <button class="submit-btn-1 btn-hover-1" type="submit">login</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->             

        </div>
        <!-- End page content -->
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subas.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>