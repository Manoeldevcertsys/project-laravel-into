@extends('layouts.default')

@section('content')
<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/4 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Adicionar produto</h1>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.product.store')}}">
                @csrf
                <div class="flex flex-wrap">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Nome do produto</label>
                            <input value="{{ old('name') }}" type="text" id="name" name="name"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        @error('name')
                            <div class="text-red-500 text-sm"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Preço</label>
                            <input value="{{ old('price') }}" type="text" id="price" name="price"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                        </div>
                        @error('price')
                            <div class="text-red-500 text-sm"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Estoque</label>
                            <input value="{{ old('stock') }}" type="text" id="stock" name="stock"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        @error('stock')
                            <div class="text-red-500 text-sm"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                            <input type="file" id="cover" name="cover"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                        </div>
                        @error('cover')
                            <div class="text-red-500 text-sm"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="p-2 w-full">
                        <label for="name" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                        <div class="p-2 w-full flex items-center justify-center mb-2">
                            <img id="image-preview" class="w-64 h-64 object-contain object-center rounded" src="https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg" alt="">
                        </div>
                    </div>


                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                            <textarea value="{{ old('description') }}" id="description" name="description"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        @error('description')
                            <div class="text-red-500 text-sm"> {{ $message }} </div>
                        @enderror
                    </div>



                    <div class="p-2 w-full">
                        <button
                            class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Adicionar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
<script>
    const fileInput = document.getElementById("cover");
    const imagePreview = document.getElementById("image-preview");

    fileInput.addEventListener("change", () => {
        const selectedFile = fileInput.files[0];

        const reader = new FileReader();
        reader.onload = (event) => {
            imagePreview.src = event.target.result;
        };
        reader.readAsDataURL(selectedFile);
    });
</script>
@endsection
