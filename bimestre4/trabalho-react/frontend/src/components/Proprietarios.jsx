import React, { useEffect, useState } from "react";
import api from "../api";
import {
    TextField,
    Button,
    Typography,
    List,
    ListItem,
    ListItemText,
    Divider,
} from "@mui/material";

export default function Proprietarios() {
    const [proprietarios, setProprietarios] = useState([]);
    const [produtos, setProdutos] = useState([]);
    const [nome, setNome] = useState("");
    const [email, setEmail] = useState("");
    const [endereco, setEndereco] = useState("");

    const [proprietarioMaisProdutos, setProprietarioMaisProdutos] = useState(null);

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = async () => {
        try {
            const [propResponse, prodResponse] = await Promise.all([
                api.get("/proprietarios"),
                api.get("/produtos"),
            ]);

            setProprietarios(propResponse.data);
            setProdutos(prodResponse.data);

            calcularProprietarioComMaisProdutos(propResponse.data, prodResponse.data);
        } catch (error) {
            console.error("Erro ao buscar dados:", error);
        }
    };

    const addProprietario = async () => {
        await api.post("/proprietarios", { nome, email, endereco });
        setNome("");
        setEmail("");
        setEndereco("");
        fetchData();
    };

    const calcularProprietarioComMaisProdutos = (proprietarios, produtos) => {
        if (proprietarios.length === 0 || produtos.length === 0) return;

        // Criar um mapa para contar os produtos por proprietarioId
        const produtoCount = produtos.reduce((acc, prod) => {
            acc[prod.proprietarioId] = (acc[prod.proprietarioId] || 0) + 1;
            return acc;
        }, {});

        // Encontrar o proprietário com mais produtos
        const proprietarioComMais = proprietarios.reduce((prev, current) => {
            const prevCount = produtoCount[prev.id] || 0;
            const currentCount = produtoCount[current.id] || 0;
            return currentCount > prevCount ? current : prev;
        });

        setProprietarioMaisProdutos({
            ...proprietarioComMais,
            totalProdutos: produtoCount[proprietarioComMais.id] || 0,
        });
    };

    return (
        <div>
            <Typography variant="h5">🍀 adicionar proprietário</Typography>
            <TextField label="nome" value={nome} onChange={(e) => setNome(e.target.value)} fullWidth margin="normal" />
            <TextField label="e-mail" value={email} onChange={(e) => setEmail(e.target.value)} fullWidth margin="normal" />
            <TextField label="endereço" value={endereco} onChange={(e) => setEndereco(e.target.value)} fullWidth margin="normal" />
            <Button variant="contained" color="primary" onClick={addProprietario} style={{ marginBottom: "2rem" }}>
                enviar
            </Button>

            <Divider></Divider>

            <Typography variant="h5" style={{ marginTop: "2rem" }}>🍂 lista de proprietários</Typography>
            <List>
                {proprietarios.map((prop) => {
                    const produtosDoProprietario = produtos.filter(prod => prod.proprietarioId === prop.id);
                    return (
                        <ListItem key={prop.id}>
                            {produtosDoProprietario.map((prod) => (
                                <ListItemText
                                    primary={`#${prop.id} | ${prop.nome} (${prop.email})`}
                                    secondary={`endereço: ${prop.endereco} | produto(s): ${prod.desc}`}
                                />
                            ))}
                        </ListItem>
                    );
                })}
            </List>

            <Divider></Divider>
            <Typography variant="h5" style={{ marginTop: "2rem" }}>🔰 estatísticas</Typography>
            {proprietarioMaisProdutos ? (
                <Typography variant="h6" style={{ marginBottom: "1rem" }}>
                    Proprietário com Maior Número de Produtos:
                    <br />
                    {`#${proprietarioMaisProdutos.id} - ${proprietarioMaisProdutos.nome} | Total de Produtos: ${proprietarioMaisProdutos.totalProdutos}`}
                </Typography>
            ) : (
                <Typography variant="body1" style={{ marginBottom: "1rem" }}>
                    Nenhum dado disponível ainda.
                </Typography>
            )}

        </div>
    );
}
