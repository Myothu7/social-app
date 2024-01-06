<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <!-- main style -->
    <link rel="stylesheet" href="{{url('dist/main.css')}}" />
    <title>Flexbook</title>
  </head>
  <body class="bg-gray">
    <!-- Login -->
    <div class="container mt-5 pt-5 d-flex flex-column flex-lg-row justify-content-evenly">
      <!-- heading -->
      <div class="text-center text-lg-start mt-0 pt-0 mt-lg-5 pt-lg-5">
        <h1 class="text-primary fw-bold fs-0">flexbook</h1>
        <p class="w-75 mx-auto fs-4 mx-lg-0">Flexbook helps you connect and share with the people in your life.</p>
      </div>
      <!-- form card -->
      <div style="max-width: 28rem; width: 100%">
        <div class="row">
            @if (session('msg'))
                <div class="d-flex flex-row-reverse p-0">
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{session('msg')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
        <!-- login form -->
        <!-- first was form tag -->
        <div class="bg-white shadow rounded p-3 input-group-lg">
          <form action="{{route('login')}}" method="post">
            @csrf
              <input type="email" name="email" class="form-control my-3" placeholder="Email address or phone number" />
              <input type="password" name="password" class="form-control my-3" placeholder="Password" />
              <input type="submit" value="Log In" class="btn btn-primary w-100 my-3">
          </form>
          <a href="#" class="text-decoration-none text-center"><p>Forgotten password?</p></a>
          <!-- create form -->
          <hr />
          <div class="text-center my-4">
            <button class="btn btn-success btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#createModal">Create New Account</button>
          </div>
          <!-- create modal -->
          <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <!-- head -->
                <div class="modal-header">
                  <div>
                    <h2 class="modal-title" id="exampleModalLabel">Sign Up</h2>
                    <span class="text-muted fs-7">It's quick and easy.</span>
                  </div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- body -->
                <div class="modal-body">
                  <form action="{{route('register')}}" method="post">
                    @csrf
                    <!-- names -->
                    <div class="row">
                      <div class="col">
                        <input type="text" name="first_name" class="form-control" placeholder="First name" />
                      </div>
                      <div class="col">
                        <input type="text" name="last_name" class="form-control" placeholder="Surname" />
                      </div>
                    </div>
                    <!-- email & pass -->
                    <input type="email" name="email" class="form-control my-3" placeholder="Mobile number or email address" />
                    <input type="password" name="password" class="form-control my-3" placeholder="New password" />
                    <!-- DOB -->
                    <div class="row mt-3">
                      <span class="text-muted fs-7">Date of birth <i class="fas fa-question-circle" data-bs-toggle="popover" type="button" data-bs-content="And here's some amazing content. It's very engaging. Right?"></i></span>
                      <div class="col">
                        <input type="date" name="birthday" class="form-control my-3">
                      </div>
                    </div>
                    <!-- gender -->
                    <div class="row">
                      <span class="text-muted fs-7">Gender <i class="fas fa-question-circle" data-bs-toggle="popover" type="button" data-bs-content="And here's some amazing content. It's very engaging. Right?"></i></span>
                      <div class="col mb-3">
                        <div class="border rounded p-2">
                          <label class="form-check-label" for="flexRadioDefault1">Male </label>
                          <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1" />
                        </div>
                      </div>
                      <div class="col">
                        <div class="border rounded p-2">
                          <label class="form-check-label" for="flexRadioDefault1">Female </label>
                          <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2" />
                        </div>
                      </div>
                      <div class="col">
                        <div class="border rounded p-2">
                          <label class="form-check-label" for="flexRadioDefault1">Other</label>
                          <input class="form-check-input" type="radio" name="gender" value="Other" id="flexRadioDefault3" />
                        </div>
                      </div>
                    </div>
                    <!-- disclaimer -->
                    <div>
                      <span class="text-muted fs-7">By clicking Sign Up, you agree to our Terms, Data Policy....</span>
                    </div>
                    <!-- btn -->
                    <div class="text-center mt-3">
                      <button type="submit" class="btn btn-success btn-lg" data-bs-dismiss="modal">Sign Up</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- modal end -->
        </div>
        <!-- tag -->
        <div class="my-5 pb-5 text-center">
          <p class="fw-bold"><a href="#" class="text-decoration-none text-dark">Createa a Page</a> <span class="fw-normal">for a celebrity, band or business.</span></p>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="bg-white p-4 text-muted">
      <div class="container">
        <!-- language -->
        <div class="d-flex flex-wrap">
          <p class="mx-2 fs-7 mb-0">English (US)</p>
          <p class="mx-2 fs-7 mb-0">Tiếng Việt</p>
          <p class="mx-2 fs-7 mb-0">中文(台灣)</p>
          <p class="mx-2 fs-7 mb-0">한국어</p>
          <p class="mx-2 fs-7 mb-0">日本語</p>
        </div>
        <hr />
        <!-- actions -->
        <div class="d-flex flex-wrap">
          <p class="mx-2 fs-7 mb-0">Sign Up</p>
          <p class="mx-2 fs-7 mb-0">Login</p>
          <p class="mx-2 fs-7 mb-0">Messenger</p>
          <p class="mx-2 fs-7 mb-0">Facebook Lite</p>
          <p class="mx-2 fs-7 mb-0">Watch</p>
        </div>
        <!-- copy -->
        <div class="mt-4 mx-2">
          <p class="fs-7">Flexbook &copy; 2021</p>
        </div>
      </div>
    </footer>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="{{url('dist/main.js')}}"></script>
  </body>
</html>
