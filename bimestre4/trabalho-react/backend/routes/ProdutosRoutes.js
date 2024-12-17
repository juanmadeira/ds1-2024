const express = require('express');
const ProdutosController = require('../controllers/ProdutosController');

const router = express.Router();
router.post('/produtos', ProdutosController.adicionarProduto);
router.get('/produtos', ProdutosController.listarProdutos);
router.get('/produtos/:id', ProdutosController.listarProduto);
router.put('/produtos/:id', ProdutosController.atualizarProduto);
router.delete('/produtos/:id', ProdutosController.deletarProduto);
router.get('/produtos/ordenar/maior-quantidade', ProdutosController.produtoMaiorQuantidade);
router.get('/produtos/ordenar/maior-valor', ProdutosController.produtoMaiorValor);
router.get('/produtos/ordenar/maior-valor-total', ProdutosController.produtoMaiorValorTotal);
module.exports = router;