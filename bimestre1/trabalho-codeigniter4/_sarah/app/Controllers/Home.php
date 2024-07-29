<?php

namespace App\Controllers;
use App\Models\UsuariosModel;
use App\Models\LivrosModel;
use App\Models\AlugueisModel;

class Home extends BaseController
{
    public function AtualizarLivros() {
        $livrosmodel = new LivrosModel();
        if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']) {
            if ($_SESSION['userdata']['adm']) {
                $resultlivros = $livrosmodel->findAll();
                $_SESSION['livros'] = $resultlivros;
            } else {
                $resultlivros = $livrosmodel->where('disponivel >', 0)->find();
                $_SESSION['livros'] = $resultlivros;
            }
        }
    }

    public function AtualizarUsuarios() {
        $usuariosmodel = new UsuariosModel();
        if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']) {
            if ($_SESSION['userdata']['adm']) {
                $resultusuarios = $usuariosmodel->findAll();
                $_SESSION['usuarios'] = $resultusuarios;
            }
        }
    }

    public function AtualizarAlugueis() {
        $alugueismodel = new AlugueisModel();
        $livrosmodel = new LivrosModel();
        if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']) {
            $_SESSION['alugueis'] = array();
            $buscaalugueis = $alugueismodel->where('usuario', $_SESSION['userdata']['id'])->find();
            foreach ($buscaalugueis as $key => $value) {
                $resultalugueis = $livrosmodel->where('id', $buscaalugueis[$key]['livro'])->first();
                array_push($_SESSION['alugueis'], $resultalugueis);
            }
        }
    }

    public function RedirectToHome(): string {
        if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']) {
            if ($_SESSION['userdata']['adm']) {
                return 'mainadm';
            } else return 'mainuser';
        } else return 'login';
    }

    public function criaraluguel() {
        $aluguel = array();
        $aluguel['livro'] = $this->request->getVar('livroid');
        $aluguel['usuario'] = $_SESSION['userdata']['id'];

        $livrosmodel = new LivrosModel();
        $alugueismodel = new AlugueisModel();

        $alugueismodel->insert($aluguel);

        $livro = $livrosmodel->where('id', $aluguel['livro'])->first();
        $livro['disponivel']--;
        $livrosmodel->update($aluguel['livro'], $livro);

        $this->AtualizarAlugueis();
        $this->AtualizarLivros();

        return redirect('home');
    }

    public function pesquisalivro() {
        $query = $this->request->getVar('pesquisa');
        $livrosmodel = new LivrosModel();

        if ($query == '') {
            $this->AtualizarLivros();
        } else {
            if (is_numeric($query)) {
                $_SESSION['livros'] = $livrosmodel->where('disponivel >', 0)->where('ano', $query)->find();
            } else {
                $_SESSION['livros'] = $livrosmodel->where('disponivel >', 0)->like('titulo', $query)->find();
            }
        }

        return redirect('home');
    }

    public function sortlivro() {
        $livrosmodel = new LivrosModel();
        $_SESSION['livros'] = $livrosmodel->where('disponivel >', 0)->orderby('ano', 'DESC')->findAll();

        return redirect('home');
    }

    public function index() {
        session_destroy();
        // echo "<pre>". print_r((array)$_SESSION, true) ."</pre>";
        return view('login');
    }

    public function cadastro() {
        return view('cadastro');
    }

    public function homeadm() {
        return view('mainadm');
    }

    public function cadastrarlivro() {
        return view('cadastrarlivro');
    }

    public function editarusuario() {
        $usuariosmodel = new UsuariosModel();
        $usuarioid = $this->request->getVar('usuarioid');
        $data = array();

        $data['usuario'] = $usuariosmodel->where('id', $usuarioid)->first();

        return view('editarusuario', $data);
    }

    public function editarlivro() {
        $livrosmodel = new LivrosModel();
        $livroid = $this->request->getVar('livroid');
        $data = array();

        $data['livro'] = $livrosmodel->where('id', $livroid)->first();

        return view('editarlivro', $data);
    }

    public function enviarcadastro() {
        $flag = true;

        $data = array(
            'nome' => $this->request->getVar('nome'),
            'email' => $this->request->getVar('email'),
            'senha'=> $this->request->getVar('senha'),
            'confirmasenha'=> $this->request->getVar('confirmasenha')
        );

        foreach ($data as $key => $value) {
            if ($value == '') $flag = false; 
        }

        if($data['senha'] == $data['confirmasenha']){
            $data['senha'] = password_hash($data['senha'], PASSWORD_BCRYPT);
            $usuariomodel = new UsuariosModel();
            if ($flag) {
                $usuariomodel->insert($data);
                $this->session->setFlashdata('InsertFeito', 'Usuário cadastrado com sucesso');
            } else $this->session->setFlashdata('InsertFeito', 'Todos campos devem ser preenchidos');
        } else $this->session->setFlashdata('InsertFeito', 'As senhas não coincidem');

        return view('cadastro');
    }

    public function enviarupdatelivro() {
        $livroid = $this->request->getVar('livroid');

        $data = array(
            'autores' => $this->request->getVar('autores'),
            'titulo' => $this->request->getVar('titulo'),
            'ano'=> $this->request->getVar('ano'),
            'editora'=> $this->request->getVar('editora'),
            'disponivel'=> $this->request->getVar('disponivel')
        );
        
        $livrosmodel = new LivrosModel();
        $livrosmodel->update($livroid, $data);

        $this->AtualizarLivros();

        $data['livro'] = $livrosmodel->where('id', $livroid)->first();

        $this->session->setFlashdata('InsertFeito', 'Livro atualizado com sucesso');
        
        return view('editarlivro', $data);
    }

    public function removerlivro() {
        $id = $this->request->getVar('livroid');

        $livrosmodel = new LivrosModel();
        $livrosmodel->where('id', $id)->delete();

        $alugueismodel = new AlugueisModel();
        $alugueismodel->where('livro', $id)->delete();

        $this->AtualizarAlugueis();
        $this->AtualizarLivros();
        return redirect('home');
    }

    public function enviarupdateusuario() {
        $usuarioid = $this->request->getVar('usuarioid');

        $data = array(
            'nome' => $this->request->getVar('nome'),
            'email' => $this->request->getVar('email'),
            'adm'=> $this->request->getVar('adm'),
        );
        
        if ($data['adm'] != null) $data['adm'] = 1;
        else $data['adm'] = null;

        $usuariosmodel = new UsuariosModel();
        $usuariosmodel->update($usuarioid, $data);

        $this->AtualizarUsuarios();

        $data['usuario'] = $usuariosmodel->where('id', $usuarioid)->first();

        if ($_SESSION['userdata']['id'] == $usuarioid) {
            $_SESSION['userdata']['nome'] = $data['usuario']['nome'];
            $_SESSION['userdata']['email'] = $data['usuario']['email'];
            $_SESSION['userdata']['id'] = $data['usuario']['id'];
            $_SESSION['userdata']['adm'] = $data['usuario']['adm']; 
        }

        $this->session->setFlashdata('InsertFeito', 'Usuário atualizado com sucesso');
        
        return view('editarusuario', $data);
    }

    public function removerusuario() {
        $id = $this->request->getVar('usuarioid');

        $usuariosmodel = new UsuariosModel();
        $usuariosmodel->where('id', $id)->delete();

        $alugueismodel = new AlugueisModel();
        $alugueismodel->where('usuario', $id)->delete();

        $this->AtualizarUsuarios();
        $this->AtualizarAlugueis();
        return redirect('home');
    }

    public function enviarcadastrolivro() {
        $data = array(
            'autores' => $this->request->getVar('autores'),
            'titulo' => $this->request->getVar('titulo'),
            'ano'=> $this->request->getVar('ano'),
            'editora'=> $this->request->getVar('editora'),
            'disponivel'=> $this->request->getVar('disponivel')
        );
        
        $livrosmodel = new LivrosModel();
        $livrosmodel->insert($data);
        $this->AtualizarLivros();

        $this->session->setFlashdata('InsertFeito', 'Livro cadastrado com sucesso');
        
        return view('cadastrarlivro');
    }

    public function logar() {
        $data = array(
            'email' => $this->request->getVar('email'),
            'senha'=> $this->request->getVar('senha'),
        );

        $usuariosmodel = new UsuariosModel();
        $result = $usuariosmodel->findAll();

        foreach ($result as $key => $value) {
            if ($data['email'] == $result[$key]['email'] && password_verify($data['senha'], $result[$key]['senha'])) {
                $userdata['nome'] = $result[$key]['nome'];
                $userdata['email'] = $result[$key]['email'];
                $userdata['id'] = $result[$key]['id'];
                $userdata['adm'] = $result[$key]['adm'];
                $data['userdata'] = $userdata;
                $data['isLogged'] = true;
                $this->session->set($data);
                $this->AtualizarLivros();
                $this->AtualizarAlugueis();
                $this->AtualizarUsuarios();
            }
        }

        if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']) return view($this->RedirectToHome());
        else {
            $this->session->setFlashdata('LoginError', 'E-mail ou senha incorretos');
            return redirect('/');
        }
    }

    public function Home() {
        if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']) {
            return view($this->RedirectToHome());
        } else return redirect('/');
    }
}
