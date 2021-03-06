
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="google-signin-client_id" content="224955301360-cvjernudc0tuvkm63uta0kk96hmn7du1.apps.googleusercontent.com">
    <script>
      function onLoad() {
          gapi.load('auth2', function() {
              gapi.auth2.init();
          });
      }
      
      function signOut() {
          if(typeof(gapi) !== 'undefined'){
              gapi.auth2.getAuthInstance().signOut();
              var auth2 = gapi.auth2.getAuthInstance();
              auth2.signOut().then(function () {
                  window.location = "auth.php?act=logout";
              });
          }else{
              window.location = "auth.php?act=logout";
          }
      }
    </script>
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
                  <h5 class="card-title">Daftar Subtopic</h5>
                  <div class="float-right">
                    <button class="btn btn-sm btn-primary" id="addSubtopicbtn">Tambah Subtopic</button>
                  </div>
                  <br><br>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Subtopic</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Topik</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($subtopic as $row):?>
                      <tr>
                        <th scope="row"><?php echo $row->spc_id;?></th>
                        <td><?php echo $row->spc_nama;?></td>
                        <td><?php echo $row->spc_deskripsi;?></td>
                        <td><?php echo $row->tpc_nama;?></td>
                        <td>
                        <a onClick='deleteSubtopic(<?php echo $row->spc_id;?>)' href="#" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Hello <?php echo $_SESSION['email'];?></h5>
                  <div class="d-inline">
                    <a href="page.php?target=materi_upload">Upload materi</a>
                    <a href="page.php?target=materi_saya">Materi Saya</a>

                  </div>
                  <br>
                  <hr>
                  <?php if($_SESSION['tipe'] == 0):?>
                  <h5>Manage</h5>
                  <div class="d-inline">
                 
                    <a href="page.php?target=materi_list">Daftar Materi</a>
                    <a href="page.php?target=akun_list">Daftar Akun</a>
                  </div>
                  <br>
                  <div class="d-inline">
                    <a href="page.php?target=subtopic_list">Daftar Subtopic</a>
                    <a href="page.php?target=topic_list">Daftar Topic</a>
                  </div>
                  <?php endif;?>              
                  <h6 class="card-subtitle mb-2 text-muted"></h6>
                  <a href="#" onclick="signOut()" class="btn btn-secondary">Logout</a>
                </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted">
   
    </footer>

    <div class="modal fade" id="tambahSubtopic" tabindex="-1" role="dialog" aria-labelledby="tambahSubtopicLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahSubtopicLabel">Tambah Subtopic</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="subtopic_create.php">
              <div class="form-group">
                <label for="spc_nama" class="col-form-label">Nama:</label>
                <input type="text" class="form-control" name="spc_nama" id="spc_nama" required>
              </div>
              <div class="form-group">
                <label for="spc_deskripsi" class="col-form-label">Deskripsi:</label>
                <input type="text" class="form-control" name="spc_deskripsi" id="spc_deskripsi" required>
              </div>
              <div class="form-group">
                <label for="spc_topic" class="col-form-label">Topic:</label>
                <select name="spc_topic" class="form-control" required>
                  <option value="">Pilih Topic</option>
                  <?php foreach($topic as $tp):?>
                  <option value="<?php echo $tp->tpc_id;?>"><?php echo $tp->tpc_nama;?></option>
                  <?php endforeach;?>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Buat</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="assets/js/login_google.js" type="text/javascript"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
    <script type="text/javascript">
    function deleteSubtopic(id){
      if(confirm('Yakin ingin hapus')){
        document.location = `subtopic_status.php?id=${id}&status=0`;
      }
    }
    $(document).ready(()=>{
      $('#addSubtopicbtn').on('click',function(e){
        $('#tambahSubtopic').modal('show');
      })
    })
    </script>
  </body>
</html>
