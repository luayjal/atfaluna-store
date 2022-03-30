<x-dashboard-layout header="عروض الفيديو">

    <div class="content">
        <div class="container">



            <div class="box box-primary">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <div class="table-toolbar mb-3">
                    <a href="{{ route('admin.advertising.create') }}" class="btn  btn-info"> إضافة فيديو <i
                            class="fas fa-plus"></i></a>
                </div>


                 <div class="box-body">


                    <table class="table table-bordered mt-3 text-center">
                        <thead>
                            <tr>
                                <th>num</th>

                                <th>اسم المنتج</th>
                                <th> الفيديو</th>
                                <th>الحالة</th>
                                <th>تاريخ الاضافة</th>
                                <th> الاجراءات</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advertisings as $advertising)
                                <tr class="text-center">
                                    <th>{{ $loop->iteration }}</th>

                                    <th> {{ $advertising->product->name}}</th>
                                    <th> <video src="{{ $advertising->video_url }}" height="80" controls class="mb-3"></th>


                                    <th>{{ $advertising->status }}</th>

                                    <th>{{ $advertising->created_at }}</th>

                                    <th>


                                        <a href="{{ route('admin.advertising.edit', $advertising->id) }}"
                                            class="btn btn-sm btn-outline-primary"><i class="far fa-edit"></i></a>



                                        <form class="d-inline"
                                            action="{{ route('admin.advertising.destroy', $advertising->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                    class="far fa-trash-alt "></i></button>
                                        </form>

                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                {{ $advertisings->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>


</x-dashboard-layout>
