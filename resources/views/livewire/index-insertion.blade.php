<div>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($insertions as $insertion)
                <div class="d-flex justify-content-center col-6 col-md-4 mt-4">
                    <div class="card" style="width: 18rem;">
                        {{-- <img src="{{Storage::url($insertion->image)}}" class="card-img-top" alt="Immagine di {{$insertion->name}}"> --}}
                        <img src="https://picsum.photos/200" class="card-img-top" alt="Immagine di {{$insertion->name}}">
                        <div class="card-body">                       
                            <h5 class="card-title fw-bold">{{$insertion->name}}</h5>                        
                            <h6 class="card-title">Creatore: {{$insertion->user->name}}</h6>                              
                            <p class="card-text">{{$insertion->description}}</p>                               
                            <h5 class="card-title ">{{$insertion->price}} €</h5>     
                            
                            <div class="row">
                                <div class="col-8">
                                    <p>Categoria:</p>
                                </div>
                                <div class=" d-flex justify-content-between">
                                    <a href="{{route('indexCategory', ['category'=>$insertion->category])}}" class="btn btn-success">{{$insertion->category->name}}</a>
                                    <a href="{{route('showInsertion', $insertion)}}" class="btn btn-primary"><i class="bi bi-zoom-in text-black"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
</div>
