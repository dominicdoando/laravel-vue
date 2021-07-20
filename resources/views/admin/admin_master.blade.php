

@include('admin.layout.head')

  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>
    <div class="mobile-sticky-body-overlay"></div>
    <div class="wrapper">
      
        @include('admin.layout.sidebar')

      <div class="page-wrapper">
        <div class="content-wrapper">
          <div class="content">				

            @include('admin.layout.header')

            @yield('admin')
            
        </div>
      </div>

@include('admin.layout.footer')