<x-dashboard-layout header="من نحن">

    <div class="container">
      <div class="card">
       {{--  <div class="card-header"><h4>اضافة قسم</h4></div> --}}
        <div class="card-body">
          <form action="{{ route('admin.setting.about-us.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-7">

                <div class="form-group  mb-3">
                    <label for="">الوصف:</label>
                    <textarea name="content" id="editor"
                        class="form-control  @error('description') is-invalid @enderror" rows="20">{{ old('content', $about_us->content) }}  </textarea>
                    @error('content')
                        <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="">الصورة الرئيسية:</label>
                    <div><img src="{{ $about_us->image_url }}" height="200" class="mb-3"></div>

                    <div class="input-group ">
                        <div class="custom-file">
                            <input type="file" class="form-control" name="image" id="exampleInputFile">

                        </div>

                    </div>
                    @error('image')
                        <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="">حساب تويتر</label>
                    <input type="text" name="twitter" value="{{ old('name', $about_us->twitter) }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">حساب الانستغرام</label>
                    <input type="text" name="insta" value="{{ old('name', $about_us->insta) }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">حساب التيك توك</label>
                    <input type="text" name="tiktok" value="{{ old('name', $about_us->tiktok) }}"
                        class="form-control  @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">رقم الجوال</label>
                    <input style="direction: ltr !important" type="text" name="mobile" value="{{ old('name', $about_us->mobile) }}"
                        class="form-control text-left  @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">البريد الالكتروني</label>
                    <input type="text" name="email" value="{{ old('name', $about_us->email) }}"
                        class="form-control  @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="form-group mb-5">
                <button type="submit" class="btn btn-primary"> حفظ  </button>
            </div>

    </div>
    </form>
        </div>
    </div>
    </div>
    @push('css')
    <!------- ckeditor --------->
    <script src="{{asset('dashboard/ckeditor/build/ckeditor.js')}}"></script>
    @endpush
@push('js')

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
