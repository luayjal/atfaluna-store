<x-dashboard-layout header="الرسائل"> 

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
           
              <div class="box-body">
                <table  class="table table-bordered border-primary">
                    
                <thead class="table-stripped">
                    <tr style="text-align: center">
                        
                        <th >Email</th>
                        <th >الرسالة</th>
                      
                    </tr>
                    <tbody>
                        @foreach ($messages as $message)
                            
                        <tr style="text-align: center">
                            
                            <td style="text-align: center">{{ $message->email	}}</td>
                            <td style="text-align: center">{{Str::words($message->msg,15)	}}</td>

                    
                           <td style="text-align: center; margin-top:20px">
                               <a href="{{route('admin.message.show',$message->id)}}"  class="btn btn-primary">تفاصيل الرسالة <i class="far fa-edit"></i></a>
                
                              <form class="d-inline" action="{{route('admin.message.destroy',$message->id)}}" method="post">
                                @csrf
                                <button class="btn btn-danger"><span style="color: white"> حذف <i class="fas fa-trash"></i> </span> </button>
                              </form>
                          </td>
                          
                        </tr>
                
                    </tbody>
                    @endforeach

                </thead>
                </table>
               
              </div>
              {{ $messages->links() }}
          </div>
      </div>
  </div>
  </div>
  </div>
  
  </x-dashboard-layout> 
  