<x-layout>
    
    @if (session('accepted'))
    <div class="alert alert-success">
        {{ session('accepted') }}
    </div>
    @elseif (session('denied'))
    <div class="alert alert-danger ">
        {{ session('denied') }}
    </div>
    @endif
    
    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class=" rounded-5 my-5 border-cards col-10 py-5">
                
                <div class="col-12 mt-4 py-3">
                    <h1 class="fw-bold py-3 text-center {{ $insertion_to_check ? '' : 'h-revisor' }}">
                        {{ $insertion_to_check ? __('ui.insertionToReview') : __('ui.noInsertionToReview') }}
                    </h1>
                </div>
                
                
                
                @if ($insertion_to_check)
                {{-- <div class="col-12"> --}}
                    
                    {{-- <div class="card shadow"> --}}
                        {{-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            @if (count($insertion_to_check->images) > 0)
                            <div class="carousel-indicators">
                                @foreach ($insertion_to_check->images as $key => $image)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $key }}"
                                class="@if ($loop->first) active @endif border-3 buttonCarousel-bg buttonCarousel-border"
                                aria-current="true" aria-label="Slide 1"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach ($insertion_to_check->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    
                                    <img src="{{ !$image->get()->isEmpty() ? $image->getUrl(400, 400) : '/default/default_cam_with_logo.jpg' }}"
                                    class="card-img-center imgcard "
                                    alt="Immagine di {{ $insertion_to_check->name }}">
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="0"
                                class="active border-3 buttonCarousel-bg buttonCarousel-border"
                                aria-current="true" aria-label="Slide 1"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active d-flex justify-content-center">
                                    <img src="/default/default_cam_with_logo.jpg" class="p-3 rounded"
                                    alt="{{ $insertion_to_check->name }}1">
                                </div>
                            </div>
                            @endif
                            <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> --}}
                
                {{-- SEZIONE IMMAGINI --}}
                <div class="container-fluid">
                    
                    
                    <div class="row ">
                        
                        
                        
                        @foreach ($insertion_to_check->images as $key => $image)
                        <div class="col-12 col-md-4">
                            <img src="{{ !$image->get()->isEmpty() ? $image->getUrl(400, 400) : '/default/default_cam_with_logo.jpg' }}"
                            class="card-img-center imgcard "
                            alt="Immagine di {{ $insertion_to_check->name }}">
                        </div>
                        
                        
                        
                        {{-- TAGS --}}
                        <div class="col-12 col-md-4 pt-2">
                            
                            @if ($image->labels)
                            <h4>{{ __('ui.imageInsertion') }} {{ $key + 1 }}</h4>
                            <h5 class="pt-2">Tags:</h5>
                            @foreach ($image->labels as $key => $label)
                            <span>
                                @if ($key < 9)
                                {{ $label }},
                                @else
                                {{ $label }}
                                @endif
                                
                            </span>
                            @endforeach
                            @endif
                        </div>
                        {{-- FACCINE SEMAFORI --}}
                        <div class="mt-1 pt-5 col-12 col-md-4">
                            
                            <h5>
                                {{ __('ui.imageReview') }}:
                            </h5>
                            <p>{{ __('ui.adult') }}: <span class="{{ $image->adult }}"></span></p>
                            <p>{{ __('ui.spoof') }}: <span class="{{ $image->spoof }}"></span></p>
                            <p>{{ __('ui.medical') }}: <span class="{{ $image->medical }}"></span>
                            </p>
                            <p>{{ __('ui.violence') }}: <span class="{{ $image->violence }}"></span>
                            </p>
                            <p>{{ __('ui.racy') }}: <span class="{{ $image->racy }}"></span></p>
                        </div>
                     
                        @endforeach
                        
                        
                        
                        {{-- <div class="card-body"> --}}
                            
                            {{-- SAFE SEARCH --}}
                        </div>
                    </div>
                    
                    {{-- CORPO CARDS --}}
                    <div class="card-body px-4">
                        <hr class="border-2">
                        <h5 class="card-title">{{ __('ui.titleInsertion') }}:</h5>
                        <p>{{ $insertion_to_check->name }}</p>
                        <h5 class="card-title">{{ __('ui.userCreator') }}:</h5>
                        <p>{{ $insertion_to_check->user->name }}</p>
                        <h5 class="card-title">{{ __('ui.priceInsertion') }}:</h5>
                        <p>{{ $insertion_to_check->price }} €</p>
                        <h5 class="card-title">{{ __('ui.descriptionInsertion') }}:</h5>
                        <p class="card-text">{{ $insertion_to_check->description }}</p>
                        <div class="row">
                            <div class="col-6">
                                <h5>{{ __('ui.category') }}:</h5>
                                <a href="{{ route('indexCategory', ['category' => $insertion_to_check->category]) }}"
                                    class="btn btn-success">{{ __('ui.' . $insertion_to_check->category->name) }}</a>
                                </div>
                            </div>
                            <hr class="border-2">
                            <div class="d-flex justify-content-around">
                                <div>
                                    <button class="btn btn-success fw-bold fs-4 px-5" type="button" data-bs-toggle="modal"
                                    data-bs-target="#approve"> <i class="bi bi-check-circle-fill"></i> </button>
                                </div>
                                <div>
                                    <button class="btn btn-danger fw-bold fs-4 px-5" type="button" data-bs-toggle="modal"
                                    data-bs-target="#discard"> <i class="bi bi-x-circle-fill"></i> </button>
                                </div>
                            </div>
                        </div>
                        
                        {{-- </div> --}}
                        {{-- </div> --}}
                        
                        
                        
                        
                        
                        
                        {{-- MODALE 1 --}}
                        
                        <div class="modal" tabindex="-1" id="approve">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ __('ui.attention') }}!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ __('ui.approve1') }}<b
                                            class="text-success">{{ __('ui.approve2') }}</b>{{ __('ui.approve3') }}?
                                        </p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        
                                        <div>
                                            <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">{{ __('ui.close') }}</button>
                                            
                                        </div>
                                        <div>
                                            <form action="{{ route('acceptRevisor', ['insertion' => $insertion_to_check]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-success fw-bold"> {{ __('ui.confirm') }}
                                                </button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- MODALE 2 --}}
                        
                        <div class="modal" tabindex="-1" id="discard">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ __('ui.attention') }}!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ __('ui.refute1') }}<b class="text-danger">{{ __('ui.refute2') }}</b>
                                            {{ __('ui.refute3') }}?</p>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            
                                            
                                            <div>
                                                <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">{{ __('ui.close') }}</button>
                                            </div>
                                            <div>
                                                <form action="{{ route('declineRevisor', ['insertion' => $insertion_to_check]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-danger fw-bold"> {{ __('ui.confirm') }}
                                                    </button>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>
            
            
            
            
            
</x-layout>
        