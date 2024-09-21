<x-admin-app-layout>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success {{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <hr />

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link {{!$errors->any() ? 'active' : ''}}" id="nav-home-tab" data-bs-toggle="tab"
                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                aria-selected="true">Product's Information</button>
            <button class="nav-link {{$errors->any() ? 'active' : ''}}" id="nav-profile-tab" data-bs-toggle="tab"
                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                aria-selected="false">Product's Attributes</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade p-2 {{!$errors->any() ? 'active show' : ''}}" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab" tabindex="0">
            @include('admin.products.create')
        </div>

        <div class="tab-pane fade p-2 {{$errors->any() ? ' active show' : '' }}" id="nav-profile" role="tabpanel"
            aria-labelledby="nav-profile-tab" tabindex="0">



            <div class="container">
                <div class="row">
                    <!-- Attributes -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Available Attributes
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($model->attributes as $attribute)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$attribute->name}}

                                    <form action='{{route("admin.attributes.destroy", $attribute->id)}}' method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-danger btn-sm" type="submit"><span
                                                    class="ti ti-trash fs-4"></span></button>
                                        </div>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                            <div class="card-footer">
                                <form class="row gy-2 gx-3 align-items-center"
                                    action="{{route('admin.attributes.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$model->id}}" />
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="attribute_name">Attribute Name</label>
                                        <input name="name" type="text" class="form-control" required id="attribute_name"
                                            placeholder="Attribute Name" />
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Add Attribute</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    @foreach($model->attributes as $attribute)
                    <div class="col-md-6">
                        <!-- Colors -->
                        <div class="card">
                            <div class="card-header">
                                Available {{$attribute->name}}
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($attribute->values as $value)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$value->value}}
                                    <!-- <span class="badge text-bg-primary rounded-pill">14</span> -->

                                    <form action='{{route("admin.attribute-values.destroy", $value->id)}}' method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-danger btn-sm" type="submit"><span
                                                    class="ti ti-trash fs-4"></span></button>
                                        </div>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                            <div class="card-footer">
                                <form class="row gy-2 gx-3 align-items-center"
                                    action="{{route('admin.attribute-values.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="attribute_id" value="{{$attribute->id}}" />
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="value"></label>
                                        <input name="value" type="text" class="form-control" required id="value" />
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Add {{$attribute->name}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    {{--
                    <!-- Color -->
                    <div class="col-md-6">
                        <!-- Colors -->
                        <div class="card">
                            <div class="card-header">
                                Available Colors
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($model->colors as $color)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$color->name}}
                                    <!-- <span class="badge text-bg-primary rounded-pill">14</span> -->

                                    <form action='{{route("admin.colors.destroy", $color->id)}}' method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-danger btn-sm" type="submit"><span
                                                    class="ti ti-trash fs-4"></span></button>
                                        </div>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                            <div class="card-footer">
                                <form class="row gy-2 gx-3 align-items-center" action="{{route('admin.colors.store')}}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$model->id}}" />
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="color_name">Color Name</label>
                                        <input name="name" type="text" class="form-control" required id="color_name"
                                            placeholder="Color Name" />
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Add Color</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- Size -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Available Sizes
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($model->sizes as $size)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$size->name}}
                                    <!-- <span class="badge text-bg-primary rounded-pill">14</span> -->

                                    <form action='{{route("admin.sizes.destroy", $size->id)}}' method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-danger btn-sm" type="submit"><span
                                                    class="ti ti-trash fs-4"></span></button>
                                        </div>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                            <div class="card-footer">
                                <form class="row gy-2 gx-3 align-items-center" action="{{route('admin.sizes.store')}}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$model->id}}" />
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="size_name">Size Name</label>
                                        <input name="name" type="text" class="form-control" required id="size_name"
                                            placeholder="Size Name" />
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Add Size</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    --}}

                    <!-- Package -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Available Packages
                            </div>
                            <div class="card-body">
                                <table id="packages" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Package Name</th>
                                            <th>Price</th>
                                            <th>Old Price</th>
                                            <th>Offer</th>
                                            <th>Seller Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($model->packages as $package)
                                        <tr>
                                            <td>{{$package->name}}</td>
                                            <td>{{$package->price}}</td>
                                            <td>{{$package->old_price}}</td>
                                            <td>{{$package->offer}}</td>
                                            <td>{{$package->seller_message}}</td>
                                            <td class="text-center">
                                                <form action='{{route("admin.packages.destroy", $package->id)}}'
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group" role="group">
                                                        <button class="btn btn-danger btn-sm" type="submit"><span
                                                                class="ti ti-trash fs-4"></span></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <form class="row gy-2 gx-3 align-items-center"
                                    action="{{route('admin.packages.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$model->id}}" />
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="package_name">Package Name</label>
                                        <input name="name" type="text" class="form-control" required id="package_name"
                                            placeholder="Package Name" />
                                    </div>
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="pprice">Price</label>
                                        <input name="price" type="text" class="form-control" required id="pprice"
                                            placeholder="Price" />
                                    </div>
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="opprice">Old Price</label>
                                        <input name="old_price" type="text" class="form-control" required id="opprice"
                                            placeholder="Old Price" />
                                    </div>
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="offer">Offer</label>
                                        <input name="offer" type="text" class="form-control" required id="offer"
                                            placeholder="Offer" />
                                    </div>
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="seller_msg">Seller Message</label>
                                        <input name="seller_message" type="text" class="form-control" id="seller_msg"
                                            placeholder="Message" />
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Add Package</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>



</x-admin-app-layout>