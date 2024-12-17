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


export default function Produtos() {
    const [produtos, setProdutos] = useState([]);
    const [desc, setDesc] = useState("");
    const [qtd, setQtd] = useState("");
    const [valor, setValor] = useState("");
    const [proprietarioId, setProprietarioId] = useState("");

    const [maiorQtd, setMaiorQtd] = useState(null);
    const [maiorValor, setMaiorValor] = useState(null);
    const [maiorValorTotal, setMaiorValorTotal] = useState(null);

    useEffect(() => {
        fetchProdutos();
    }, []);

    const fetchProdutos = async () => {
        try {
            const response = await api.get("/produtos");
            setProdutos(response.data);
            calcularEstatisticas(response.data);
        } catch (error) {
            console.error("Erro ao buscar produtos:", error);
        }
    };

    const addProduto = async () => {
        await api.post("/produtos", { desc, qtd: Number(qtd), valor: Number(valor), proprietarioId: Number(proprietarioId) });
        setDesc("");
        setQtd("");
        setValor("");
        setProprietarioId("");
        fetchProdutos();
    };

    const calcularEstatisticas = (produtos) => {
        if (produtos.length === 0) return;

        // Produto com maior quantidade
        const produtoMaiorQtd = produtos.reduce((prev, current) =>
            prev.qtd > current.qtd ? prev : current
        );

        // Produto com maior valor unitário
        const produtoMaiorValor = produtos.reduce((prev, current) =>
            prev.valor > current.valor ? prev : current
        );

        // Produto com maior valor total (valor * quantidade)
        const produtoMaiorValorTotal = produtos.reduce((prev, current) =>
            prev.qtd * prev.valor > current.qtd * current.valor ? prev : current
        );

        setMaiorQtd(produtoMaiorQtd);
        setMaiorValor(produtoMaiorValor);
        setMaiorValorTotal(produtoMaiorValorTotal);
    };

    return (
        <div>
            <Typography variant="h5">🍃 adicionar produto</Typography>
            <TextField label="descrição" value={desc} onChange={(e) => setDesc(e.target.value)} fullWidth margin="normal" />
            <TextField label="quantidade" value={qtd} onChange={(e) => setQtd(e.target.value)} fullWidth margin="normal" />
            <TextField label="valor" value={valor} onChange={(e) => setValor(e.target.value)} fullWidth margin="normal" />
            <TextField label="id do proprietário" value={proprietarioId} onChange={(e) => setProprietarioId(e.target.value)} fullWidth margin="normal" />
            <Button variant="contained" color="secondary" onClick={addProduto} style={{ marginBottom: "2rem" }}>
                enviar
            </Button>

            <Divider></Divider>

            <Typography variant="h5" style={{ marginTop: "2rem" }}>🌿 lista de produtos</Typography>
            <List>
                {produtos.map((prod) => (
                    <ListItem key={prod.id}>
                        <ListItemText
                            primary={`#${prod.id} | ${prod.desc}`}
                            secondary={`valor: R$${prod.valor} | id do proprietário: ${prod.proprietarioId}`}
                        />
                    </ListItem>
                ))}
            </List>

            <Divider></Divider>

            <Typography variant="h5" style={{ marginTop: "2rem" }}>🔰 estatísticas</Typography>
            {produtos.length > 0 ? (
                <List>
                    <ListItem>
                        <ListItemText
                            primary="produto com maior quantidade"
                            secondary={
                                maiorQtd
                                    ? `#${maiorQtd.id} - ${maiorQtd.desc} | quantidade: ${maiorQtd.qtd}`
                                    : "nenhum produto encontrado"
                            }
                        />
                    </ListItem>

                    <ListItem>
                        <ListItemText
                            primary="produto com maior valor unitário"
                            secondary={
                                maiorValor
                                    ? `#${maiorValor.id} - ${maiorValor.desc} | Valor: R$${maiorValor.valor}`
                                    : "nenhum produto encontrado"
                            }
                        />
                    </ListItem>

                    <ListItem>
                        <ListItemText
                            primary="produto com maior valor total"
                            secondary={
                                maiorValorTotal
                                    ? `#${maiorValorTotal.id} - ${maiorValorTotal.desc} | quantidade: ${maiorValorTotal.qtd}, valor unitário: R$${maiorValorTotal.valor}, valor Total: R$${maiorValorTotal.qtd * maiorValorTotal.valor}`
                                    : "nenhum produto encontrado"
                            }
                        />
                    </ListItem>
                </List>
            ) : (
                <Typography variant="body1">nenhum produto cadastrado ainda.</Typography>
            )}
        </div >
    );
}
