
@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div style="background-color:lavender" class="card-header">

        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px">{{ trans('admin.add slider') }} </h1>
    </div>
<div>
    <div  class="card-body">
        <div style="position: relative; top: 20px; right: -20px">
            @include('admin.alerts.success')
            <a style="margin-bottom: 20px;" href="{{ route('homeslider') }}" class="btn btn-success btn-lg"><span style="text-align: center">{{ trans('admin.main') }}</span></a>

        <form action="{{ route('store-slider') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">


            <div class="col-md-6 mb-3">
                <label style="color: #0090E7">  {{ trans('admin.slider Position') }} </label>
                    <select class="form-control @error('type') is-invalid @enderror" name="type">
                        <option style="color:rgb(151, 35, 35);" value=""> {{ trans('admin.choose the slider') }}</option>
                        <option value="top" >{{ trans('admin.top') }}</option>
                        <option value="bottom" >{{ trans('admin.bottom') }}</option>
                    </select>
                @error('type')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label >{{ trans('admin.Status') }} </label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option style="color:rgb(151, 35, 35);" value="">{{ trans('admin.select the status') }}</option>
                            <option value="0">{{ trans('admin.Inactive') }}</option>
                            <option value="1">{{ trans('admin.Active') }}</option>
                        </select>
                    @error('status')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                    </div>

            <div class="col-md-6 mb-3">
                <label for=""> {{ trans('admin.title') }}</label>
                <div class="mb-3">
                  <textarea  style="font-size: 28px; font-family:'Times New Roman', Times, serif"   type="text" name="title" class="form-control" >
                  </textarea>
                    
                </div>
              </div>
            <div class="col-md-6 mb-3">
                <label for=""> {{ trans('admin.subtitle') }}</label>
                <div class="mb-3">
                  <textarea  style="font-size: 28px; font-family:'Times New Roman', Times, serif"   type="text" name="subtitle" class="form-control" >

                  </textarea>
                   
                </div>
              </div>

            <div  class="col-md-12 mb-3">
                <label for="">{{ trans('admin.Link') }}</label>
                <input placeholder="{{ trans('admin.without') }}" style="font-family:Times New Roman; font-size:24px" type="text"  name="link" class="form-control ">
                
            </div>


            <div  class="form-group mb-3">
                <label for="">{{trans('admin.imageSlider')}}</label>
                <input style="color:#0090E7; font-size:24px" type="file"  name="imageSlider" class="form-control  @error('imageSlider') is-invalid @enderror   ">
                @error('imageSlider')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

         <div class="form-group mb-5">

                <button type="submit" class="btn btn-primary btn-lg"> {{ trans('admin.add slider') }} </button>
            </div>



           </div>
        </form>



@endsection
