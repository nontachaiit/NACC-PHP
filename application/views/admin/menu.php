<!-- start: SIDEBAR -->
<div class="main-navigation navbar-collapse collapse">
        <!-- start: MAIN MENU TOGGLER BUTTON -->
        <div class="navigation-toggler">
                <i class="clip-chevron-left"></i>
                <i class="clip-chevron-right"></i>
        </div>
        <!-- end: MAIN MENU TOGGLER BUTTON -->
        <!-- start: MAIN NAVIGATION MENU -->
        
        <img style="width: 100%; padding: 0px 50px 30px;" src="<?php echo image_asset_url ( "admin/logo.gif"); ?>" />
        <ul class="main-navigation-menu">
                <li <?php echo isset($menu_home)? 'class="active open"': ""; ?>>
                        <a href="<?php echo site_url( "office/home" ); ?>"><i class="clip-home-3"></i>
                                <span class="title"> รายงานผล </span><span class="selected"></span>
                        </a>
                </li>
                
                
                <?php
                foreach ( $allSections as $eachSection ) :
                        $menu_section_name = "menu_" . $eachSection->alias;
                ?>
                <li <?php echo isset($$menu_section_name)? 'class="active open"': ""; ?>>
                        <a href="javascript:void(0)"><i class="clip-pencil"></i>
                                <span class="title"> <?php echo $eachSection->name; ?> </span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">
                                <?php
                                $menu_content_law_name = "menu_content_" . $eachSection->alias;
                                $menu_examination_law_name = "menu_exam_" . $eachSection->alias;
                                ?>
                                <li <?php echo isset($$menu_content_law_name)? 'class="active open"': ""; ?>>
                                        <a href="<?php echo site_url( "office/content/manage/" . $eachSection->alias ); ?>">
                                                <span class="title"> จัดการเนื้อหา </span>
                                                <span class="badge badge-new">content</span>
                                        </a>
                                </li>
                                <li <?php echo isset($$menu_examination_law_name)? 'class="active open"': ""; ?>>
                                        <a href="<?php echo site_url( "office/examination/manage/" . $eachSection->alias ); ?>">
                                                <span class="title"> จัดการแบบทดสอบ </span>
                                                <span class="badge badge-warning">exam</span>
                                        </a>
                                </li>
                        </ul>
                </li>
                <?php
                endforeach;
                ?>
                
                <li <?php echo isset($menu_news)? 'class="active open"': ""; ?>>
                        <a href="<?php echo site_url( "office/member" ); ?>"><i class="clip-map"></i>
                                <span class="title"> ข่าวสารอัพเดท </span>
                        </a>
                </li>
                
                <li <?php echo isset($menu_member)? 'class="active open"': ""; ?>>
                        <a href="<?php echo site_url( "office/member" ); ?>"><i class="clip-user"></i>
                                <span class="title"> สมาชิก </span>
                        </a>
                </li>
                
                

        </ul>
        <!-- end: MAIN NAVIGATION MENU -->
</div>
<!-- end: SIDEBAR -->