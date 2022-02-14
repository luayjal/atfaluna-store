<x-dashboard-layout header="المدن">

  <div class="content">
    <div class="container">

        <br>

        <div class="box box-primary">

          @if (session()->has('success'))
          <div class="alert alert-success">
            {{session('success')}}
          </div>
         @endif

          <a class="btn btn-info mb-3" href="{{route('admin.city.create')}}">اضافة مدينة <i class="fas fa-plus"></i></a>
            <div class="box-body">
              <table  class="table table-bordered border-primary">

              <thead class="table-stripped">
                  <tr style="text-align: center">

                      <th >الاسم </th>
                      <th >السعر</th>
                      <th >الحالة</th>
                      <th >العمليات</th>
                  </tr>
                  <tbody>
                      @foreach ($cities as $city )

                      <tr style="text-align: center">

                          <td style="text-align: center">{{ $city->name	}}</td>

                          <td style="text-align: center">{{ $city->price	}}</td>

                          <td>
                            @if($city->status =='active')

                            <a href="#" style="color:green;text-decoration:none"> مفعل</a>

                            @else
                              <a href="#" style="color: gray; text-decoration:none"> غير فعال</a>

                            @endif

                          </td>

                         <td style="text-align: center; margin-top:20px">
                             <a href="{{route('admin.city.edit',$city->id)}}"  class="btn btn-primary">تعديل <i class="far fa-edit"></i></a>

                            <form class="d-inline" action="{{route('admin.city.destroy',$city->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger"><span style="color: white"> حذف <i class="fas fa-trash"></i> </span> </button>
                            </form>
                        </td>

                      </tr>
                        @endforeach

                  </tbody>
              </thead>
              </table>

            </div>
            {{ $cities->links() }}
        </div>
    </div>
</div>
</div>
</div>

</x-dashboard-layout>
