@extends('layout.login')

@section('conteudo')
<div class="center fundoLogin">
    <div class="container">
        <div class="justify-content-center row">
            <div class="mb-5 col-md-5 col-xl-4 card">
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
                @if (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif

                <h2 class="text-center "> <br> Clinicas Ilha </h2>

                <form action="{{route('auth.user')}}" method="POST">
                    @csrf

                    <div class="mt-3 mb-3 form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email"  required >
                        <label for="username" class="form-label">Digite seu email</label>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                        <label for="password" class="form-label">Digite sua senha</label>
                    </div>

                    <button type="submit" class="w-100 mb-1 btn btn-primary btn-lg fst-italic">
                        ENTRAR
                    </button>
                    
                    <div class="d-flex justify-content-center align-itens-center mb-3">
                        <a class="card-link" href="{{route('registrar')}}">Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
