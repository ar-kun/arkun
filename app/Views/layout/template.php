<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('/assets/img/favicon.png'); ?>" rel="icon">
  <link href="<?= base_url('/assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('/assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('/assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('/assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
  <?= $this->include('layout/navbar'); ?>

  <?= $this->renderSection('content'); ?>

  <?= $this->include('layout/footer'); ?>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('/assets/vendor/purecounter/purecounter.js'); ?>"></script>
  <script src="<?= base_url('/assets/vendor/aos/aos.js'); ?>"></script>
  <script src="<?= base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('/assets/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
  <script src="<?= base_url('/assets/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
  <script src="<?= base_url('/assets/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
  <script src="<?= base_url('/assets/vendor/typed.js/typed.min.js'); ?>"></script>
  <script src="<?= base_url('/assets/vendor/waypoints/noframework.waypoints.js'); ?>"></script>
  <script src="<?= base_url('/assets/vendor/php-email-form/validate.js'); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('/assets/js/main.js'); ?>"></script>

  <script>
  function previewImg() {

    const image = document.querySelector('#pro_image');
    const imgLabel = document.querySelector('.input-group-text');
    const imgPreview = document.querySelector('.img-preview');

    imgLabel.textContent = image.files[0].name;

    const fileImage = new FileReader();
    fileImage.readAsDataURL(image.files[0])

    fileImage.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }
  </script>

</body>

</html>