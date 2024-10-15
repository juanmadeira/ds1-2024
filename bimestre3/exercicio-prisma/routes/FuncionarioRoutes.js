const express = require('express');
const FuncionarioController = require('../controllers/FuncionarioController');

const router = express.Router();
router.get('/funcionarios', FuncionarioController.listarFuncionarios);
router.post('/funcionarios', FuncionarioController.inserirFuncionarios);
router.delete('/funcionarios/:id', FuncionarioController.deletarFuncionarios);
router.put('/funcionarios/:id', FuncionarioController.atualizarFuncionarios);
module.exports = router;