<x-layout>

    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 mt-4">
                <form method="POST" action="{{route('register')}}" class="p-4 p-lg-5 shadow bg-form rounded-5 border-form" >

                    <div class="text-center mb-5">
                        <h2 class="fw-bold">{{__('ui.register')}}</h2>
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
                        <label for="inputName" class="form-label fw-semibold">{{__('ui.nameSurname')}}</label>
                        <input name="name" type="text" class="form-control" id="inputName" aria-describedby="nameHelp"> 
                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    
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
            
                    <div class="mb-3">
                        <label for="inputPasswordConfirm" class="form-label fw-semibold">{{__('ui.confirmPassword')}} Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="inputPasswordConfirm">
                    </div>
                    
                    <button type="submit" class="btn btn-1 rounded-5 my-3 border border-dark">{{__('ui.register')}} <i class="bi bi-person-fill-add fs-5"></i></button>

                    <p>{{__('ui.alreadyRegistered')}} <a class="link-warning" href="{{route('login')}}">{{__('ui.clickHere')}}</a></p>
                    
                </form>

            </div>
        </div>
    </div>
    
</x-layout>