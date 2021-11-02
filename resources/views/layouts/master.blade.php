<!DOCTYPE html>

<html lang="fr">
<head>
  @include('layouts.admin.entete')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.admin.navbar')
  @include('layouts.admin.sidbar')

  
  <div class="content-wrapper">
    @include('flash::message')
    @yield('contenu')
    
    <div class="content">
      
      
    </div>
    
  </div>
  

  
  <aside class="control-sidebar control-sidebar-dark">
  
  </aside>
  <footer class="main-footer">
    @include('layouts.admin.pied')
  </footer>
</div>
    @include('layouts.admin.pied-script')
</body>
</html>
