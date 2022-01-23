@extends('admin.layouts.app')
@section('content')
<div dir="rtl" class="">
  <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:38px;margin-top:20px"> تقرير شحن الطلبات  </h1>
  <hr>
  <h4 class="text-dark">التقرير اليومي</h4>  
  <table dir="rtl"  class="table table-bordered w-25 text-center">
    <thead class="table-stripped">
        <tr>
            <th>عدد الطلبات</th>
            <td>{{$order_daily}}</td>
        </tr>
    </thead>
    </table>
 
  <hr>
  <h4 class="text-dark">التقرير الاسبوعي</h4>  
  <table dir="rtl"  class="table table-bordered w-25 text-center">
    <thead class="table-stripped">
        <tr>
            <th>عدد الطلبات</th>
            <td>{{$order_weekly}}</td>
        </tr>
    </thead>
    </table>
  <hr>
  <h4 class="text-dark">التقرير السنوي</h4>
      <table  dir="rtl"  class="table table-bordered border-primary"  style="margin-bottom: 20px; margin-top:20px">
          <thead class="table-stripped">
            <tr style="text-align: center">
                  <th>الشهر</th>
                  <td>{{'jan'}}</td>
                  <td>{{'Feb'}}</td>
                  <td>{{'Mar'}}</td>
                  <td>{{'Apr'}}</td>
                  <td>{{'May'}}</td>
                  <td>{{'Jun'}}</td>
                  <td>{{'Jul'}}</td>
                  <td>{{'Aug'}}</td>
                  <td>{{'Sep'}}</td>
                  <td>{{'Oct'}}</td>
                  <td>{{'Nov'}}</td>
                  <td>{{'Dec'}}</td>
              </tr>
              <tr style="text-align: center">
                <th >عدد الطلبات</th>
                <td>{{$order_monthes['Jan']}}</td>
                <td>{{$order_monthes['Feb']}}</td>
                <td>{{$order_monthes['Mar']}}</td>
                <td>{{$order_monthes['Apr']}}</td>
                <td>{{$order_monthes['May']}}</td>
                <td>{{$order_monthes['Jun']}}</td>
                <td>{{$order_monthes['Jul']}}</td>
                <td>{{$order_monthes['Aug']}}</td>
                <td>{{$order_monthes['Sep']}}</td>
                <td>{{$order_monthes['Oct']}}</td>
                <td>{{$order_monthes['Nov']}}</td>
                <td>{{$order_monthes['Dec']}}</td>
              </tr> 
           
             
              
      </table>
     
     </div>

<div>

@endsection
