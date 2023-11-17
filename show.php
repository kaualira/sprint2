<?php
  include_once("templates/header.php");
?>

  <div class="container" id="view-contact-container"> 
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title"><?= $contact["Nome"] ?></h1>
    <p class="bold">Endereço:</p>
    <p class="form-control"><?= $contact["Endereco"] ?></p>
    <p class="bold">Telefone</p>
    <p class="form-control"><?= $contact["Telefone"] ?></p>
    <p class="bold">Celular</p>
    <p class="form-control"><?= $contact["Celular"] ?></p>
    <p class="bold">CPF</p>
    <p class="form-control"><?= $contact["CPF"] ?></p>
  </div>
<?php
  include_once("templates/footer.php");
?>
