<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Controllers\ResponseInterface;

class Users extends BaseController
{
    protected $helpers = ['form'];
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {

        /*/session_start();

        $this->session->set('usuario_id', 'admin');

        $data = [
            'username'  => $this->session->get('username'),
            'email'     => 'email@dominio.com',
            'logged_in' => true
        ];

        $this->session->set( $data);*/
        $this->session->destroy();

        $this -> session->remove('username');

        // Esta configuracion se usa para agregar datos en un formulario de users/index
        // $usersModel = new UsersModel();
        //$data['users'] = $usersModel->usersEmail();

        return view('users/index');
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return view('users/nuevo');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules = [
            'username'=> 'required|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ];
        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());

        }
        $post = $this->request->getPost(['username', 'email','password']);

        $usersModel = new UsersModel();
        $usersModel->insert( [
            'username'=> trim($post['username']),
            'email'=> $post['email'],
            'password'=> password_hash($post['password'], PASSWORD_DEFAULT),
        ]);


        $this->session->setFlashdata('mensaje','Registro Agregado.');
        return redirect()->to('users')->with('success','well done!');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
