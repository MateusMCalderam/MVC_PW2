<?php

namespace Model;

use Model\VO\LivrosVO;

final class LivrosModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM livros";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new LivrosVO(
                $row["id"], 
                $row["titulo"], 
                $row["autores"], 
                $row["editora"], 
                $row["ano_publicacao"], 
                $row["quantidade_exemplares"], 
                $row["isbn"],
                $row["exemplares_disponiveis"],
            );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM livros WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new LivrosVO(
            $data[0]["id"], 
            $data[0]["titulo"], 
            $data[0]["autores"], 
            $data[0]["editora"], 
            $data[0]["ano_publicacao"], 
            $data[0]["quantidade_exemplares"], 
            $data[0]["isbn"],
            $data[0]["exemplares_disponiveis"]
        );
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO livros (titulo, autores, editora, ano_publicacao, quantidade_exemplares, isbn, exemplares_disponiveis) 
                  VALUES (:titulo, :autores, :editora, :ano_publicacao, :quantidade_exemplares, :isbn, :exemplares_disponiveis)";
        
        $binds = [
            ":titulo" => $vo->getTitulo(),
            ":autores" => $vo->getAutores(),
            ":editora" => $vo->getEditora(),
            ":ano_publicacao" => $vo->getAnoPublicacao(),
            ":quantidade_exemplares" => $vo->getQuantidadeExemplares(),
            ":isbn" => $vo->getIsbn(),
            ":exemplares_disponiveis" => $vo->getExemplaresDisponiveis()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();
        $query = "UPDATE livros 
                  SET titulo = :titulo, autores = :autores, editora = :editora, 
                      ano_publicacao = :ano_publicacao, quantidade_exemplares = :quantidade_exemplares, isbn = :isbn, exemplares_disponiveis = :exemplares_disponiveis
                  WHERE id = :id";

        $binds = [
            ":titulo" => $vo->getTitulo(),
            ":autores" => $vo->getAutores(),
            ":editora" => $vo->getEditora(),
            ":ano_publicacao" => $vo->getAnoPublicacao(),
            ":quantidade_exemplares" => $vo->getQuantidadeExemplares(),
            ":isbn" => $vo->getIsbn(),
            ":id" => $vo->getId(),
            ":exemplares_disponiveis" => $vo->getExemplaresDisponiveis()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM livros WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        
        return $db->execute($query, $binds);
    }

    public function findById($idLivro) {
        $db = new Database();
        $query = "SELECT * FROM livros WHERE id = :idLivro";
        $binds = [
            "idLivro" => $idLivro
        ];
        $data = $db->select($query, $binds);
        return new LivrosVO(
            $data[0]["id"], 
            $data[0]["titulo"], 
            $data[0]["autores"], 
            $data[0]["editora"], 
            $data[0]["ano_publicacao"], 
            $data[0]["quantidade_exemplares"], 
            $data[0]["isbn"],
            $data[0]["exemplares_disponiveis"]
        );
    }

    public function decrementExemplares($idLivro) {
        $db = new Database();
        $query = "UPDATE livros SET exemplares_disponiveis = exemplares_disponiveis - 1 WHERE id = :idLivro";
        $binds = [
            "idLivro" => $idLivro
        ];
        return $db->execute($query, $binds);
    }

    public function incrementExemplares($idLivro) {
        $db = new Database();
        $query = "UPDATE livros SET exemplares_disponiveis = exemplares_disponiveis + 1 WHERE id = :idLivro";
        $binds = [
            "idLivro" => $idLivro
        ];
        return $db->execute($query, $binds);
    }
}
