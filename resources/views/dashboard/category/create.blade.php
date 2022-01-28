<x-dashboard-layout header="اضافة قسم">

    <div class="container">
      <div class="card">
       {{--  <div class="card-header"><h4>اضافة قسم</h4></div> --}}
        <div class="card-body">
          <form action="{{ route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-12  mb-3">
                    <label for="">اسم القسم</label>
                    <input type="text" name="name" class="form-control col-md-6 @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12  mb-3">
                    <label for="">القسم الرئيسي</label>
                    <select  name="parent_id" class="form-control form-select col-md-6" aria-label="Default select example">
                      <option value="" selected>اختر القسم الرئيسي</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>

                    @error('name_ar')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group col-md-12 mb-3">
                    <label for="">صورة القسم</label>
                    <input type="file" name="image" class="form-control col-md-6  @error('image') is-invalid @enderror"
                        accept="image/*">
                    @error('image_ar')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-md-12 mb-3">
                    <label for="">لون أيقونة القسم</label>
                    <input type="color" name="background_color" class="form-control col-md-2  @error('background-color') is-invalid @enderror"
                        accept="image/*">
                    @error('background_color')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-md-12 mb-3">
                    <label for="">لون خط القسم</label>
                    <input type="color" name="font_color" class="form-control col-md-2  @error('font_color') is-invalid @enderror"
                        accept="image/*">
                    @error('font_color')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
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
