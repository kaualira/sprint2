<?php

  session_start();

  include_once("connection.php");
  include_once("url.php");

  $data = $_POST;

  // MODIFICAÇÕES NO BANCO
  if(!empty($data)) {

    // Criar contato
    if($data["type"] === "create") {

      $name = $data["Nome"];
      $add = $data["Endereco"];
      $tele = $data["Telefone"];
      $cel = $data["Celular"];
      $cpf = $data["CPF"];
      
      $query = "INSERT INTO Cliente (Nome, Endereco, Telefone, Celular, CPF) VALUES (:Nome, :Endereco, :Telefone, :Celular, :CPF)";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":Nome", $name);
      $stmt->bindParam(":Endereco", $add);
      $stmt->bindParam(":Telefone", $tele);
      $stmt->bindParam(":Celular", $cel);
      $stmt->bindParam(":CPF", $cpf);
      
      try {

        $stmt->execute();
        $_SESSION["msg"] = "Contato criado com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        $_SESSION["msg"] = "Erro: $error";
        //echo "Erro: $error";
      }

    } else if($data["type"] === "edit") {

      $name = $data["Nome"];
      $add = $data["Endereco"];
      $tele = $data["Telefone"];
      $cel = $data["Celular"];
      $cpf = $data["CPF"];
      $CC = $data["CodCliente"];

      $query = "UPDATE Cliente
                SET Nome = :Nome, Endereco = :Endereco, Telefone = :Telefone, Celular = :Celular, CPF = :CPF
                WHERE CodCliente = :CodCliente";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":Nome", $name);
      $stmt->bindParam(":Endereco", $add);
      $stmt->bindParam(":Telefone", $tele);
      $stmt->bindParam(":Celular", $cel);
      $stmt->bindParam(":CPF", $cpf);
      $stmt->bindParam(":CodCliente", $CC);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "Contato atualizado com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    } else if($data["type"] === "delete") {

      $CC = $data["CodCliente"];

      $query = "DELETE FROM Cliente WHERE CodCliente = :CodCliente";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":CodCliente", $CC);
      
      try {

        $stmt->execute();
        $_SESSION["msg"] = "Contato removido com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    }

    // Redirect HOME
    header("Location:" . $BASE_URL . "../index.php");

  // SELEÇÃO DE DADOS
  } else {
    
    $CC;

    if(!empty($_GET)) {
      $CC = $_GET["id"];
    }

    // Retorna o dado de um contato
    if(!empty($CC)) {

      $query = "SELECT * FROM Cliente WHERE CodCliente = :CodCliente";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":CodCliente", $CC);

      $stmt->execute();

      $contact = $stmt->fetch();

    } else {

      // Retorna todos os contatos
      $contacts = [];

      $query = "SELECT * FROM Cliente";

      $stmt = $conn->prepare($query);

      $stmt->execute();
      
      $contacts = $stmt->fetchAll();

    }

  }

  // FECHAR CONEXÃO
  $conn = null;