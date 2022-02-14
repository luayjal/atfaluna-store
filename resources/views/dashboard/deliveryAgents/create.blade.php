<x-dashboard-layout header="اضافة مندوب توصيل">

    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('admin.delivery.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-12  mb-3">
                    <label for="">اسم المندوب</label>
                    <input type="text" name="name" class="form-control col-md-6 @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-12  mb-3">
                    <label for="">رقم الجوال</label>
                    <input type="text" name="mobile" class="form-control col-md-6 @error('mobile') is-invalid @enderror">
                    @error('mobile')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-12  mb-3">
                    <label for="">البريد الالكتروني</label>
                    <input type="email" name="email" class="form-control col-md-6 @error('email') is-invalid @enderror">
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-12  mb-3">
                    <label for="">كلمة المرور</label>
                    <input type="password" name="password" class="form-control col-md-6 @error('password') is-invalid @enderror">
                    @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-12  mb-3">
                    <label for="">تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" class="form-control col-md-6">
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">صورة المندوب</label>
                    <input type="file" name="image" class="form-control col-md-6  @error('image') is-invalid @enderror"
                        accept="image/*">
                    @error('image')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group col-md-12 mb-3">
                    <label for="">صورة الهوية</label>
                    <input type="file" name="user_id_image" class="form-control col-md-6  @error('user_id_image') is-invalid @enderror"
                           accept="image/*">
                    @error('user_id_image')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">استمارة السيارة</label>
                    <input type="file" name="car_form_image" class="form-control col-md-6  @error('car_form_image') is-invalid @enderror"
                           accept="image/*">
                    @error('car_form_image')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-12  mb-3">
                    <label for="">رقم هيكل السيارة</label>
                    <input type="text" name="car_body" class="form-control col-md-6 ">
                </div>

                <div class="col-md-12  mb-3">
                    <label for="">الموديل</label>
                    <input type="text" name="car_model" class="form-control col-md-6 ">
                </div>
                <div class="col-md-12  mb-3">
                    <label for="">رخصة القيادة</label>
                    <input type="text" name="driving_license" class="form-control col-md-6 ">
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
