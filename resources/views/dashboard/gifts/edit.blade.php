<x-dashboard-layout header="تعديل الهدية">
    <div class="container">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('admin.gifts.update' , $gift->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="">


                        <div class="col-md-6  mb-3">
                            <label for="">العنوان</label>
                            <input style=" font-family:Times New Roman; font-size:20px" type="text" name="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{old('title',$gift->title)}}">
                            @error('title')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">كود الهدية</label>
                            <input style=" font-family:Times New Roman; font-size:20px" type="text" name="code"
                                class="form-control @error('code') is-invalid @enderror" value="{{old('code',$gift->code)}}">
                            @error('code')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">صورة الغلاف </label>
                            <input style=" font-family:Times New Roman; font-size:20px" type="file" name="cover_image"
                                class="form-control @error('cover_image') is-invalid @enderror" value="{{old('cover_image')}}">
                            @error('cover_image')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>الحالة </label>
                            <select style=" font-family:Times New Roman; font-size:20px" name="status"   class="form-control @error('status') is-invalid @enderror" >
                                <option style="color:rgb(151, 35, 35);" value="">
                                    اختر الحالة</option>
                                <option value="active">فعال</option>
                                <option value="inactive">غير فعال</option>
                            </select>
                            @error('status')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label>المنتج </label>
                            <select style=" font-family:Times New Roman; font-size:20px"
                                class="form-control @error('product_id') is-invalid @enderror" name="product_id">
                                <option style="color:rgb(151, 35, 35);" value="">
                                    اختر المنتج</option>
                               @foreach ($products as $product)

                               <option @if($gift->product_id == $product->id )selected @endif value="{{$product->id}}">
                                {{$product->name}}

                                </option>
                               @endforeach
                            </select>
                            @error('product_id')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="">التفاصيل والشروط:</label>
                            <textarea name="details" id="editor"
                                class="form-control col-7 @error('details') is-invalid @enderror" >{{ old('details',$gift->details) }}  </textarea>
                            @error('details')
                                <p class="invalid-feedback d-block">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="mb-5">
                        <button type="submit" class="btn btn-primary btn-lg"> تعديل </button>
                    </div>



                </form>

            </div>
        </div>
    </div>
    @push('js')
    <script src="{{asset('dashboard/ckeditor/build/ckeditor.js')}}"></script>

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
    </script>
    @endpush
</x-dashboard-layout>
