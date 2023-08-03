<?php
    include_once('config/mysql.php');
    include_once('variables.php');
    include_once('functions.php');
?>

<header>
    <nav>
		<div class="nav-flex">
			<div class="logo">
				<img src="https://workshopressources.fr/assets/img/Logo/logowr_trans_128.png" alt="Logo of WorkshopRessources" width="64">
			</div>
			<div class="navs">
				<div class="nav-burger">
					<div class="burger-icon" onclick="toggleMenu()">
						<div class="line"></div>
						<div class="line"></div>
						<div class="line"></div>
					</div>
				</div>
				<div class="nav-bar">
					<a href="<?php echo($GLOBALS['rooturl']). 'index.php'; ?>">Accueil</a>
					<a href="<?php echo($GLOBALS['rooturl']). 'misc/zebra.php'; ?>">Zébra</a>
					<a href="<?php echo($GLOBALS['rooturl']). 'misc/decals.php'; ?>">Decals</a>
					<a href="<?php echo($GLOBALS['rooturl']). 'misc/helpreskin.php'; ?>">Aide</a>
					<div class="dropdown">
						<button class="btn-dropdown-ws">Template</button>
						<div class="dropdown-content">
							<a href="<?php echo($GLOBALS['rooturl']).'cars/azok30.php'; ?>">Azok30</a>
							<a href="<?php echo($GLOBALS['rooturl']).'cars/rytrak.php'; ?>">Rytrak</a>
							<a href="<?php echo($GLOBALS['rooturl']).'cars/w4nou.php'; ?>">W4nou</a>
							<a href="<?php echo($GLOBALS['rooturl']).'cars/itzdannio25.php'; ?>">ItzDannio25</a>
							<a href="<?php echo($GLOBALS['rooturl']).'cars/alexcars.php'; ?>">AlexCars</a>
							<a href="<?php echo($GLOBALS['rooturl']).'cars/sgm.php'; ?>">SGM</a>
							<a href="http://svn.code.sf.net/p/tdmcarssvn/code/trunk/">TDMCars</a>
							<a href="http://svn.code.sf.net/p/lwcarssvn/code/">LWCars</a>
							<a href="<?php echo($GLOBALS['rooturl']).'cars/other.php';?>">Autre</a>
						</div>
					</div>
					<?php if(isset($loggedUser) && is_admin($loggedUser['email'])) : ?>
						<a class="nav-link" href="<?php echo($GLOBALS['rooturl']). 'admin/home.php'; ?>">Panel Admin</a>
					<?php elseif(!isset($loggedUser)): ?>
						<a class="nav-link" href="<?php echo($GLOBALS['rooturl']). 'login.php'; ?>">Login</a>
					<?php else: ?>
						<a class="nav-link" href="<?php echo($GLOBALS['rooturl']). 'user/home.php'; ?>">Panel</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="menu-items">
			<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']). 'index.php'; ?>">Accueil</a>
			<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']). 'misc/zebra.php'; ?>">Zébra</a>
			<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']). 'misc/decals.php'; ?>">Decals</a>
			<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']). 'misc/helpreskin.php'; ?>">Aide</a>
			<div class="dropdown">
				<button class="btn-dropdown-ws">Template</button>
				<div class="dropdown-content">
					<div>
					<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']).'cars/azok30.php'; ?>">Azok30</a>
					<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']).'cars/rytrak.php'; ?>">Rytrak</a>
					<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']).'cars/w4nou.php'; ?>">W4nou</a>
					</div>
					<div>
					<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']).'cars/itzdannio25.php'; ?>">ItzDannio25</a>
					<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']).'cars/alexcars.php'; ?>">AlexCars</a>
					<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']).'cars/sgm.php'; ?>">SGM</a>
					</div>
					<div>
					<a class="menu-items-a" href="http://svn.code.sf.net/p/tdmcarssvn/code/trunk/">TDMCars</a>
					<a class="menu-items-a" href="http://svn.code.sf.net/p/lwcarssvn/code/">LWCars</a>
					<a class="menu-items-a" href="<?php echo($GLOBALS['rooturl']).'cars/other.php';?>">Autre</a>
					</div>
				</div>
			</div>
            <?php if(isset($loggedUser) && is_admin($loggedUser['email'])) : ?>
				<a class="nav-link menu-items-a" href="<?php echo($GLOBALS['rooturl']). 'admin/home.php'; ?>">Panel Admin</a>
            <?php elseif(!isset($loggedUser)): ?>
				<a class="nav-link menu-items-a" href="<?php echo($GLOBALS['rooturl']). 'login.php'; ?>">Login</a>
            <?php else: ?>
				<a class="nav-link menu-items-a" href="<?php echo($GLOBALS['rooturl']). 'user/home.php'; ?>">Panel</a>
            <?php endif; ?>
		</div>
    </nav>
</header>
<script src="<?php echo($GLOBALS['rooturl']). 'assets/js/script.js'; ?>"></script>