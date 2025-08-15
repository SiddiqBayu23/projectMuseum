 <!-- Sidebar Start -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div>
         <div class="brand-logo d-flex align-items-center justify-content-between">
             <a href="./index.html" class="text-nowrap logo-img">
                 <img src="{{ asset('./images/logos/dark-logo.svg') }}" width="180" alt="" />
             </a>
             <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                 <i class="ti ti-x fs-8"></i>
             </div>
         </div>
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
             <ul id="sidebarnav">
                 <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">Home</span>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('admin.dashboard.index') }}" aria-expanded="false">
                         <span>
                             <i class="ti ti-layout-dashboard"></i>
                         </span>
                         <span class="hide-menu">Dashboard</span>
                     </a>
                 </li>
                 <li class="nav-small-cap">
                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">DATA</span>
                 </li>
                 {{-- <li class="sidebar-item">
                     <a class="sidebar-link" href="/users" aria-expanded="false">
                         <span>
                             <i class="fas fa-user"></i>
                         </span>
                         <span class="hide-menu">User</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="/transactions" aria-expanded="false">
                         <span>
                             <i class="fas fa-wallet"></i>
                         </span>
                         <span class="hide-menu">Transaksi</span>
                     </a>
                 </li> --}}
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="javascript:void(0)" data-toggle="collapse"
                         data-target="#section-submenu" aria-expanded="false" style="position: relative;">
                         <i class="fa fa-tasks"></i>
                         <span class="hide-menu">Section</span>
                         <i class="fa fa-caret-down pull-right arrow-right"></i>
                     </a>
                     <ul id="section-submenu" class="collapse first-level" style="padding-left: 20px;">
                         <li class="sidebar-item">
                             <a href="{{ route('admin.navbar-section.index') }}" class="sidebar-link">
                                 <span>
                                     <i class="fa fa-bars"></i>
                                 </span>
                                 <span class="hide-menu">Navbar</span>
                             </a>
                         </li>
                         <li class="sidebar-item">
                             <a href="{{ route('admin.service-section.index') }}" class="sidebar-link">
                                 <span>
                                     <i class="fa fa-bars"></i>
                                 </span>
                                 <span class="hide-menu">Layanan</span>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="javascript:void(0)" data-toggle="collapse"
                         data-target="#collection-submenu" aria-expanded="false" style="position: relative;">
                         <i class="fa fa-tasks"></i>
                         <span class="hide-menu">Koleksi</span>
                         <i class="fa fa-caret-down pull-right arrow-right"></i>
                     </a>
                     <ul id="collection-submenu" class="collapse first-level" style="padding-left: 20px;">
                         <li class="sidebar-item">
                             <a href="{{ route('admin.collection-categories.index') }}" class="sidebar-link">
                                 <span>
                                     <i class="fa fa-bars"></i>
                                 </span>
                                 <span class="hide-menu">Kategori</span>
                             </a>
                         </li>
                         <li class="sidebar-item">
                             <a href="{{ route('admin.collections.index') }}" class="sidebar-link">
                                 <span>
                                     <i class="fa fa-bars"></i>
                                 </span>
                                 <span class="hide-menu">Koleksi</span>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="javascript:void(0)" data-toggle="collapse"
                         data-target="#publication-submenu" aria-expanded="false" style="position: relative;">
                         <i class="fa fa-tasks"></i>
                         <span class="hide-menu">Publikasi</span>
                         <i class="fa fa-caret-down pull-right arrow-right"></i>
                     </a>
                     <ul id="publication-submenu" class="collapse first-level" style="padding-left: 20px;">
                         <li class="sidebar-item">
                             <a href="{{ route('admin.publication-categories.index') }}" class="sidebar-link">
                                 <span>
                                     <i class="fa fa-bars"></i>
                                 </span>
                                 <span class="hide-menu">Kategori</span>
                             </a>
                         </li>
                         <li class="sidebar-item">
                             <a href="{{ route('admin.publications.index') }}" class="sidebar-link">
                                 <span>
                                     <i class="fa fa-bars"></i>
                                 </span>
                                 <span class="hide-menu">Publikasi</span>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('admin.banners.index') }}" aria-expanded="false">
                         <span>
                             <i class="fa fa-image"></i>
                         </span>
                         <span class="hide-menu">Banner</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('admin.categories.index') }}" aria-expanded="false">
                         <span>
                             <i class="fa fa-archive"></i>
                         </span>
                         <span class="hide-menu">Kategori</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('admin.news.index') }}" aria-expanded="false">
                         <span>
                             <i class="fa fa-file-text"></i>
                         </span>
                         <span class="hide-menu">Berita</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{ route('admin.video-streamings.index') }}"
                         aria-expanded="false">
                         <span>
                             <i class="fa fa-video"></i>
                         </span>
                         <span class="hide-menu">Video & Streaming</span>
                     </a>
                 </li>
                 {{-- <li class="sidebar-item">
                     <a class="sidebar-link" href="/products" aria-expanded="false">
                         <span>
                             <i class="fas fa-inbox"></i>
                         </span>
                         <span class="hide-menu">Produk</span>
                     </a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="/customers" aria-expanded="false">
                         <span>
                             <i class="fas fa-users"></i>
                         </span>
                         <span class="hide-menu">Pelanggan</span>
                     </a>
                 </li> --}}
             </ul>
             {{-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                 <div class="d-flex">
                     <div class="unlimited-access-title me-3">
                         <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                         <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank"
                             class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
                     </div>
                     <div class="unlimited-access-img">
                         <img src="./images/backgrounds/rocket.png" alt="" class="img-fluid">
                     </div>
                 </div>
             </div> --}}
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!--  Sidebar End -->
 @section('script')
     <script>
         document.querySelectorAll('[data-toggle="collapse"]').forEach(el => {
             el.addEventListener('click', function() {
                 let icon = this.querySelector('.fa-caret-down');
                 icon.classList.toggle('rotate-180');
             });
         });
     </script>
 @endsection
