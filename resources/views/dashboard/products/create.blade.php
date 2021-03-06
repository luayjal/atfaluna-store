<x-dashboard-layout header="اضافة منتج">
  <div class="container">
    <div class="card">

      <div class="card-body">
        <form action="{{ route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          @include('dashboard.products.form')
        </form>
      </div>
  </div>
  </div>



@push('css')
<!------- tagify --------->
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.css"
        integrity="sha512-85w5tjZHguXpvARsBrIg9NWdNy5UBK16rAL8VWgnWXK2vMtcRKCBsHWSUbmMu0qHfXW2FVUDiWr6crA+IFdd1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css"
        integrity="sha512-MMojOrCQrqLg4Iarid2YMYyZ7pzjPeXKRvhW9nZqLo6kPBBTuvNET9DBVWptAo/Q20Fy11EIHM5ig4WlIrJfQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


<!------- ckeditor --------->
<script src="{{asset('dashboard/ckeditor/build/ckeditor.js')}}"></script>
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"
integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js"
integrity="sha512-JiDSvppkBtWM1f9nPRajthdgTCZV3wtyngKUqVHlAs0d5q72n5zpM3QMOLmuNws2vkYmmLn4r1KfnPzgC/73Mw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(".tags").selectize({
    delimiter: ",",
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input,
        };
    },
});
</script>


    <script>
      ClassicEditor
              .create( document.querySelector( '#editor' ),{
                     toolbar: {
                        items: [
                            'heading', '|',
                            'fontfamily', 'fontsize', '|',
                            'alignment', '|',
                            'fontColor', 'fontBackgroundColor', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                            'link', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'code', 'codeBlock', '|',
                            'insertTable', '|',

                            'undo', 'redo'
                        ],
                        shouldNotGroupWhenFull: true
                    }

                  })
              .then( editor => {
                      console.log( editor );
              } )
              .catch( error => {
                      console.error( error );
              });
    </script>
    <script type="module">

        let cartesian = (...arr) => arr.reduce((a, c) => a.map(e => c.map(f => e.concat([f]))).reduce((a, c) => a.concat(c),
            []), [
            []
        ]);

        $(document).ready(function() {

            $(".tags").on("keyup keypress blur change ready mouseenter mouseup mouseover", function(event) {
                if (event.which == 13 || event.which == 188 || event.which == 1 || event.which == 8) {

                    var size = $("#size").val();
                    var color = $("#color").val();

                    var sizeArray = size.split(",");
                    var colorArray = color.split(",");


                    let anyarr = cartesian(sizeArray, colorArray)
                    console.log(anyarr);

                    var prevHtml = $("#tr").html();
                    //console.log(prevHtml);



                    // console.log( newArray);
                    var tag = $("#tr").text(null);



                    for (var i = 0; i < anyarr.length; i++) {

                        if (size.length > 0 && color.length > 0) {

                            var str = anyarr[i].toString().replace(',', ' / ')
                            // anyarr = null;


                            tag =
                                "<tr>" +
                                "<td>" + str + "</td>" +
                                "<td class='col-md-3 text-center'><input type='text' name='variant[" + i +
                                "][code_variant]' id='price' placeholder ='كود المنتج' value='' class='form-control price' ></td>" +
                                "<td class='col-md-3 text-center'><input type='text'  name='variant[" + i +
                                "][price_variant]' placeholder ='السعر' value='' class='form-control ' ></td>" +
                                "<td class='col-md-3 text-center'><input type='text'  name='variant[" + i +
                                "][quantity_variant]' placeholder ='الكمية' value='' class='form-control ' ></td>" +
                                "<td><button class='btn btn-danger btn_delete '> <i class='fa fa-trash'></i> حذف</button> <input type='text' hidden name='variant[" + i +
                                "][size]' id='price' placeholder ='كود المنتج' value='" + anyarr[i][0] +
                                "' class='form-control price col-md-3' ></td>" +
                                "<td><input type='text' hidden name='variant[" + i +
                                "][color]' id='price' placeholder ='price' value='" + anyarr[i][1] +
                                "' class='form-control price col-md-3' ></td>"
                            "</tr>";

                            $("#tr").append(tag);

                        }
                    }
                    console.log($("#tr").html());
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.btn_delete', function () {
            $(this).closest('tr').remove();
        });
    </script>
@endpush
  </x-dashboard-layout>
