<?php

namespace Model\VO;

final class LivrosVO extends VO {

    private $titulo;
    private $autores;
    private $editora;
    private $ano_publicacao;
    private $quantidade_exemplares;
    private $isbn;
    private $exemplares_disponiveis;

    public function __construct($id = 0, $titulo = "", $autores = "", $editora = "", $ano_publicacao = null, $quantidade_exemplares = 0, $isbn = "", $exemplares_disponiveis = 0) {
        parent::__construct($id);
        $this->titulo = $titulo;
        $this->autores = $autores;
        $this->editora = $editora;
        $this->ano_publicacao = $ano_publicacao;
        $this->quantidade_exemplares = $quantidade_exemplares;
        $this->isbn = $isbn;
        $this->exemplares_disponiveis = $exemplares_disponiveis;
    }


    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutores() {
        return $this->autores;
    }

    public function getEditora() {
        return $this->editora;
    }

    public function getAnoPublicacao() {
        return $this->ano_publicacao;
    }

    public function getQuantidadeExemplares() {
        return $this->quantidade_exemplares;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getExemplaresDisponiveis() {
        return $this->exemplares_disponiveis;
    }


    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAutores($autores) {
        $this->autores = $autores;
    }

    public function setEditora($editora) {
        $this->editora = $editora;
    }

    public function setAnoPublicacao($ano_publicacao) {
        $this->ano_publicacao = $ano_publicacao;
    }

    public function setQuantidadeExemplares($quantidade_exemplares) {
        $this->quantidade_exemplares = $quantidade_exemplares;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setExemplaresDisponiveis($exemplares_disponiveis) {
        $this->exemplares_disponiveis = $exemplares_disponiveis;
    }
}
