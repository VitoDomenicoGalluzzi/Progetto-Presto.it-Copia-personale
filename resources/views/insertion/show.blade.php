<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex rounded-5 justify-content-center my-5 border-cards col-10 col-md-6 py-5">
                <div class="card shadow card-index" style="width: 26rem;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        @if (count($insertion->images)>0)
                        <div class="carousel-indicators">
                            @foreach ($insertion->images as $key=>$image )
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="@if ($loop->first) active @endif border-3 buttonCarousel-bg buttonCarousel-border" aria-current="true" aria-label="Slide 1"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($insertion->images as $image )
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{!$image->get()->isEmpty() ? $image->getUrl(400,400) : '/default/default_cam_with_logo.jpg'}}" class="card-img-center imgcard " alt="Immagine di {{$insertion->name}}">
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active border-3 buttonCarousel-bg buttonCarousel-border" aria-current="true" aria-label="Slide 1"></button>  
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/default/default_cam_with_logo.jpg" class="img-fluid p-3 rounded" alt="{{$insertion->name}}1">
                            </div>
                        </div>
                        @endif
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>        
            
            <div class="card-body">                       
                <h5 class="card-title fw-bold">{{$insertion->name}}</h5>
                <h6 class="card-title">{{__('ui.creator')}}: {{$insertion->user->name}}</h6>
                <p class="card-text">{{$insertion->description}}</p>
                <h5 class="card-title ">{{$insertion->price}} €</h5>
                
                <div class="row">
                    <div class="col-8">
                        <p>{{__('ui.category')}}:</p>
                    </div>
                    <div class=" d-flex justify-content-between">
                        <a href="{{route('indexCategory', ['category'=>$insertion->category])}}" class="btn border-3 btn-show">{{__("ui.".$insertion->category->name)}}</a>
                        <a href="{{route('indexInsertion')}}" class="btn border-3 btn-show"><i class="bi bi-arrow-return-left"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
            </div>
        </div>
        
    
</x-layout>