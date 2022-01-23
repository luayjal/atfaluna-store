@extends('admin.layouts.app')
@section('content')
<div  class="card">
  <div  class="card-header">
    <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px">{{ trans('admin.edit banner') }}</h1>
</div>

  <div  class="card-body">
    <div style="position: relative; top: 20px; right: -20px">
        @include('admin.alerts.success')
        <a style="margin-bottom: 20px;" href="{{ route('homebanner') }}" class="btn btn-success btn-lg"><span style="text-align: center">{{trans('admin.main') }}</span></a>

        <form action="{{ url('admin/update-banner/'.$banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
          @method('PUT')
            {{-- <div class="mb-3 row">
              <div class="col-md-12 mb-3">
                <label style="color: blue; font-size:25px"> <span style="color: red">*</span>{{ trans('admin.The Category') }}  </label>
                <select  style=" font-size:20px"  class="form-select"  name="category_id">
                  <option value="">{{ trans('admin.Select the Category') }}</option>
                  @foreach ($category as $category)
                  <option value="{{ $category->id }}"> {{ $category->name_en }}</option>
                  <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-12 mb-3">
                <label style="color: blue; font-size:25px"> <span style="color: red">*</span> {{ trans('admin.The Product') }} </label>
                <select  style=" font-size:20px"  class="form-select"  name="product_id">
                  <option value="">{{ trans('admin.Select the Product') }}</option>
                  @foreach ($product as $products)
                  <option value="{{ $products->id }}"> {{ $products->name_en }}</option>

                  <option value="{{ $products->id }}">{{ $products->name_ar }}</option>
                  @endforeach
                </select>
              </div>
               --}}
               <div class="col-md-12 mb-3">
                <label style="color: blue; font-size:25px"> <span style="color: red">*</span> {{ trans('admin.location') }} </label>
                <select  style=" font-size:20px"  class="form-select  @error('location') is-invalid @enderror"  name="location">
                  <option value="">{{ trans('admin.Select the location') }}</option>
                  <option  value="top"{{$banner->location == 'top'?'selected':''}}>{{ trans('admin.top banner') }}</option>
                   <option value="bottom" {{$banner->location == 'bottom'?'selected':''}}> {{ trans('admin.bottom banner') }}</option>
                   <option value="right" {{$banner->location == 'right'?'selected':''}}> {{ trans('admin.right banner') }}</option>
                  <option value="left" {{$banner->location == 'left'?'selected':''}}> {{ trans('admin.left banner') }}</option>

                </select>
                   @error('location')
                   <p class="invalid-feedback">{{ $message }}</p>
                   @enderror
              </div>

              <div  class="col-md-12  mb-3">
                <label for="">{{ trans('admin.Link') }}</label>
                <input style=" font-family:Times New Roman; font-size:24px"  value="{{$banner->link}}"  type="text"  name="link" class="form-control  @error('link') is-invalid @enderror">
                  @error('link')
                  <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
            </div>
            <div class="col">
                        @if($banner->banner_image)
                        <img style="width: 75px;height:75px;text-align:center;" src="{{ asset('assets/uploads/banners/'.$banner->banner_image) }}" alt="image">
                        @endif
            </div>

            <div  class="col-md-12 mb-3">
                <label for="">{{ trans('admin.banner image') }}</label>
                <input style="color:#0090E7; font-size:24px" type="file" name="banner_image" class="form-control">
            </div>

            {{-- <div class="col-md-4 mb-3">
              <label >{{ trans('admin.Status') }} </label>
                  <select class="form-control" name="status">
                      <option  value="0">{{ trans('admin.Inactive') }}</option>
                      <option value="1">{{ trans('admin.Active') }}</option>
                  </select>
              </div>
          </div>           --}}
            <div  class="col-md-12 mb-5">
                <button type="submit" class="btn btn-primary  btn-lg"><i class="feather icon-edit"></i> {{ trans('admin.edit banner') }} </button>
            </div>

           </div>
        </form>

@endsection
