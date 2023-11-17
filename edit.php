<?php
  include_once("templates/header.php");
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Editar cliente</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
      <input type="hidden" name="type" value="edit">
      <input type="hidden" name="CodCliente" value="<?= $contact['CodCliente'] ?>">
      
      <div class="form-group">
        <label for="Nome">Nome do cliente:</label>
        <input type="text" class="form-control" id="Nome" name="Nome" placeholder="Digite o nome" value="<?= $contact['Nome'] ?>" required>
      </div>
      
      <div class="form-group">
        <label for="Endereco">Endereço do cliente:</label>
        <input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Digite o endereço" value="<?= $contact['Endereco'] ?>" required>
      </div>

      <div class="form-group">
        <label for="Telefone">Telefone do cliente:</label>
        <input type="text" class="form-control" id="Telefone" name="Telefone" placeholder="Digite o telefone" value="<?= $contact['Telefone'] ?>" required>
      </div>

      <div class="form-group">
        <label for="Celular">Celular do cliente:</label>
        <input type="text" class="form-control" id="Celular" name="Celular" placeholder="Digite o celular" value="<?= $contact['Celular'] ?>" required>

      <div class="form-group">
        <label for="cpf">CPF do cliente:</label>
        <input type="text" class="form-control" id="CPF" name="CPF" placeholder="Digite o CPF" value="<?= $contact['CPF'] ?>" required>
      </div>
     
    
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>