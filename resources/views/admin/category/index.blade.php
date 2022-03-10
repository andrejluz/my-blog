@extends('layouts.admin_layout')

@section('title', 'Esamos Kategorijos')

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Esamos kategorijos</h1>
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
        {{-- <div class="row"> --}}
            <div class="form-goup d-flex justify-content-end mb-3">
                <a href="{{ route('category.create') }}" class="btn btn-primary">Sukurti kategorija</a>
            </div>
            <div class="card">
                <div class="card-body p-0">
                  <table class="table table-striped projects">
                      <thead>
                          <tr>
                              <th style="width: 5%">
                                  ID
                              </th>
                              <th>
                                  Pavadinimas
                              </th>
                              <th>
                                Straipsniu kiekis
                            </th>
                              <th style="width: 30%">
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category['id'] }}
                            </td>
                            <td>
                                {{ $category['title'] }}
                            </td>
                            <td>
                                {{ $category->posts->count() }}
                            </td>
                            
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('category.edit', $category['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Redaguoti
                                </a>
                               <form action="{{ route('category.destroy', $category['id']) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm delete-btn" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Ištrinti
                                </button>
                               </form>
                            </td>
                        </tr>
                        @endforeach  
                    
                          
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

              {{-- </div> --}}
            

        </div>     
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
    