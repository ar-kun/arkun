<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Portfolio Project</h2>
        <?php if(session()->getFlashdata('Pesan')): ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('Pesan'); ?></div>
        <?php endif; ?>
        <ol>
          <li><a href="/#portfolio">Home</a></li>
          <li>Portfolio Project</li>
        </ol>
      </div>
      <div class="link-a d-flex justify-content-between">
        <a href="/create" class="bx bx-link" id="tambah-data">Add</a>
        <a href="/logout" class="bx bx-link">Logout</a>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">
        <?//= $i = 1 + (10 * ($currentPage - 1)); ?>
        <?php foreach ($product as $pro): ?>
        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: <?= $pro["pro_category"]; ?></li>
              <li><strong>Client</strong>: <?= $pro["pro_client"]; ?></li>
              <li><strong>Project date</strong>: <?= $pro["created_at"]; ?></li>
              <li><strong>Project URL</strong>: <a href="<?= $pro["pro_url"]; ?>" target="_blank"><?= $pro["pro_slug"]; ?></a>
              </li>
            </ul>
            <a href="/edit/<?= $pro['pro_slug']; ?>" class="bx bx-link" id="btn">Edit</a>

            <form action="/<?= $pro['pro_id']; ?>" method="post" class="d-inline">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="bx bx-link" id="btn" onclick="return  confirm('Hapus Product ?')">Delete</button>
            </form>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section><!-- End Portfolio Details Section -->
  <?= $pager->links('product','admin_pagination'); ?>

</main><!-- End #main -->

<?= $this->endSection(); ?>