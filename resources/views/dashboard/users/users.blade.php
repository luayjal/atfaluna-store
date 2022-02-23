<x-dashboard-layout header="المستخدمون ">

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<br>
<div class="container mt-5">
  @can('create', App\Models\User::class)

    <div class="container">
      <a class="btn btn-primary" href="{{route('admin.users.create')}}">اضافة موظف جديد</a>
  </div>
  @endcan





<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">اسم الموظف</th>
        <th scope="col">البريد الالكتروني</th>
        <th scope="col">الرتبة </th>

        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php $x =1; ?>
    @foreach ($users as $user)
    <tr>
        <th scope="row"><?php  echo $x++; ?></th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->type}}</td>



        <td>
          @can('update', $user)

            <a class="btn btn-sm btn-outline-primary" href=" {{route('user.edit',$user->id)}}"><i class="far fa-edit"></i></a>
            @endcan
            @can('delete', $user)

            <form class="d-inline"
            action="{{ route('admin.users.destroy', $user->id) }}"
            method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                    class="far fa-trash-alt "></i></button>
        </form>
            @endcan
            @can('role', $user)

            <a class="btn btn-success" href="{{route('user.roles',$user->id)}}">اضافة صلاحيات</a>
            @endcan
        </td>
      </tr>

    @endforeach
    </tbody>
  </table>

</div>
</x-dashboard-layout>
