import React from "react";

// materialUI
import { ThemeProvider, createTheme } from '@mui/material/styles';
import CssBaseline from '@mui/material/CssBaseline';
import {
    Container,
    TextField,
    Button,
    Box,
    Typography,
    List,
    ListItem,
    ListItemText,
} from "@mui/material";

// routes
import { BrowserRouter as Router, Route, Routes, Link } from "react-router-dom";
import Proprietarios from "./components/Proprietarios";
import Produtos from "./components/Produtos";
import Index from "./components/Index";

const theme = createTheme({
    typography: {
        fontFamily: [
            'Chilanka',
            'cursive',
        ].join(','),
    },
    palette: {
        text: {
            primary: "#7EB738",
            secondary: "#70AF23",
        },
        primary: {
            main: '#70AF23',
        },
        secondary: {
            main: '#70AF23',
        },
        mode: 'dark',
    },
    components: {
        MuiCssBaseline: {
            styleOverrides: {
                body: {
                    background: "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.75)), url(img/wallpaper.gif)",
                    backgroundAttachment: "fixed",
                    backgroundRepeat: "no-repeat",
                    backgroundSize: "cover",
                }
            }
        }
    }
});

function App() {
    return (
        <ThemeProvider theme={theme}>
            <CssBaseline />
            <Router>
                <Container>
                    <Box display="flex" justifyContent="center" alignItems="center">
                        <nav style={{ margin: "2rem" }} align="center">
                            <Button variant="contained" color="primary" style={{ marginRight: "1rem" }} component={Link} to="/">
                                página inicial
                            </Button>
                            <Button variant="contained" color="primary" style={{ marginRight: "1rem" }} component={Link} to="/proprietarios">
                                proprietários
                            </Button>
                            <Button variant="contained" color="primary" component={Link} to="/produtos">
                                produtos
                            </Button>
                        </nav>
                    </Box>
                    <Routes>
                        <Route path="/" element={<Index />} />
                        <Route path="/proprietarios" element={<Proprietarios />} />
                        <Route path="/produtos" element={<Produtos />} />
                    </Routes>
                </Container>
            </Router>
        </ThemeProvider>
    );
}


export default App;
