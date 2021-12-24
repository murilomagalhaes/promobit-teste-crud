@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="title mb-30 d-flex justify-content-between align-items-center">
                    <h2>Tags</h2>
                    <a href="{{ route('tags.form') }}" class="btn btn-primary d-flex align-items-center"
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

        @include('alerts')

        {{-- Search Form --}}
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <form action="{{ route('tags.search') }}" class="d-flex">
                    <input type="text" name="query" class="form-control me-2" placeholder="Buscar Tags"
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

                {{-- Tags Listing --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tag</th>
                            <th>Qtd. Produtos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->products->count() }}</td>
                                <td>
                                    <a href="{{ route('tags.form', $tag->id) }}" class="btn text-primary float-end"
                                        title="Ver/Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                            class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-2 w-100 d-flex justify-content-end">
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
