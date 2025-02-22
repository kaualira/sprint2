<?php
  include_once("templates/header.php");
?>
  <div class="container">
    <?php if(isset($printMsg) && $printMsg != ''): ?>
      <p id="msg"><?= $printMsg ?></p>
    <?php endif; ?>
    <h1 id="main-title">Meus Clientes</h1>
    <?php if(count($contacts) > 0): ?>
      <table class="table" id="contacts-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereco</th>
            <th scope="col">Telefone</th>
            <th scope="col">Celular</th>
            <th scope="col">CPF</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($contacts as $contact): ?>
            <tr>
              <td scope="row" class="col-id"><?= $contact["CodCliente"] ?></td>
              <td scope="row"><?= $contact["Nome"] ?></td>
              <td scope="row"><?= $contact["Endereco"] ?></td>
              <td scope="row"><?= $contact["Telefone"] ?></td>
              <td scope="row"><?= $contact["Celular"] ?></td>
              <td scope="row"><?= $contact["CPF"] ?></td>
              <td class="actions">
                <a href="<?= $BASE_URL ?>show.php?id=<?= $contact["CodCliente"] ?>"><i class="fas fa-eye check-icon"></i></a>
                <a href="<?= $BASE_URL ?>edit.php?id=<?= $contact["CodCliente"] ?>"><i class="far fa-edit edit-icon"></i></a>
                <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="CodCliente" value="<?= $contact["CodCliente"] ?>">
                  <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>  
      <p id="empty-list-text">Ainda não há clientes, <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar</a>.</p>
    <?php endif; ?>
  </div>
<?php
  include_once("templates/footer.php");
?>

<!-- Participantes:

Júlião Pombero Mogi
Kauã Lira Yasumura
Kauan Silva Vieira
Laura Perez
Leticia Gabrielly
Luis 
Thell Zardi -->