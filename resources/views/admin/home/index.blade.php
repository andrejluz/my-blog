@extends('layouts.admin_layout')

@section('title', 'home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pagrindinis</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $posts_count }}</h3>

                <p>Straipsniai</p>
              </div>
              <div class="icon">
                <i class="far fa-newspaper"></i>
              </div>
              <a href="{{ route('post.index') }}" class="small-box-footer">Visi straipsniai <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $category_count }}</h3>

                <p>Kategorijos</p>
              </div>
              <div class="icon">
                <i class="fas fa-align-left"></i>
              </div>
              <a href="{{ route('category.index') }}" class="small-box-footer">Visos kategorijos<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $users_count }}</h3>

                <p>Visi vartuotojai</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('user.index') }}" class="small-box-footer">Visi vartotojai<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $portfolios_count }}</h3>

                <p>Coding straipsniai</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href=" {{ route('coding.index') }}" class="small-box-footer">Visi Straipsniai <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $category_count }}</h3>

                        <p>Portfolio</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-align-left"></i>
                    </div>
                    <a href="{{ route('portfolio.index') }}" class="small-box-footer">Visi mano portfolio<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>{{ $comments_count }}</h3>

                        <p>Komentarai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-align-left"></i>
                    </div>
                    <a href="{{ route('all_comments.index') }}" class="small-box-footer">Visi komentarai<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @endsection
