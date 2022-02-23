<x-dashboard-layout header="الأقسام"> 

  <div class="content">
    <div class="container">
     
        <br>
        {{-- <div class="page-title">
            <h3>الأقسام</h3>
        </div> --}}
        <div class="box box-primary">

          @if (session()->has('success'))
          <div class="alert alert-success">
            {{session('success')}}
          </div>
         @endif

         @can('create', App\Models\Category::class)
          <a class="btn btn-info mb-3" href="{{route('admin.categories.create')}}">اضافة قسم <i class="fas fa-plus"></i></a> 
          @endcan
            <div class="box-body">
              <table  class="table table-bordered border-primary">

              <thead class="table-stripped">
                  <tr style="text-align: center">
                      
                      <th >اسم القسم</th>
                      <th >الصورة</th>
                      <th >اللون</th>
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
                          <td style="background: {{$category->background_color}}; color:{{$category->font_color}};">
                            {{$category->name}}
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
                            {{-- <td style="color: red">{{ $category->status==1 ? 'Active':'Inactive' }}</td> --}}
              
                         <td style="text-align: center; margin-top:20px">
                          @can('create', $category)

                             <a href="{{route('admin.categories.edit',$category->id)}}"  class="btn btn-primary">تعديل <i class="far fa-edit"></i></a>
                             @endcan

                             @can('delete', $category)

                            <form class="d-inline" action="{{route('admin.categories.destroy',$category->id)}}" method="post">
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
            {{ $categories->links() }}
        </div>
    </div>
</div>
</div>
</div>

</x-dashboard-layout> 
