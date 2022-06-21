<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Aplikasi tracer study alumni dan penilaian stakeholder</title>

  <link rel="stylesheet" href="/theme/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/theme/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @toastr_css
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: silver">

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <br />
          <br />
          <form action="/login" method="post">
            @csrf
            <div class="row">
              <div class="col-lg-3">
              </div>

              <div class="col-lg-6">
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header text-white bg-danger">
                    <h3 class="widget-user-username text-center"><strong>Aplikasi tracer study alumni dan penilaian
                        stakeholder</strong>
                    </h3>

                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle" src="/theme/logo.png" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-form-label">Username</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmail3" name="username"
                              placeholder="username" value="{{old('username')}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="inputPassword3" name="password"
                              placeholder="Password" value="{{old('password')}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                          <div class="col-sm-8">
                            <button type="submit" class="btn btn-block btn-danger">Login</button>
                            {{-- <a href="/daftar" class="btn btn-primary">Daftar</a> --}}
                            {{-- <a href="#" class="btn btn-primary">Jadwal Pendaftaran Belum Dimulai</a> --}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/theme/plugins/jquery/jquery.min.js"></script>
  <script src="/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/theme/dist/js/adminlte.min.js"></script>
  @toastr_js
  @toastr_render
</body>

</html>