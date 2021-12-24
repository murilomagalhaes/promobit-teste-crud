@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="title mb-30 d-flex justify-content-between align-items-center">
                    <h2>Tags: {{ $tag->name ?? 'Nova Tag' }}</h2>
                    <a href="{{ route('tags.index') }}" class="btn btn-secondary d-flex align-items-center"
                        title="Adicionar Tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                        <span>Voltar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">

        {{-- Alerts / Flash Messages --}}
        @include('alerts');


        {{-- Tag Form --}}
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <div class="d-flex">
                    <form action="{{ route('tags.store', $tag ?? null) }}" class="d-flex me-2 w-100" method="POST">
                        @csrf
                        <input type="text" name="name" class="me-4 form-control" value="{{ $tag->name ?? '' }}"
                            placeholder="Tag">
                        <button class="btn btn-success">Gravar</button>
                    </form>
                    @if ($tag)
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
