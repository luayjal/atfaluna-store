@extends('admin.layouts.app')
@section('content')
<div class="card">
  <div  class="card-header">
    <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px">{{ trans('admin.add size')}} </h1>
</div>
<div>

    <div class="card-body">
        <div style="position: relative; top: 20px; right: -30px">

        <form action="{{ route('store-size') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="from-group col mb-3">
            <a style="margin-bottom: 20px;" href="{{ route('sizes') }}" class="btn btn-primary btn-lg"><span style="text-align: center">{{ trans('admin.main') }}</span></a>

            </div>
              <div  class=" from-group col-md-6  mb-3">
                <label for="">{{ trans('admin.add size') }}</label>
                <input style="font-family:Times New Roman; " type="text"  name="size" class="form-control @error('size') is-invalid @enderror">
                  @error('size')
                  <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
              </div>

          <div class="from-group col-md-6 mb-4">
            <label >{{ trans('admin.Status') }} </label>
                <select style=" color:rgb(151, 35, 35);font-size:24px" class="form-control @error('status') is-invalid @enderror"   name="status">
                    <option style="color:rgb(151, 35, 35);" value="">{{ trans('admin.select the status') }}</option>
                    <option style="color: black" value="0">{{ trans('admin.Inactive') }}</option>
                    <option style="color: black" value="1">{{ trans('admin.Active') }}</option>
                </select>
              @error('status')
              <p class="invalid-feedback">{{ $message }}</p>
              @enderror

          </div>


            <div class="col mb-5">
                <button type="submit" class="btn btn-primary  btn-lg"> {{ trans('admin.add size') }} </button>
            </div>

           </div>
        </form>

@endsection

