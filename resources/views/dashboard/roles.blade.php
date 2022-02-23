<x-dashboard-layout header="الصلاحيات ">

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<div class="card mt-5 ml-5 mr-5 mb-5">
    <div class="mt-3 ml-3">
    <label for="">الصلاحيات:</label>

 





<form action="{{route('user.store_roles',$user->id)}}" method="post">
    @csrf
<div class="row">
 

    
    @foreach (config('abilities') as $key => $label)
    <div class="col-md-3">
            <label for="">
                <input class="checkbox" type="checkbox" name="roles[]" @if($user->roles) @if(in_array($key,$user->roles)) checked @endif @endif value="{{$key}}">
                {{$label}}
            </label>
        </div>
    @endforeach
  
  
</div>
<Button class="btn btn-success mt-5 mb-5 " type="submit">اضافة الصلاحيات </Button>
</form>
</div>
</div>

</x-dashboard-layout>
