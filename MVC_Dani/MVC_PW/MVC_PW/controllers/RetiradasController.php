<?php

namespace Controller;

use Model\RetiradasModel;
use Model\VO\RetiradasVO;
use Model\AlunosModel;
use Model\VO\AlunosVO;
use Model\LivrosModel;
use Model\VO\LivrosVO;

final class RetiradasController extends Controller {

    public function list() {
        $model = new RetiradasModel();
        $data = $model->selectAll(new RetiradasVO());

        $this->loadView("listRetiradas", [
            "retiradas" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        $modelAlunos = new AlunosModel();
        $voAlunos = new AlunosVO();
        $alunos = $modelAlunos->selectAll($voAlunos);
        
        $modelLivros = new LivrosModel();
        $voLivros = new LivrosVO();
        $livros = $modelLivros->selectAll($voLivros);
    
        if(!empty($id)) {
            $modelRetirada = new RetiradasModel();
            $voRetirada = new RetiradasVO($id);
            $retirada = $modelRetirada->selectOne($voRetirada);

        } else {
            $retirada = new RetiradasVO();
        }

        $this->loadView("formRetiradas", [
            "retirada" => $retirada,
            "alunos" => $alunos,
            "livros" => $livros
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $idLivro = $_POST["id_livro"];
    
        date_default_timezone_set('America/Sao_Paulo');
        
        $data_retirada = date($_POST["data_retirada"]);  
        $qtdDias = 7;
        $data_devolucao = date('Y-m-d', strtotime("+{$qtdDias} days", strtotime($data_retirada)));
    
        $vo = new RetiradasVO(
            $_POST["id"],
            $_POST["id_aluno"],
            $idLivro,
            $data_retirada,
            $data_devolucao
        );
        $model = new RetiradasModel();
    
        $livrosModel = new LivrosModel();
        $livro = $livrosModel->findById($idLivro);
    
        if ($livro->getExemplaresDisponiveis() <= 0) {
            echo '<a href="mostraRetiradas.php">Voltar para Retiradas</a>';
            echo "Não existem mais exemplares disponíveis para este livro.";
            return;
        }

        if (empty($id)) {
            $result = $model->insert($vo);
            $livrosModel->decrementExemplares($idLivro);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("mostraRetiradas.php");
    }
    

    public function remove() {
        $vo = new RetiradasVO($_GET["id"]);
        $model = new RetiradasModel();
        
        $retirada = $model->findById($_GET["id"]);
        $idLivro = $retirada->getIdLivro();
        
        echo $idLivro;
        
        $livrosModel = new LivrosModel();
        $livrosModel->incrementExemplares($idLivro);

        $result = $model->delete($vo);
        $this->redirect("mostraRetiradas.php");
    }
    
}