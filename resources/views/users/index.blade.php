@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-1">
          <h6 class="d-flex justify-content-between align-items-center text-bold">
            Usuários do sistema
            <a href="/users/create" class="btn btn-sm btn-primary"><i class="fa fa-user-plus fa-fw"></i> Nova pessoa</a>
          </h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    #ID
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Tipo
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Nome
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Último acesso
                  </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                      <span class="badge bg-{{ ($user->is_admin ? 'success' : ($user->client_id != null ? 'info' : ($user->fornecedor_id != null ? 'primary' : 'warning'))) }}">
                        {{ ($user->is_admin ? 'Administrador' : ($user->client_id != null ? 'Cliente' : ($user->fornecedor_id != null ? 'Fornecedor' : $roles[$user->role]))) }}
                      </span>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{!! ($user->login_atual == null ? '<span class="text-danger">Nunca logou</span>' : ($user->ultimo_login == null ? date('d/m/Y H:i', strtotime($user->login_atual)) : date('d/m/Y H:i', strtotime($user->ultimo_login)))) !!}</td>
                    <td class="actions">
                      <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                      <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="width:auto;float:right;margin-left:4px;">@csrf @method('DELETE') <button class="btn btn-danger btn-sm m-0"><i class="fa fa-trash"></i></button></form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{ $users->links() }}
</div>
@endsection
