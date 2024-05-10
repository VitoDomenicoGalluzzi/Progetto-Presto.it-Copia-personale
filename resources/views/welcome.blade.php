<x-layout>     
    
    
    
    
    <header class="container-fluid">
        
        <div class="row">
            <div class="col-12 bghomepage bgheader ">
                @if (session('access.denied'))
                <div class="alert alert-danger alert-home">
                    {{ session('access.denied') }}
                </div>
                @endif
                @if (session('message'))
                <div class="alert alert-success alert-home">
                    {{ session('message') }}
                </div>
                @endif
                @if (session('revisor'))
                <div class="alert alert-success alert-home">
                    {{ session('revisor') }}
                </div>
                @endif
                <div class="col-12 col-md-8 h-header d-flex align-items-center flex-column justify-content-center">
                    <div class="h-textHeader bg-TextHeader d-flex align-items-center flex-column justify-content-center px-3 rounded-5">

                        <h1 class="text-center">
                            Presto.it
                        </h1>
                        <h2 class="text-center">
                            {{__('ui.welcome')}}
                        </h2>
                        <a href="{{route('createInsertion')}}">
                            <button class="button-header mt-2 pe-5">
                                <div class="default-btn"> 
                                    <i class="bi bi-plus-circle-fill text-white"></i>
                                    <span> {{__('ui.createInsertion')}} </span>
                                </div>
                                <div class="hover-btn">
                                    <i class="bi bi-plus-circle-fill text-white"></i>
                                    <span>{{__('ui.start')}} Presto!</span>
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="bodyCard">
        <div class="container">
            <div class="row rounded-5 border-cards justify-content-center">
                <div class="my-5 ">
                    <h2 class="text-center fw-bolder fs-1">{{__('ui.lastInsertions')}}</h2>
                </div>
                
                @foreach ($insertions as $insertion)
                <div class="d-flex justify-content-center col-12 col-md-6 col-lg-4 my-4 ">
                    <div class="card card-index" style="width: 18rem;">
                        <img src="{{!$insertion->images()->get()->isEmpty() ? $insertion->images()->first()->getUrl(400,400) : '/default/default_cam_with_logo.jpg'}}" class="card-img-center imgcard" alt="Immagine di {{$insertion->name}}">
                        <div class="card-body">                       
                            <h5 class="card-title fw-bold">{{$insertion->name}}</h5>
                            <h6 class="card-title">{{__('ui.creator')}}: {{$insertion->user->name}}</h6>
                            <p class="card-text text-truncate" title="{{$insertion->description}}">{{$insertion->description}}</p>
                            <h5 class="card-title ">{{$insertion->price}} €</h5>
                            <div class="row">
                                <div class="col-8">
                                    <p>{{__('ui.category')}}:</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                   <a href="{{route('indexCategory', ['category'=>$insertion->category])}}" class=" btn border-3 btn-show">{{__("ui.".$insertion->category->name)}}</a>
                                    <a href="{{route('showInsertion', $insertion)}}" class="btn border-3  btn-show "><i class="bi bi-zoom-in text-black "></i></a>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{$insertions->links()}}
            </div>
        </div>
    </div>
</x-layout>