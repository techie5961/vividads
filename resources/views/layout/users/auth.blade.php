<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
{{-- include vite css --}}
@include('components.utilities',[
    'vite_css' => true
])
{{-- yield css --}}
     @yield('css')
    <title>{{ config('app.name') }} || Users || @yield('title') </title>
    <style>
        main{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            padding:20px;
            background:var(--primary);
            background-image:url({{ asset('banners/IMG_6884.png') }});
            background-size:cover;
            background-position:center;
        }
        form{
            background:var(--bg-light);
            padding:20px;
            border-radius:20px;
            display:flex;
            flex-direction: column;
            gap:10px;
            align-items:center;
            justify-content: center;
            
        }
        form input[type=checkbox]{
            transform: scale(0.7)
        }
       
       
        
    </style>
</head>
<body>
    {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    <header>

    </header>
    <main>
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer>

    </footer>
  @include('components.utilities',[
    'vite_js' => true
  ])
  {{-- yield js --}}
    @yield('js')
</body>
</html>