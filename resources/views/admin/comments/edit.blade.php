@extends('layouts.admin_layout')

@section('title', 'Redaguoti komentara')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Redaguoti komentara</h1>
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
            <form action="{{ route('all_comments.update', $comment['id']) }}" method="GET">
              @csrf
              @method('PUT')
              <div class="card-body">
{{--                <div class="form-group">--}}
{{--                  <label for="exampleInputEmail1">Straipsnio Pavadinimas</label>--}}
{{--                  <input type="text"  name="title"class="form-control" id="exampleInputEmail1" placeholder="Iveskyte pavadinima" value="" >--}}
{{--                </div>--}}
                <div class="form-group">
                  <form method="post">
                    <textarea  name="comment" rows="25" class="editor"> {{ $comment['comment'] }} </textarea>
                  </form>
                </div>


              <!-- /.card-body -->
              <br/><br/>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Atnaujinti komentara</button>
              </div>
            </form>
          </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


@endsection
