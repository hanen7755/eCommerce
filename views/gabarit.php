<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/public.css">
<title>Title</title>
</head>
<body>
<div class="container">
    
    <header>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="navbar-brand" href="#">
                <span class="fa-fan fas"></span>
            </a>

            </li>
            <li class="nav-item">
            <a class="nav-link active" href="#"><span class="fa fa-hom"></span> Accueil</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="index.php?action=list_panier">Panier</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./views/contact.php">Page contact</a>
            </li>
        </ul>
      </nav>
      <div class="jumbotron">
        <h1 class="display-4 text-center">Article de l'année</h1>
      </div>
    </header>

    <?= $content; ?>
    
    <footer class="text-white">
        <nav class="navbar  navbar-dark bg-dark">   
         Copyright &copy; 2020
        </nav>
    </footer>

</div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>