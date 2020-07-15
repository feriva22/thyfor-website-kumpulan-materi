
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.1/assets/img/favicons/favicon.ico">
    <meta name="google-signin-client_id" content="224955301360-cvjernudc0tuvkm63uta0kk96hmn7du1.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <link rel="icon" href="assets/img/thyfor.ico">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome icon-->
    <link rel="stylesheet" href="assets/plugin/fontawesome-free/css/all.min.css">


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/album/album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="index.php" class="navbar-brand d-flex align-items-center">
          <strong>Thyfor</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Thyfor </h1>
          <p class="lead text-muted">THYFOR (theory Sistem Informasi) menyediakan berbagai document sistem informasi untuk anda </p>
            <form class="form-inline justify-content-center">
              <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="query" placeholder="Cari materi">
              </div>
              <button type="submit" class="btn btn-primary mb-2">Cari materi</button>
            </form>
            
            <a href="page.php?target=login" class="btn btn-secondary my-2">Berkontribusi Upload Materi</a>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <?php if(count($materi) > 0):?>
            <?php foreach($materi as $row):?>
               
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                <h5 class="card-title"><?php echo $row->mtr_nama;?></h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    <i class="fas fa-tag"></i> <?php echo $row->spc_nama;?><br>
                    <i class="fas fa-hashtag"></i> <?php echo $row->tpc_nama;?>
                </h6>
                  <p class="card-text"><?php echo $row->mtr_deskripsi;?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="page.php?target=materi&id=<?php echo $row->mtr_id;?>" class="btn btn-sm btn-outline-secondary">Lihat</a>
                    </div>
                    <small class="text-muted"><?php echo $row->mtr_created;?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
            <?php else:?>
                <div class="col-md-12">
                    MAAF materi tidak ada
                </div>
            <?php endif;?>
          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="assets/js/login_google.js" type="text/javascript"></script>

    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
