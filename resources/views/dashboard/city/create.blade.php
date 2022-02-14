<x-dashboard-layout header="اضافة مدينة">

    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('admin.city.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-12  mb-3">
                    <label for="">اسم المدينة</label>
                    <input type="text" name="name" class="form-control col-md-6 @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12  mb-3">
                    <label for="">سعر التوصيل</label>
                    <input type="number" name="price" class="form-control col-md-6">

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
