@extends('layouts.default')

@section('content')
<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Produtos</h1>
                <a href="{{ route('admin.product.create')}}"
                    class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded">Adicionar</a>
            </div>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">#
                        </th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                            style="width: 150px">Imagem</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Nome</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Valor</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                            Estoque</th>
                        <th
                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">
                            Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @foreach ($products as $product)
                        <tr class="@if ($loop->even) bg-gray-100 @endif hover:bg-gray-200 cursor-pointer">
                            <td class="px-4 py-3">{{ $product->id }}</td>
                            <td class="px-4 py-3">
                                <img alt="{{ $product->name }}" class="w-64 h-64 object-contain object-center rounded"
                                    src={{ \Illuminate\Support\Facades\Storage::url($product->cover) }}>
                            </td>
                            <td class="px-4 py-3">{{ $product->name }}</td>
                            <td class="px-4 py-4">R${{ number_format((int) $product->price,  2, ',', '.') }}</td>
                            <td class="px-4 py-3">{{ $product->stcok }}</td>
                            <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                                <a href={{ route('admin.product.edit', $product->id )}} class="mt-3 text-indigo-500 inline-flex items-center">Editar</a>
                                <a href="{{ route('admin.product.destroy', $product->id )}}" class="class="mt-3 text-indigo-500 inline-flex items-center"">Deletar</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="container px-4 py-4 mx-auto">
        {{ $products->links() }}
    </div>
</section>
@endsection
