@extends('layouts.app')

@section('title','商品登録')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>商品登録</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <label>商品名<span class="required">必須</span></label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label>値段<span class="required">必須</span></label>
                <input type="number" name="price" value="{{ old('price') }}" placeholder="値段を入力">
                @error('price') 
                    <div class="error">{{ $message }}</div>
                @enderror

                <div class="product-form">
                <div class="image-upload">
                    <label for="image">
                    <img id="preview" src="{{ asset('images/placeholder.png') }}" alt="商品画像"><span class="required">必須</span>
                    </label>
                    <input type="file" name="image" id="image" accept="image/*">
                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    
                    <p id="filename">ファイルを選択</p>
                </div>

                    <label>季節<span class="required">必須</span><span class="multiple">複数選択可</span></label>
                    <div class="season">
                        <label><input type="checkbox" name="season[]" value="春">春</label>
                        <label><input type="checkbox" name="season[]" value="夏">夏</label>
                        <label><input type="checkbox" name="season[]" value="秋">秋</label>
                        <label><input type="checkbox" name="season[]" value="冬">冬</label>
                    </div>
                    @error('season')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <label>商品説明<span class="required">必須</span></label>
            <textarea name="description" rows="4" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="form-buttons">
                <a href="{{ route('products.index') }}" class="back-btn">戻る</a>
                <button type="submit" class="save-btn">登録</button>
            </div>
        </form>
    </div>

    <script>
        const imageInput = document.getElementById('image');
        const preview = document.getElementById('preview');
        const filename = document.getElementById('filename');

        imageInput.addEventListener('change',function() {
            const file = this.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                filename.textContent = file.name;
            }
        });
    </script>
    @endsection