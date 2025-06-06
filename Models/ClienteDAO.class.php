<?php

    class ClienteDAO{
        
        public function __construct(private $db = null){}

        public function inserir($cliente){
            $sql = "INSERT INTO usuario (tipo, nome, email, senha, telefone, cpf, logradouro, bairro, cep, cidade, uf, numero, status_cliente) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $cliente->getTipo());
            $stm->bindValue(2, $cliente->getNome());
            $stm->bindValue(3, $cliente->getEmail());
            $stm->bindValue(4, $cliente->getSenha());
            $stm->bindValue(5, $cliente->getTelefone());
            $stm->bindValue(6, $cliente->getCpf());
            $stm->bindValue(7, $cliente->getLogradouro());
            $stm->bindValue(8, $cliente->getBairro());
            $stm->bindValue(9, $cliente->getCep());
            $stm->bindValue(10, $cliente->getCidade());
            $stm->bindValue(11, $cliente->getUf());
            $stm->bindValue(12, $cliente->getNumero());
            $stm->bindValue(13, $cliente->getStatus());
            $stm->bindValue(13, $cliente->getStatus());
            $stm->execute();

            $idusuario = $this->db->lastInsertId();
            return $idusuario;
        }

        public function verificar_login($cliente){
            $sql = "SELECT id_cliente, nome, tipo FROM usuario WHERE email = ? AND senha = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $cliente->getEmail());
            $stm->bindValue(2, $cliente->getSenha());
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function buscar_todos(){
            $sql = "SELECT * FROM usuario ORDER BY nome";
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function alterar_status_cliente($cliente)
		{
			$sql = "UPDATE usuario SET status_cliente = ? WHERE id_cliente = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $cliente->getStatus());
			$stm->bindValue(2, $cliente->getIdCliente());
			$stm->execute();
			$this->db = null;
		}
    }

?>