<?php

namespace Model;

use Model\VO\AlunosVO;

final class AlunosModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM alunos";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new AlunosVO(
                $row["id"], 
                $row["nome"], 
                $row["data_nascimento"], 
                $row["curso"], 
                $row["cpf"]
            );
            array_push($arrayDados, $vo);
        }
        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM alunos WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new AlunosVO(
            $data[0]["id"], 
            $data[0]["nome"], 
            $data[0]["data_nascimento"], 
            $data[0]["curso"], 
            $data[0]["cpf"],
            $data[0]["nome_curso"]
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO alunos (nome, data_nascimento, curso, cpf) 
                  VALUES (:nome, :data_nasc, :curso, :cpf)";
        
        $binds = [
            ":nome" => $vo->getNome(),
            ":data_nasc" => $vo->getDataNasc(),
            ":curso" => $vo->getCurso(),
            ":cpf" => $vo->getCpf()
        ];
        
        return $db->execute($query, $binds);
    }
    
    public function update($vo) {
        $db = new Database();
        $query = "UPDATE alunos 
                  SET nome = :nome, data_nascimento = :data_nasc, curso = :curso, cpf = :cpf
                  WHERE id = :id";
    
        $binds = [
            ":nome" => $vo->getNome(),
            ":data_nasc" => $vo->getDataNasc(),
            ":curso" => $vo->getCurso(),
            ":cpf" => $vo->getCpf(),
            ":id" => $vo->getId()
        ];
    
        return $db->execute($query, $binds);
    }
    
    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM alunos WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        
        return $db->execute($query, $binds);
    }
    
}
