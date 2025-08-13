 <header class="bg-pelindo text-white py-3">
     <div class="container">
         <nav class="navbar navbar-expand-lg navbar-dark">
             <a class="navbar-brand" href="{{ url('/beranda') }}">{{ $navbarSection->title }}</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                 <ul class="navbar-nav mb-2 mb-lg-0">
                     @foreach ($navbarSection->links as $link)
                         <li class="nav-item">
                             <a class="nav-link text-white {{ request()->is(trim($link->href, '/')) ? 'active fw-bold' : '' }}"
                                 href="{{ url($link->href) }}">
                                 {{ $link->navigation }}
                             </a>
                         </li>
                     @endforeach
                 </ul>
             </div>
         </nav>
     </div>
 </header>
