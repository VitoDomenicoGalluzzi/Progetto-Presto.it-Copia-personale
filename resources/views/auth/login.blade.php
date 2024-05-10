<x-layout>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 my-3">
                <form method="POST" action="{{route('login')}}" class="p-4 p-lg-5 shadow bg-form rounded-5 border-form">

                    <div class="text-center mb-5">
                        <h2 class="fw-bold">{{__('ui.login')}}</h2>
                    </div>

                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
        
                    @csrf
                    
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label fw-semibold">{{__('ui.emailAddress')}}</label>
                        <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"> 
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label fw-semibold">Password</label>
                        <input name="password" type="password" class="form-control" id="inputPassword">
                        @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-1 rounded-5 my-3 border border-dark">{{__('ui.login')}} <i class="bi bi-person-raised-hand fs-5"></i></button>

                    <p>{{__('ui.notRegisteredYet')}}<a class="link-warning" href="{{route('register')}}">{{__('ui.clickHere')}}</a></p>

                </form> 
            </div>
        </div>
    </div>
</x-layout>
                    
                

    