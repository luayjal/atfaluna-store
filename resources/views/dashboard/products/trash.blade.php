<x-dashboard-layout header="المنتجات المحذوفة"> 

  <div class="content">
    <div class="container">
        <br>
        <div class="box box-primary">
         
            <div class="box-body">
              <table  class="table table-bordered border-primary">

              <thead class="table-stripped">
                  <tr style="text-align: center">
                      
                      <th >اسم القسم</th>
                      <th >الصورة</th>
                      <th >القسم </th>
                      <th >الحالة</th>
                      <th >العمليات</th>
                  </tr>
                  <tbody>
                      @foreach ($products as $product )
              
                      <tr style="text-align: center">
                          
                          <td style="text-align: center">{{ $product->name	}}</td>
                          
                          <td >
                            @if ($product->image)
                            <img src="{{ $product->image_url}}" style="width:90px;height:70px" alt="Arabic Image">
                            @endif
                          </td>
                          <td>
                            {{$product->category->name}}
                          </td>
                          <td>
                            {{$product->status}}
                          </td>
                           
                         <td style="text-align: center; margin-top:20px">
                          <form class="d-inline" action="{{route('admin.products.restore',$product->id)}}" method="post">
                            @csrf
                            <button class="btn btn-success"><span style="color: white"> استرجاع <i class="fas fa-undo"></i> </span> </button>
                          </form>
              
                            <form class="d-inline" action="{{route('admin.products.destroy',$product->id)}}" method="post">
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
            {{ $products->links() }}
        </div>
    </div>
</div>
</div>
</div>

</x-dashboard-layout> 
