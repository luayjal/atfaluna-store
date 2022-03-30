<x-dashboard-layout header="الاعدادات">

    <div class="container">

        <form action="{{ route('admin.setting.about-us.update') }}" method="POST"enctype="multipart/form-data">
        <div class="card ">
            <div class="card-header"><h4> من نحن</h4></div>
            <div class="card-body">
                    @csrf
                    <div class="col-7">

                        <div class="form-group  mb-3">
                            <label for="">الوصف:</label>
                            <textarea name="content" id="editor" class="form-control  @error('description') is-invalid @enderror"
                                rows="20">{{ old('content', $about_us->content) }}  </textarea>
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


                    </div>

            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header"><h4> تواصل معنا</h4></div>

            <div class="card-body">
                    <div class="col-7">
                        <div class="form-group mb-3">
                            <label for="">العنوان</label>
                            <input style="direction: ltr !important" type="text" name="address"
                                value="{{ old('address', $about_us->address) }}"
                                class="form-control text-left  @error('address') is-invalid @enderror">
                            @error('address')
                                <p class="invalid-feedback d-block">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">رقم الجوال</label>
                            <input style="direction: ltr !important" type="text" name="mobile"
                                value="{{ old('mobile', $about_us->mobile) }}"
                                class="form-control text-left  @error('mobile') is-invalid @enderror">
                            @error('mobile')
                                <p class="invalid-feedback d-block">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">البريد الالكتروني</label>
                            <input type="text" name="email" value="{{ old('email', $about_us->email) }}"
                                class="form-control  @error('email') is-invalid @enderror">
                            @error('email')
                                <p class="invalid-feedback d-block">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>

            </div>

        </div>
        <div class="card mt-3">
            <div class="card-header"><h4> سياسة الاسترجاع والاستبدال</h4></div>

            <div class="card-body">
                    <div class="col-7">
                        <div class="form-group  mb-3">
                            <label for="">الوصف:</label>
                            <textarea name="return_policy" id="return_policy" class="form-control  @error('return_policy') is-invalid @enderror"
                                rows="20">{{ old('return_policy', $about_us->return_policy) }}  </textarea>
                            @error('return_policy')
                                <p class="invalid-feedback d-block">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <button type="submit" class="btn btn-primary "> حفظ </button>
                        </div>
                    </div>

            </div>

        </div>

    </div>
</form>
    </div>
    @push('css')
        <!------- ckeditor --------->
        <script src="{{ asset('dashboard/ckeditor/build/ckeditor.js') }}"></script>
    @endpush
    @push('js')
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
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
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script>
            ClassicEditor
                .create(document.querySelector('#return_policy'), {
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
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
</x-dashboard-layout>
