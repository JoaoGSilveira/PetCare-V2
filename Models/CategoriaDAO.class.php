<?php

    class CategoriaDAO{
        public function __construct(private $db = null){}

        public function inserir($categoria){
            $sql = "INSERT INTO categoria_produto (nome_categoria, status_categoria) VALUES(?,?)";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $categoria->getDescritivo());
            $stm->bindValue(2, $categoria->getStatus());
            $stm->execute();
            $this->db = null;
        }

        public function buscar_todos(){
            $sql = "SELECT * FROM categoria_produto";
            try
			{
                $stm = $this->db->prepare($sql);
                $stm->execute();
                $this->db = null;
                return $stm->fetchAll(PDO::FETCH_OBJ);
			}
            catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar produtos";
			}
        }

        public function buscar_categorias_ativas($categoria)
        {
            $sql = "SELECT * FROM categoria_produto WHERE status_categoria = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $categoria->getStatus());
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function alterar($categoria)
		{
			$sql = "UPDATE categoria_produto SET nome_categoria = ? WHERE id_categoria = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $categoria->getDescritivo());
			$stm->bindValue(2, $categoria->getIdCategoria());
			$stm->execute();
			$this->db = null;
		}

        public function buscar_uma_categoria($categoria)
		{
			$sql = "SELECT * FROM categoria_produto WHERE id_categoria = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$categoria->getIdcategoria());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

        public function alterar_status_categoria($categoria)
		{
			$sql = "UPDATE categoria_produto SET status_categoria = ? WHERE id_categoria = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $categoria->getStatus());
			$stm->bindValue(2, $categoria->getIdcategoria());
			$stm->execute();
			$this->db = null;
		}

        public function buscarPorId($id) {
            $sql = "SELECT * FROM categoria_produto WHERE id_categoria = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $resultado = $stm->fetch(PDO::FETCH_ASSOC);
    
            if ($resultado) {
                $categoria = new Categoria_Produto(
                    $resultado['id_categoria'],
                    $resultado['nome_categoria'],
                    $resultado['status_categoria']
                );
                return $categoria;
            } else {
                return null;
            }
        }
    }

?>