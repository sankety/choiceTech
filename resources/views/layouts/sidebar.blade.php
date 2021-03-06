<?php
/**
 * Created by PhpStorm.
 * User: Sanket
 * Date: 29-04-2017
 * Time: 21:02
 */
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>--}}
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @if(Auth::user()->user_type==1)
            <li class="active treeview">
                <a href="{{url('product')}}">
                    <i class="fa fa-shopping-cart"></i> <span>Product List</span>
                </a>
            </li>
                <li class="active treeview">
                <a href="{{url('orders')}}">
                    <i class="fa fa-bars"></i> <span>Orders</span>
                </a>
            </li>
             @endif
            </ul>
    </section>
    <!-- /.sidebar -->
</aside>

