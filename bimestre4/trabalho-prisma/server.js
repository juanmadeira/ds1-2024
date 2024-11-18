const express = require("express");
const bodyParser = require("body-parser");
const ProprietariosRoutes = require('./routes/ProprietariosRoutes');
const ProdutosRoutes = require('./routes/ProdutosRoutes');
const { PrismaClient } = require("@prisma/client");

const prisma = new PrismaClient();
const app = express();
app.use(ProprietariosRoutes);
app.use(ProdutosRoutes);
app.use(bodyParser.json());

const PORT = 3000;

// iniciar o servidor
app.listen(PORT, () => {
    console.log(`:: SERVIDOR ABERTO NA PORTA ${PORT}`);
});