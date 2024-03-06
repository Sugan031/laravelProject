@extends('layout.app')
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
  {{$error}}
</div>
@endforeach
@endif
<div class="container custom-login">
    <form action="login" method="post">
        @csrf
        <div class="row mb-3 ">
            <label for="inputEmail3" class="col-sm-2 col-form-label ">Email</label>
            <div class="col-sm-3">
                <input type="email" class="form-control " id="inputEmail3" name="email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Mobile</label>
            <div class="col-sm-3">
                <input type="tel" class="form-control @if($errors->has('mobile')) {{'is-invalid'}} @endif" id="inputPassword3" name="mobile">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <a href="register">Register</a>
</div>

