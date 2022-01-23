@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px"> {{ trans('admin.Banners Table') }} </h1>
    </div>
    <div>
     <div class="card-body">
      <div style="position: relative; top: 5px;  bottom:20px">

        <a style="margin-bottom:15px;" href="{{url('admin/add-banner') }}" class="btn btn-success "><i class="feather icon-plus"></i>{{ trans('admin.add banner') }}</a>
     </div> 
    
      <table  class="table table-bordered border-primary">
        <div style="position: relative; top: 5px;  bottom:20px">

          <thead class="table-light">
              <tr style="text-align: center">
                  <th >{{ trans('admin.Id') }}</th>
                  <th>{{ trans('admin.location') }}</th>
                  <th > {{ trans('admin.banner image') }} </th>
                  <th > {{ trans('admin.Link') }} </th>
                  <th >{{ trans('admin.Action') }}</th>
              
              </tr>
              <tbody>
                @foreach ($banners as $banner )
                    
                  <tr style="text-align: center">
                      <td>{{$banner->id }}</td>
                      {{-- <td>{{ $banner->location }} --}}
                        <td>
                        @if($banner->location =='top')
                        {{ trans('admin.top banner') }}
                       
                        @elseif($banner->location =='bottom')
                        {{ trans('admin.bottom banner') }}
                        @elseif($banner->location =='right')
                        {{ trans('admin.right banner') }}
                        @elseif($banner->location=='left')

                        {{ trans('admin.left banner') }}
                         @endif 
                        </td> 
                   
                    <td >
                        <img style="height: 80px;width:80px" src="{{ asset('assets/uploads/banners/'.$banner->banner_image) }}" style="width: 60px" alt=" Banner">  
                    </td>
                    <td>{{ $banner->link }}</td>   

                       <td class="table-action">
                        
                        <a href="{{ url('admin/edit-banner/'.$banner->id) }}"  class="btn btn-primary btn-sm"><i class="feather icon-edit"></i>{{ trans('admin.edit banner') }}</a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{ $banner->id }}"><i class="feather icon-trash-2"></i>{{ trans('admin.delete') }} </a>

                        {{-- <a href="{{ url('admin/delete-banner/'.$banner->id) }}" class="btn btn-danger btn-sm">{{ trans('admin.delete banner') }}</a> --}}
                      </td>
                      @include('modal.delete_banner')
 
                  </tr>
                  @endforeach 
              </tbody>
          </thead>
      </table>
      {{ $banners->links() }}
     </div>

<div>
    
@endsection
  {{-- <td>{{$banner->category->name_ar}}</td>
                    <td>{{ $banner->category->name_en}}</td>
                    <td>{{ $banner->product->name_ar ? :""}}</td>
                    <td>{{ $banner->product->name_en ? : ""}}</td> --}}
                    {{-- <td>{{ $banner->status==1 ? 'Active':'Inactive' }}</td> --}}
                    