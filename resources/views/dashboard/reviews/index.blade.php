@extends('admin.layouts.app')
@section('content')
<table  class="table table-bordered border-primary">



    <thead class="table-stripped">
        <tr style="text-align: center">
          
            <th>صورة المنتج</th>
            <th>الاسم</th>
            <th>عدد التقييمات</th>
            <th >متوسط التقييم</th>
         
        </tr>
        <tbody>
            @foreach ($reviews as $review)
            <tr style="text-align: center">
                <th><img width="88px"     height="91px" src="{{asset('assets/uploads/product/' . $review->image_ar)}}"></th>
                <th>{{$review->name_ar}}</th>
                <th>{{$review->reviews->count()}}</th>
                <th>{{$review->reviews->avg('rate')}}</th>

            </tr>
              @endforeach

        </tbody>
    </thead>
</table>
@endsection