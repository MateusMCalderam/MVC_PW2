<?php

namespace Controller;

use Model\LivrosModel;
use Model\RetiradasModel;
use Model\VO\LivrosVO;

final class LivrosController extends Controller {

    public function list() {
        $model = new LivrosModel();
        $data = $model->selectAll(new LivrosVO());

        $this->loadView("listLivros", [
            "livros" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new LivrosModel();
            $vo = new LivrosVO($id);
            $livro = $model->selectOne($vo);
        } else {
            $livro = new LivrosVO();
        }

        $this->loadView("formLivros", [
            "livro" => $livro
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $quantidade_exemplares = $_POST["quantidade_exemplares"];
        
        $model = new LivrosModel();

        $vo = new LivrosVO(
            $_POST["id"],
            $_POST["titulo"],
            $_POST["autores"],
            $_POST["editora"],
            $_POST["ano_publicacao"],
            $quantidade_exemplares,
            $_POST["isbn"],
            $quantidade_exemplares
        );
        
        if (!empty($id)) {
            $retiradasModel = new RetiradasModel();
            $retiradasAtivas = $retiradasModel->countRetiradasAtivasPorLivro($id);
            
            if ($quantidade_exemplares < $retiradasAtivas) {
                $erro = "Erro: Existem mais retiradas ativas do que exemplares disponíveis. Atualize a quantidade para ser maior ou igual a $retiradasAtivas.";
                $this->loadView("formLivros", [
                    "livro" => $vo,
                    "erro" => $erro
                ]);
                return;
            } else {
                $vo = new LivrosVO(
                    $_POST["id"],
                    $_POST["titulo"],
                    $_POST["autores"],
                    $_POST["editora"],
                    $_POST["ano_publicacao"],
                    $quantidade_exemplares,
                    $_POST["isbn"],
                    $quantidade_exemplares - $retiradasAtivas
                );
            }
        } 
    
        if (empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }
    
        $this->redirect("index.php");
    }

    public function remove() {
        $vo = new LivrosVO($_GET["id"]);
        $model = new LivrosModel();
        $result = $model->delete($vo);
        $this->redirect("index.php");
    }

}