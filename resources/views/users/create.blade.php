@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
  <h2>Novo usuário</h2>
  <div class="row">
    <div class="col-12">
      <form action="{{ route('users.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="card p-3 mb-2">
          <div class="row">
            <div class="col-md-2">
              <label for="cpf" class="col-md-4 col-form-label">{{ __('CPF') }}</label>
              <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>
              @error('cpf')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="name" class="col-md-4 col-form-label">{{ __('Nome') }}</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="email" class="col-md-4 col-form-label">{{ __('E-mail') }}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="role" class="col-md-4 col-form-label">{{ __('Função') }}</label>
              <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                @foreach ($roles as $ind => $role)
                  <option value="{{ $ind }}">{{ $role }}</option>    
                @endforeach
              </select>
              @error('role')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-md-3">
              <div class="pt-4">
                <div class="form-check form-switch pt-3">
                  <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" {{ old('is_admin') ? 'checked' : '' }} value="1">
                  <label class="form-check-label" for="is_admin">{{ __('É administrador do sistema?') }}</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="pt-4">
                <div class="form-check form-switch pt-3">
                  <input class="form-check-input" type="checkbox" id="buyer" name="buyer" {{ old('buyer') ? 'checked' : '' }} value="1">
                  <label class="form-check-label" for="buyer">{{ __('Pode realizar compras?') }}</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="pt-4">
                <div class="form-check form-switch pt-3">
                  <input class="form-check-input" type="checkbox" id="deliver" name="deliver" {{ old('deliver') ? 'checked' : '' }} value="1">
                  <label class="form-check-label" for="deliver">{{ __('Pode fazer entregas?') }}</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h5>Financeiro</h5>
        <div class="card p-3">
          <div class="row">
            <div class="col-md-3">
              <div class="pt-4">
                <div class="form-check form-switch pt-3">
                  <input class="form-check-input" type="checkbox" id="comissionado" name="comissionado" {{ old('comissionado') ? 'checked' : '' }} value="1">
                  <label class="form-check-label" for="comissionado">{{ __('Recebe comissão em vendas?') }}</label>
                </div> -*
              </div>
            </div>
            <div class="col-md-3">
              <div class="pt-4">
                <div class="form-check form-switch pt-3">
                  <input class="form-check-input" type="checkbox" id="produtividade" name="produtividade" {{ old('produtividade') ? 'checked' : '' }} value="1">
                  <label class="form-check-label" for="produtividade">{{ __('Recebe adicional de produtividade?') }}</label>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <label for="salario" class="col-md-4 col-form-label">{{ __('Salário') }}</label>
              <div class="input-group">
                <div class="input-group-text" id="btnGroupAddon2">
                  R$
                </div>
                <input type="number" name="salario" id="salario" step="0.01" class="form-control" placeholder="0.00" aria-describedby="btnGroupAddon2">
              </div>
            </div>
            <div class="col-md-2">
              <label for="periodicidade" class="col-12 col-form-label">{{ __('Periodicidade') }}</label>
              <select name="periodicidade" id="periodicidade" class="form-control @error('periodicidade') is-invalid @enderror">
                @foreach ($periodos as $ind => $label)
                  <option value="{{ $ind }}">{{ $label }}</option>    
                @endforeach
              </select>
              @error('periodicidade')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-success mt-3"> Gravar </button>
      </form>
    </div>
  </div>
</div>
@endsection
