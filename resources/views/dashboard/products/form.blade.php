<div class="form-group mb-3">
    <label for="">كود المنتج:</label>
    <input type="text" name="code" value="{{ old('code', $product->code) }}"
        class="form-control col-7 @error('code') is-invalid @enderror">
    @error('code')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>
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
    <select name="category_id" class="form-control col-7 @error('category_id') is-invalid @enderror">
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
        class="form-control col-7 @error('description') is-invalid @enderror"> {!! Request::old('description', $product->description) !!} </textarea>
    @error('description')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<div class="form-group col-md-7 mb-3">
    <label for="">وصف المقاس:</label>
    <textarea name="description_size"
        class="form-control  @error('description_size') is-invalid @enderror"  rows="3">{{ old('description_size', $product->description_size) }}  </textarea>
    @error('description_size')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">صورة وصف  المقاس:</label>
    <div><img src="{{ $product->image_disc }}" height="200" class="mb-3"></div>

    <div class="input-group ">
        <div class="custom-file col-7">
            <input type="file" class="form-control" name="img_description_size" id="exampleInputFile">

        </div>

    </div>
    @error('img_description_size')
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
            <div class="col-md-2 text-center position-relative">
                <button type="button" class="btn btn-danger btn-sm deleteImage position-absolute rounded-circle" id="deleteGallery"><i class="fas fa-times-circle"></i></button>
                <img src="{{ $image->image_url }}" id="imageId" imageId={{$image->id}} alt="" height="80" class="img-fit m-1 border">

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
    @if ($product->certificate)
    <div class="position-relative">
        <button type="button" class="btn btn-danger btn-sm deleteImage position-absolute rounded-circle" id="deleteGallery"><i class="fas fa-times-circle"></i></button>

        <img src="{{ $product->certificate_url }}" id="imageId" imageId={{$product->id}} alt="" width="250" class="img-fit m-1 border">

    </div>
    @endif
    <div class="input-group">
        <div class="custom-file col-7">
            <input type="file" class="form-control"  name="certificate" id="exampleInputFile">
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
        <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control @error('price') is-invalid @enderror">
        @error('price')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
    </div>
</div>
<div class="form-group mb-3">
    <label for="">السعر بعد الخصم:</label>
    <input type="number" name="discount_price" value="{{ old('sale_price', $product->discount_price) }}"
        class="form-control col-7 @error('discount_price') is-invalid @enderror">
    @error('discount_price')
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
           {{__('in-stock')}}</label>
        <label><input type="radio" name="status" value="sold-out" @if (old('status', $product->status) == 'sold-out') checked @endif>
            {{__('sold-out')}}</label>
        <label><input type="radio" name="status" value="draft" @if (old('status', $product->status) == 'draft') checked @endif>
            {{__('draft')}}</label>
    </div>
    @error('status')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">الألوان:</label>
    <input id="color" type="text" name="colors" value="{{ old('colors')?? $colors}}"
        class="color tags form-control col-7 @error('colors') is-invalid @enderror">
    @error('colors')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">الأحجام:</label>
    <input id="size" type="text" name="sizes" value="{{ old('sizes') ?? $sizes}}"
        class="size form-control tags col-7 @error('sizes') is-invalid @enderror">
    @error('sizes')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col-4">الكود</th>
            <th scope="col-4">السعر</th>
            <th scope="col">الكمية</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody id="tr">


    </tbody>
</table>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $lable_btn ?? 'حفظ' }}</button>
</div>

</div>

