
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
        <div class="row ml-5 mt-5 mr-5">
            <div class="col-md-8">
                <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $materi->mtr_nama;?></h5>
                  <h6 class="card-subtitle mb-2 text-muted">
                    <i class="fas fa-tag"></i> <?php echo $materi->spc_nama;?><br>
                    <i class="fas fa-hashtag"></i> <?php echo $materi->tpc_nama;?>
                  </h6>
                  <p class="card-text"><?php echo $materi->mtr_deskripsi;?></p>
                  <p>Attachment</p>
                  <?php foreach($media as $row):?>
                  <a href="assets/upload/<?php echo $row->mda_source;?>" class="card-link"><?php echo $row->mda_nama;?></a>
                  <?php endforeach;?>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Diupload oleh</h5>
                  <h6 class="card-subtitle mb-2 text-muted"></h6>
                  <p class="card-text"><?php echo $author->usr_nama;?></p>
                  <p>Email : <?php echo $author->usr_email;?></p>
                  <p>Tanggal : <?php echo $materi->mtr_created;?></p>
                  <p>Status : 
                  <?php if($materi->mtr_status == '1'){
                            echo '<span class="badge badge-success">Active</span>';
                          }elseif($materi->mtr_status == '2'){
                            echo '<span class="badge badge-warning">Waiting</span>';
                          }else{
                            echo '<span class="badge badge-danger">Rejected</span>';
                          }
                  ?>
                  </p>
                  <hr>
                  <h5>Action</h5>
                  <div class="d-inline">
                    <a  onClick="acceptMateri(<?php echo $materi->mtr_id;?>)" href="#" class="btn btn-success btn-sm">Accept</a>
                    <a  onClick="rejectMateri(<?php echo $materi->mtr_id;?>)" href="#" class="btn btn-danger btn-sm">Reject</a>                    
                  </div>
                </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted">
   
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="assets/js/login_google.js" type="text/javascript"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
    <script type="text/javascript">
    function acceptMateri(id){
      if(confirm('Yakin ingin mempublish materi ini ?')){
        document.location = `materi_status.php?id=${id}&status=1`;
      }
    }
    function rejectMateri(id){
      if(confirm('Yakin ingin mereject materi ini ?')){
        document.location = `materi_status.php?id=${id}&status=3`;
      }
    }
    </script>
  </body>
</html>
