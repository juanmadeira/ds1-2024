<?php

/*<?php echo "<pre>". print_r((array)$nerdsArray, true) ."</pre>"; ?>*/

namespace App\Controllers;
use App\Models\NerdsModel;
use App\Models\LivrosModel;
use App\Models\EmprestimosModel;

class Home extends BaseController {
    public function index() {
        session_destroy();
        return view('index');
    }

    public function signup() {
        return view('signup');
    }

        public function register(){
            $nerdsModel = new NerdsModel();
            $data = array (
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
            );

            $nerdsModel -> insert($data);

            $this->session->setFlashdata('sucess', 'Usuário registrado com sucesso!');
            return redirect()->to('/');
        }

    public function signin() {
        return view('signin');
    }

        public function login() {
            $nerdsModel = new NerdsModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            if(!$this->verifyEmail($email)) {
                $this->session->setFlashdata('error', 'O endereço de e-mail não confere!');
                return redirect()->to('signin');
            }

            if(!$this->verifyPassword($password, $email)) {
                $this->session->setFlashdata('error', 'A senha não confere!');
                return redirect()->to('signin');
            }

            $user = $nerdsModel->getWhere(['email'=>$email])->getRowArray();
            $sessionData = [
                'id' => $user['id'],
                'email' => $user['email'],
                'username' => $user['username'],
                'adm' => $user['adm'],
                // 'booksRelated' => $myModel->query('SELECT livros.* from livros join relations on relations.id_liv = livros.id join usuarios on usuarios.id = relations.id_user')->getResultArray()
            ];

            $this->session->set($sessionData);
            if($user['adm'] == "Sim") return redirect()->to('admin'); # se for admin
            return redirect()->to('user');                        # se for usuário
        }

        public function verifyEmail($email) {
            $nerdsModel = new NerdsModel();
            $email = $nerdsModel->getWhere(['email' => $email])->getRowArray();
            if(empty($email)) return false;
            return true;
        }

        public function verifyPassword($password, $email) {
            $nerdsModel = new NerdsModel();
            $token = $nerdsModel->getWhere(['email'=>$email])->getRowArray()['password'];
            var_dump($password);
            if(password_verify($password, $token)) return true;
            return false;
        }

    public function admin() {
        return view('admin');
    }

    public function collection() {
        $data['booksArray'] = $this -> searchBooks();
        return view('collection', $data);
    }

        public function add_book() {
            return view('add_book');
        }

            public function new_book() {
                $livrosModel = new LivrosModel();
                $data = array (
                    'id' => $this->request->getVar('id'),
                    'author' => $this->request->getVar('author'),
                    'title' => $this->request->getVar('title'),
                    'year' => $this->request->getVar('year'),
                    'publisher' => $this->request->getVar('publisher'),
                    'available' => $this->request->getVar('available')
                );

                $livrosModel -> insert($data);
    
                return redirect()->to('/collection');
            }

            public function delete_book() {
                $livrosModel = new LivrosModel();
                $id = $this->request->getVar('id');
                $livrosModel->delete($id);
                return redirect()->to('/collection');
            }

        public function edit_book() {
            $livrosModel = new livrosModel();
            $id = $this->request->getVar('id');
            $result = $livrosModel->find($id);

            return view('edit_book', $result);
        }

            public function update_book() {
                $livrosModel = new LivrosModel();
                $id = $this->request->getVar('id');
                $data = array(
                    'author' => $this->request->getVar('author'),
                    'title' => $this->request->getVar('title'),
                    'year' => $this->request->getVar('year'),
                    'publisher' => $this->request->getVar('publisher'),
                    'available' => $this->request->getVar('available')
                );

                $livrosModel->update($id,$data);

                return redirect()->to('/collection');
            }

    public function control() {
        $nerdsModel = new NerdsModel();
        $nerdsArray = $nerdsModel->findAll();
        $data['nerdsArray'] = $nerdsArray;

        return view('control', $data);
    }

        public function delete_user() {
            $nerdsModel = new NerdsModel();
            $id = $this->request->getVar('id');
            $nerdsModel->delete($id);
            return redirect()->to('/control');
        }

    public function user() {
        return view('user');
    }

    public function books() {
        $data['booksArray'] = $this -> searchBooks();
        return view('books', $data);
    }

        public function searchBooks() {
            $query = $this->request->getVar('search');
            $booksModel = new LivrosModel();

            $query = '';
            if (isset($_GET['search'])) {
                $query = $_GET['search'];
            }

            if ($_SESSION['adm'] == "Sim") {
                if (is_numeric($query)) {
                    $booksArray = $booksModel -> orderby('year', 'DESC') -> like('year', $query) -> find();
                }
                else {
                    $booksArray = $booksModel -> orderby('year', 'DESC') -> like('title', $query) -> find();
                    $booksArray += $booksModel -> like('author', $query) -> find();
                    $booksArray += $booksModel -> like('publisher', $query) -> find();

                    // $booksArray = $booksModel -> where('available >', 0) -> orderby('year', 'DESC') -> like('title', $query);
                    // $booksArray -> orlike('author', $query);
                    // $booksArray -> orlike('publisher', $query);
                    
                    // $booksArray = $booksArray -> where('available >', 0) -> find();
                }
            }
            else {
                if (is_numeric($query)) {
                    $booksArray = $booksModel -> where('available >', 0) -> orderby('year', 'DESC') -> like('year', $query) -> find();
                }
                else {
                    $booksArray = $booksModel -> where('available >', 0) -> orderby('year', 'DESC') -> like('title', $query) -> find();
                    $booksArray += $booksModel -> where('available >', 0) -> like('author', $query) -> find();
                    $booksArray += $booksModel -> where('available >', 0) -> like('publisher', $query) -> find();
                }
            }

            return $booksArray;
        }

        public function borrow() {
            $aluguel = array();
            $aluguel['id_book'] = $this->request->getVar('id');
            $aluguel['id_nerd'] = $_SESSION['id'];
    
            $booksModel = new LivrosModel();
            $emprestimosModel = new EmprestimosModel();
    
            // if ( $aluguel['id_book'] )

            $emprestimosModel->insert($aluguel);
            $livro = $booksModel->where('id', $aluguel['id_book'])->first();
            $livro['available']--;

            $booksModel->update($aluguel['id_book'], $livro);
    
            return redirect('my_books');
        }

    public function my_books() {
        $emprestimosModel = new EmprestimosModel();
        $booksModel = new LivrosModel();

        $_SESSION['emprestimos'] = array();
        $searchEmprestimo = $emprestimosModel->where('id_nerd', $_SESSION['id'])->find();

        foreach ($searchEmprestimo as $key => $value) {
            $resultEmprestimo = $booksModel -> where('id', $searchEmprestimo[$key]['id_book']) -> first();
            array_push($_SESSION['emprestimos'], $resultEmprestimo);
        }

        return view('my_books');
    }
}