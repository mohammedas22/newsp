<?php
use App\Models\Slider;
use App\Models\Category;
use App\Models\Article;

$sliders = Slider::all();
$categories = Category::all();
$articles = Article::all();
?>

@extends('frond.master')
@section('title', 'allnews')

@section('content')
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Portfolio 1
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Portfolio 1</li>
      </ol>

      <!-- news title One -->
      @foreach ($articles as $all )

      <div class="row">
        <div class="col-md-7">
          <a href="newsdetailes.html">
            <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0" src="{{asset('frond/img/1.jpg')}}" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>{{$all->title}}</h3>
          <p>{{$all->show_description}}.</p>
          <a class="btn btn-primary" href="{{route('website.det' ,$all->id)}}">View news title
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
      @endforeach
      <!-- /.row -->

      <hr>



      <hr>

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="newsdetailes.html" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->
@endsection
