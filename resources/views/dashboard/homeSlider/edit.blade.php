
@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div style="background-color:lavender" class="card-header">

        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:35px;margin-top:20px">{{ trans('admin.edit slider') }} </h1>
    </div>
<div>
    <div  class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
            @include('admin.alerts.success')
            <a style="margin-bottom: 20px;" href="{{ route('homeslider') }}" class="btn btn-success btn-lg"><span style="text-align: center">{{ trans('admin.main') }}</span></a>

        <form action="{{ url('admin/update-slider/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="row">
            <div class="col-md-12 mb-3">
                <label style="color: #0090E7">   {{ trans('admin.slider Position') }} </label>
                    <select class="form-control @error('type') is-invalid @enderror" name="type">
                        <option style="color:rgb(216, 128, 128); " value="">{{ trans('admin.choose the slider position') }}</option>
                        <option value="top" {{$slider->type == 'top'?'selected':'' }}>{{ trans('admin.top') }}</option>
                        <option value="bottom"{{$slider->type == 'bottom'?'selected':'' }}>{{ trans('admin.bottom') }}</option>
                    </select>
                @error('type')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                </div>
            <div  class="col-md-12  mb-3">
                <label for="">{{ trans('admin.title') }}</label>
                <input  value="{{ $slider->title}}"  style="font-family:Times New Roman; font-size:24px" type="text"  name="title" class="form-control  @error('title') is-invalid @enderror">
                @error('title')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div  class="col-md-12  mb-3">
                <label for="">{{ trans('admin.subtitle') }}</label>
                <input   value="{{ $slider->subtitle}}"style=" font-family:Times New Roman; font-size:24px" type="text"  name="subtitle" class="form-control  @error('subtitle') is-invalid @enderror">
                @error('subtitle')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div  class="col-md-6 mb-3">
                <label for="">{{ trans('admin.Link') }}</label>
                <input  value="{{ $slider->link}}" style="font-family:Times New Roman; font-size:24px" type="text"  name="link" class="form-control @error('link') is-invalid @enderror">
                @error('link')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            {{-- <div  class="col-md-12 mb-3">
                <label for="">Price</label>
                <input  value="{{ $slider->price}}" style="font-family:Times New Roman; font-size:24px" type="number"  name="price" class="form-control">
            </div>  --}}



            <div class="col-md-6 mb-3">
                <label >{{ trans('admin.Status') }} </label>
                    <select style=" font-family:Times New Roman; font-size:24px"  class="form-control @error('status') is-invalid @enderror" name="status">
                        <option style="color:rgb(216, 128, 128); " value="">{{ trans('admin.select the status') }}</option>
                        <option value="0" {{$slider->status == 0?'selected':'' }}>{{ trans('admin.Inactive') }}</option>
                        <option value="1"{{$slider->status == 1?'selected':'' }}>{{ trans('admin.Active') }}</option>
                    </select>
                @error('status')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                </div>
            </div>

            @if($slider->imageSlider)
            <img style="width: 75px;height:75px" src="{{ asset('assets/uploads/Slider/'.$slider->imageSlider) }}" alt="image">
            @endif
            <div  class="form-group mb-3">
                <label for=""> {{ trans('admin.imageSlider') }}</label>
                <input style="color:#0090E7; font-size:24px" type="file"  name="imageSlider" class="form-control">
            </div>



            <div  class="form-group mb-5">
                <button type="submit" class="btn btn-primary btn-lg"> {{ trans('admin.edit') }} </button>
            </div>

           </div>
        </form>



@endsection
