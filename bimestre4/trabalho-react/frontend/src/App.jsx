import React, { useEffect, useState } from "react";
import api from "./Api";
import {
    Container,
    TextField,
    Button,
    Typography,
    List,
    ListItem,
    ListItemText,
} from "@mui/material";

function App() {
    const [proprietarios, setProprietarios] = useState([]);
    const [nome, setNome] = useState("");
    const [email, setEmail] = useState("");
    const [endereco, setEndereco] = useState("");
    const [produtos, setProdutos] = useState([]);
    const [desc, setDesc] = useState("");
    const [qtd, setQtd] = useState("");
    const [valor, setValor] = useState("");
    const [proprietarioId, setProprietarioId] = useState("");

    // Carregar proprietários e produtos
    useEffect(() => {
        fetchProprietarios();
        fetchProdutos();
    }, []);

    const fetchProprietarios = async () => {
        const response = await api.get("/proprietarios");
        setProprietarios(response.data);
    };

    const addProprietario = async () => {
        await api.post("/proprietarios", { nome, email, endereco });
        setNome("");
        setEmail("");
        setEndereco("");
        setProdutos("");
        fetchProprietarios();
    };

    const fetchProdutos = async () => {
        const response = await api.get("/produtos");
        setProdutos(response.data);
    };

    const addProduto = async () => {
        await api.post("/produtos", { desc, qtd: Number(qtd), valor: Number(valor), proprietarioId: Number(proprietarioId) });
        setDesc("");
        setQtd("");
        setValor("");
        setProprietarioId("");
        fetchProprietarios();
    };

    return (
        <Container>
            <Typography variant="h4" style={{ marginTop: "2rem" }}>
                Proprietários e Produtos
            </Typography>

            {/* Adicionar Proprietário */}
            <Typography variant="h6">Adicionar Proprietário</Typography>
            <TextField label="Nome" value={nome} onChange={(e) => setNome(e.target.value)} fullWidth margin="normal" />
            <TextField label="Email" value={email} onChange={(e) => setEmail(e.target.value)} fullWidth margin="normal" />
            <TextField label="Endereço" value={endereco} onChange={(e) => setEndereco(e.target.value)} fullWidth margin="normal" />
            <TextField label="Produtos" value={produtos} onChange={(e) => setProdutos(e.target.value)} fullWidth margin="normal" />
            <Button variant="contained" color="primary" onClick={addProprietario}>
                Adicionar Proprietário
            </Button>

            {/* Adicionar Produto */}
            <Typography variant="h6" style={{ marginTop: "2rem" }}>Adicionar Produto</Typography>
            <TextField label="Descrição" value={desc} onChange={(e) => setDesc(e.target.value)} fullWidth margin="normal" />
            <TextField label="Quantidade" value={qtd} onChange={(e) => setQtd(e.target.value)} fullWidth margin="normal" />
            <TextField label="Valor" value={valor} onChange={(e) => setValor(e.target.value)} fullWidth margin="normal" />
            <TextField label="ID do Proprietário" value={proprietarioId} onChange={(e) => setProprietarioId(e.target.value)} fullWidth margin="normal" />
            <Button variant="contained" color="secondary" onClick={addProduto}>
                Adicionar Produto
            </Button>

            {/* Lista de Proprietários*/}
            <Typography variant="h5" style={{ marginTop: "2rem" }}>Lista de Proprietários</Typography>
            <List>
                {proprietarios.map((prop) => (
                    <ListItem key={prop.id}>
                        <ListItemText
                            primary={`#${prop.id} | ${prop.nome} (${prop.email})`}
                            secondary={`Endereço: ${prop.endereco} | Produtos: ${prop.produtos}`}
                        />
                    </ListItem>
                ))}
            </List>

            {/* Lista de Produtos*/}
            <Typography variant="h5" style={{ marginTop: "2rem" }}>Lista de Produtos</Typography>
            <List>
                {produtos.map((prod) => (
                    <ListItem key={prod.id}>
                        <ListItemText
                            primary={`#${prod.id} | ${prod.desc}`}
                            secondary={`Valor: ${prod.valor} | Proprietário: ${prod.proprietarioId}`}
                        />
                    </ListItem>
                ))}
            </List>
        </Container>
    );
}

export default App;
