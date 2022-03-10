@extends('layouts.admin_layout')

@section('title', 'koding straipsniai')

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Visi straipsniai ( {{ $codings_count }})</h1>
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
            <!-- Publikuojamu straipsniu isvedimas-->
            <div class="form-group d-flex justify-content-arround">
                <label> Greita paieška:</label> 
                <input class="form-control form-width" id="myInput" name="myInput"  type="text" placeholder="Iveskyte raktažodį" >
                <a href="{{ route('coding.create') }}" class="btn btn-primary ml-5">Sukurti koding straipsnį</a> 
              </div>
                <div class="card">
                    <div class="card-body p-0">
                    <table  class="table table-striped projects" >
                        <thead>
                            <tr>
                                <th style="width: 5%">
                                    ID
                                </th>
                                <th>
                                    Pavadinimas
                                </th>
                                <th>
                                    Kategorija
                                </th>   
                                <th>
                                    Patinka
                                </th>                       
                                <th>
                                    Sukurta
                                </th>
                                <th>
                                    Statusas
                                </th>
                                <th style="width: 30%">
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table-container">
                            @foreach ($codings as $coding)
                            <tr>
                                <td>
                                    {{ $coding['id'] }}
                                </td>
                                <td>
                                    {{ $coding['title'] }}
                                </td>
                                <td>
                                    {{ $coding->category['title'] }}
                                </td>
                                <td>
                                    {{-- <a href="#"><i class="far fa-thumbs-up"></i></a> ( {{ $post->likedUsers->count() }} ) --}}
                                </td>
                                <td>
                                    {{ $coding['created_at'] }}
                                </td>
                                <td>
                                    @if($coding['status']) 
                                    <h6 style="color: green">Publikuota</h6>
                                    @else 
                                    <h6 style="color: red">Nepublikuota</h6>
                                    @endif
                                </td>
                        
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('coding.edit', $coding['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Redaguoti
                                    </a>
                                <form action="{{ route('coding.destroy', $coding['id']) }}" method="POST" style="display: inline-block">
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
                </div>
            
       </div>      
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
