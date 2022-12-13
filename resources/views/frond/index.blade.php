<?php
use App\Models\Slider;
use App\Models\Category;
use App\Models\Article;

$sliders = Slider::all();
$categories = Category::all();
$articles = Article::all();
?>
@extends('frond.master')
@section('title','home')
@section('content')
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        @foreach ($sliders as $slider)
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item @if($loop->first) active  @endif" style="background-image: url('{{asset('storage/images/slider/'.$slider->image)}}')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{ $slider->title }}</h3>
                    <p>{{$slider->description}}</p>
                </div>
            </div>
            @endforeach
            <!-- Slide Two - Set the background image for this slide in the line below -->
            {{-- <div class="carousel-item" style="background-image: url('{{asset('frond/img/22.jpg')}}')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Second title can be here</h3>
                    <p>This is a description for the second slide.</p>
                </div>
            </div> --}}
            <!-- Slide Three - Set the background image for this slide in the line below -->
            {{-- <div class="carousel-item" style="background-image: url('{{asset('frond/img/1.jpg')}}')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Third title can be here</h3>
                    <p>This is a description for the third slide  of news title.</p>
                </div>
            </div> --}}
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->
<section class="gray-sec">
    <div class="container">
        <!-- category Section -->
        @foreach ($categories as $category )
        <h3 class="my-4">{{$category->name}}</h3>
        @foreach ($articles as $article )
        @if($articles-> $category->id == $category->id )
        <div class="row">
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="{{asset('storage/images/article/'.$article->image)}}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{$article->title}}</a>
                        </h4>
                        <p class="card-text">{{$article->short_description}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('website.det' , $article->id )}}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        <div align="center"><a class="btn btn-success" href="{{route('news.all-news')}}">more news</a></div>
        @endforeach
    </div>
</section>
<section>
    <div class="container">
        <!--  Section -->
        <div class="row">
            <div class="col-lg-6">
                <h3>main news title</h3>
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li>
                        <strong>Bootstrap v4</strong>
                    </li>
                    <li>jQuery</li>
                    <li>Font Awesome</li>
                    <li>Working contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id
                    reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia
                    dolorum ducimus unde.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded full-width" src="{{asset('frond/img/6.jpeg')}}" alt="" style="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum
                    deleniti
                    beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="#">contact us</a>
            </div>
        </div>
    </div>
    <!-- /.container -->

</section>

@endsection
