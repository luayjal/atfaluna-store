<x-dashboard-layout header="السلايدر">

  <div class="content">
    <div class="container">

        <br>

        <div class="box box-primary">

          @if (session()->has('success'))
          <div class="alert alert-success">
            {{session('success')}}
          </div>
         @endif
         @can('create', App\Models\Slider::class)

          <a class="btn btn-info mb-3" href="{{route('admin.slider.create')}}">اضافة سلايدر <i class="fas fa-plus"></i></a>
          @endcan
            <div class="box-body">
              <table  class="table table-bordered border-primary">

              <thead class="table-stripped">
                  <tr style="text-align: center">

                      <th >العنوان </th>
                      <th >الصورة</th>
                      <th >الحالة</th>
                      <th >العمليات</th>
                  </tr>
                  <tbody>
                      @foreach ($sliders as $slider )

                      <tr style="text-align: center">

                          <td style="text-align: center">{{ $slider->title	}}</td>

                          <td >
                              @if ($slider->image_path)
                                  <img src="{{ asset('uploads/'.$slider->image_path) }}" style="width:90px;height:70px" alt="Arabic Image">
                              @endif
                          </td>

                          <td>
                            @if($slider->status =='active')

                            <a href="#" style="color:green;text-decoration:none"> مفعل</a>

                            @else
                              <a href="#" style="color: gray; text-decoration:none"> غير فعال</a>

                            @endif

                          </td>

                         <td style="text-align: center; margin-top:20px">
                          @can('update', $slider)

                             <a href="{{route('admin.slider.edit',$slider->id)}}"  class="btn btn-primary">تعديل <i class="far fa-edit"></i></a>
                           @endcan
                             @can('delete', $slider)

                            <form class="d-inline" action="{{route('admin.slider.destroy',$slider->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger"><span style="color: white"> حذف <i class="fas fa-trash"></i> </span> </button>
                            </form>
                            @endcan
                        </td>

                      </tr>
                        @endforeach

                  </tbody>
              </table>

            </div>
            {{ $sliders->links() }}
        </div>
    </div>
</div>

</x-dashboard-layout>
