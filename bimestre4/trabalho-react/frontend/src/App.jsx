import React, { useEffect, useState } from "react";
import { ThemeProvider, createTheme } from '@mui/material/styles';
import CssBaseline from '@mui/material/CssBaseline';
import Divider from '@mui/material/Divider';
import Image from 'mui-image'
import axios from "axios";
import {
    Container,
    TextField,
    Button,
    Typography,
    List,
    ListItem,
    ListItemText,
} from "@mui/material";


const theme = createTheme({
    palette: {
        text: {
            primary: "#199515",
            secondary: "#2F9F2C",
        },
        primary: {
            main: '#145b11',
        },
        secondary: {
            main: '#145b11',
        },
        background: {
            default: "#000000",
        },
        mode: 'dark',
    },
  });
  

// Configuração da instância axios
const api = axios.create({
    baseURL: "http://localhost:3001", // URL do backend
});

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

    // Carregar proprietários e produtos ao iniciar
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
        fetchProdutos();
    };

    return (
        <ThemeProvider theme={theme}>
        <CssBaseline />
        <Container>
            <Typography variant="h4" style={{ marginTop: "2rem", marginBottom: "2rem" }} align="center">
                𝔱𝔯𝔞𝔟𝔞𝔩𝔥𝔬 𝔡𝔬 𝔮𝔲𝔞𝔯𝔱𝔬 𝔟𝔦𝔪𝔢𝔰𝔱𝔯𝔢
            </Typography>

            {/* Formulário para adicionar Proprietário */}
            <Divider textAlign="left"><Typography variant="h6">_adicionar proprietário</Typography></Divider>
            <TextField label="nome" value={nome} onChange={(e) => setNome(e.target.value)} fullWidth margin="normal" />
            <TextField label="email" value={email} onChange={(e) => setEmail(e.target.value)} fullWidth margin="normal" />
            <TextField label="endereço" value={endereco} onChange={(e) => setEndereco(e.target.value)} fullWidth margin="normal" />
            <Button variant="contained" style={{ marginBottom: "3rem" }} color="primary" onClick={addProprietario}>
                enviar
            </Button>

            <Image src="zelda-divider-2.png" width={300} style={{ marginBottom: "2rem" }} />

            {/* Formulário para adicionar Produto */}
            <Divider textAlign="left"><Typography variant="h6">_adicionar produto</Typography></Divider>
            <TextField label="descrição" value={desc} onChange={(e) => setDesc(e.target.value)} fullWidth margin="normal" />
            <TextField label="quantidade" value={qtd} onChange={(e) => setQtd(e.target.value)} fullWidth margin="normal" />
            <TextField label="valor" value={valor} onChange={(e) => setValor(e.target.value)} fullWidth margin="normal" />
            <TextField label="id do proprietário" value={proprietarioId} onChange={(e) => setProprietarioId(e.target.value)} fullWidth margin="normal" />
            <Button variant="contained" style={{ marginBottom: "3rem" }} color="secondary" onClick={addProduto}>
                enviar
            </Button>

            <Image src="zelda-divider.png" width={400} />

            {/* Lista de Proprietários */}
            <Typography variant="h5" style={{ marginTop: "2rem" }}>_lista de proprietários</Typography>
            <List>
                {proprietarios.map((prop) => {
                    const produtosDoProprietario = produtos.filter(prod => prod.proprietarioId === prop.id);
                    return (
                        <ListItem key={prop.id}>
                            {produtosDoProprietario.map((prod) => (
                                <ListItemText
                                    primary={`#${prop.id} | ${prop.nome} (${prop.email})`}
                                    secondary={`Endereço: ${prop.endereco} | Produto(s): ${prod.desc}`}
                                />
                            ))}
                        </ListItem>
                    );
                })}
            </List>

            <Divider></Divider>
            
            {/* Lista de Produtos */}
            <Typography variant="h5" style={{ marginTop: "2rem" }}>_lista de produtos</Typography>
            <List>
                {produtos.map((prod) => (
                    <ListItem key={prod.id}>
                        <ListItemText
                            primary={`#${prod.id} | ${prod.desc}`}
                            secondary={`Valor: R$${prod.valor} | Proprietário: ${prod.proprietarioId}`}
                        />
                    </ListItem>
                ))}
            </List>
        </Container>
        </ThemeProvider>
    );
}

export default App;
