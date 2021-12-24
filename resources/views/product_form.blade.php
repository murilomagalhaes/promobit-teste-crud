@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="title mb-30 d-flex justify-content-between align-items-center">
                    <h2>Produtos: {{ $product->name ?? 'Novo Produto' }}</h2>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary d-flex align-items-center"
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

        {{-- Alertas / Flash messages --}}
        @include('alerts')


        <div class="card-style-3 mb-30">
            <div class="card-content">

                {{-- Product Form --}}
                <form action="{{ route('products.store', $product ?? null) }}" method="POST">
                    @csrf

                    {{-- Name --}}
                    <div class="row g-3 align-items-center mb-2">
                        <div class="col-2"><label for="name">Nome: </label></div>
                        <div class="col"><input class="form-control" type="text"
                                value="{{ $product->name ?? '' }}" name="name"></div>
                    </div>

                    {{-- Price --}}
                    <div class="row g-3 align-items-center mb-2">
                        <div class="col-2"><label for="price">Preço: </label></div>
                        <div class="col"><input class="form-control" type="number" step="0.01" min="0.1"
                                max="999999.99" value="{{ $product->price ?? '' }}" name="price"></div>
                    </div>

                    {{-- Description TextArea --}}
                    <div class="row g-3 align-items-center mb-2">
                        <div class="col-2"><label for="description">Descrição: </label></div>
                        <div class="col"><textarea class="form-control"
                                name="description">{{ $product->description ?? '' }}</textarea></div>
                    </div>

                    {{-- Tags Select --}}
                    <div class="row g-3 align-items-center mb-2">
                        <div class="col-2"><label for="description">Tags: </label></div>
                        <div class="col">
                            <select class="form-select px-1 py-2" name="tags[]" multiple aria-label="Tags" name="tags">
                                @foreach ($tags as $tag)
                                    <option class="d-inline p-1 mx-1 border rounded" @if (isset($product) && $product->tags->contains($tag)) selected @endif
                                        value="{{ $tag->id }}" style="cursor: pointer">#{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-primary"> &#x24D8; Pressione e segure Ctrl (windows) ou Command (Mac) para
                                selecionar multiplas tags. </small>
                        </div>
                    </div>

                    {{-- Actio Buttons --}}
                    <div class="w-100 text-end">
                        <button type="submit" class="btn btn-success">Gravar</button>
                        @if ($product) <button type="button" class="btn btn-danger"onclick="document.getElementById('delete-form').submit();">Excluir</button> @endif
                    </div>

                </form>

                {{-- Delete Form --}}
                @if ($product)
                    <form id="delete-form" action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection
