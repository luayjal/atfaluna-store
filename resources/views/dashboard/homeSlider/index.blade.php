@extends('admin.layouts.app')
@section('content')
{{-- 

</tr>
</tbody>
</table> --}}

<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-defualt">
                    <div class="panel-heading">
                        <div class="row">
                        
                            <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:50px; margin-top:20px">  {{ trans('admin.SliderHome') }} </h1>

                            <div class="col-md-6">
                                <a style="margin-bottom:15px" href="{{ route('add-slider') }}" class="btn btn-success "><i class="feather icon-plus"></i>
                                {{ trans('admin.add slider') }}
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered border-primary">
                            <thead class="table-stripped">
                                <tr style="text-align: center">
                                    <th>{{ trans('admin.Id') }}</th>
                                    <th> {{ trans('admin.Type') }}</th>
                                    <th>{{ trans('admin.title') }}</th>
                                    <th>{{ trans('admin.subtitle') }}</th>
                                    <th>{{ trans('admin.Link') }}</th>
                                    <th>{{ trans('admin.Status') }}</th>
                                    <th> {{ trans('admin.imageSlider') }}</th>
                                    <th>{{ trans('admin.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($sliders as $slider)
                                <tr style="text-align: center">
                                <td>{{ $slider->id }}</td> 

                                <td>
                                    @if($slider->type =='top')
                                   <span style="color: blue"> {{ trans('admin.top') }}
                                   </span>
                                    @else
                                    {{ trans('admin.bottom') }}
                                     @endif
                                    {{-- {{ $slider->type }}</td> --}}
                               
                                <td>{{ $slider->title }}</td> 
                                <td>{{ $slider->subtitle }}</td>  
                                {{-- <td>{{ $slider->price }}</td> --}}
                                <td>{{ $slider->link }}</td> 
                                <td>
                                    <?php if($slider->status ==1){?>
            
                                    <a href="{{ url('admin/edit-slider/'.$slider->id) }}" style="color:green;text-decoration:none"> {{ trans('admin.Active') }}</a>
                                    
                                    <?php }else {?>
                                      <a href="{{ url('admin/edit-slider/'.$slider->id) }}" style="color: gray; text-decoration:none"> {{ trans('admin.Inactive') }}</a>
                                    
                                    <?php }?>
            
                                  </td>
                                {{-- <td>{{ $slider->status==1 ? 'Active':'Inactive' }}</td> --}}
                                
                                <td>
                                    <img src="{{ asset('assets/uploads/Slider/'.$slider->imageSlider) }}" style="width: 100px;height:90px" alt="English Image">  
                                </td>
                                <td class="table-action">
                                    {{-- <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a> --}}
                                    <a href="{{ url('admin/edit-slider/'.$slider->id) }}" class="btn btn-icon btn-outline-primary btn-sm"><i class="feather icon-edit"></i></a>
                                    <a href="#" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal" data-target="#ModalDelete{{ $slider->id }}"><i class="feather icon-trash-2"></i> </a>

                                    {{-- <a href="{{ url('admin/delete-slider/'.$slider->id) }}" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a> --}}
                                </td>
                                 @include('modal.delete_slider')
                                </tr>  
                              @endforeach


                            </tbody>
                        </table>
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    </div>
    

                           
                        
@endsection