@extends('layouts.admin_layout')

@section('title', 'Redaguoti kategorija')

@section('content') 

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Redaguoti kategorija : {{ $category['title'] }}</h1>
        </div>
      </div><!-- /.row -->
                <!-- Success message -->
                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  <h4><i class="icon fa fa-check"></i> {{ session()->get('message') }}</h4>
                </div>
              @endif
           <!-- /. success message -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('category.update', $category['id'] ) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kategorijos Pavadinimas</label>
                  <input type="text"  value="{{ $category['title'] }}" name="title"class="form-control" id="exampleInputEmail1" placeholder="Iveskyte pavadinima" required>
                </div>
                
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Atnaujinti kategorija</button>
              </div>
            </form>
          </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


@endsection