<?php
session_start();
$page_title = $_SESSION['user']['login'];
include 'layout_header.php';
?>
<section style="background-color: #eee;">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?= $_SESSION['user']['avatar'] ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?= $_SESSION['user']['login'] ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ФИО</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['user']['full_name'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION['user']['email'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include 'layout_footer.php';
?>