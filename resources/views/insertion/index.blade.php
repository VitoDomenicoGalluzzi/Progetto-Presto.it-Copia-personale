<x-layout>
    
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
      
    
    
    
    <div class="container my-5">
        <div class="row justify-content-center rounded-5 border-cards ">
            <div>
                <h1 class="text-center fw-semibold p-5 text-dark">
                    {{__('ui.insertions')}}
                </h1>
            </div>
            @forelse ($insertions as $insertion)
                <div class="d-flex justify-content-center col-12 col-md-6 my-4 col-lg-4">
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
                                <div class=" d-flex justify-content-between">
                                    <a href="{{route('indexCategory', ['category'=>$insertion->category])}}" class="btn border-3 btn-show">{{__("ui.".$insertion->category->name)}}</a>
                                    <a href="{{route('showInsertion', $insertion)}}" class="btn border-3 btn-show"><i class="bi bi-zoom-in "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                <div class="container-fluid mb-4">
                    <div class="row justify-content-center ">
                        <div class="col-12 col-md-4">
                            <h3 class="text-center text-light">
                                {{__('ui.noInsertions')}}
                            </h3>
                        </div>
                    </div>
                </div>
            @endforelse
            {{$insertions->links()}}
        </div>
    </div>
    
</x-layout>