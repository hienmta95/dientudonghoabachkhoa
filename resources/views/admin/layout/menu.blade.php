<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            

        <?php 
            $role = Auth::user()->group->role()->get();
            $arr = []; $i = 0;
            foreach ($role as $key) {$arr[$i] = $key["id"];$i = $i+1;}
            if (count($arr) != 0) {    ?>
                <li>
                    <a href="admin/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
        <?php   }   ?>
        <?php 
            $role = Auth::user()->group->role()->get();
            $arr = []; $i = 0;
            foreach ($role as $key) {$arr[$i] = $key["id"];$i = $i+1;}
            if (in_array(2, $arr)) {    ?>
                <!-- <li>
                    <a href="admin/theloai/danhsach"><i class="fa fa-book fa-fw"></i> Thể loại</a>
                </li> -->
        <?php   }   ?>
        <?php 
            $role = Auth::user()->group->role()->get();
            $arr = []; $i = 0;
            foreach ($role as $key) {$arr[$i] = $key["id"];$i = $i+1;}
            if (in_array(3, $arr)) {    ?>
                <li>
                    <a href="admin/loaisanpham/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Loại sản phẩm</a>
                </li>
        <?php   }   ?>



                <li>
                    <a href="admin/nhomsanpham/danhsach"><i class="fa fa-cubes"></i> Nhóm sản phẩm</a>
                </li>



        <?php 
            $role = Auth::user()->group->role()->get();
            $arr = []; $i = 0;
            foreach ($role as $key) {$arr[$i] = $key["id"];$i = $i+1;}
            if (in_array(4, $arr)) {    ?>
                <li>
                    <a href="admin/sanpham/danhsach"><i class="fa fa-cube fa-fw"></i> Sản phẩm</a>
                </li>
        <?php   }   ?>
        <?php 
            $role = Auth::user()->group->role()->get();
            $arr = []; $i = 0;
            foreach ($role as $key) {$arr[$i] = $key["id"];$i = $i+1;}
            if (in_array(10, $arr)) {    ?>
                <!-- <li>
                    <a href="admin/group/danhsach"><i class="fa fa-users fa-fw"></i> Group user </a>
                </li> -->
        <?php   }   ?>
        <?php 
            $role = Auth::user()->group->role()->get();
            $arr = []; $i = 0;
            foreach ($role as $key) {$arr[$i] = $key["id"];$i = $i+1;}
            if (in_array(9, $arr)) {    ?>
                <li>
                    <a href="admin/user/danhsach"><i class="fa fa-user fa-fw"></i> User</a>
                </li>
        <?php   }   ?>
        <?php 
            $role = Auth::user()->group->role()->get();
            $arr = []; $i = 0;
            foreach ($role as $key) {$arr[$i] = $key["id"];$i = $i+1;}
            if (in_array(11, $arr)) {    ?>
                <!-- <li>
                    <a href="admin/role/danhsach"><i class="fa fa-flag fa-fw"></i> Role</a>
                </li> -->
        <?php   }   ?>
        <?php 
            $role = Auth::user()->group->role()->get();
            $arr = []; $i = 0;
            foreach ($role as $key) {$arr[$i] = $key["id"];$i = $i+1;}
            if (in_array(1, $arr)) {    ?>
                <li>
                    <a href="admin/slide/danhsach"><i class="fa fa-picture-o fa-fw"></i> Slide</a>
                </li>
        <?php   }   ?>
            

                <li>
                    <a href="admin/lienhe/danhsach"><i class="fa fa-book fa-fw"></i> Liên hệ</a>
                </li>
                <li>
                    <a href="admin/trangcon/danhsach"><i class="fa fa-flag fa-fw"></i> Trang con</a>
                </li>

            
            
            
            
            
            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>