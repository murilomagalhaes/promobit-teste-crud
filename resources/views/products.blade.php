@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="title mb-30 d-flex justify-content-between align-items-center">
                    <h2>Produtos</h2>
                    <a href="{{ route('products.form') }}" class="btn btn-primary d-flex align-items-center"
                        title="Adicionar Tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-plus-lg me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>
                        <span>Adicionar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">

        {{-- Alerts / Flash Messages --}}
        @include('alerts');

        {{-- Searcg Form --}}
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <form action="{{ route('products.search') }}" class="d-flex">
                    <input type="text" name="query" class="form-control me-2" placeholder="Buscar produtos"
                        value="{{ $query ?? '' }}">
                    <button class="btn" type="submit" title="Buscar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="card-style-3 mb-30">
            <div class="card-content">

                {{-- Product Listing --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Tags</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <span class="d-flex align-items-center">
                                        @if ($product->tags->count())
                                            @foreach ($product->tags as $tag)
                                                <a href="{{ route('tags.form', $tag) }}" title="{{ $tag->name }}"
                                                    class="m-1"> <span
                                                        class="badge bg-primary">#{{ $tag->name }}</span> </a>
                                            @endforeach
                                        @endif
                                    </span>
                                </td>
                                <td></td>
                                <td>
                                    <a href="{{ route('products.form', $product->id) }}"
                                        class="btn text-primary float-end" title="Ver/Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-2 w-100 d-flex justify-content-end">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
