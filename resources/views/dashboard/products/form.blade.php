<div class="form-group mb-3">
    <label for="">الاسم:</label>
    <input type="text" name="name" value="{{ old('name', $product->name) }}"
        class="form-control col-7 @error('name') is-invalid @enderror">
    @error('name')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">القسم:</label>
    <select name="category_id" class="form-control col-7 @error('parent_id') is-invalid @enderror">
        <option value="">اختر قسم</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if ($category->id == old('category_id', $product->category_id)) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group col-md-7 mb-3">
    <label for="">الوصف:</label>
    <textarea name="description" id="editor"
        class="form-control col-7 @error('description') is-invalid @enderror" rows="20">{{ old('description', $product->description) }}  </textarea>
    @error('description')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">الصورة الرئيسية:</label>
    <div><img src="{{ $product->image_url }}" height="200" class="mb-3"></div>

    <div class="input-group ">
        <div class="custom-file col-7">
            <input type="file" class="form-control" name="image" id="exampleInputFile">
           
        </div>

    </div>
    @error('image')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">معرض الصور:</label>
    <div class="row">
        @foreach ($product->images as $image)
            <div class="col-md-2 text-center">
                <img src="{{ $image->image_url }}" id="imageId" alt="" height="80" class="img-fit m-1 border">
                <button class="btn btn-sm btn-danger" id="deleteGallery"
                    onclick="deleteImage('{{ $image->id }}')">Delete</button>

            </div>
        @endforeach
    </div>
    <div class="input-group">
        <div class="custom-file col-7">
            <input type="file" class="form-control" multiple name="gallery[]" id="exampleInputFile">
            <label class="" for="exampleInputFile"></label>
        </div>

    </div>
    @error('gallery')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">شهادة المنتج :</label>
    <div class="row">
       
    </div>
    <div class="input-group">
        <div class="custom-file col-7">
            <input type="file" class="form-control" multiple name="certificate" id="exampleInputFile">
            <label class="" for="exampleInputFile"></label>
        </div>

    </div>
    @error('gallery')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">السعر:</label>
    <div class="input-group  col-7">
        <div class="input-group-prepend">
            <span class="input-group-text">$</span>
        </div>
        <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control">
        
    </div>
</div>
<div class="form-group mb-3">
    <label for="">سعر البيع:</label>
    <input type="number" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}"
        class="form-control col-7 @error('sale_price') is-invalid @enderror">
    @error('sale_price')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">الكمية:</label>
    <input type="number" name="quantity" value="{{ old('name', $product->quantity) }}"
        class="form-control col-7 @error('quantity') is-invalid @enderror">
    @error('quantity')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">الحالة:</label>
    <div>
        <label><input type="radio" name="status" value="in-stock" @if (old('status', $product->status) == 'in-stock') checked @endif>
            in-stock</label>
        <label><input type="radio" name="status" value="sold-out" @if (old('status', $product->status) == 'sold-out') checked @endif>
            sold-out</label>
        <label><input type="radio" name="status" value="draft" @if (old('status', $product->status) == 'draft') checked @endif>
            draft</label>
    </div>
    @error('status')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">الألوان:</label>
    <input type="text" name="colors" value="{{ old('name') }}"
        class="color form-control col-7 @error('tags') is-invalid @enderror">
    @error('tags')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">الأحجام:</label>
    <input type="text" name="sizes" value="{{ old('name') }}"
        class="size form-control col-7 @error('tags') is-invalid @enderror">
    @error('tags')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $lable_btn ?? 'حفظ' }}</button>
</div>

</div>