<nav class="" role="navigation" style="margin-right: 5px;">
    <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo IMG_URL; ?>/img.jpg" alt=""><?php echo Yii::app()->user->username; ?>
                <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                <li><a href="javascript:;">  Profile</a></li>
                <li><a href="<?php echo HOME_URL;?>/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
</nav>
