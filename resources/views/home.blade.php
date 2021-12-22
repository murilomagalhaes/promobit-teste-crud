@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Dashboard') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card-styles">
                <div class="card-style-3 mb-30">
                    <div class="card-content">
                        X Tags
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-styles">
                <div class="card-style-3 mb-30">
                    <div class="card-content">
                        Y Produtos
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
