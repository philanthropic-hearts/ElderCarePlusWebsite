<?php
/*
 Template Name: main page
 Template Post Type: post, page
*/
?>
<?php get_header(); ?>

<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
    <div class="container-fluid">
        <img class="rounded-circle img-fluid bg-dark border shadow-lg d-lg-flex" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/Eldercare.png" width="100" height="50">
        <a class="navbar-brand logo" href="#" style="font-family: Baloo, cursive;font-size: 44px;"><?php _e( '&nbsp; Elder Care +', 'ecp' ); ?></a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav">
            <span class="sr-only"><?php _e( 'Toggle navigation', 'ecp' ); ?></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="index.html"><?php _e( 'Home', 'ecp' ); ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="projects-grid-cards.html"><?php _e( 'Projects', 'ecp' ); ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="cv.html"><?php _e( 'CV', 'ecp' ); ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="hire-me.html"><?php _e( 'Hire me', 'ecp' ); ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main class="page lanidng-page">
    <section class="portfolio-block block-intro">
        <div class="container">
            <div class="avatar" style="background-image:url("<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/avatars/avatar.jpg");"></div>
            <div class="about-me">
                <p><?php _e( 'Hello! I am', 'ecp' ); ?> <strong><?php _e( 'John Smith', 'ecp' ); ?></strong><?php _e( '. I work as interface and front end developer. I have passion for pixel perfect, minimal and easy to use interfaces.', 'ecp' ); ?></p>
                <a class="btn btn-outline-primary" role="button" href="#"><?php _e( 'Hire me', 'ecp' ); ?></a>
            </div>
        </div>
    </section>
    <section class="portfolio-block photography">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a href="#"><img class="img-fluid image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/nature/image5.jpg"></a>
                </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a href="#"><img class="img-fluid image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/nature/image2.jpg"></a>
                </div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a href="#"><img class="img-fluid image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/tech/image4.jpg"></a>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio-block call-to-action border-bottom">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center content">
                <h3><?php _e( 'Like what you see?', 'ecp' ); ?></h3>
                <button class="btn btn-outline-primary btn-lg" type="button">
                    <?php _e( 'Hire me', 'ecp' ); ?>
                </button>
            </div>
        </div>
    </section>
    <section class="portfolio-block skills">
        <div class="container">
            <div class="heading">
                <h2><?php _e( 'Special Skills', 'ecp' ); ?></h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <div class="card-header bg-transparent border-0">
                            <i class="icon ion-ios-star-outline"></i>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?php _e( 'Web Design', 'ecp' ); ?></h3>
                            <p class="card-text"><?php _e( 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.', 'ecp' ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <div class="card-header bg-transparent border-0">
                            <i class="icon ion-ios-lightbulb-outline"></i>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?php _e( 'Interface Design', 'ecp' ); ?></h3>
                            <p class="card-text"><?php _e( 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.', 'ecp' ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <div class="card-header bg-transparent border-0">
                            <i class="icon ion-ios-gear-outline"></i>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?php _e( 'Photography and Print', 'ecp' ); ?></h3>
                            <p class="card-text"><?php _e( 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.', 'ecp' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<section class="portfolio-block website gradient">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-5 offset-lg-1 text">
                <h3><?php _e( 'Website Project', 'ecp' ); ?></h3>
                <p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget velit ultricies, feugiat est sed, efr nunc, vivamus vel accumsan dui. Quisque ac dolor cursus, volutpat nisl vel, porttitor eros.', 'ecp' ); ?></p>
            </div>
            <div class="col-md-12 col-lg-5">
                <div class="portfolio-laptop-mockup">
                    <div class="screen">
                        <div class="screen-content" style="background-image:url("<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/tech/image6.png");"></div>
                    </div>
                    <div class="keyboard"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="page-footer">
    <div class="container">
        <div class="links">
            <a href="#"><?php _e( 'About me', 'ecp' ); ?></a>
            <a href="#"><?php _e( 'Contact me', 'ecp' ); ?></a>
            <a href="#"><?php _e( 'Projects', 'ecp' ); ?></a>
        </div>
        <div class="social-icons">
            <a href="#"><i class="icon ion-social-facebook"></i></a>
            <a href="#"><i class="icon ion-social-instagram-outline"></i></a>
            <a href="#"><i class="icon ion-social-twitter"></i></a>
        </div>
    </div>
</footer>        

<?php get_footer(); ?>