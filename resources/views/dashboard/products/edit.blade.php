<x-dashboard-layout header="تعديل المنتج">
    <div class="container">
      <div class="card">

        <div class="card-body">
          <form action="{{ route('admin.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
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
                        <option value="{{ $category->id }}" @if ($category->id == old('category_id', $product->category_id)) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group col-7  mb-3">
                <label for="">الوصف:</label>
                <textarea name="description" id="editor" class="form-control  @error('description') is-invalid @enderror"
                    rows="20">{{ old('description', $product->description) }}  </textarea>
                @error('return_policy')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="">وصف المقاس:</label>
                <textarea name="description_size" class="form-control  @error('description_size') is-invalid @enderror"
                    rows="3">{{ old('description_size', $product->description_size) }}  </textarea>
                @error('description_size')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="">صورة وصف المقاس:</label>
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
                            <button type="button" class="btn btn-danger btn-sm deleteImage position-absolute rounded-circle"
                                id="deleteGallery"><i class="fas fa-times-circle"></i></button>
                            <img src="{{ $image->image_url }}" id="imageId" imageId={{ $image->id }} alt="" height="80"
                                class="img-fit m-1 border">

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
                        <button type="button" class="btn btn-danger btn-sm deleteImage position-absolute rounded-circle"
                            id="deleteGallery"><i class="fas fa-times-circle"></i></button>

                        <img src="{{ $product->certificate_url }}" id="imageId" imageId={{ $product->id }} alt="" width="250"
                            class="img-fit m-1 border">

                    </div>
                @endif
                <div class="input-group">
                    <div class="custom-file col-7">
                        <input type="file" class="form-control" name="certificate" id="exampleInputFile">
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
                    <input type="text" name="price" value="{{ old('price', $product->price) }}"
                        class="form-control @error('price') is-invalid @enderror">
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
                        {{ __('in-stock') }}</label>
                    <label><input type="radio" name="status" value="sold-out" @if (old('status', $product->status) == 'sold-out') checked @endif>
                        {{ __('sold-out') }}</label>
                    <label><input type="radio" name="status" value="draft" @if (old('status', $product->status) == 'draft') checked @endif>
                        {{ __('draft') }}</label>
                </div>
                @error('status')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">الألوان:</label>
                <input id="color" type="text" name="colors" value="{{ old('colors') ?? $colors }}"
                    class="color tags form-control col-7 @error('colors') is-invalid @enderror">
                @error('colors')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">الأحجام:</label>
                <input id="size" type="text" name="sizes" value="{{ old('sizes') ?? $sizes }}"
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
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>

            </div>

           {{--  @include('dashboard.products.form',[
                'lable_btn'=>'تعديل'
                ]) --}}
          </form>
        </div>
    </div>
    </div>



  @push('css')

    <!------- selectize --------->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css"
        integrity="sha512-MMojOrCQrqLg4Iarid2YMYyZ7pzjPeXKRvhW9nZqLo6kPBBTuvNET9DBVWptAo/Q20Fy11EIHM5ig4WlIrJfQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!------- ckeditor --------->
    <script src="{{asset('dashboard/tinymce/tinymce.min.js')}}"></script>
{{--     <script src="https://cdn.tiny.cloud/1/x197c4g06ct42x8yhqjhkpxwax1dxz0kulylkc87gsqdj190/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

    <script>
      tinymce.init({
        selector: '#editor',
        language: 'ar'
      });
    </script>
  @endpush

  @push('js')
    <script>
        $(".deleteImage").click(function(){
            var parent =  $(this).parent();
           var image =  $(this).parent().find('img');
           var id = image.attr('imageId');
           console.log(image);
           console.log(id);
            $.post(`/dashboard/products/image/${id}`,{_token: "{{csrf_token()}}"} ,function(data, status){
                parent.hide();

            });
        });

    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"
  integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js"
  integrity="sha512-JiDSvppkBtWM1f9nPRajthdgTCZV3wtyngKUqVHlAs0d5q72n5zpM3QMOLmuNws2vkYmmLn4r1KfnPzgC/73Mw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>


{{--
 <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ),{
                       toolbar: {
                          items: [
                              'heading', '|',
                              'fontfamily', 'fontsize', '|',
                              'alignment', '|',
                              'fontColor', 'fontBackgroundColor', '|',
                              'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                              'link', '|',
                              'outdent', 'indent', '|',
                              'bulletedList', 'numberedList', 'todoList', '|',
                              'code', 'codeBlock', '|',
                              'insertTable', '|',

                              'undo', 'redo'
                          ],
                          shouldNotGroupWhenFull: true
                      }

                    })
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                });
</script> --}}
<script>
    $(".tags").selectize({
        delimiter: ",",
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input,
            };
        },
    });
  </script>
<script type="module">


    $(document).ready(function() {

    $(".tags").ready(createVariant());
    $(".tags").on("keyup keypress", function(){
        if (event.which == 13 || event.which == 188 || event.which == 1 || event.which == 8) {
            createVariant()
        }
    });
    function createVariant(){
        let cartesian = (...arr) => arr.reduce((a, c) => a.map(e => c.map(f => e.concat([f]))).reduce((a, c) => a.concat(c),
            []), [
            []
        ]);
        var id_variant = {!!$id_variant!!} ?? '';
        var code_variant = {!!$code_variant!!} ??'';
        var quantity_variant = {!!$quantity_variant!!} ??'';
        var price_variant = {!!$price_variant!!} ?? '';
        var size = $("#size").val();
            var color = $("#color").val();

            var sizeArray = size.split(",");
            var colorArray = color.split(",");


            let anyarr = cartesian(sizeArray, colorArray)
            console.log(anyarr);

            var prevHtml = $("#tr").html();
            //console.log(prevHtml);

            // console.log( newArray);
            var tag = $("#tr").text(null);

            for (var i = 0; i < anyarr.length; i++) {

                if (size.length > 0 && color.length > 0) {

                    var str = anyarr[i].toString().replace(',', ' / ')
                    // anyarr = null;
                    tag =
                        `<tr>
                        <td> ${str} </td>
                        <td class='col-md-3 text-center'>
                            <input type='hidden' name='variant["${i}"][id_variant]' id='price' placeholder ='كود المنتج' value='${id_variant[i]}' class='form-control price' >
                            <input type='text' name='variant["${i}"][code_variant]' id='price' placeholder ='كود المنتج' value=' ${code_variant[i]}' class='form-control price' >
                        </td>
                        <td class='col-md-3 text-center'>
                        <input type='text'  name='variant["${i}"][price_variant]' placeholder ='السعر' value='${price_variant[i]}' class='form-control ' >
                        </td>
                        "<td class='col-md-3 text-center'>
                            <input type='text'  name='variant["${i}"][quantity_variant]' placeholder ='الكمية' value='${quantity_variant[i]}' class='form-control ' >
                        </td>
                        <td>
                            <button class="btn btn-danger btn_delete" > <i class="fa fa-trash"></i> حذف</button>

                            <input type='text' hidden name='variant["${i}"][size]' id='price' placeholder ='كود المنتج' value='${anyarr[i][0]}' class='form-control price col-md-3' >
                        </td>
                        <td>
                            <input type='text' hidden name='variant["${i}"][color]' id='price' placeholder ='price' value='${anyarr[i][1]}' class='form-control price col-md-3' >
                        </td>
                    </tr>`;

                    $("#tr").append(tag);

                }
            }
    }
    });

</script>
<script>
    $(document).on('click', '.btn_delete', function () {
        $(this).closest('tr').remove();
    });
</script>
  @endpush
</x-dashboard-layout>
