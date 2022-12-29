@extends('layouts.main')
@section('main-container')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row container d-flex justify-content-center">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add Menu</h4>
                                        <form method="POST" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                            <!-- <div class="form-group">
                                                <label for="exampleTextarea1">Date </label>
                                                <!-- <input type="date" class="form-control menudate" id="menudate" /> --
                                                <input type="date" class="form-control menudate" name="datetime" id="menudate" value="<?php echo date('Y-m-d'); ?>" />
                                            </div> -->
                                            <div class="form-group mb-2">
                                                <label for="exampleTextarea1">Breakfast </label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="faqs" class="table table-hover">

                                                                <tbody>

                                                                    <tr class="blist">
                                                                        <td class="">
                                                                            <img class="menuimg" src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                                alt="image" width="36px" height="36px" />
                                                                        </td>
                                                                        <td class="">

                                                                            <input type="hidden" name="menu_id"
                                                                                class="menu_ids form-control"
                                                                                id="menus_id" value="">
                                                                            <input type="hidden" class="menu_type form-control" value="Breakfast">

                                                                            <input type="text"
                                                                                class="form-control menublist menu_name"
                                                                                placeholder="Menu" data-id="1" list="list-timezone"
                                                                                id="breakfast">
                                                                            <datalist id="list-timezone">
                                                                                @foreach ($menuArr as $menu)

                                                                                <option>{{$menu->menu_name}}</option>
                                                                                @endforeach
                                                                            </datalist>

                                                                        </td>
                                                                        <td class=""><input type="text"
                                                                                class="form-control priceb menu_price"
                                                                                id="priceb_1" placeholder="Enter price"
                                                                                value="" />
                                                                        </td> 
                                                                        <!-- <td class=""><input type="file"
                                                                                class="form-control priceb menu_image"
                                                                                id="breakimage_1" />
                                                                        </td> -->
                                                                        <td class="">

                                                                            <a class="addfaqs badge badge-success text-white"
                                                                                value=""><i
                                                                                    class="bi bi-plus-lg"></i></a>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="exampleTextarea1">Lunch </label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="faqs1" class="table table-hover">

                                                                <tbody>
                                                                    <tr class="llist">
                                                                        <td>
                                                                            <img class="menuimg" src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                                alt="image" width="36px"  height="36px" />
                                                                        </td>
                                                                        <input type="hidden" name="menu_id"
                                                                            class="menu_ids form-control"
                                                                            id="menus_lunch_id" value="">
                                                                        <input type="hidden" class="menu_type form-control" value="Lunch">
                                                                        <td>
                                                                            <input type="text"
                                                                                class="form-control menu_name menullist"
                                                                                placeholder="Menu" data-id="1" list="list-timezone1"
                                                                                name="lunch" id="lunch">
                                                                            <datalist id="list-timezone1">
                                                                                @foreach ($menuArrss as $menulunch)
                                                                                <option>{{$menulunch->menu_name}}
                                                                                </option>
                                                                                @endforeach
                                                                            </datalist>

                                                                        </td>
                                                                        <td><input type="text"
                                                                                class="form-control menu_price"
                                                                                id="pricelunch" data-id="1"
                                                                                placeholder="Enter Price"></td>
                                                                        <!-- <td><input type="file"
                                                                                class="form-control priceb menu_image"
                                                                                id="lunchimage_1" />
                                                                        </td> -->
                                                                        <td>

                                                                            <a
                                                                                class="addfaqs1 badge badge-success text-white"><i
                                                                                    class="bi bi-plus-lg"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="exampleTextarea1">Dinner </label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="faqs2" class="table table-hover">

                                                                <tbody>

                                                                    <tr class="dlist">
                                                                        <td>
                                                                            <img class="menuimg" src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                                alt="image" width="36px" height="36px" />
                                                                        </td>
                                                                        <td>

                                                                            <input type="hidden" name="menu_id"  class="menu_ids form-control"
                                                                                id="menus_dinner_id" value="">
                                                                                <input type="hidden" class="menu_type form-control" value="Dinner">
                                                                            <input type="text" class="form-control menudinnerlist menu_name" data-id="1" placeholder="Menu" list="list-timezone2" id="dinner">
                                                                            <datalist id="list-timezone2">
                                                                                @foreach ($menuArrs as $menudinner)
                                                                                <option>{{$menudinner->menu_name}}</option>
                                                                                @endforeach
                                                                            </datalist>

                                                                        </td>
                                                                        <td><input type="text"
                                                                                class="form-control menu_price"
                                                                                name="price" id="pricedinner"
                                                                                placeholder="Enter Price"></td>
                                                                        <!-- <td><input type="file"
                                                                                class="form-control priceb menu_image"
                                                                                id="dinnerimage_1" />
                                                                        </td> -->
                                                                        <td>

                                                                            <a
                                                                                class="addfaqs2 badge badge-success text-white"><i
                                                                                    class="bi bi-plus-lg"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="exampleTextarea1">Snacks </label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="faqs3" class="table table-hover">

                                                                <tbody>

                                                                    <tr class="slist">
                                                                        <td>
                                                                            <img class="menuimg" src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                                alt="image" width="36px" height="36px" />
                                                                        </td>
                                                                        <td>

                                                                            <input type="hidden" name="menu_id"
                                                                                class="menu_ids form-control"
                                                                                id="menus_snack_id" value="">
                                                                                <input type="hidden" class="menu_type form-control" value="Snack">
                                                                            <input type="text" class="form-control menusnacklist menu_name" data-id="1" placeholder="Menu" list="list-timezone2" id="snack">
                                                                            <datalist id="list-timezone2">
                                                                                @foreach ($menusnack as $menudinner)
                                                                                <option>{{$menudinner->menu_name}}
                                                                                </option>
                                                                                @endforeach
                                                                            </datalist>

                                                                        </td>
                                                                        <td><input type="text"
                                                                                class="form-control menu_price"
                                                                                name="price" id="pricesnacks"
                                                                                placeholder="Enter Price"></td>
                                                                        <!-- <td><input type="file"
                                                                                class="form-control priceb menu_image"
                                                                                id="dinnerimage_1" />
                                                                        </td> -->
                                                                        <td>

                                                                            <a
                                                                                class="addfaqs3 badge badge-success text-white"><i
                                                                                    class="bi bi-plus-lg"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary mt-2 btnmenu">Submit</button>
                                            <div id="msg"></div>
                                          
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endsection
        @section('scripts')
        <script>
        $(document).ready(function() {

            $(document).on('click', '.addfaqs', function() {
                var menu_id = $("#breakfast").val();
                // var menu_id=$(this).attr('data-id');
                var ENDPOINT = "{{ url('/') }}";
                $.ajax({

                    url: ENDPOINT + "/fetch_menu_data",
                    data: {
                        'menu_id': menu_id,
                        _token: '{{ csrf_token() }}'
                    },
                    type: 'post',
                    success: function(response) {
                        // dd(response);
                        // alert();
                        var faqs_row = 0;
                        // var menus_id = $('#menus_id').val();
                        // alert(menus_id);


                        var i = $('.menublist').length;
                        html = '<tr class="blist" id="faqs-row' + faqs_row + '">';
                        html +=
                            '<td><img class="menuimg" src="{{asset("web/")}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="36px" height="36px"/></td>';
                        html +=
                            '<td>  <input type="hidden" name="menu_id" class="menu_ids form-control" id="menus_id" value=""> <input type="hidden" class="menu_type form-control" value="Breakfast"><input type="text" class="form-control menubreakfast menublist menu_name" data-id="' +
                            (i + 1) + '" placeholder="Menu" list="list-timezone"  id="breakfast_id"> <datalist id="list-timezone">@foreach ($menuArr as  $menu)<option>{{$menu->menu_name}}</option>@endforeach</datalist></td>';
                        html +=
                            '<td><input type="text" class="form-control pricescript menu_price" id="priceb_' +
                            (i + 1) + '" placeholder="Enter price" value=""/></td>';
                        // html +=
                        //     '<td><input type="file" class="form-control menu_image" id="breakimage_' +
                        //     (i + 1) + '" /></td>';
                        html +=
                            '<td class="mt-10"><a class="badge badge-danger text-white" onclick="$(\'#faqs-row' +
                            faqs_row +
                            '\').remove();"><i class="bi bi-trash"></i> </a></td>';

                        html += '</tr>';

                        $('#faqs tbody').append(html);


                        faqs_row++;
                    }
                });
            });

            $(document).on('click', '.addfaqs1', function() {
                var faqs_row = 0;

                var i = $('.menullist').length;
                html = '<tr class="llist" id="faqs-row1' + faqs_row + '">';
                html +=
                    '<td><img class="menuimg" src="{{asset("web/")}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="36px" height="36px"/></td>';
                html +=
                    '<td> <input type="hidden" class="menu_type form-control" value="Lunch"><input type="text" class="form-control menulunch menu_name menullist" data-id="'+(i+1)+'" placeholder="Menu" list="list-timezones1" id="input-datalists1"> <datalist id="list-timezones1">@foreach ($menuArrss as $menulunch)<option>{{$menulunch->menu_name}}</option>@endforeach</datalist></td>';
                html +=
                    ' <td><input type="text" class="form-control pricescript menu_price" placeholder="Enter Price" id="pricelunch_' +
                    (i + 1) + '"></td>';
                // html +=
                //     '<td><input type="file" class="form-control menu_image" id="lunchimage_' +
                //     (i + 1) + '" /></td>';
                html +=
                    '<td class="mt-10"><a class="badge badge-danger text-white" onclick="$(\'#faqs-row1' +
                    faqs_row + '\').remove();"><i class="bi bi-trash"></i> </a></td>';

                html += '</tr>';

                $('#faqs1 tbody').append(html);

                faqs_row++;

            });
            $(document).on('click', '.addfaqs2', function() {
                var faqs_row = 0;

                var i = $('.menudinnerlist').length;
                html = '<tr class="dlist" id="faqs-row2' + faqs_row + '">';
                html +=
                    '<td><img class="menuimg" src="{{asset("web/")}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="36px" height="36px"/></td>';
                html +=
                    '<td><input type="hidden" class="menu_type form-control" value="Dinner"><input type="text" class="form-control menudinner menudinnerlist menu_name" data-id="'+(i+1)+'" placeholder="Menu" list="list-timezones2" id="input-datalists2"><datalist id="list-timezones2">@foreach($menuArrs as $menudinner)<option>{{$menudinner->menu_name}}</option>@endforeach</datalist></td>';
                html +=
                    ' <td><input type="text" class="form-control pricescript menu_price" placeholder="Enter Price" id="pricedinner_' +
                    (i + 1) + '"></td>';
                // html +=
                //     '<td><input type="file" class="form-control menu_image" id="dinnerimage_' +
                //     (i + 1) + '" /></td>';
                html +=
                    '<td class="mt-10"><a class="badge badge-danger text-white" onclick="$(\'#faqs-row2' +
                    faqs_row + '\').remove();"><i class="bi bi-trash"></i> </a></td>';

                html += '</tr>';

                $('#faqs2 tbody').append(html);

                faqs_row++;

            });
            $(document).on('click', '.addfaqs3', function() {
                var faqs_row = 0;

                var i = $('.menusnacklist').length;
                html = '<tr class="slist" id="faqs-row3' + faqs_row + '">';
                html +=
                    '<td><img class="menuimg" src="{{asset("web/")}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="36px" height="36px"/></td>';
                html +=
                    '<td><input type="hidden" class="menu_type form-control" value="Snack"><input type="text" class="form-control menusnack menusnacklist menu_name" data-id="'+(i+1)+'" placeholder="Menu" list="list-timezones2" id="input-datalists2"><datalist id="list-timezones2">@foreach($menusnack as $menudinner)<option>{{$menudinner->menu_name}}</option>@endforeach</datalist></td>';
                html +=
                    ' <td><input type="text" class="form-control pricescript menu_price" placeholder="Enter Price" id="pricesnack_' +
                    (i + 1) + '"></td>';
                // html +=
                //     '<td><input type="file" class="form-control menu_image" id="dinnerimage_' +
                //     (i + 1) + '" /></td>';
                html +=
                    '<td class="mt-10"><a class="badge badge-danger text-white" onclick="$(\'#faqs-row3' +
                    faqs_row + '\').remove();"><i class="bi bi-trash"></i> </a></td>';

                html += '</tr>';

                $('#faqs3 tbody').append(html);

                faqs_row++;

            });
        });
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', e => {
            $('#input-datalist').autocomplete()
        }, false);
        </script>
        <script>
        $("#breakfast").on('change', function() {
            // $('#data_seller_invoice').html('');
            var breakfastmenu = ($("#breakfast").val());
            var menus_id = ($("#menus_id").val());
            $.ajax({
                    type: "POST",
                    url: "fetch_menu",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        breakfast_id: breakfastmenu,
                        menus_id: menus_id
                    },
                    dataType: "json",
                    type: "post"
                })
                .done(function(response) {
                    // $("#data_seller_invoice").append(response.output);
                    // dd(response);
                    $("#menus_id").val(response[0].menu_id);
                    $('#priceb').val(response[0].menu_price);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('error occured');
                });
        });
        </script>
        <script>
        $(document).on('change', '.menublist', function() {

            // $('#data_seller_invoice').html('');
            var breakfastmenu = ($(this).val());
            var menus_id = ($("#menus_id").val());
            var id=$(this).attr('data-id');
            $.ajax({
                    type: "POST",
                    url: "fetchvariants",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        breakfast_id: breakfastmenu,
                        menus_id: menus_id,
                    },
                    dataType: "json",
                    type: "post"
                })
                .done(function(response) {
                    // $("#data_seller_invoice").append(response.output);
                    // dd(response);
                    $("#menus_id").val(response[0].menu_id);
                    $('#priceb_'+id).val(response[0].menu_price);
                       
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('error occured');
                });
        });
        </script>

        <script>
        $("#lunch").on('change', function() {
            // $('#data_seller_invoice').html('');
            var lunch = ($("#lunch").val());
            // var lunch = ($(this).val());

            $.ajax({
                    type: "POST",
                    url: "fetch_menu_lunch",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        lunch_id: lunch
                    },
                    dataType: "json",
                    type: "post"
                })
                .done(function(response) {
                    // $("#data_seller_invoice").append(response.output);

                    $("#menus_lunch_id").val(response[0].menu_id);
                    $('#pricelunch').val(response[0].menu_price);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('error occured');
                });
        });
        </script>
        <script>
        $(document).on('change', '.menullist', function() {

            // $('#data_seller_invoice').html('');
            // var lunchmenu = ($(".menulunch").val());
            var lunchmenu = ($(this).val());
            var id=$(this).attr('data-id');
            $.ajax({
                    type: "POST",
                    url: "fetchlunchvariants",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        lunch_id: lunchmenu,
                    },
                    dataType: "json",
                    type: "post"
                })
                .done(function(response) {
                    // $("#data_seller_invoice").append(response.output);
                    // dd(response);
                    $('#pricelunch_'+id).val(response[0].menu_price);
                        // $('#pricelunch_'+id).val(response[0].menu_price);
                     

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('error occured');
                });
        });
        </script>
        <script>
        $("#dinner").on('change', function() {
            // $('#data_seller_invoice').html('');
            var dinner = ($("#dinner").val());
            var id=$(this).attr('data-id');
            $.ajax({
                    type: "POST",
                    url: "fetch_menu_dinner",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        dinner_id: dinner
                    },
                    dataType: "json",
                    type: "post"
                })
                .done(function(response) {
                    // $("#data_seller_invoice").append(response.output);

                    $("#menus_dinner_id").val(response[0].menu_id);
                    $('#pricedinner').val(response[0].menu_price);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('error occured');
                });
        });
        </script>
        <script>
        $(document).on('change', '.menudinnerlist', function() {

            // $('#data_seller_invoice').html('');
            // var dinnermenu = ($(".menudinner").val());
            var dinnermenu = ($(this).val());
            var id=$(this).attr('data-id');
            $.ajax({
                    type: "POST",
                    url: "fetchdinnervariants",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        dinner_id: dinnermenu,
                    },
                    dataType: "json",
                    type: "post"
                })
                .done(function(response) {
                    // $("#data_seller_invoice").append(response.output);
                    // dd(response);
                    $('#pricedinner_'+id).val(response[0].menu_price);
                       
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('error occured');
                });
        });
        </script>
         <script>
        $("#snack").on('change', function() {
            // $('#data_seller_invoice').html('');
            var snack = ($("#snack").val());
            var id=$(this).attr('data-id');
            $.ajax({
                    type: "POST",
                    url: "fetch_menu_snack",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        snack_id: snack
                    },
                    dataType: "json",
                    type: "post"
                })
                .done(function(response) {
                    // $("#data_seller_invoice").append(response.output);

                    $("#menus_snack_id").val(response[0].menu_id);
                    $('#pricesnack').val(response[0].menu_price);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('error occured');
                });
        });
        </script>
        <script>
        $(document).on('change', '.menusnacklist', function() {

            // $('#data_seller_invoice').html('');
            // var dinnermenu = ($(".menudinner").val());
            var snackmenu = ($(this).val());
            var id=$(this).attr('data-id');
            $.ajax({
                    type: "POST",
                    url: "fetchsnackvariants",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        snack_id: snackmenu,
                    },
                    dataType: "json",
                    type: "post"
                })
                .done(function(response) {
                    // $("#data_seller_invoice").append(response.output);
                    // dd(response);
                    $('#pricesnack_'+id).val(response[0].menu_price);
                       
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('error occured');
                });
        });
        </script>
        <script>
        $(".btnmenu").on('click', function() {
            var ENDPOINT = "{{ url('/') }}";
            var i = 0;
            menu_name = [];
            menu_price = [];
            menu_type = [];
            menuimg = [];
//             menuimg.push($('#breakimage_'+(i + 1)).get(0).files[0]);
//             menuimg.push($('#lunchimage_'+(i + 1)).get(0).files[0]);
//             menuimg.push($('#dinnerimage_'+(i + 1)).get(0).files[0]);
// console.log(menuimg);
            // console.log($('#breakimage_'+(i + 1)).get(0).files);
            // console.log($('#lunchimage_'+(i + 1)).get(0).files);
            // console.log($('#dinnerimage_'+(i + 1)).get(0).files);
            $('.blist').each(function() {
                // cart_ids.push(this.id);
                menu_name.push($('.menu_name').eq(i).val());
                menu_price.push($('.menu_price').eq(i).val());
                menu_type.push($('.menu_type').eq(i).val());
                // menuimg.push($('.menu_image').eq(i).val());
                // menuimg.push($('#breakimage_'+(i + 1)).get(0).files[i]);
                // var image=$('#multiFiles').get(0).files[0];

                i++;
            })
            $('.llist').each(function() {
                // cart_ids.push(this.id);
                menu_name.push($('.menu_name').eq(i).val());
                menu_price.push($('.menu_price').eq(i).val());
                menu_type.push($('.menu_type').eq(i).val());
                // menuimg.push($('.menu_image').eq(i).val());
                // menuimg.push($('#lunchimage_'+(i + 1)).get(0).files[i]);
                // menuimg.push($('.menu_image')[0].files[i]);

                i++;
            })

            $('.dlist').each(function() {
                // cart_ids.push(this.id);
                menu_name.push($('.menu_name').eq(i).val());
                menu_price.push($('.menu_price').eq(i).val());
                menu_type.push($('.menu_type').eq(i).val());
                // menuimg.push($('.menu_image').eq(i).val());
                // menuimg.push($('#dinnerimage_'+(i + 1)).get(0).files[i]);
                // menuimg.push($('.menu_image')[0].files[i]);
                i++;
            })
            $('.slist').each(function() {
                // cart_ids.push(this.id);
                menu_name.push($('.menu_name').eq(i).val());
                menu_price.push($('.menu_price').eq(i).val());
                menu_type.push($('.menu_type').eq(i).val());
                // menuimg.push($('.menu_image').eq(i).val());
                // menuimg.push($('#dinnerimage_'+(i + 1)).get(0).files[i]);
                // menuimg.push($('.menu_image')[0].files[i]);
                i++;
            })

            // var menudate = $('.menudate').val();
         
            $.ajax({
                url: ENDPOINT + "/add_menulist",
                type: 'POST',
                data: { "_token": "{{ csrf_token() }}",
                    'menu_name': menu_name,
                    'menu_price': menu_price,
                    'menu_type': menu_type,
                    'menuimg': menuimg
                },
                dataType: 'json',
                success: function(data) {
                    if (data.code == "404") {
                        $('#msg').html('<div class="alert alert-danger">' + data.msg + '</div>');
                    } else {
                        $('#msg').html(
                            '<div class="alert alert-success">Data added successfully!.</div>'
                            );
                    }
                }
            });

        });
        </script>
        @endsection