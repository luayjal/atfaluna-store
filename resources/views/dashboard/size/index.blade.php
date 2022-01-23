@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px;margin-top:20px"> {{trans('admin.sizes')}} </h1>
    </div>
    <div>
     <div class="card-body">
     <div>
        <a style="margin-bottom:15px;" href="{{route('add-size') }}" class="btn btn-success "><i class="feather icon-plus"></i>{{trans('admin.add size')}}</a>
   
     </div>
      <table  class="table table-bordered border-primary">
        
          <thead class="table-light">
              <tr style="text-align: center">
                  <th >{{ trans('admin.Id') }}</th>
                  <th >{{trans('admin.size')}} </th>
                  <th >{{ trans('admin.Status') }}</th>
                  <th >{{ trans('admin.Action') }}</th>
              </tr>
              <tbody>
                @foreach ($sizes as $size )
                    
                  <tr style="text-align: center">
                      <td>{{$size->id }}</td>
                   <td>
                     {{ $size->size }}
                   </td>
                   <td>
                   <?php if($size->status ==1){?>

                    <a href="{{ url('admin/edit-size/'.$size->id) }}" style="color:green;text-decoration:none"> Active</a>
                    
                    <?php }else {?>
                      <a href="{{ url('admin/edit-size/'.$size->id) }}" style="color: gray; text-decoration:none"> Inactive</a>
                    
                    <?php }?>

                  </td>
                   
                      <td class="table-action">
                        {{-- <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a> --}}
                        <a href="{{ url('admin/edit-size/'.$size->id) }}"class="btn btn-icon btn-outline-primary btn-sm"><i class="feather icon-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal" data-target="#ModalDelete{{ $size->id }}"><i class="feather icon-trash-2"></i> </a>

                    </td>
                    @include('modal.delete_size')
                     
                  </tr>
                  @endforeach
              </tbody>
          </thead>
      </table>
      {{ $sizes->links() }}
     </div>

<div>
    
@endsection