
<div class="form-group mb-3">
    <label for="">المنتج:</label>
    <select name="product_id" class="form-control col-7 @error('product_id') is-invalid @enderror">
        <option value="">اختر المنتج</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}" @if ($product->id == old('product_id', $advertising->product_id)) selected @endif>{{ $product->name }}</option>
        @endforeach
    </select>
    @error('product_id')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>


<div class="form-group mb-3">
    <label for="">الفيديو:</label>
    @if ($advertising->video)
    <div>
        <video src="{{ $advertising->video_url }}" height="200" controls class="mb-3">
    </div>
    @endif


    <div class="input-group ">
        <div class="custom-file col-7">
            <input type="file" class="form-control" name="video" id="exampleInputFile">

        </div>

    </div>
    @error('video')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">الحالة:</label>
    <div>
        <label><input type="radio" name="status" value="active" @if (old('status', $advertising->status) == 'active') checked @endif>
           {{__('active')}}</label>
        <label><input type="radio" name="status" value="inactive" @if (old('status', $advertising->status) == 'inactive') checked @endif>
            {{__('inactive')}}</label>

    </div>
    @error('status')
        <p class="invalid-feedback d-block">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $lable_btn ?? 'حفظ' }}</button>
</div>

</div>
