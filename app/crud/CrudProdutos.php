    <?php

    require_once '../database/Conexao.php';
    require_once '../models/Produto.php';



    class CrudProdutos{
        
        private $conexao;
        private $produto;
        
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        //cadastrar produto - questão 6
        public function cadastrar(Produto $produto){
            $sql = "INSERT INTO produtos 
                    (nome, preco, estoque_min, descricao, estoque, idTipoProduto) 
                    VALUES ('{$produto->nome}', '{$produto->preco}', {$produto->estoqueMin}, 
                            '{$produto->descricao}', {$produto->estoque}, {$produto->tipoProduto})";
            echo $sql;
            return $this->conexao->exec($sql);        
        }

        public function getProduto($id){
            $consulta = $this->conexao->query("SELECT * FROM produtos WHERE id_produto = $id");
            $produto = $consulta->fetch(PDO::FETCH_ASSOC); //SEMELHANTES JSON ENCODE E DECODE
            return new Produto($produto['id_produto'], $produto['preco'], $produto['estoque_min'], $produto['descricao'], $produto['estoque'], $produto['idTipoProduto']);
        }

        public function getTiposProduto(){
            $consulta = "select * from tipoproduto order by tipo";
            $res = $this->conexao->query($consulta);
            $tipos = $res->fetchAll(PDO::FETCH_ASSOC);

            return $tipos;


        }

        public function getProdutos(){
            $consulta = $this->conexao->query("SELECT * FROM produtos"); //msm coisa q usar a funcao p pegar td em

            $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return $arrayProdutos;
        }



        //excluir produto
        public function excluir($idProduto){
            $this->conexao->exec("DELETE FROM produtos WHERE id_produto = $idProduto");
        }


        //editar produtos
        public function editar( $idProduto){
            $this->conexao->exec("UPDATE Produtos SET id_produto = $idProduto, 
                                                                'nome = $nome'                                                             
                                                                'preco = $preco', 
                                                                estoque_min = $estoqueMin, 
                                                                'descricao = $descricao', 
                                                                estoque = $estoque,
                                                                idTipoProduto=$idTipoProduto 
            WHERE id_produto =$idProduto");
        }
    }



