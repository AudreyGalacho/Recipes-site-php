<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/Users/buutt/Documents/WEB-DEV/first-repository/recipeSite/index.php">
    Site de Recettes
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""><?php echo $_SESSION['pageNav']='Contact';?>Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""><?php $_SESSION['pageNav']='';?>Ajout recette</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Mes recettes</a>
      </li>
    </ul>
  </div>
</nav>
</header>