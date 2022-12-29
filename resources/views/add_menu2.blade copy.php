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
                                        <form>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Date </label>
                                                <input type="date" class="form-control" id="menudate" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Breakfast </label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="table-responsive">
                                                            <table id="faqs" class="table table-hover">

                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                                alt="image" width="36px"
                                                                                height="36px" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Menu" list="list-timezone"
                                                                                id="input-datalist">
                                                                            <datalist id="list-timezone">
                                                                            @foreach ($customerArr as  $cust)
                                                                                <option>Masala dosa</option>
                                                                            @endforeach
                                                                                <!-- <option>Idli sambar </option>
                                                                                <option>Kachori </option> -->
                                                                            </datalist>

                                                                        </td>
                                                                        <td><input type="text" class="form-control"
                                                                                placeholder="Enter Price"></td>
                                                                        <td>

                                                                            <a
                                                                                class="addfaqs badge badge-success text-white"><i
                                                                                    class="bi bi-plus-lg"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <div class="form-control">
                                                            <button type="button" class="btn btn-primary "
                                                                data-toggle="modal" data-target="#exampleModal">
                                                                Add Menu
                                                            </button>

                                                        </div>
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Add New
                                                                            Menu
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label pr-0">Add
                                                                                    Menu</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" id="Menu_name"
                                                                                        class="form-control"
                                                                                        placeholder="Enter Menu" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label pr-0">Price</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"
                                                                                        id="custmobilenum"
                                                                                        class="form-control" />
                                                                                </div>
                                                                            </div>


                                                                            @csrf
                                                                            <button type="button"
                                                                                class="btn btn-primary float-right customerbtn">Save
                                                                                Menu</button>
                                                                            <div id="msgcust"></div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- </row> -->

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Lunch </label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="table-responsive">
                                                            <table id="faqs1" class="table table-hover">

                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                                alt="image" width="36px"
                                                                                height="36px" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Menu" list="list-timezone"
                                                                                id="input-datalist">
                                                                            <datalist id="list-timezone">
                                                                                
                                                                                <option>Paneer butter masala</option>
                                                                                <option>Lemon rice</option>
                                                                                <option>Mughlai Biryani</option>
                                                                                <option>Chana masala</option>
                                                                                <option>Poori</option>
                                                                                <option>Naan</option>
                                                                                <option>Dal makhani</option>
                                                                                <option>Palak paneer</option>
                                                                                <option>Kashmiri pulao</option>
                                                                                <option>Paneer korma</option>
                                                                                <option>Dal fry</option>
                                                                                <option>Indian Chapati Bread</option>
                                                                            </datalist>

                                                                        </td>
                                                                        <td><input type="text" class="form-control"
                                                                                placeholder="Enter Price"></td>
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
                                                    <div class="col-md-3">

                                                        <div class="form-control">
                                                            <button type="button" class="btn btn-primary "
                                                                data-toggle="modal" data-target="#exampleModal">
                                                                Add Menu
                                                            </button>

                                                        </div>
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Add New
                                                                            Menu
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label pr-0">Add
                                                                                    Menu</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" id="Menu_name"
                                                                                        class="form-control"
                                                                                        placeholder="Enter Menu" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label pr-0">Price</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"
                                                                                        id="custmobilenum"
                                                                                        class="form-control" />
                                                                                </div>
                                                                            </div>


                                                                            @csrf
                                                                            <button type="button"
                                                                                class="btn btn-primary float-right customerbtn">Save
                                                                                Menu</button>
                                                                            <div id="msgcust"></div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- </row> -->

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Dinner </label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="table-responsive">
                                                            <table id="faqs2" class="table table-hover">

                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <img src="{{asset('web/')}}/images/kitchen/item-60fbc2e7491ac.jpg"
                                                                                alt="image" width="36px"
                                                                                height="36px" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Menu" list="list-timezone"
                                                                                id="input-datalist">
                                                                            <datalist id="list-timezone">
                                                                                <option>Paneer butter masala</option>
                                                                                <option>Lemon rice</option>
                                                                                <option>Mughlai Biryani</option>
                                                                                <option>Chana masala</option>
                                                                                <option>Poori</option>
                                                                                <option>Naan</option>
                                                                                <option>Dal makhani</option>
                                                                                <option>Palak paneer</option>
                                                                                <option>Kashmiri pulao</option>
                                                                                <option>Paneer korma</option>
                                                                                <option>Dal fry</option>
                                                                                <option>Indian Chapati Bread</option>
                                                                            </datalist>

                                                                        </td>
                                                                        <td><input type="text" class="form-control"
                                                                                placeholder="Enter Price"></td>
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
                                                    <div class="col-md-3">

                                                        <div class="form-control">
                                                            <button type="button" class="btn btn-primary "
                                                                data-toggle="modal" data-target="#exampleModal">
                                                                Add Menu
                                                            </button>

                                                        </div>
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Add New
                                                                            Menu
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label pr-0">Add
                                                                                    Menu</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" id="Menu_name"
                                                                                        class="form-control"
                                                                                        placeholder="Enter Menu" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-3 col-form-label pr-0">Price</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"
                                                                                        id="custmobilenum"
                                                                                        class="form-control" />
                                                                                </div>
                                                                            </div>


                                                                            @csrf
                                                                            <button type="button"
                                                                                class="btn btn-primary float-right customerbtn">Save
                                                                                Menu</button>
                                                                            <div id="msgcust"></div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- </row> -->

                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary mt-2 btnmenu">Submit</button>
                                        <div id="msg"></div>
                                        @csrf
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
                var faqs_row = 0;


                html = '<tr id="faqs-row' + faqs_row + '">';
                html +=
                    '<td><img src="{{asset("web/")}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="36px" height="36px"/></td>';
                html +=
                    '<td><input type="text" class="form-control" placeholder="Menu" list="list-timezone" id="input-datalist"><datalist id="list-timezone"><option>Paneer butter masala</option><option>Lemon rice</option><option>Dal makhani</option><option>Palak paneer</option> <option>Kashmiri pulao</option><option>Paneer korma</option><option>Dal fry</option><option>Idli sambar </option><option>Kachori </option><option>Indian Chapati Bread</option></datalist></td>';
                html += ' <td><input type="text" class="form-control" placeholder="Enter Price"></td>';
                html +=
                    '<td class="mt-10"><a class="badge badge-danger text-white" onclick="$(\'#faqs-row' +
                    faqs_row +
                    '\').remove();"><i class="bi bi-trash"></i> </a></td>';

                html += '</tr>';

                $('#faqs tbody').append(html);

                faqs_row++;

            });
            $(document).on('click', '.addfaqs1', function() {
                var faqs_row = 0;


                html = '<tr id="faqs-row1' + faqs_row + '">';
                html +=
                    '<td><img src="{{asset("web/")}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="36px" height="36px"/></td>';
                html +=
                    '<td><input type="text" class="form-control" placeholder="Menu" list="list-timezone" id="input-datalist"><datalist id="list-timezone"><option>Paneer butter masala</option><option>Lemon rice</option><option>Dal makhani</option><option>Palak paneer</option> <option>Kashmiri pulao</option><option>Paneer korma</option><option>Dal fry</option><option>Idli sambar </option><option>Kachori </option><option>Indian Chapati Bread</option></datalist></td>';
                html += ' <td><input type="text" class="form-control" placeholder="Enter Price"></td>';
                html +=
                    '<td class="mt-10"><a class="badge badge-danger text-white" onclick="$(\'#faqs-row1' +
                    faqs_row +
                    '\').remove();"><i class="bi bi-trash"></i> </a></td>';

                html += '</tr>';

                $('#faqs1 tbody').append(html);

                faqs_row++;

            });
            $(document).on('click', '.addfaqs2', function() {
                var faqs_row = 0;


                html = '<tr id="faqs-row2' + faqs_row + '">';
                html +=
                    '<td><img src="{{asset("web/")}}/images/kitchen/item-60fbc2e7491ac.jpg" alt="image" width="36px" height="36px"/></td>';
                html +=
                    '<td><input type="text" class="form-control" placeholder="Menu" list="list-timezone" id="input-datalist"><datalist id="list-timezone"><option>Paneer butter masala</option><option>Lemon rice</option><option>Dal makhani</option><option>Palak paneer</option> <option>Kashmiri pulao</option><option>Paneer korma</option><option>Dal fry</option><option>Idli sambar </option><option>Kachori </option><option>Indian Chapati Bread</option></datalist></td>';
                html += ' <td><input type="text" class="form-control" placeholder="Enter Price"></td>';
                html +=
                    '<td class="mt-10"><a class="badge badge-danger text-white" onclick="$(\'#faqs-row2' +
                    faqs_row +
                    '\').remove();"><i class="bi bi-trash"></i> </a></td>';

                html += '</tr>';

                $('#faqs2 tbody').append(html);

                faqs_row++;

            });
        });
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', e => {
            $('#input-datalist').autocomplete()
        }, false);
        </script>
        @endsection