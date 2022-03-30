<x-dashboard-layout header="تعديل الفيديو">
    <div class="container">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('admin.advertising.update', $advertising->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('dashboard.advertising.form', [
                        'lable_btn' => 'تعديل',
                    ])
                </form>
            </div>
        </div>
    </div>

</x-dashboard-layout>
