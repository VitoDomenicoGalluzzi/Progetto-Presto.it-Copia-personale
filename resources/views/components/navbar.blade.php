<nav class="navbar navbar-expand-lg bgnav shadow h-navbar {{Route::currentRouteName() == 'homePage' ? 'fixed-top' : 'sticky-top'}}">
  <div class="container-fluid px-0">
    
    
    <a class="navbar-brand {{Route::currentRouteName() == 'homePage' ? 'fw-semibold' : ''}} text-warning" href="{{route('homePage')}}"><img class="logo-size" src="/img/logo1.png" alt="">Presto.it</a>
    
    <div class="dropdown me-auto pt-1">
      <button class="btn btn-1 dropdown-toggle border border-dark rounded-5  mb-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="fsNav fw-semibold">
          <i class="bi bi-flag-fill"></i>
          @if (__("ui.accessDenied")=='Attenzione! Area riservata ai Revisori')
          IT
          @elseif (__("ui.accessDenied")=='Attention! Area reserved for Reviewers') 
          EN
          @elseif (__("ui.accessDenied")=='Attention! Espace réservé aux évaluateur') 
          FR
          @endif
        </div>
      </button>
      <ul class="dropdown-menu border border-dark bg-dropdownColor py-1">
        <li class="hover-dropdown"><x-_locale lang="it" /></li>
        <hr class="dropdown-divider border-3 p-0 m-0">
        <li class="hover-dropdown"><x-_locale lang="en" /></li>
        <hr class="dropdown-divider border-3 p-0 m-0">
        <li class="hover-dropdown"><x-_locale lang="fr" /></li>
      </ul>
    </div>
    
    
    <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      {{-- <div class="bgnav">
        
        <div class="col-2 d-flex flex-row">
          <ul class="navbar-nav mb-2 mb-lg-0 pDropdownNav">
            <li class="nav-item">
              <a class="nav-link fw-semibold fsNav  {{Route::currentRouteName() == 'createInsertion' ? 'active text-warning' : ''}}" href="{{route('createInsertion')}}">{{__('ui.sell')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-semibold fsNav  {{Route::currentRouteName() == 'indexInsertion' ? 'active text-warning' : ''}}" href="{{route('indexInsertion')}}">{{__('ui.insertions')}}</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fw-semibold fsNav {{Route::currentRouteName() == 'indexCategory' ? 'active text-warning' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-list-ul"></i> {{__('ui.categories')}}
              </a>
              <ul class="dropdown-menu position-absolute bg-dropdown-category">
                @foreach ($categories as $category)
                <li><a class="dropdown-item hover-dropdown fw-semibold fsNav " href="{{route('indexCategory', $category)}}">{{__("ui.$category->name")}}</a></li>
                <li><hr class="dropdown-divider border-3"></li>
                @endforeach
              </ul>
            </li>
          </ul>
          
        </div>
        
        <div class="col-8 col-lg-10 d-flex justify-content-center">
          <div class="row">
            
            <div class="col-12 col-lg-8 d-flex search-bar flex-row-reverse">
              
              <form method="GET" action="{{route('searchInsertions')}}" role="search">
                <input name="searched" class="form-control animated-search-form pe-0 fsNav" type="search" placeholder="{{__('ui.search')}}" aria-label="Search">
              </form>
              
            </div>
            
            <div class="container-fluid col-12 col-lg-4">
              <div class="row justify-content-between">
                <div class="d-flex flex-row-reverse">
                  <div class="nav-item bg-secondario rounded-5 ms-4">
                    
                    <a class="btn btn-1 rounded-5 border border-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      @auth
                      <h6 class="text-center fsNav pt-1 fw-semibold">{{Auth::user()->name}} <i class="bi bi-person-arms-up"></i> </h6>
                      @if (Auth::user()->is_revisor)
                      @if (App\Models\Insertion::toBeRevisionedCount() == 0)
                      <span></span>
                      @else
                      <span id="notifica_revisione" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{App\Models\Insertion::toBeRevisionedCount()}}</span>
                      @endif
                      <span class="visually-hidden">unread messages</span>
                      @endif
                      @else
                      <h6 class="text-center fsNav pt-1 fw-semibold">{{__('ui.login-register')}} <i class="bi bi-person-standing"></i></h6>
                      @endauth
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-end border border-dark bg-dropdownColor dropdown-auth">
                      @auth
                      
                      @if (Auth::user()->is_revisor)
                      
                      <li>
                        <a class=" dropdown-item hover-dropdown nav-link fw-semibold fsNav px-3" href="{{route('indexRevisor')}}">{{__('ui.revisorArea')}} <span class="badge rounded-pill bg-danger px-2"> {{App\Models\Insertion::toBeRevisionedCount()}}</span></a>
                      </li>
                      <li><hr class="dropdown-divider border-3"></li>
                      
                      @endif
                      
                      <li>  
                        <a class="dropdown-item hover-dropdown fw-semibold fsNav px-3" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.logout')}}</a>
                        <form method="POST" action="{{route('logout')}}" id="form-logout" class="d-none">
                          @csrf
                        </form>
                      </li>
                      
                      @else
                      <li><a class="dropdown-item hover-dropdown fw-semibold fsNav px-3" href="{{route('login')}}">{{__('ui.login')}}</a></li>
                      <hr class="dropdown-divider border-3 p-0 m-0">
                      
                      <li><a class="dropdown-item hover-dropdown fw-semibold fsNav px-3" href="{{route('register')}}">{{__('ui.register')}}</a></li>
                      @endauth
                    </ul>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div> --}}
      
      <div class="d-flex w-100 justify-content-between">
        <ul class="navbar-nav mt-1 ms-3 ms-lg-0 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fw-semibold fsNav {{Route::currentRouteName() == 'createInsertion' ? 'active text-warning' : ''}}" href="{{route('createInsertion')}}">{{__('ui.sell')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold fsNav {{Route::currentRouteName() == 'indexInsertion' ? 'active text-warning' : ''}}" href="{{route('indexInsertion')}}">{{__('ui.insertions')}}</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-semibold fsNav {{Route::currentRouteName() == 'indexCategory' ? 'active text-warning' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-list-ul"></i> {{__('ui.categories')}}
            </a>
            <ul class="dropdown-menu position-absolute bg-dropdown-category">
              @foreach ($categories as $category)
              <li><a class="dropdown-item hover-dropdown fw-semibold fsNav " href="{{route('indexCategory', $category)}}">{{__("ui.$category->name")}}</a></li>
              <li><hr class="dropdown-divider border-3"></li>
              @endforeach
            </ul>
          </li>
          
        </ul>
  
        
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item dropdown my-2 my-lg-0 me-2">
            <form method="GET" class="" action="{{route('searchInsertions')}}" role="search">
              <input name="searched" class="form-control rounded-pill animated-search-form pe-0 fsNav" type="search" placeholder="{{__('ui.search')}}" aria-label="Search">
            </form>
          </li>
          <li class="nav-item dropdown d-flex flex-row-reverse">
            <a class="btn btn-1 rounded-5 me-3 border position-relative border-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              @auth
              <h6 class="text-center fsNav pt-1 fw-semibold">{{Auth::user()->name}} <i class="bi bi-person-arms-up"></i> </h6>
              @if (Auth::user()->is_revisor)
              @if (App\Models\Insertion::toBeRevisionedCount() == 0)
              <span></span>
              @else
              <span id="notifica_revisione" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{App\Models\Insertion::toBeRevisionedCount()}}</span>
              @endif
              <span class="visually-hidden">unread messages</span>
              @endif
              @else
              <h6 class="text-center fsNav pt-1 fw-semibold">{{__('ui.login-register')}} <i class="bi bi-person-standing"></i></h6>
              @endauth
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end me-3 position-absolute border border-dark bg-dropdownColor dropdown-auth">
              @auth
              
              @if (Auth::user()->is_revisor)
              
              <li>
                <a class="dropdown-item hover-dropdown nav-link fw-semibold fsNav px-3" href="{{route('indexRevisor')}}">{{__('ui.revisorArea')}} <span class="badge rounded-pill bg-danger px-2"> {{App\Models\Insertion::toBeRevisionedCount()}}</span></a>
              </li>
              <li><hr class="dropdown-divider border-3"></li>
              
              @endif
              
              <li>  
                <a class="dropdown-item hover-dropdown fw-semibold fsNav px-3" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.logout')}}</a>
                <form method="POST" action="{{route('logout')}}" id="form-logout" class="d-none">
                  @csrf
                </form>
              </li>
              
              @else
              <li><a class="dropdown-item hover-dropdown fw-semibold fsNav px-3" href="{{route('login')}}">{{__('ui.login')}}</a></li>
              <hr class="dropdown-divider border-3 p-0 m-0">
              
              <li><a class="dropdown-item hover-dropdown fw-semibold fsNav px-3" href="{{route('register')}}">{{__('ui.register')}}</a></li>
              @endauth
            </ul>
          </li>
        </ul>
      </div>
      
      
      
      
      
      
      
      
    </div>
    
    
  </div>
  
</nav>