@extends('admin.layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
    <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px ;margin-top:20px"> {{ trans('admin.edit color ') }} </h1>
</div>
<div>

    <div class="card-body">
        <div style="position: relative; top: 20px; right: -20px">

        <form action="{{url('admin/update-color/'.$color->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
         @method('PUT')
<div class="from-group col mb-3">
  <a style="margin-bottom: 20px;" href="{{ route('colors') }}" class="btn btn-primary btn-lg"><span style="text-align: center">{{ trans('admin.colors') }}</span></a>
</div>
         <div  class=" from-group col-md-6  mb-3">
          <label for="">{{ trans('admin.add color') }}</label>
          <input style="font-family:Times New Roman; " type="text" value="{{ $color->color }}" name="color" class="form-control @error ('color') is-invalid @enderror">
             @error('color')
             <p class="invalid-feedback">{{ $message }}</p>
             @enderror
         </div>

    <div class="from-group col-md-6 mb-4">
      <label >{{ trans('admin.Status') }} </label>
          <select style=" color:rgb(151, 35, 35);font-size:24px" class="form-control @error ('status') is-invalid @enderror"   name="status">
              <option style="color:rgb(151, 35, 35);" value="">{{ trans('admin.select the status') }}</option>
              <option style="color: black" value="0" {{ $color->status == 0 ?'selected':''}}>{{ trans('admin.Inactive') }}</option>
              <option style="color: black" value="1" {{$color->status == 1?'selected':'' }}>{{ trans('admin.Active') }}</option>
          </select>
        @error('status')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
      </div>


            <div class=" col form-group mb-5">
                <button type="submit" class="btn btn-primary  btn-lg"> {{ trans('admin.edit color ') }} </button>
            </div>

           </div>
        </form>

@endsection
