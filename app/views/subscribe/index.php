<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="page-bg">
  <?php require APPROOT . '/views/inc/nav.php'; ?>


  <div class="form-container">

    <h2>Subscribe to newsletter</h2>
    <p>Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>

    <form action="<?= URLROOT; ?>/subscribes/index" method="post">
      <div class="input-wrapper">
        <input type="text" id="email" name="email" placeholder="Type your email address here…" value="<?= $data['email']; ?>">

        <input type="submit" value="">
        <span class='error-message'><?= $data['email_err']; ?></span>
      </div>

      <label class="checkbox-container">
        <span>I agree to <a href="#">terms of service</a></span>
        <input type="checkbox" id="terms" name="terms" <?= $data['terms']; ?>>
        <span class="checkmark"></span>
        <span class="terms-error"><?= $data['terms_err']; ?></span>
      </label>
    </form>

    <div class="social">
      <a href="#" class="facebook-link"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="instagram-link"><i class="fab fa-instagram"></i></a>
      <a href="#" class="twitter-link"><i class="fab fa-twitter"></i></a>
      <a href="#" class="youtube-link"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>