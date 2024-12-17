const express = require('express');
const ProprietariosController = require('../controllers/ProprietariosController');

const router = express.Router();
router.post('/proprietarios', ProprietariosController.adicionarProprietario);
router.get('/proprietarios', ProprietariosController.listarProprietarios);
router.get('/proprietarios/:id', ProprietariosController.listarProprietario);
router.put('/proprietarios/:id', ProprietariosController.atualizarProprietario);
router.delete('/proprietarios/:id', ProprietariosController.deletarProprietario);
router.get('/proprietarios/pesquisar/:nome', ProprietariosController.pesquisarProprietario);
router.get('/proprietarios/ordenar/maior-numero-produtos', ProprietariosController.proprietarioMaiorNumeroProdutos);
module.exports = router;