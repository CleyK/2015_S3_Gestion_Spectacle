<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1> <a href="<?php echo BASE_URL?>index.php/Spectacle/index">Projet PhP</a></h1>
        </li>
        <li class="toggle-topbar menu-icon">
            <a href="<?php echo BASE_URL?>index.php/Spectacle/afficherTousSpectacles"><span>Menu</span></a>
        </li>
    </ul>
    <section class="top-bar-section">
        <ul class="left">
            <li class="divider"></li>
            <li class="active"><a href="<?php echo BASE_URL?>index.php/Spectacle/afficherTousSpectacles">Liste</a></li>
            <li class="divider"></li>
            <li class="has-dropdown"><a href="">produit</a>
                <ul class="dropdown">
                    <li><a href="<?php echo BASE_URL?>index.php/Spectacle/ajouterSpectacle">Ajouter un spectacle</a></li>
                    <li><a class="SousMenu" href="<?php echo BASE_URL?>index.php/Spectacle/afficherTousSpectacles">Gérer les spectacles</a></li>
                </ul>
            </li>
        </ul>
        <ul class="right">

            <li><a href="<?php echo BASE_URL?>index.php/Session/connexionSession">se connecter</a></li>
        </ul>
    </section>
</nav>
