@extends('layouts.frontend') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         
            <div class="mt-4 card">
                <div class="card-header">
                    <h4>Employee</h1></h4>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success mt-5" role="alert">{{ session('status') }}</div>
                    @endif
                    @if(isset($errors) && $errors->any())
                    <div class="alert alert-danger" role="alert">{{ session('status') }}
                    @foreach ($errors->all() as $error )
                    {{ $error }}
                        
                    @endforeach</div>
                @endif
                      <form action="/users/import" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                        <input type="file" name="file" required>
                        <button type="submit" value="upload">import</button>
                     </div>
            </div>
        </div>
    </div>
</div>
@endsection