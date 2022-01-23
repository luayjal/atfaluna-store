<x-dashboard-layout header="اضافة كوبون">
    <div class="container">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.coupons.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">


                        <div class="col-md-4  mb-3">
                            <label for="">كود الخصم</label>
                            <input style=" font-family:Times New Roman; font-size:20px" type="text" name="code"
                                class="form-control @error('code') is-invalid @enderror">
                            @error('code')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">نوع الخصم</label>
                            <select style=" font-family:Times New Roman; font-size:20px"
                                class="form-control @error('type') is-invalid @enderror" name="type">
                                <option style="color:rgb(151, 35, 35);" value="">
                                    اختر نوع الخصم</option>
                                <option value="fixed" {{ old('type') == 'fixed' ? 'slected' : null }}>
                                    قيمة ثايتة</option>
                                <option value="percentage" {{ old('type') == 'rate' ? 'slected' : null }}>
                                    نسبة بالمئة
                                    </option>
                            </select>
                            @error('type')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4  mb-3">
                            <label for="">قيمة الخصم</label>
                            <input style=" font-family:Times New Roman; font-size:20px" type="text" name="discount_value"
                                class="form-control @error('discount_value') is-invalid @enderror">
                            @error('discount_value')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-md-4  mb-3">
                            <label for="">تارريخ البدء</label>
                            <input style=" font-family:Times New Roman; font-size:20px" type="date" name="start_date"
                                class="form-control  @error('start_date') is-invalid @enderror">
                            @error('start_date')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4  mb-3">
                            <label for="">تاريخ الانتهاء</label>
                            <input style=" font-family:Times New Roman; font-size:20px" type="date" name="expire_date"
                                class="form-control @error('expire_date') is-invalid @enderror">
                            @error('expire_date')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>الحالة </label>
                            <select style=" font-family:Times New Roman; font-size:20px"
                                class="form-control @error('status') is-invalid @enderror" name="status">
                                <option style="color:rgb(151, 35, 35);" value="">
                                    اختر الحالة</option>
                                <option value="active">فعال</option>
                                <option value="inactive">غير فعال</option>
                            </select>
                            @error('status')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-md-4  mb-3">
                            <label for="">عدد مرات الاستخدام</label>
                            <input style=" font-family:Times New Roman; font-size:20px" type="number" name="use_time"
                                class="form-control">
                            @error('use_time')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="col-md-4  mb-3">
                            <label for="">تطبيق الكوبون للمشتريات أكبر من </label>
                            <input style=" font-family:Times New Roman; font-size:20px" type="text" name="greater_than"
                                class="form-control @error('greater_than') is-invalid @enderror">
                            @error('greater_than')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="mb-5">
                        <button type="submit" class="btn btn-primary btn-lg">
                            اضافة </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-dashboard-layout>
