const { PrismaClient } = require('@prisma/client');
const prisma = new PrismaClient();

module.exports = {
    async listarFuncionarios(req, res) {
        try {
            const funcionarios = await prisma.funcionario.findMany();
            res.status(200).json(funcionarios);
            console.log(funcionarios);
        } catch(error) {
            res.status(500).json({message: "Erro ao listar os funcionários"});
        }
    },

    async inserirFuncionarios(req, res) {
        try {
            const { matricula, nome, email, salario_bruto } = req.body
            const novoFuncionario = await prisma.funcionario.create(
                {
                    data: {
                        matricula, nome, email, salario_bruto
                    }
                }
            )
            res.status(201).json({ message: "Funcionário inserido com sucesso" })
        } catch (error) {
            res.status(500).json({ message: "ERRO" })
        }
    },

    async deletarFuncionarios(req, res) {
        try{
            const { id } = req.params
            const funcionario = await prisma.funcionario.delete(
                {
                    where: {
                        id: Number(id)
                    }
                }
            )
            res.status(202).json({ message: "Funcionário removido com sucesso"})
        }catch(error){
            res.status(500).json({ message: "Erro ao remover funcionário" })
        }
    },

    async atualizarFuncionarios(req, res) {
        try{
            const { id } = req.params;
            const { matricula, nome, email, salario_bruto } = req.body;
            const funcionario = await prisma.funcionario.update(
                {
                    where: {
                        id: Number(id)
                    },
                    data: {
                        matricula, nome, email, salario_bruto
                    }
                }
            )
            res.status(202).json({ message: "Funcionário atualizado com sucesso" })
        }catch(error){
            res.status(500).json({ message: "Erro ao atualizar funcionário" })
        }
    }
}