<x-dashboard-layout header="المنتجات">

    <div class="content">
        <div class="container">

           
           
            <div class="box box-primary">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-toolbar mb-3">
                    <a href="{{ route('admin.products.create') }}" class="btn  btn-info"> إضافة منتج <i
                            class="fas fa-plus"></i></a>
                </div>               
                 <div class="box-body">

                    <form action="{{ URL::current() }}" method="get" class="d-flex">
                        <input type="text" name="name" class="form-control col-4 mx-2" placeholder="Search By Name">
                        <select name="parent_id" class="form-control col-4 mx-2">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-secondary">Filter</button>
                    </form>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>num</th>
                               
                                <th>اسم المنتج</th>
                                <th> الصورة</th>
                                <th>القسم</th>
                                <th>السعر</th>
                                <th>الكمية</th>
                                <th>الحالة</th>
                                <th>تاريخ الاضافة</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                   
                                    <th> {{ Str::limit($product->name, 30, '...') }}</th>
                                    <td >
                                        @if ($product->image)
                                        <img src="{{ $product->image_url }}" style="width:90px;height:70px" alt="Arabic Image">
                                        @endif
                                      </td>
                                    <th>{{ $product->category->name }}</th>

                                    <th>{{ $product->price }}</th>
                                    <th>{{ $product->quantity }}</th>
                                    <th>{{ $product->status }}</th>
                                    <th>{{ $product->created_at }}</th>

                                    <th>
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                            class="btn btn-sm btn-outline-primary"><i class="far fa-edit"></i></a>
                                        <form class="d-inline"
                                            action="{{ route('admin.products.destroy', $product->id) }}"
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
                {{ $products->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>


</x-dashboard-layout>
