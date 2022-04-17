<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main">

  <!-- ======= Contact Section ======= -->
  <section class="contact">
    <div class="container">
      <a href="/admin" class="bx bx-link" id="tambah-data">Back</a>
      <div class="row" data-aos="fade-in">

        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form action="/admin/update/<?= $product["pro_id"]; ?>" method="post" role="form" class="php-email-form"
            enctype="multipart/form-data">
            <h3>Update Data</h3>
            <?= csrf_field(); ?>
            <input type="hidden" name="pro_slug" value="<?= $product["pro_slug"]; ?>">
            <input type="hidden" name="imgLama" value="<?= $product["pro_image"]; ?>">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="pro_category">Category</label>
                <select name="pro_category"
                  class="form-control <?= ($validation->hasError('pro_category')) ?'is-invalid' : ''; ?>" id="pro_category"
                  autofocus value="<?= (old('pro_category')) ? old('pro_category'): $product["pro_category"] ?>">
                  <option value="Website" <?= ($product["pro_category"] == 'Website') ? 'selected' : ''?>>Website</option>
                  <option value="App" <?= ($product["pro_category"] == 'App') ? 'selected' : ''?>>App</option>
                  <option value="Desain" <?= ($product["pro_category"] == 'Desain') ? 'selected' : ''?>>Desain</option>
                </select>
                <div class="invalid-feedback">
                  <?= $validation->getError('pro_category'); ?>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="pro_client">Client</label>
                <input type="text" class="form-control" name="pro_client" id="pro_client"
                  value="<?= (old('pro_client')) ? old('pro_client'): $product["pro_client"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="pro_url">Project Url</label>
              <input type="text" class="form-control" name="pro_url" id="pro_url"
                value="<?= (old('pro_url')) ? old('pro_url'): $product["pro_url"] ?>">
            </div>
            <div class="form-group">
              <label for="pro_nameUrl">Project Name</label>
              <input type="text" name="pro_nameUrl"
                class="form-control <?= ($validation->hasError('pro_nameUrl')) ?'is-invalid' : ''; ?>" id="pro_nameUrl"
                autofocus value="<?= (old('pro_nameUrl')) ? old('pro_nameUrl'): $product["pro_nameUrl"] ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('pro_nameUrl'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="pro_image">Image</label>
              <div class="form-group row">
                <div class="col-sm-2">
                  <img src="/assets/img/portfolio/<?= $product["pro_image"]; ?>" class="img-thumbnail img-preview" alt="">
                </div>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                    <input type="file" class="form-control <?= ($validation->hasError('pro_image')) ?'is-invalid' : ''; ?>"
                      id="pro_image" name="pro_image" onchange="previewImg()">
                    <label class="input-group-text" for="pro_image"><?= $product["pro_image"]; ?></label>
                    <div class="invalid-feedback">
                      <?= $validation->getError('pro_image'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="pro_detail">Detail</label>
              <input type="textarea" class="form-control" name="pro_detail" id="pro_detail"
                value="<?= (old('pro_detail')) ? old('pro_detail'): $product["pro_detail"] ?>">
            </div>
            <div class="text-center"><button type="submit">Update</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>