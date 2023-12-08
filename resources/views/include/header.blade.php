<!DOCTYPE html>
<html>
  <head>
    <title>Eskinita</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Global Styles */
    

    </style>
  </head>

  <body>
    <div class="navbar">
        <div class="container d-flex justify-content-center">
        <!--navbar-->
            <ul class="nav nav-pills">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.menu.index') }}">Menu</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Transactions</a>
            <ul class="dropdown-menu">
                <li><hr class="dropdown" href="#">Branches</li>
                <li><a class="dropdown-item" href="{{ route('laludBranch') }}">Lalud</a></li>
                <li><a class="dropdown-item" href="{{ route('NacocoBranch') }}">Nacoco</a></li>
          
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('queue.index') }}">Queue</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.table.management') }}">Table management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
        </ul>
    </div> 
  </body>
</html>


