<x-dashboard-layout header="مناديب التوصيل">
  <div class="content">
    <div class="container">

        <br>
        <div class="box box-primary">

          @if (session()->has('success'))
          <div class="alert alert-success">
            {{session('success')}}
          </div>
         @endif
                @can('create', App\Models\DeliveryAgents::class)

          <a class="btn btn-info mb-3" href="{{route('admin.delivery.create')}}">اضافة مندوب جديد <i class="fas fa-plus"></i></a>
          @endcan
            <div class="box-body">
              <table  class="table table-bordered border-primary">

              <thead class="table-stripped">
                  <tr style="text-align: center">

                      <th >الاسم</th>
                      <th >الموبايل</th>
                      <th >الايميل</th>
                      <th >الصورة</th>
                      <th >العمليات</th>
                  </tr>
                  <tbody>
                      @foreach ($users as $user )

                      <tr style="text-align: center">

                          <td style="text-align: center">{{ $user->name	}}</td>
                          <th >{{ $user->mobile	}}</th>
                          <th >{{ $user->email	}}</th>
                          <th >
                              @if ($user->image)
                                  <img src="{{ asset('uploads/'.$user->image) }}" style="width:90px;height:70px" alt="Arabic Image">
                              @endif
                          </th>

                         <td style="text-align: center; margin-top:20px">
                          @can('update', $user)

                             <a href="{{route('admin.delivery.edit',$user->id)}}"  class="btn btn-primary">تعديل <i class="far fa-edit"></i></a>
@endcan                        
  @can('delete', $user)

                            <form class="d-inline" action="{{route('admin.delivery.destroy',$user->user_id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger"><span style="color: white"> حذف <i class="fas fa-trash"></i> </span> </button>
                            </form>
                            @endcan
                        </td>

                      </tr>
                        @endforeach

                  </tbody>
              </thead>
              </table>

            </div>
{{--            {{ $users->links() }}--}}
        </div>
    </div>
</div>
</div>
</div>

</x-dashboard-layout>
