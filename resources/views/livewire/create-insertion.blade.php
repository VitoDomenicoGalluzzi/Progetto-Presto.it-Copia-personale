<div>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <form wire:submit="save" class="p-4 p-lg-5 rounded-5 bg-form my-4 border-form ">

                    <div class="text-center mb-5">
                        <h2 class="fw-bold">{{__('ui.titleFormCreate')}}</h2>
                    </div>

                    <div class="mb-3">
                        <label for="inputName" class="form-label fw-semibold">{{__('ui.titleInsertion')}}:</label>
                        <input wire:model.blur="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" aria-describedby="nameHelp" value={{old('name')}}>
                        @error('name')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPrice" class="form-label fw-semibold">{{__('ui.priceInsertion')}}:</label>
                        <input wire:model.blur="price" type="text" class="form-control @error('price') is-invalid @enderror" id="inputPrice" aria-describedby="priceHelp" value={{old('price')}}>
                        @error('price')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label fw-semibold">{{__('ui.descriptionInsertion')}}:</label>
                        <textarea wire:model.blur="description" id="inputDescription" cols="30" rows="4" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                        @error('description')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputImage" class="form-label fw-semibold">{{__('ui.imageInsertion')}}:</label>
                        <input wire:model.blur="temporary_images" type="file" name="images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" id="inputImage" aria-describedby="imageHelp">
                        @error('temporary_images.*')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p class="fw-semibold">{{__('ui.previewImageInsertion')}}:</p>
                                <div class="row border-form rounded shadow py4">
                                    @foreach ($images as $key => $image)
                                        <div class="col">
                                            <div class="img-preview mx-auto shadow rounded my-3" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                            <button type="button" class="btn btn-danger border border-dark mx-auto my-3  d-block text-center" wire:click="removeImage({{$key}})"><i class="bi bi-trash3-fill"></i></button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- @if (!empty($images))
                        <div class="row">
                        <div class="col-12">
                            <p>Anteprima foto:</p>
                            <div class="row border border-4 border-info rounded shadow py-4">
                                @foreach ($images as $key=>$image)
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                        <button class="btn btn-danger shadow d-block text-center mt-2 mx-auto" type="button" whire:click="removeImage({{$key}})">Cancella</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        </div>
                    @endif --}}
                    <div class="mb-3 mt-3">
                        <label for="inputCategory" class="form-label fw-semibold ">{{__('ui.choseCategory')}}:</label>
                        <select class="form-select" wire:model="category" id="inputCategory"  aria-label="Default select example">
                           @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{__("ui.$category->name")}}</option>
                           @endforeach
                        </select>
                        @error('image')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-1 border border-dark rounded-5 mt-2 fw-semibold">{{__('ui.createInsertion')}} <i class="bi bi-send-plus fs-5"></i></button>

                  </form>

            </div>
        </div>
    </div>
    
</div>
               

       
