<x-dashboard-layout header="تفاصيل الرسالة"> 

    
        <div class="card p-4" >
          <div class="card-body ">
            <h5  class=" ">{{$message->email}}</h5>
            <br>
            <p class="card-text ">{{$message->msg}}</p>
            <form class="d-inline" action="{{route('admin.message.destroy',$message->id)}}" method="post">
              @csrf
              <button class="btn btn-danger mt-3"><span style="color: white"> حذف <i class="fas fa-trash"></i> </span> </button>
            </form>
          </div>
        </div>
        

  
  
  </x-dashboard-layout> 
  