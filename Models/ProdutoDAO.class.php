<?php

    class ProdutoDAO{

            public function __construct(private $db = null){}

            public function inserir($produto){
                $sql = "INSERT INTO produto (nome, imagem, estoque, preco, animal, descritivo, id_marca, id_categoria, status_produto) VALUES(?,?,?,?,?,?,?,?,?)";
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $produto->getNome());
                $stm->bindValue(2, $produto->getImagem());
                $stm->bindValue(3, $produto->getEstoque());
                $stm->bindValue(4, $produto->getPreco());
                $stm->bindValue(5, $produto->getAnimal());
                $stm->bindValue(6, $produto->getDescricao());
                $stm->bindValue(7, $produto->getMarca()->getIdMarca());
                $stm->bindValue(8, $produto->getCategoria_produto()->getIdCategoria());
                $stm->bindValue(9, $produto->getStatus());
                $stm->execute();
                $this->db = null;
            }
            

        public function buscar_todos()
        {
            $sql = "SELECT * FROM produto";
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

        public function buscar_produtos_ativas($produto)
        {
            $sql = "SELECT * FROM produto WHERE status_produto = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $produto->getStatus());
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function buscar_produtos_por_categoria($id_categoria)
        {
            $sql = "SELECT * FROM produto WHERE id_categoria = ? AND status_produto = 'Ativo'";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id_categoria);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function alterar_status_produto($produto)
		{
			$sql = "UPDATE produto SET status_produto = ? WHERE id_produto = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $produto->getStatus());
			$stm->bindValue(2, $produto->getIdProduto());
			$stm->execute();
			$this->db = null;
		}

        public function buscarPorId($id){
            $sql = "SELECT * FROM produto WHERE id_produto = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            $resultado = $stm->fetch(PDO::FETCH_ASSOC);
    
            if ($resultado) {

                $marcaDAO = new MarcaDAO($this->db);
                $categoriaDAO = new CategoriaDAO($this->db);
    
                $produto = new Produto(
                    idproduto: $resultado['id_produto'],
                    nome: $resultado['nome'],
                    descricao: $resultado['descritivo'],
                    preco: $resultado['preco'],
                    estoque: $resultado['estoque'],
                    imagem: $resultado['imagem'],
                    animal: $resultado['animal'],
                    status: $resultado['status_produto'],
                    marca: $marcaDAO->buscarPorId($resultado['id_marca']), 
                    categoria_produto: $categoriaDAO->buscarPorId($resultado['id_categoria'])
                );
    
                return $produto;
            } else {
                return null;
            }
        }
        

    }

?>