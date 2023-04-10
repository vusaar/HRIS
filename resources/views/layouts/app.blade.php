<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en"/>
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> YOUR HRIS</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <!-- <script src="{{ asset('/js/app.js') }}" defer></script> -->

    <!-- Fonts -->
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <!-- Styles -->
  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&amp;display=swap">

    @section('styles')
    <!-- Styles -->
     <!--
        {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
-->
        <link href="{{ asset('css/tabler.css') }}" rel="stylesheet">
       
    @show
    @stack('head')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  
                   <span class='btn bg-lime text-white'>YOUR</span><span class='btn bg-orange text-white'> HRIS</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                           
                            
                        @else
                            <span style='margin-top:-10px'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="35" height="35" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                             <circle cx="12" cy="12" r="9"></circle>
                            <circle cx="12" cy="10" r="3"></circle>
                           <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                          </svg>
                         </span>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->employee->surname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

        <div class="fluid-container" style='width:98%'>
        
        <div id='main_content' >

        @auth
        <div id='left_nav'>
            
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
    <div class="position-sticky">
      <div class="list-group list-group-flush">

        <ul id = 'nav_list' class="navbar-nav pt-lg-3">
        <li class='nav_item'>
        <a href="#" class="nav-link">
        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                  </span></i><span class="nav-link-title p-2" style='color:#495057;font-weight:bolder'>Dashboard
                    
                  </span>
        </a>
        
        </li>


        <li class='nav_item dropdown' data-toggle="collapse" data-target="#employees"> 
        <a href="#"class="nav-link dropdown-toggle"
          >
          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                 
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-nerd" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <circle cx="12" cy="12" r="9"></circle>
   <circle cx="8" cy="10" r="2"></circle>
   <circle cx="16" cy="10" r="2"></circle>
   <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
   <path d="M3.5 9h2.5"></path>
   <path d="M18 9h2.5"></path>
   <path d="M10 9.5c1.333 -1.333 2.667 -1.333 4 0"></path>
</svg>  
                  </span>
<span class="nav-link-title p-2"  style='color:#495057;font-weight:bolder'>Employees</span>
</a>

        <ul id="employees" class="collapse show list-group list-group-flush px-3">
          
         <li class="list-group-item px-6">
            <a href="{{url('employees/')}}" class="text-reset">Employment Details</a>
          </li>
          <li class="list-group-item px-6">
            <a href="" class="text-reset">Leave Management</a>
          </li>                   
          
        </ul>

         </li>

         <li  class='nav_item dropdown' data-toggle="collapse" data-target="#recruitments">
           <a href="#" class="nav-link dropdown-toggle">
           <span class="nav-link-icon d-md-none d-lg-inline-block">
           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <rect x="3" y="7" width="18" height="13" rx="2"></rect>
   <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
   <line x1="12" y1="12" x2="12" y2="12.01"></line>
   <path d="M3 13a20 20 0 0 0 18 0"></path>
</svg></span><span class="nav-link-title p-2"  style='color:#495057;font-weight:bolder'>Recruitment</span>
            </a>

            <ul id="recruitments" class="collapse show list-group list-group-flush px-3">
          
          <li class="list-group-item px-6">
            <a href="{{url('vacancies/')}}" class="text-reset">Vacancies</a>
            
          </li>
          <li class="list-group-item px-6">
            <a href="{{url('applications/')}}" class="text-reset">Vacancy Submissions</a>
          </li>
          
          
        </ul>   


         </li>


         <li class='nav_item dropdown' data-toggle="collapse" data-target="#establishments">
        <a href="#" class="nav-link dropdown-toggle">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hierarchy-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M10 3h4v4h-4z"></path>
   <path d="M3 17h4v4h-4z"></path>
   <path d="M17 17h4v4h-4z"></path>
   <path d="M7 17l5 -4l5 4"></path>
   <line x1="12" y1="7" x2="12" y2="13"></line>
</svg></span><span class="nav-link-title p-2"  style='color:#495057;font-weight:bolder'> Establishment</span>
        </a>

        <ul id="establishments" class="collapse show list-group list-group-flush px-3">
          
          <li class="list-group-item px-6">
            <a href="{{url('sections/')}}" class="text-reset">Sections</a>
          </li>
          <li class="list-group-item px-6">
            <a href="{{url('departments/')}}" class="text-reset">Departments</a>
          </li>
          <li class="list-group-item px-6">
            <a href="{{url('jobtitles/')}}" class="text-reset">Job Titles</a>
          </li>
          <li class="list-group-item px-6">
            <a href="{{url('departmentjobtitles/')}}" class="text-reset">Department Structure</a>
          </li>

           <!--
          <li class="list-group-item px-6">
            <a href="{{url('levels/')}}" class="text-reset">Job Hierarchy</a>
          </li>
           -->

          <li class="list-group-item px-6">
            <a href="{{url('grades/')}}" class="text-reset">Employee Grades</a>
          </li>

          <li class="list-group-item px-6">
            <a href="{{url('contracts/')}}" class="text-reset">Contract Types</a>
          </li>
          
        </ul>

         </li>
         <li>
         <a href="{{url('users/')}}" class="nav-link">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
              </svg></span><span class="nav-link-title p-2"  style='color:#495057;font-weight:bolder'> User Management</span>
        </a>
         </li>
         
        
      </ul>
      
       
      </div>
    </div>
  </nav>
        </div>
        @endauth

        <div id='right_content'>

            @yield('content')
        
        </div>
</div>
  </div>
  </main>

  @section('scripts')
    <!-- Scripts -->
    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="{{asset('js/manifest.js') }}"></script>
    <script src="{{asset('js/vendor.js') }}"></script>   
    <script src="{{asset('js/tabler.js') }}"></script>
    
@show
@stack('body')
</body>
</html>


