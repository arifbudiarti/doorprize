<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="<?= base_url(); ?>/public/assets/img/logo/logo.png" width="75px" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">IHC PT Nusantara Sebelas Medika</span>
                        <span class="text-muted text-xs block">Administrator <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="<?= site_url('Apps'); ?>"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
            </li>
            <li>
                <a href="<?= site_url('Settings'); ?>"><i class="fa fa-cog"></i> <span class="nav-label">Setting</span></a>
            </li>
        </ul>

    </div>
</nav>