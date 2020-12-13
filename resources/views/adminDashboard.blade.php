
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Your Logo
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="javascript:;">
              <i class="nc-icon nc-bank"></i>
              <p onclick="openinfo()">Add About Info</p>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="nc-icon nc-diamond"></i>
              <p onclick="openexperience()">Add EXPERIENCE</p>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="nc-icon nc-pin-3"></i>
              <p onclick="openeducation()">Add EDUCATION</p>
            </a>
          </li>
          <li>
            <a href="{{route('add.more')}}">
              <i class="fas fa-user-secret"></i>
              <p>Add (interest,skills,awards)</p>
            </a>
          </li>
        
        </ul>
      </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Title</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="btn btn-primary ml-3" href="{{route("logout")}}" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                  Log Out
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
     
      <div class="content">
        <div class="row" id="personal_info"> 
          <div class="col-md-10">
            @if (session("message"))
            <div class="alert alert-success" style="z-index:100;">
                {{ session("message") }}
            </div>
            @endif
          <form action="{{route('about.update')}}" method="POST" >
            @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Add Or Update First Name</label>
                <input type="text" name="f_name" class="form-control row-3" value="{{auth()->user()->f_name ?? ""}}" id="exampleInputPassword1" placeholder=" Update Your Name  Here...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Add Or Update Last Name</label>
                <input type="text" name="l_name" class="form-control row-3" value="{{auth()->user()->l_name ?? ""}}" id="exampleInputPassword1" placeholder=" Update Your Name  Here...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Add Or Update Address </label>
                  <input type="text" value="{{auth()->user()->address}}" name="address" class="form-control row-3" id="exampleInputPassword1" placeholder="Update Your Address Here...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Add Or Update Your Phone Number </label>
                  <input type="text"  value="{{auth()->user()->phone_no ?? ""}}" name="phone_no" class="form-control row-3" id="exampleInputPassword1" placeholder="Update Your Phone-Number  Here...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Add Or Update Your Email </label>
                    <input type="email" value={{auth()->user()->email ?? ""}} name="email" class="form-control row-3" id="exampleInputPassword1" placeholder="Update Your Email Here...">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Add Something About You</label>
                <textarea type="text" name="about" class="form-control row-3" id="exampleInputPassword1" placeholder="Write About You  Here...">{{auth()->user()->about}}</textarea>
                </div>

                {{-- sociallinks --}}

                <div class="form-group">
                    <label for="exampleInputPassword1"> Add Or Update Your linkedIn Link</label>
                <input type="text" value="{{$linkedIn??""}}" name="social_links[linked_in]" class="form-control row-3" id="exampleInputPassword1" placeholder="Update Your Link Here...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Add Or Update Your Github Link</label>
                  <input type="text" value="{{$github??""}}"  name="social_links[git_hub]" class="form-control row-3" id="exampleInputPassword1" placeholder="Update Your Link Here...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Add Or Update Your Twitter Link</label>
                  <input type="text" value="{{$twitter??""}}" name="social_links[twitter]" class="form-control row-3" id="exampleInputPassword1" placeholder="Update Your Link Here...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Add Or Update Your Facebook Link </label>
                  <input type="text" value="{{$facebook??""}}" name="social_links[facebook]" class="form-control row-3" id="exampleInputPassword1" placeholder="Update Your Link Here...">
                  </div>
                {{-- socilalinks end --}}
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
          <div class="col-md-2"></div>
        </div>
        {{-- experience --}}
        <div class="row" id="experience">
          @if (session("message2"))
          <div class="alert alert-success" style="z-index:100;">
              {{ session("message2") }}
          </div>
          @endif
            <form action="{{route('experience.add')}}" method="POST">
              @csrf
              <h1> Add Your Expereiences</h1>
              <div class="form-group">
                <label for="company_name">Add Company/Organization Name </label>
                <input type="text"  class="form-control form-group" name="company_name" id="company_name" placeholder=" Put Company Name Here...">
                <label for="designation">Add Your Designation For The Job </label>
                <input type="text"  class="form-control form-group" name="designation" id="designation" placeholder=" Put Designation Here...">
                <label for="job_description">Add Your Designation For The Job </label>
                <textarea type="text" name="job_description" class="form-control row-3" id="job_description" placeholder="Write Your Job Description Here..."></textarea>
               
                <label for="start_date">Start Date </label>
                <input type="date"  class="form-control form-group" name="start_date" id="start_date" >
                <label for="end_date">End Date </label>
                <input  type="date"  class="form-control form-group" name="end_date" id="end_date" >
                <button type="submit" value="submit" class="btn btn-primary"> Add</button>
              </div> 

            </form>
            @if (session("message2"))
            <div class="form-control form-group">
            <a href="{{route('experience.show')}}" class="btn btn-primary col-md-6 col-sm-12 col-lg-6 offset-3">View All Added Experiences<a>
            </div>
            @endif

        </div>
        {{-- exp-end --}}
        {{-- education-start --}}
        <div class="row" id="education">
          @if (session("message3"))
          <div class="alert alert-success" style="z-index:100;">
              {{ session("message3") }}
          </div>
          @endif
            <form action="{{route('education.add')}}" method="POST">
              @csrf
              <h1> Add Your Education Info</h1>
              <div class="form-group">
                <label for="institution">Add Institution Name </label>
                <input type="text"  class="form-control form-group" name="institution" id="institution" placeholder=" Put  Instituition Name Here...">
                <label for="program">Add Program </label>
                <input type="text"  class="form-control form-group" name="program" id="program" placeholder=" Put Program Name Here...">
                <label for="gpa">Add CGPA/GPA Obtained </label>
                <input type="text" name="gpa" class="form-control row-3" id="gpa" placeholder="Put Your Obtained GPA/CGPA Here...">
               
                <label for="start_date">Start Date </label>
                <input type="date"  class="form-control form-group" name="start_date" id="start_date" >
                <label for="end_date">End Date </label>
                <input  type="date"  class="form-control form-group" name="end_date" id="end_date" >
                <button type="submit" value="submit" class="btn btn-primary"> Add</button>
              </div> 

            </form>
            @if (session("message3"))
            <div class="form-control form-group">
            <a href="{{route('education.show')}}" class="btn btn-primary col-md-6 col-sm-12 col-lg-6 offset-3">View All Added Education Entries<a>
            </div>
            @endif

        </div>

        {{-- education-end --}}
        {{-- skills start --}}

        {{-- skills end --}}
        
      </div>
     
    </div>
  </div>
  <script>

    function openinfo(){
      document.getElementById('personal_info').style.display="block";
      document.getElementById('experience').style.display="none";
      document.getElementById('education').style.display="none";
    }

    function openexperience(){
      document.getElementById('experience').style.display="block";
     let doc= document.getElementById('personal_info').style.display="none";
     document.getElementById('education').style.display="none";
     doc.classList.add('active');

    }
    function openeducation(){
      document.getElementById('education').style.display="block";
      document.getElementById('personal_info').style.display="none";
      document.getElementById('experience').style.display="none";

    }
    function openskills(){

    }


  </script>
  <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
    <script src=".{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src=".{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  {{-- <script src="./assets/js/plugins/chartjs.min.js"></script> --}}
  <!--  Notifications Plugin    -->
<script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{'assets/js/paper-dashboard.min.js?v=2.0.1'}}" type="text/javascript"></script>
</body>

</html>
