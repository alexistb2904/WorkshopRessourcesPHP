<?php
    include_once('config/mysql.php');
    include_once('variables.php');
    include_once('functions.php');
?>

<header>
    <nav>
        <div class="logo">
            <img src="https://workshopressources.fr/assets/img/Logo/logowr_trans_128.png" alt="Logo of WorkshopRessources" width="64">
        </div>
        <div class="nav-bar">
            <a href="<?php echo($rootUrl). 'index.php'; ?>">Accueil</a>
            <a href="<?php echo($rootUrl). 'misc/zebra.php'; ?>">Zébra</a>
            <a href="<?php echo($rootUrl). 'misc/helpreskin.php'; ?>">Aide</a>
            <div class="dropdown">
                <button class="btn-dropdown-ws">Template</button>
                <div class="dropdown-content">
                    <a href="<?php echo($rootUrl).'cars/azok30.php'; ?>">Azok30</a>
                    <a href="<?php echo($rootUrl).'cars/rytrak.php'; ?>">Rytrak</a>
                    <a href="<?php echo($rootUrl).'cars/w4nou.php'; ?>">W4nou</a>
                    <a href="<?php echo($rootUrl).'cars/itzdannio25.php'; ?>">ItzDannio25</a>
                    <a href="<?php echo($rootUrl).'cars/alexcars.php'; ?>">AlexCars</a>
                    <a href="<?php echo($rootUrl).'cars/sgm.php'; ?>">SGM</a>
                    <a href="http://svn.code.sf.net/p/tdmcarssvn/code/trunk/">TDMCars</a>
                    <a href="http://svn.code.sf.net/p/lwcarssvn/code/">LWCars</a>
                    <a href="<?php echo($rootUrl).'cars/other.php';?>">Autre</a>
                </div>
            </div>
            <?php if(isset($loggedUser) && is_admin($loggedUser['email'])) : ?>
                <a class="nav-link" href="<?php echo($rootUrl). 'admin/home.php'; ?>">Panel Administrateur</a>
            <?php elseif(!isset($loggedUser)): ?>
                <a class="nav-link" href="<?php echo($rootUrl). 'login.php'; ?>">Login</a>
            <?php else: ?>
                <a class="nav-link" href="<?php echo($rootUrl). 'user/home.php'; ?>">Panel</a>
            <?php endif; ?>
        </div>
    </nav>
</header>