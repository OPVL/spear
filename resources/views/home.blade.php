@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($groups as $targetGroup)
                    <a href="{{route('view.group.show', ['group' => $targetGroup->id])}}">{{$targetGroup->name}}</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
