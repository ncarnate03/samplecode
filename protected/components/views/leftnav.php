<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <?php foreach (Yii::app()->getModule(Yii::app()->controller->module->id)->menu as $key => $m): ?>
                 <?php $is_active = ($key == Yii::app()->controller->id ? "nv active" : "")?>
            <li class="<?php echo $is_active; ?>"><a href="<?php echo $m['url']; ?>"><i class="fa <?php echo $m['icon_class'] ?>"></i> <?php echo $m['title']; ?> </a></li>
            <?php endforeach; ?>
            
            
            
        </ul>
    </div>
</div>