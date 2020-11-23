<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="page-bg">
    <?php require APPROOT . '/views/inc/nav.php'; ?>

    <div class="thank-you-container">
        <img src="<?= URLROOT; ?>/public/img/ic_success.png" class='prize'>

        <h2>Thanks for subscribing!</h2>
        <p>You have successfully subscribed to our email listing. Check your email for the discount code.</p>

        <div class="social">
            <a href="#" class="facebook-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="instagram-link"><i class="fab fa-instagram"></i></a>
            <a href="#" class="twitter-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="youtube-link"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>