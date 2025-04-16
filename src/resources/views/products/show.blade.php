@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<div class="product-detail-container">
    <a href="{{ route('products.index') }}" class="back-link">商品一覧</a> {{ $product->name }}

    <div class="product-detail-wrapper">
        <div class="product-image-section">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
            <input type="file" class="file-input" disabled value="{{ $product->image }}">
        </div>

        <div class="product-info-section">
            <div class="form-group">
                <label>商品名</label>
                <input type="text" value="{{ $product->name }}" disabled>
            </div>

            <div class="form-group">
                <label>値段</label>
                <input type="text" value="{{ $product->price }}" disabled>
            </div>

            <div class="form-group">
                <label>季節</label>
                <div class="season-options">
                    @foreach(['春','夏','秋','冬'] as $season)
                    <label>
                        <input type="radio" disabled {{ in_array($season,$product->seasons ?? []) ? 'checked' : ''}}>
                        {{ $season }}
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="product-description-section">
        <label>商品説明</label>
        <textarea rows="5" disabled>{{ $product->description }}</textarea>
    </div>

    <div class="button-section">
        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-edit">変更を保存</a>
        <a href="{{ route('products.index') }}" class="btn btn-back">戻る</a>

        <form action="{{ route('products.destroy',$product->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">🗑</button>
        </form>
    </div>
</div>
@endsection