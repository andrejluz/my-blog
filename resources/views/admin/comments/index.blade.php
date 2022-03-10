@extends('layouts.admin_layout')

@section('title', 'Komentarai')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Komentarai ( {{ $comments_count }})</h1>
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
                <a href="{{ route('post.create') }}" class="btn btn-primary ml-5">Sukurti straipsnį</a>
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
                               Komentaras
                            </th>
                            <th>
                                Sukure
                            </th>
                            <th>
                                Priklauso
                            </th>
                            <th>
                                Data
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                        </thead>
                        <tbody id="table-container">
                        @foreach ($comments as $comment)
                            <tr>
                                <td>
                                    {{ $comment['id'] }}
                                </td>
                                <td>
                                    {!! $comment['comment']  !!}
                                </td>
                                <td>
                                    {{ $comment->commenter['email']}}
                                </td>
                                <td>
                                    @if( $comment->commentable_type == 'App\Models\Coding')
                                        <p style="color: #9c3328;font-weight: bold">Coding</p>
                                        @endif
                                        @if( $comment->commentable_type == 'App\Models\Post')
                                            <p style="color: #002c59;font-weight: bold">Post</p>
                                        @endif
                                </td>
                                <td>
                                    {{ $comment['created_at'] }}
                                </td>

                                <td class="project-actions text-right">
                                    <form action="{{ route('comments.destroy', $comment['id']) }}" method="POST" style="display: inline-block">
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

            {{-- </div>      --}}
        </div><!-- /.container-fluid -->
    </section>

@endsection
