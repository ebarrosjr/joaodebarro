<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $users = DB::table('users')->whereNull('deleted_at');
        return view('users.index', [
            'users' => $users->paginate(15),
            'roles' => ['A' => 'Administrativo', 'V' => 'Vendedor', 'F' => 'Funcionário']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'roles' => ['A' => 'Administrativo', 'V' => 'Vendedor', 'F' => 'Funcionário'],
            'tipocomissao' => ['D' => '$', 'P' => '%'],
            'periodos' => ['D' => 'Diário', 'S' => 'Semanal', 'Q' => 'Quinzenal', 'M' => 'Mensal']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        try {
            $dados = $request->validated();
            User::create($dados);
            $msg = 'Usuário adicionado com sucesso';
        } catch (Exception $e) {
            $msg = $e->getMessage();
        }

        return redirect('/users')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            $msg = 'Usuário excluído com sucesso';
        } catch (Exception $e) {
            $msg = $e->getMessage();
        }

        return redirect('/users')->with('message', $msg);
    }
}
