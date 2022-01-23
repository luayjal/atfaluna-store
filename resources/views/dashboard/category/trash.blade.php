<x-dashboard-layout header="الأقسام المحذوفة"> 

  <div class="content">
    <div class="container">
        <br>
       {{--  <div class="page-title">
            <h3>الأقسام</h3>
        </div> --}}
        <div class="box box-primary">
          <a class="btn btn-primary mb-3" href="{{route('admin.categories.create')}}">اضافة قسم</a> 
            <div class="box-body">
              <table  class="table table-bordered border-primary">

              <thead class="table-stripped">
                  <tr style="text-align: center">
                      
                      <th >اسم القسم</th>
                      <th >الصورة</th>
                      <th >القسم الرئيسي</th>
                      <th >الحالة</th>
                      <th >العمليات</th>
                  </tr>
                  <tbody>
                      @foreach ($categories as $category )
              
                      <tr style="text-align: center">
                          
                          <td style="text-align: center">{{ $category->name	}}</td>
                          
                          <td >
                            @if ($category->image)
                            <img src="{{ asset('uploads/'.$category->image) }}" style="width:90px;height:70px" alt="Arabic Image">
                            @endif
                          </td>
                          <td>
                            {{$category->parent->name}}
                          </td>
                          <td>
                            @if($category->status =='active')
              
                            <a href="#" style="color:green;text-decoration:none"> مفعل</a>
              
                            @else 
                              <a href="#" style="color: gray; text-decoration:none"> غير فعال</a>
              
                            @endif
              
                          </td>
                           
                         <td style="text-align: center; margin-top:20px">
                          <form class="d-inline" action="{{route('admin.categories.restore',$category->id)}}" method="post">
                            @csrf
                            <button class="btn btn-success"><span style="color: white"> استرجاع <i class="fas fa-undo"></i> </span> </button>
                          </form>
              
                            <form class="d-inline" action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger"><span style="color: white"> حذف نهائي <i class="fas fa-trash"></i> </span> </button>
                            </form>
                        </td>
                        
                      </tr>
                        @endforeach
              
                  </tbody>
              </thead>
              </table>
             
            </div>
            {{ $categories->links() }}
        </div>
    </div>
</div>
</div>
</div>

</x-dashboard-layout> 
