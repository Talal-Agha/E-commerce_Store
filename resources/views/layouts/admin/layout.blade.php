<!DOCTYPE html>
<html lang="en">
<head>
 @include('layouts.admin.masterhead') 
</head>
<body> 
<div class="container-fluid main">
<div class="row">
<div class="col-sm-2 navArea">
 @include('layouts.admin.navbar') 
</div>
<div class="col-sm-10 contentArea">
 @yield('Maincontent')
</div>
</div>
</div>
</body>
</html>