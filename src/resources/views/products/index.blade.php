@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('contact')
<div class="contain">
    <div class='sidebar'>
        <h2>商品一覧</h2>

        <form action="{{ route('products.search') }}" method="GET" class="search-form">
            <input type="text" name="keyword" placeholder="商品名で検索">
            <button type="submit">検索</button>
        </form>

        <div class="sort-box">
            <label>価格順で表示</label>
            <select name="sort" onchange="this.form.submit()">
                <option value="">価格で並べ替え</option>
                <option value="asc">安い順</option>
                <option value="desc">高い順</option>
            </select>
        </div>
    </div>

    <div class="main">
        <a href="{{ route('products.create') }}" class="btn-add">+ 商品を追加</a>

        <div class="product-list">
            @foreach($products as $product)
            <a href="{{ route('products.show',$product->id) }}" class="product-card">
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                <div class="product-meta">
                    <div class="product-name">{{ $product->name }}</div>
                    <div class="product-price">￥{{ number_format($product->price) }}</div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
