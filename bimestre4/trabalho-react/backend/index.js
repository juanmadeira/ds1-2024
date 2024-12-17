const express = require("express");
const bodyParser = require("body-parser");
const ProprietariosRoutes = require('./routes/ProprietariosRoutes');
const ProdutosRoutes = require('./routes/ProdutosRoutes');
const { PrismaClient } = require("@prisma/client");
const prisma = new PrismaClient();
const app = express();

const cors = require('cors');
app.use(cors({credentials: true}));

app.use(bodyParser.json());
app.use(ProprietariosRoutes);
app.use(ProdutosRoutes);

const PORT = 3001;

// iniciar o servidor
app.listen(PORT, () => {
    console.log(`:: SERVIDOR ABERTO NA PORTA ${PORT}`);
});
