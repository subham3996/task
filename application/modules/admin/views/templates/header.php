<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
   
    <meta http-equiv="X-UA-Compatible" content="" />
    <title>Admin</title>
    <meta content='' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
        <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/material.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/dataTables.material.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>assets/admin/css/turbo.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url();?>assets/admin/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="<?php echo base_url();?>assets/admin/css/material-design-iconic-font.min.css" rel="stylesheet">

    <?php if(isset($toggle_element)) { ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            sidebarCollapse();
        }, false);

        function sidebarCollapse(){
            var element = document.getElementById("<?php echo 'toggle_' . $toggle_element; ?>");
            element.click();
        }
    </script>
    <?php } ?>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <a href="<?php echo base_url('admin'); ?>" class="simple-text">                     
                    <img src="<?php echo base_url()?>assets/admin/images/logo.png" style="height: 42px; margin: 5px;">
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    T
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li <?php if($section == 'dashboard') { ?> class="active" <?php } ?>>
                        <a href="<?php echo base_url('admin');?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                   
                    <li <?php if($section == 'user') { ?> class="active" <?php } ?>>
                        <a data-toggle="collapse" id="toggle_user" href="#sub_user" class="collapsed" aria-expanded="false">
                            <i class="material-icons">group</i>
                            <p>Users <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="sub_user" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li <?php if($type == 'list') { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url('admin/user')?>"> All Users</a>
                                </li>
                                <li <?php if($type == 'create') { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url('admin/user/create')?>">Add New</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-absolute" data-topbar-color="red">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular f-26">keyboard_arrow_left</i>
                            <i class="material-icons visible-on-sidebar-mini f-26">keyboard_arrow_right</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>                                    
                                    
                                   <p class="hidden-lg hidden-md">Profile
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">                                    
                                    <li>
                                        <a href="<?php echo base_url('admin/logout'); ?>">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>