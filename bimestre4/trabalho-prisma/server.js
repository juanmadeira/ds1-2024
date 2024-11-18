const express = require("express");
const bodyParser = require("body-parser");
const { PrismaClient } = require("@prisma/client");

const prisma = new PrismaClient();
const app = express();
app.use(bodyParser.json());

const PORT = 3000;

// iniciar o servidor
app.listen(PORT, () => {
    console.log(`:: SERVIDOR ABERTO NA PORTA ${PORT}`);
});

// CRUD de proprietários
app.post("/proprietarios", async (req, res) => {
    const { nome, email, endereco } = req.body;
    try {
        const novoProprietario = await prisma.proprietario.create({
    data: { nome, email, endereco },
    });
    res.status(201).json(novoProprietario);
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
});

app.get("/proprietarios", async (req, res) => {
    const proprietarios = await prisma.proprietario.findMany();
    res.json(proprietarios);
});

app.get("/proprietarios/:id", async (req, res) => {
    const { id } = req.params;
    const proprietario = await prisma.proprietario.findUnique({
        where: { id: parseInt(id) },
    });
    if (!proprietario) return res.status(404).json({ error: "Proprietário não encontrado" });
    res.json(proprietario);
});

app.put("/proprietarios/:id", async (req, res) => {
    const { id } = req.params;
    const { nome, email, endereco } = req.body;
    try {
        const proprietarioAtualizado = await prisma.proprietario.update({
        where: { id: parseInt(id) },
        data: { nome, email, endereco },
        });
        res.json(proprietarioAtualizado);
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
});

app.delete("/proprietarios/:id", async (req, res) => {
    const { id } = req.params;
    try {
        await prisma.proprietario.delete({ where: { id: parseInt(id) } });
        res.status(204).send();
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
});

// pesquisar proprietário pelo pedaço do nome
app.get("/proprietarios/search/:nome", async (req, res) => {
    const { nome } = req.params;
    const proprietarios = await prisma.proprietario.findMany({
        where: { nome: { contains: nome } }
    });
    res.json(proprietarios);
});  

// CRUD de Produtos
app.post("/produtos", async (req, res) => {
    const { desc, qtd, valor, proprietarioId } = req.body;
    try {
    const novoProduto = await prisma.produto.create({
            data: { desc, qtd, valor, proprietarioId },
        });
        res.status(201).json(novoProduto);
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
});

app.get("/produtos", async (req, res) => {
    const produtos = await prisma.produto.findMany();
    res.json(produtos);
});

app.get("/produtos/:id", async (req, res) => {
    const { id } = req.params;
    const produto = await prisma.produto.findUnique({
        where: { id: parseInt(id) },
    });
    if (!produto) return res.status(404).json({ error: "Produto não encontrado" });
    res.json(produto);
});

app.put("/produtos/:id", async (req, res) => {
    const { id } = req.params;
    const { desc, qtd, valor, proprietarioId } = req.body;
    try {
        const produtoAtualizado = await prisma.produto.update({
            where: { id: parseInt(id) },
            data: { desc, qtd, valor, proprietarioId },
        });
        res.json(produtoAtualizado);
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
});

app.delete("/produtos/:id", async (req, res) => {
    const { id } = req.params;
    try {
    await prisma.produto.delete({ where: { id: parseInt(id) } });
        res.status(204).send();
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
});

// pesquisar produto de maior quantidade
app.get("/produtos/ordenar/maior-quantidade", async (req, res) => {
    const produto = await prisma.produto.findFirst({
        orderBy: { qtd: "desc" },
    });
    res.json(produto);
});

// pesquisar produto de maior valor
app.get("/produtos/ordenar/maior-valor", async (req, res) => {
    const produto = await prisma.produto.findFirst({
        orderBy: { valor: "desc" },
    });
    res.json(produto);
});

// pesquisar produto de maior valor total (qtd * valor)
app.get("/produtos/ordenar/maior-valor-total", async (req, res) => {
    const produtos = await prisma.produto.findMany();
    const maiorValorTotal = produtos.reduce((max, produto) => {
    const valorTotal = produto.qtd * produto.valor;
    return valorTotal > max.valorTotal
    ? { produto, valorTotal }
    : max;
    }, { valorTotal: 0 });
    res.json(maiorValorTotal.produto);
});

// pesquisar o proprietário com o maior número de produtos
app.get("/proprietarios/ordenar/maior-numero-produtos", async (req, res) => {
    const proprietarios = await prisma.proprietario.findMany({
        include: { produtos: true },
    });
    const maior = proprietarios.reduce((max, proprietario) => {
    return proprietario.produtos.length > max.produtos.length
    ? proprietario
    : max;
    });
    res.json(maior);
});  