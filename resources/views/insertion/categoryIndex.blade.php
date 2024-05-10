<x-layout>
            
    @php
        $elseValidation=true;
    @endphp

<div class="container my-5">
    <div class="row rounded-5 border-cards justify-content-center">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12 ">
                    <h1 class="upper-text p-5 text-center fw-semibold">{{__("ui.$category->name")}}</h1>
                </div>
            </div>
        </div>

            @forelse ($category->insertions as $insertion)
                @if ($insertion->is_accepted)


                        <div class="d-flex justify-content-center col-12 col-md-6 col-lg-4 my-4">
                            <div class="card shadow card-index" style="width: 18rem;">
                                <img src="{{!$insertion->images()->get()->isEmpty() ? $insertion->images()->first()->getUrl(400,400) : '/default/default_cam_with_logo.jpg'}}" class="card-img-top imgcard" alt="Immagine di {{$insertion->name}}">
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
                                        <a href="{{route('showInsertion', $insertion)}}" class="btn border-3 btn-show"><i class="bi bi-zoom-in text-black"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    @php
                        $elseValidation=false;
                    @endphp
            
            @elseif($elseValidation)
                <div class="col-12 text-center h-elseif mt-5 mb-5 py-3">
                    <h2> {{__('ui.noInsertions')}} </h2>
                </div>
                @php
                    $elseValidation=false;
                @endphp
            @endif
                
                @empty
                
                    <div class="col-12 text-center h-elseif mt-5 mb-5 py-3">
                        <h2> {{__('ui.noInsertions')}} </h2>
                    </div>
                
                @endforelse
                
            </div>
        </div>

        
    </x-layout>