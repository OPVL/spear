@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Spears</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h1>Success {{ $spears->count() }}</h1>
                    @foreach ($spears as $spear)
                        @if ($spear->success)
                        <div class="card">
                            <div class="card-header">
                                {{ $spear->target->fullname() }}
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Phished at: {{ $spear->updated_at }}</h4>
                                <p class="card-text">Text</p>
                            </div>
                            <div class="card-footer text-muted">
                                Footer
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
