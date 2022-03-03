<link href="style.css" rel="stylesheet">
<?php require_once __DIR__ . '/imports.php'; 
require_once __DIR__ . '/../../../CONNECT/config.php';
?>

<div id="navigation">
    
    <nav>
        <a href="home.php"><img src="../front/assets/logoAuBordDesRues.svg" alt="logoAuBordDesRues"></a>
        <div class="langues">
            <span>FR</span>
            <img src="<?=ROOTFRONT?>/front/assets/fleche_bas.svg" alt="fleche_bas">
            <!-- <img src="../front/assets/fleche_bas.svg" alt="fleche_bas"> -->
        </div>

        <a href="./pageArticles.php">Articles</a>
        <a href="#">Newsletter</a>
        <a href="#">Contact</a>
    </nav>

    <div class="connect">
        <?php if(isset($_COOKIE['eMailMemb'])){?>  <a href="#"><?= $_COOKIE['pseudoMemb'] ?></a> <?php } else{?>
        <a href="../connexion.php">Connexion</a>
        <?php } if(isset($_COOKIE['eMailMemb'])){ ?>
        <a class="btn_inscription" href="../deconnexion.php">Déconnexion</a> <?php } else{ ?>
        <a class="btn_inscription" href="../inscription.php">Inscription</a>
        <?php } ?>
    </div>
</div>



<script>
    window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navigation");
var sticky = navbar.offsetTop;
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

</script>