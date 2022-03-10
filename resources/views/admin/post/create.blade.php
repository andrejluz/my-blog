@extends('layouts.admin_layout')

@section('title', 'Naujas straipsnis')

@section('content') 

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sukurti nauja straipsnį</h1>
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
            <form action="{{ route('post.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Straipsnio Pavadinimas</label>
                  <input type="text"  name="title"class="form-control" id="exampleInputEmail1" placeholder="Iveskyte pavadinima" required>
                </div>
                <div class="form-group">
                    <div class="form-group">
                      <label>Kategorijos</label>
                      <select  name="cat_id" class="form-control" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <form method="post">
                    <textarea  name="text" rows="25" class="editor"></textarea>
                  </form>
                </div>
                
                <div class="form-group mt-3">
                  <label for="feature_image">Viršelio paveiklselis</label>
                  <img src="" alt="" class="img-uploaded mt-1" style="display: block; width: 300px">
                  <input type="text" id="feature_image" name="img" value="" class="form-control" readonly>
                  <a href="" class="btn btn-danger mt-3 popup_selector" data-inputid="feature_image">Ikelti paveiksleli</a>
                </div>
              <!-- /.card-body -->
                <br/><br/>
              <div class=" form-check ">
                <p>Publikavimo stadija: </p>
                <input class="form-check-input" type="radio" name="status"  value="{{ true }}">
                <label class="form-check-label">Publikuoti</label>
                <br />
                <input class="form-check-input" type="radio" name="status"  value="{{ false }} ">
                <label class="form-check-label">Nepublikuoti</label>
              </div>

              <div class="card-footer mt-5">
                <button type="submit" class="btn btn-primary">Ikelti straipsni</button>
              </div>
            </form>
          </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


@endsection