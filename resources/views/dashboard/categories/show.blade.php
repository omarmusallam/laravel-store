@extends('layouts.dashboard')
@section('title', $category->name)
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">{{ $category->name }}</li>

@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Store</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @php
                $products = $category
                    ->products()
                    ->with('store')
                    ->latest()
                    ->paginate(3);
            @endphp
            @if ($category->products->count())
                @foreach ($products as $product)
                    <tr>
                        <td><img src="{{ asset('storage/' . $product->image) }}" alt="" height="50px"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->store->name }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->created_at }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No products defined.</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
