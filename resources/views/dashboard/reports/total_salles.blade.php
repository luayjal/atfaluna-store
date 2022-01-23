@extends('admin.layouts.app')
@section('content')
<div dir="rtl" class="">
  <h1 style=" color:rgb(151, 35, 35); text-align:center; font-size:38px;margin-top:20px"> تقرير  اجمالي  المبيعات </h1>
  <hr>
  <h4 class="text-dark">التقرير اليومي</h4>  
  <table dir="rtl"  class="table table-bordered w-25 text-center">
    <thead class="table-stripped">
        <tr>
            <th> اجمالي المبيعات</th>
            <td>{{$order_daily}}</td>
        </tr>
    </thead>
    </table>
 
  <hr>
  <h4 class="text-dark">التقرير الاسبوعي</h4>  
  <table dir="rtl"  class="table table-bordered w-25 text-center">
    <thead class="table-stripped">
        <tr>
            <th>اجمالي المبيعات </th>
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
                <th > اجمالي المبيعات</th>
                <td>{{ number_format($order_monthes['Jan'],2)}}</td>
                <td>{{ number_format($order_monthes['Feb'],2)}}</td>
                <td>{{ number_format($order_monthes['Mar'],2)}}</td>
                <td>{{ number_format($order_monthes['Apr'],2)}}</td>
                <td>{{ number_format($order_monthes['May'],2)}}</td>
                <td>{{ number_format($order_monthes['Jun'],2)}}</td>
                <td>{{ number_format($order_monthes['Jul'],2)}}</td>
                <td>{{ number_format($order_monthes['Aug'],2)}}</td>
                <td>{{ number_format($order_monthes['Sep'],2)}}</td>
                <td>{{ number_format($order_monthes['Oct'],2)}}</td>
                <td>{{ number_format($order_monthes['Nov'],2)}}</td>
                <td>{{ number_format($order_monthes['Dec'],2)}}</td>
              </tr> 
           
             
              
      </table>
     
     </div>

<div>

@endsection
