<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Store</li>


            <!-- Optionally, you can add icons to the links -->
            <!-- Admin Links Start-->
            <?php if (Auth::user()->role->role == 'admin') { ?>

                <li class="treeview">
                    <a href="{{ url('/clients') }}">
                        <i class="fa fa-dashboard"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <li class="active"><a href="{{ url('/clients') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                    </ul>
                </li>
            <?php } ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/categories') }}"><i class="fa fa-circle-o"></i> List Categories</a></li>
                    <li><a href="{{ url('admin/categories/create') }}"><i class="fa fa-circle-o"></i> Add Category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/products?type=simple') }}"><i class="fa fa-circle-o"></i>List Products</a></li>
                    <li><a href="{{ url('admin/products/create?type=simple') }}"><i class="fa fa-circle-o"></i> Add New Product</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Products Attributes</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/attributes') }}"><i class="fa fa-circle-o"></i> List Attributes</a></li>
                    <li><a href="{{ url('admin/attributes/create') }}"><i class="fa fa-circle-o"></i> Add Attribute</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Discount Coupons</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/coupons') }}"><i class="fa fa-circle-o"></i> List Coupons</a></li>
                    <li><a href="{{ url('admin/coupons/create') }}"><i class="fa fa-circle-o"></i> Add Coupons</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Shippings</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/shipping') }}"><i class="fa fa-circle-o"></i> List Shippings</a></li>
                    <li><a href="{{ url('admin/shipping/create') }}"><i class="fa fa-circle-o"></i> Add New Shipping</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Content Blocks</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/content?type=page') }}"><i class="fa fa-circle-o"></i> Pages</a></li>
                    <li><a href="{{ url('admin/content?type=email') }}"><i class="fa fa-circle-o"></i> Emails</a></li>
                    <li><a href="{{ url('admin/content?type=block') }}"><i class="fa fa-circle-o"></i> Blocks</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Orders</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/orders') }}"><i class="fa fa-circle-o"></i> All Orders</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Newsletter</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/newsletter/list') }}"><i class="fa fa-circle-o"></i> List Subscribers</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Contact Us</span> <i class="fa fa-angle-left pull-right"></i>
                </a> 
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/contactus') }}"><i class="fa fa-circle-o"></i> All contacts</a></li>
                </ul>

            </li>

        </ul>
        <ul class="sidebar-menu">
            <li class="header">Blog</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/blog/categories') }}"><i class="fa fa-circle-o"></i> List Categories</a></li>
                    <li><a href="{{ url('admin/blog/categories/create') }}"><i class="fa fa-circle-o"></i> Add Category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/blog/posts') }}"><i class="fa fa-circle-o"></i> List Posts</a></li>
                    <li><a href="{{ url('admin/blog/posts/create') }}"><i class="fa fa-circle-o"></i> Add New Post</a></li>
                </ul>
            </li>

        </ul>

        <ul class="sidebar-menu">
            <li class="header">Customization Tool</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/item/categories') }}"><i class="fa fa-circle-o"></i> List Categories</a></li>
                    <li><a href="{{ url('admin/item/categories/create') }}"><i class="fa fa-circle-o"></i> Add Category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Items</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{ url('admin/item/posts') }}"><i class="fa fa-circle-o"></i>List Items</a></li>
                    <li><a href="{{ url('admin/item/posts/create') }}"><i class="fa fa-circle-o"></i> Add New Item</a></li>

                </ul>
            </li>
        </ul>

        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>