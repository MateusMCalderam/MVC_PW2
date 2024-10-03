<?php

namespace Model\VO;

final class AlunosVO extends VO {

    private $nome;
    private $data_nasc;
    private $curso;
    private $cpf;
    
    public function __construct($id = 0, $nome = "", $data_nasc = null, $curso = "", $cpf = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->data_nasc = $data_nasc;
        $this->curso = $curso;
        $this->cpf = $cpf;
    }

    public function getNome() {
        return $this->nome;
    }
    public function getCurso() {
        return $this->curso;
    }

    public function getDataNasc() {
        return $this->data_nasc;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }
    
    public function setDataNasc($data_nasc) {
        $this->data_nasc = $data_nasc;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
}
