const { PrismaClient } = require('@prisma/client');
const prisma = new PrismaClient();

module.exports = {
    async adicionarProduto (req, res) {
        const { desc, qtd, valor, proprietarioId } = req.body;
        try {
        const novoProduto = await prisma.produto.create({
                data: { desc, qtd, valor, proprietarioId },
            });
            res.status(201).json(novoProduto);
        } catch (error) {
            res.status(400).json({ error: error.message });
        }
    },
    
    async listarProdutos (req, res) {
        const produtos = await prisma.produto.findMany();
        res.json(produtos);
    },
    
    async listarProduto (req, res) {
        const { id } = req.params;
        const produto = await prisma.produto.findUnique({
            where: { id: parseInt(id) },
        });
        if (!produto) return res.status(404).json({ error: "Produto não encontrado" });
        res.json(produto);
    },
    
    async atualizarProduto (req, res) {
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
    },
    
    async deletarProduto (req, res) {
        const { id } = req.params;
        try {
        await prisma.produto.delete({ where: { id: parseInt(id) } });
            res.status(204).send();
        } catch (error) {
            res.status(400).json({ error: error.message });
        }
    },
    
    async produtoMaiorQuantidade (req, res) {
        const produto = await prisma.produto.findFirst({
            orderBy: { qtd: "desc" },
        });
        res.json(produto);
    },
    
    async produtoMaiorValor (req, res) {
        const produto = await prisma.produto.findFirst({
            orderBy: { valor: "desc" },
        });
        res.json(produto);
    },
    
    async produtoMaiorValorTotal (req, res) {
        const produtos = await prisma.produto.findMany();
        const maiorValorTotal = produtos.reduce((max, produto) => {
        const valorTotal = produto.qtd * produto.valor;
        return valorTotal > max.valorTotal
        ? { produto, valorTotal }
        : max;
        }, { valorTotal: 0 });
        res.json(maiorValorTotal.produto);
    }
}