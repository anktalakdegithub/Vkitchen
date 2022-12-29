@extends('layouts.main')
@section('main-container')
<style>
ul {
    list-style-type: none;
}

li {
    display: inline-block;
}

input[type="checkbox"][id^="myCheckbox"] {
    display: none;
}

label {
    border: 1px solid #fff;
    padding: 10px;
    display: block;
    position: relative;
    margin: 10px;
    cursor: pointer;
}

label:before {
    background-color: white;
    color: white;
    content: " ";
    display: block;
    border-radius: 50%;
    border: 1px solid grey;
    position: absolute;
    top: -5px;
    left: -5px;
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 28px;
    transition-duration: 0.4s;
    transform: scale(0);
}

label img {
    height: 100px;
    width: 100px;
    transition-duration: 0.2s;
    transform-origin: 50% 50%;
}

:checked+label {
    border-color: #ddd;
}

:checked+label:before {
    content: "✓";
    background-color: grey;
    transform: scale(1);
}

:checked+label img {
    transform: scale(0.9);
    /* box-shadow: 0 0 5px #333; */
    z-index: -1;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Menu</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form class="forms-sample">


                                        <div class="form-group">
                                            <label for="exampleSelectGender">Select Type</label>
                                            <select class="form-control" id="exampleSelectGender">
                                                <option>Regular </option>
                                                <option value="">Breakfast</option>
                                                <option>Lunch </option>
                                                <option value="">Dinner </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Date </label>
                                            <input type="date" class="form-control" />
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="exampleTextarea1">Price</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                placeholder="Enter price">
                                        </div> -->
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-light btn-block text-left" type="button"
                                                            data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            Breakfast
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul>
                                                            <li>
                                                                <input type="checkbox" id="myCheckbox1" />
                                                                <label for="myCheckbox1"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox2" />
                                                                <label for="myCheckbox2"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf7b290d94.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox3" />
                                                                <label for="myCheckbox3"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf91e068fd.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox2" />
                                                                <label for="myCheckbox2"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf7b290d94.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox3" />
                                                                <label for="myCheckbox3"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf91e068fd.jpg" /></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-light btn-block text-left collapsed"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                            Regular Item
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul>
                                                            <li>
                                                                <input type="checkbox" id="myCheckbox1" />
                                                                <label for="myCheckbox1"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox2" />
                                                                <label for="myCheckbox2"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf7b290d94.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox3" />
                                                                <label for="myCheckbox3"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf91e068fd.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox2" />
                                                                <label for="myCheckbox2"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf7b290d94.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox3" />
                                                                <label for="myCheckbox3"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf91e068fd.jpg" /></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwoo">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-light btn-block text-left collapsed"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapseTwoo" aria-expanded="false"
                                                            aria-controls="collapseTwoo">
                                                           Dinner
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseTwoo" class="collapse" aria-labelledby="headingTwoo"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul>
                                                            <li>
                                                                <input type="checkbox" id="myCheckbox1" />
                                                                <label for="myCheckbox1"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox2" />
                                                                <label for="myCheckbox2"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf7b290d94.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox3" />
                                                                <label for="myCheckbox3"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf91e068fd.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox2" />
                                                                <label for="myCheckbox2"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf7b290d94.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox3" />
                                                                <label for="myCheckbox3"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf91e068fd.jpg" /></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-light btn-block text-left collapsed"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree">
                                                            Lunch
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul>
                                                            <li>
                                                                <input type="checkbox" id="myCheckbox1" />
                                                                <label for="myCheckbox1"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf574a6efd.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox2" />
                                                                <label for="myCheckbox2"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf7b290d94.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox3" />
                                                                <label for="myCheckbox3"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf91e068fd.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox2" />
                                                                <label for="myCheckbox2"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf7b290d94.jpg" /></label>
                                                            </li>
                                                            <li>

                                                                <input type="checkbox" id="myCheckbox3" />
                                                                <label for="myCheckbox3"><img
                                                                        src="{{asset('web/')}}/images/kitchen/item-60fbf91e068fd.jpg" /></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-2">Add Menu</button>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

 @endsection