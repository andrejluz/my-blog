@extends('layouts.admin_layout')

@section('title', 'Esamos Kategorijos')

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Visi vartotojai ( {{ $users_count }} )</h1>
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
            <div class="form-group d-flex justify-content-arround" >
                <label> Greita paieška:</label>
                <input class="form-control" id="myInput" name="myInput"  type="text" placeholder="Iveskyte raktažodį"> 
                <a href="{{ route('user.create') }}" class="btn btn-primary ml-5">Sukurti vartotoja</a> 
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
                                  Vardas
                              </th>
                              <th>
                                Email
                            </th>
                              <th style="width: 30%">
                              </th>
                          </tr>
                      </thead>
                      <tbody id="table-container">
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user['id'] }}
                            </td>
                            <td>
                                {{ $user['name'] }}
                            </td>
                            <td>
                                {{ $user['email'] }}
                            </td>
                              
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('user.edit', $user['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Redaguoti
                                </a>
                               <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display: inline-block">
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
    