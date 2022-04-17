<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Portfolio Project Details</h2>
        <ol>
          <li><a href="/#portfolio">Home</a></li>
          <li>Portfolio Project Details</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="/../assets/img/portfolio/<?= $product['pro_image']; ?>" alt="">
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: <?= $product["pro_category"]; ?></li>
              <li><strong>Client</strong>: <?= $product["pro_client"]; ?></li>
              <?php use CodeIgniter\I18n\Time; $time = Time::parse($product["created_at"]); ?>
              <li><strong>Project date</strong>: <?= $time->toLocalizedString('MMM d, yyyy'); ?></li>
              <li><strong>Project URL</strong>: <a href="<?= $product["pro_url"]; ?>"
                  target="_blank"><?= $product["pro_slug"]; ?></a></li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>Detail Project</h2>
            <p><?= $product["pro_detail"]; ?></p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>