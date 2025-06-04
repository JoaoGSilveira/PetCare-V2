<?php

    class MarcaDAO{
        
        // O construtor injeta a conexão na propriedade $this->db
        public function __construct(private $db = null){}

        public function inserir($marca){
            $sql = "INSERT INTO marca (nome, status_marca) VALUES(?,?)";
            $stm = $this->db->prepare($sql); // ✅ Corrigido: $this->db
            $stm->bindValue(1, $marca->getNome());
            $stm->bindValue(2, $marca->getStatus());
            $stm->execute();
            // ✅ Recomendado: remova $this->db = null; daqui e de outros métodos
            // O ideal é que a conexão seja mantida aberta enquanto o DAO é usado
            // e gerenciada pela classe Conexao (singleton) ou pelo ciclo de vida da aplicação.
            // Se você fechar aqui, outras chamadas subsequentes no mesmo request podem falhar.
            // $this->db = null; // Removido
        }

        public function buscar_todos(){
            $sql = "SELECT * FROM marca";
            $stm = $this->db->prepare($sql); // ✅ Corrigido: $this->db
            $stm->execute();
            // $this->db = null; // Removido
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function buscar_marcas_ativas($marca)
        {
            $sql = "SELECT * FROM marca WHERE status_marca = ?";
            $stm = $this->db->prepare($sql); // ✅ Corrigido: $this->db
            $stm->bindValue(1, $marca->getStatus());
            $stm->execute();
            // $this->db = null; // Removido
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function alterar_status_marca($marca)
        {
            $sql = "UPDATE marca SET status_marca = ? WHERE id_marca = ?";
            $stm = $this->db->prepare($sql); // ✅ Corrigido: $this->db
            $stm->bindValue(1, $marca->getStatus());
            $stm->bindValue(2, $marca->getIdMarca());
            $stm->execute();
            // $this->db = null; // Removido
        }

        public function buscar_uma_marca($id_marca){
            $sql = "SELECT * FROM marca WHERE id_marca = ?";
            $stm = $this->db->prepare($sql); // ✅ Corrigido: $this->db
            $stm->bindValue(1, $id_marca, PDO::PARAM_INT);
            $stm->execute();
            // $this->db = null; // Removido
            return $stm->fetch(PDO::FETCH_OBJ);
        }

        public function alterar($marca)
        {
            $sql = "UPDATE marca SET nome = ? WHERE id_marca = ?";
            $stm = $this->db->prepare($sql); // ✅ Corrigido: $this->db
            $stm->bindValue(1, $marca->getNome());
            $stm->bindValue(2, $marca->getIdMarca());
            $stm->execute();
            // $this->db = null; // Removido
        }

        public function buscarPorId($id) {
            $sql = "SELECT * FROM marca WHERE id_marca = ?";
            $stm = $this->db->prepare($sql); // ✅ Corrigido: $this->db
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $resultado = $stm->fetch(PDO::FETCH_ASSOC);
    
            if ($resultado) {
                // Instanciando o objeto Marca. Ajuste os argumentos conforme seu construtor Marca.
                // Linha 78 (ou a linha onde você instancia Marca)
            $marca = new Marca(
                id_marca: $resultado['id_marca'],
                nome: $resultado['nome'],
                status: $resultado['status_marca']
            );
                return $marca;
            } else {
                return null;
            }
        }
    }

?>