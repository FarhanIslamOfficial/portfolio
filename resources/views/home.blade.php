<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/profile.jpg')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Farhan Islam</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('images/profile.jpg')}}"  alt="profile-image" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route("dashboard")}}">Edit Info</a></li> 
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route("logout")}}">Log Out</a></li>
                    {{-- <li>   
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                    </li> --}}
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        {{auth()->user()->f_name}}
                        <span class="text-primary">{{auth()->user()->l_name}}</span>
                    </h1>
                    <div class="subheading mb-5">
                        {{auth()->user()->address}}, {{auth()->user()->phone_no}} ·
                    <a href="mailto:{{auth()->user()->email}}">{{auth()->user()->email}}</a>
                    </div>
                    <p class="lead mb-5">{{auth()->user()->about}}</p>
                    <div class="social-icons">
                        @if(!auth()->user()->social_links === null )
                    <a class="social-icon" href="{{auth()->user()->social_links['linked_in']}}"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="{{auth()->user()->social_links['git_hub']}}"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="{{auth()->user()->social_links['twitter']}}"><i class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="{{auth()->user()->social_links['facebook']}}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
               
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    @forelse($experiences as $exp)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{$exp->designation}}</h3>
                            <div class="subheading mb-3">{{$exp->company_name}}</div>
                            <p>{{$exp->job_description}}</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{ Carbon\Carbon::parse($exp->start_date)->format('M Y ') }} - {{ Carbon\Carbon::parse($exp->end_date)->format('M Y ') }}</span></div>
                    </div>
                    @empty
                    <h1 class="text-danger">No Data Added Yet</h1>
                        
                    @endforelse
                </div>
            </section>
            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    @forelse($educations as $edu)
                        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                            <div class="flex-grow-1">
                                <h3 class="mb-0">{{$edu->institution}}</h3>
                                <div class="subheading mb-3">{{$edu->program}}</div>
                                <p>GPA: {{$edu->gpa}}</p>
                            </div>
                            <div class="flex-shrink-0"><span class="text-primary">{{ Carbon\Carbon::parse($exp->start_date)->format('M Y ') }} - {{ Carbon\Carbon::parse($exp->end_date)->format('M Y ') }}</span></div>
                        </div>
                    @empty
                    <h1 class="text-danger">No Data Added Yet</h1>
                        
                    @endforelse
                 
                </div>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="fa-ul mb-0">
                        <li>
                          
                            @forelse($skills as $skill)
                            <li>
                                <span class="fa-li"><i class="fas fa-certificate text-warning"></i></span>
                                {{$skill}}
                            </li>
                            @empty
                                <p class="text-danger"> No Skills Added</p>
                            @endforelse
                        </li>
                       
                       
                    </ul>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">Interests</h2>
                    <p>{{$interests}}</p>
                 
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">Awards & Certifications</h2>
                    <ul class="fa-ul mb-0">
                        @forelse($awards as $award)
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            {{$award}}
                        </li>
                        @empty
                        <p class="text-danger"> No Awards Added</p>
                        @endforelse
                      
                       
                    </ul>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
    <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
