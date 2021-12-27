@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Relatórios > Relevancia de Tags</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">

        {{-- Report Filter --}}
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <form class="d-flex align-items-end">
                    <div class="me-2 w-100">
                        <label for="relevance" class="mb-2">Relevancia</label>
                        <select name="relevance" id="relevance" class="form-select">
                            <option value="more" @if (request('relevance') === 'more') selected @endif>Mais relevantes</option>
                            <option value="less" @if (request('relevance') === 'less') selected @endif>Menos relevantes</option>
                        </select>
                    </div>
                    <button type="submit" class="btn text-primary" title="Filtrar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-funnel-fill" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- Report Output --}}
        @if (isset($tags))
            <div class="card-style-3 mb-30">
                <div class="card-content">
                    <div class="table-responsive-sm w-100 mx-0">
                        <table class="table mx-0">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Tag</th>
                                    <th scope="col">Qtd Produtos (Relevancia)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <th scope="row">{{ $tag->id }}</th>
                                        <td> <a href="{{ route('tags.form', $tag) }}" title="{{ $tag->name }}"
                                                class="m-1"> <span
                                                    class="badge bg-primary">#{{ $tag->name }}</span> </a></td>
                                        <td>{{ $tag->products_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
