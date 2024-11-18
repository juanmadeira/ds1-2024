const { PrismaClient } = require('@prisma/client');
const prisma = new PrismaClient();

module.exports = {
    async adicionarProprietario (req, res) {
        const { nome, email, endereco } = req.body;
        try {
            const novoProprietario = await prisma.proprietario.create({
        data: { nome, email, endereco },
        });
        res.status(201).json(novoProprietario);
        } catch (error) {
            res.status(400).json({ error: error.message });
        }
    },
    
    async listarProprietarios (req, res) {
        const proprietarios = await prisma.proprietario.findMany();
        res.json(proprietarios);
    },
    
    async listarProprietario (req, res) {
        const { id } = req.params;
        const proprietario = await prisma.proprietario.findUnique({
            where: { id: parseInt(id) },
        });
        if (!proprietario) return res.status(404).json({ error: "Proprietário não encontrado" });
        res.json(proprietario);
    },
    
    async atualizarProprietario (req, res) {
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
    },
    
    async deletarProprietario (req, res) {
        const { id } = req.params;
        try {
            await prisma.proprietario.delete({ where: { id: parseInt(id) } });
            res.status(204).send();
        } catch (error) {
            res.status(400).json({ error: error.message });
        }
    },
    
    async pesquisarProprietario (req, res) {
        const { nome } = req.params;
        const proprietarios = await prisma.proprietario.findMany({
            where: { nome: { contains: nome } }
        });
        res.json(proprietarios);
    },
    
    async proprietarioMaiorNumeroProdutos (req, res) {
        const proprietarios = await prisma.proprietario.findMany({
            include: { produtos: true },
        });
        const maior = proprietarios.reduce((max, proprietario) => {
        return proprietario.produtos.length > max.produtos.length
        ? proprietario
        : max;
        });
        res.json(maior);
    }
}