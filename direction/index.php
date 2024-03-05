<?php
/**
 * @file direction/index.php
 * Ce script représente la page d'accueil de l'espace de la direction de la santé Algérienne.
 *
 * @author FEGHOUL Celina
 */
include_once('../specialiste/includes/gestionProduits.php');
session_start();
if(!isset($_SESSION["id_direction"])){
  header("Location: includes/login.php");
}

// Créer une instance de la classe produits 
$GestionProduits = new GestionProduits();
//On fait appel a la methode getProduit qui va nous permettre de récupérer la liste des produits 
$produits =$GestionProduits->getProduit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Macondo&family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&family=Public+Sans:wght@300;400&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
     .img-container {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        .img-container img {
            width: 100%;
            height: auto;}
</style>
<body style="background-color: #E8F6F3;">
    <!-- navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" >
  <div class="container-fluid">
  <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="#" style="margin-left: 15px;">SALAMATY<span style="color: green;margin-left: 5px ;">!</span></a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Acceuil</a></li>
        <li class="nav-item"><a class="nav-link active" href="produits.php">Produits</a></li>
        <li class="nav-item"><a class="nav-link active"href="signalement.php">Voir signalements</a></li>
        <li class="nav-item"><a class="nav-link active" href="etude.php">Etude</a></li>
      </ul>
      <div class="d-flex">
        <form method="post" action="includes/logout.php">
          <button type='submit' class='btn btn-outline-dark shadow-none me-lg-2 me-3'>Se déconnecter</button>
        </form>
        </div>
       </div>
     </div>
   </nav>

   <div class="container d-flex mt-5">
     <div class="row">
        <div class="col-md-6 mt-5">
           <span style="color:#0E6251; font-weight:bold; font-size:2.3rem;">Bienvenus,</span>
           <h3 style="font-weight:bold; font-size:1.9rem;">Dans votre espace de la direction de la santé Algérienne.</h3>
           <h6 class="mt-4" style="color: #696969;"> Dès à présent, vous avez accès à une multitude de fonctionnalités dans votre espace direction de la santé. Explorez les produits fabriqués en Algérie, consultez les signalements de produits, ainsi que les études efféctuées par le spécialiste. Bonne exploration !</h6>
        </div>
        <div class="col-md-6 img-container">
            <img src="img/directionigm.png" alt="#"class="img-fluid" style="height: 300px;">
        </div>
     </div>
   </div>

<h2 class="mt-5 text-center mb-4 fw-bold h-font mt-4">Produits</h2>
   <div class="container">
    <div class="row">
    <?php foreach ($produits as $produit): ?>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
         <div class="card" style="width: 18rem;">
            <img src="img/<?php echo $produit['img_produit']; ?>" class="card-img-top" alt="#" style="width: 286px;height: 220px;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $produit['nom_produit']; ?></h5>
              <span class="badge bg-light text-dark text-wrap lh-base mb-2"><?php echo $produit['prix_produit'] ?> DA
              </span>
              <div class="ID mb-2">
                <h6 class="mb-1">Identifiant</h6>
                <span class="badge bg-light text-dark text-wrap lh-base mb-2"><?php echo $produit['id_produit']; ?>
                </span>
               </div> 
              <div class="categorie mb-2">
                <h6 class="mb-1">Categorie</h6>
                <span class="badge bg-light text-dark text-wrap lh-base mb-2"><?php echo $produit['categorie_produit']; ?>
                </span>
               </div> 
               <div class="d-flex justify-content-center mb-2">
                 <a href="detailsProduit.php?id_produit=<?php echo $produit['id_produit'] ?>" class="btn btn-sm btn-outline-dark shadow-none">Voir plus ...</a>
               </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>  
    </div>
   </div>

   <div class="text-center mb-3">
     <a href="produits.php" class="btn btn-sm btn-outline-dark shadow-none">Voir plus ...</a>
   </div>



   <footer class="bg-light">
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-4 p-4">
        <h3 class="h-font fw-bold fs-3 mb-3">Liens</h3>
        <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3" > <i class="bi bi-chevron-compact-right"style="color: #27ae60;"></i> Acceuil</a><br>
        <a href="produits.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"><i class="bi bi-chevron-compact-right"style="color: #27ae60;"></i> Produits</a><br>
        <a href="signalement.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"><i class="bi bi-chevron-compact-right"style="color: #27ae60;"></i> Voir signalements</a><br>
        <a href="etude.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"><i class="bi bi-chevron-compact-right"style="color: #27ae60;"></i> Etude</a><br>
      </div>

      <div class="col-lg-4 p-4">
      <h3>Infos contact</h3>
         <p> <i class="bi bi-telephone" style="color: #27ae60;"></i> +213-771-127-516 </p>
         <p> <i class="bi bi-telephone" style="color: #27ae60;"></i> +213-659-167-307 </p>
         <p> <i class="bi bi-envelope-fill" style="color: #27ae60;"></i> salamaty@gmail.gov.dz </p>
         <p> <i class="bi bi-geo-alt-fill" style="color: #27ae60;"></i> Algerie - 15000 </p>
      </div>

      <div class="col-lg-4 p-4">
      <h3>Suivez nous</h3>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"> <i class="bi bi-facebook" style="color: #27ae60;"></i> facebook </a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"> <i class="bi bi-twitter" style="color: #27ae60;"></i> twitter </a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"> <i class="bi bi-instagram" style="color: #27ae60;"></i> instagram </a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"> <i class="bi bi-linkedin" style="color: #27ae60;"></i> linkedin </a><br>
      </div>


    </div>

  </div>

</footer>   

   <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
</body>
</html>