<x-dashboard-layout header="اضافة سلايدر">

    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="form-group col-md-12 mb-3">
                    <label for="">الرابط</label>

                    <input type="text" name="link" class="form-control col-md-6  @error('link') is-invalid @enderror">
                    @error('link')

                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-12  mb-3">
                    <label for="">العنوان</label>
                    <input type="text" name="title" class="form-control col-md-6">

                </div>
                <div class="col-md-12  mb-3">
                    <label for="">الوصف</label>
                    <textarea rows="3" name="description" class="form-control col-md-6"></textarea>

                </div>
                <div class="col-md-12  mb-3">
                    <label for="">الصورة</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label>الحالة </label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1" checked>
                      <label class="form-check-label" for="flexRadioDefault1">
                       مفعل
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" >
                      <label class="form-check-label" for="flexRadioDefault2">
                        غير مفعل
                      </label>
                    </div>
                    @error('status')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="form-group mb-5">
                <button type="submit" class="btn btn-primary"> إضافة  </button>
            </div>

    </div>
    </form>
        </div>
    </div>
    </div>
</x-dashboard-layout>
