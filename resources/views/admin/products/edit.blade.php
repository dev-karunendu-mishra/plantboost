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
                                    <div id="attribute-{{$attribute->id}}-info"
                                        class="d-flex justify-content-between align-items-center w-100">
                                        <div class="flex-grow-1">{{$attribute->name}}</div>
                                        <form action='{{route("admin.attributes.destroy", $attribute->id)}}'
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-warning btn-sm" type="button"
                                                    onclick="editAttribute(this, 'attribute-{{$attribute->id}}-info')"><span
                                                        class="ti ti-edit fs-4"></span></button>
                                                <button class="btn btn-danger btn-sm" type="submit"><span
                                                        class="ti ti-trash fs-4"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="attribute-{{$attribute->id}}-info-edit" class="d-none w-100">
                                        <form class="d-flex align-items-center w-100"
                                            action="{{route('admin.attributes.update', $attribute->id)}}" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="flex-grow-1 me-2">
                                                <label class="visually-hidden" for="attribute_name">Attribute
                                                    Name</label>
                                                <input name="name" type="text" class="form-control" required
                                                    id="attribute_name" placeholder="Attribute Name"
                                                    value="{{$attribute->name}}" />
                                            </div>

                                            <div class="">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="reset" class="btn btn-danger"
                                                    onclick="discardEditing(this, 'attribute-{{$attribute->id}}-info')">Discard</button>
                                            </div>
                                        </form>
                                    </div>
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
                                    <div id="attribute-value-{{$value->id}}-info"
                                        class="d-flex justify-content-between align-items-center w-100">
                                        <div class="flex-grow-1">{{$value->value}}</div>
                                        <!-- <span class="badge text-bg-primary rounded-pill">14</span> -->
                                        <form action='{{route("admin.attribute-values.destroy", $value->id)}}'
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-warning btn-sm" type="button"
                                                    onclick="editAttribute(this, 'attribute-value-{{$value->id}}-info')"><span
                                                        class="ti ti-edit fs-4"></span></button>
                                                <button class="btn btn-danger btn-sm" type="submit"><span
                                                        class="ti ti-trash fs-4"></span></button>
                                            </div>
                                        </form>
                                    </div>

                                    <div id="attribute-value-{{$value->id}}-info-edit" class="d-none w-100">
                                        <form class="d-flex align-items-center w-100"
                                            action="{{route('admin.attribute-values.update', $value->id)}}"
                                            method="post">
                                            @method('put')
                                            @csrf
                                            <div class="flex-grow-1 me-2">
                                                <label class="visually-hidden" for="value"></label>
                                                <input name="value" type="text" class="form-control" required id="value"
                                                    value="{{$value->value}}" />
                                            </div>

                                            <div class="">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="reset" class="btn btn-danger"
                                                    onclick="discardEditing(this, 'attribute-value-{{$value->id}}-info')">Discard</button>
                                            </div>
                                        </form>
                                    </div>
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
                                                        <button class="btn btn-danger btn-sm" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#editPackage"
                                                            data-bs-package="{{$package->id}}"
                                                            data-bs-packageName="{{$package->name}}"
                                                            data-bs-price="{{$package->price}}"
                                                            data-bs-oldPrice="{{$package->old_price}}"
                                                            data-bs-offer="{{$package->offer}}"
                                                            data-bs-sellerMessage="{{$package->seller_message}}"><span
                                                                class="ti ti-edit fs-4"></span></button>
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

    <div class="modal" id="editPackage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editPackage" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 align-items-center bg-success text-light">
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row gy-2 gx-3 align-items-center" action="{{route('admin.packages.update', '')}}"
                        method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="product_id" value="{{$model->id}}" />
                        <div class="col-12">
                            <label class="visually-hidden" for="package_name">Package Name</label>
                            <input name="name" type="text" class="form-control" required id="package_name"
                                placeholder="Package Name" />
                        </div>
                        <div class="col-12">
                            <label class="visually-hidden" for="pprice">Price</label>
                            <input name="price" type="text" class="form-control" required id="pprice"
                                placeholder="Price" />
                        </div>
                        <div class="col-12">
                            <label class="visually-hidden" for="opprice">Old Price</label>
                            <input name="old_price" type="text" class="form-control" required id="opprice"
                                placeholder="Old Price" />
                        </div>
                        <div class="col-12">
                            <label class="visually-hidden" for="offer">Offer</label>
                            <input name="offer" type="text" class="form-control" required id="offer"
                                placeholder="Offer" />
                        </div>
                        <div class="col-12">
                            <label class="visually-hidden" for="seller_msg">Seller Message</label>
                            <input name="seller_message" type="text" class="form-control" id="seller_msg"
                                placeholder="Message" />
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Package</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function editAttribute(element, selector) {
            document.getElementById(`${selector}`).classList.add('d-none');
            document.getElementById(`${selector}-edit`).classList.remove('d-none');
        }

        function discardEditing(element, selector) {
            document.getElementById(`${selector}`).classList.remove('d-none');
            document.getElementById(`${selector}-edit`).classList.add('d-none');
        }

        const editPackageModal = document.getElementById('editPackage')
        if (editPackageModal) {
            editPackageModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const pName = button.getAttribute('data-bs-packageName')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const pInput = editPackageModal.querySelector('.modal-body form')
                const pNameInput = editPackageModal.querySelector('.modal-body #package_name');
                const pPriceInput = editPackageModal.querySelector('.modal-body #pprice')
                const pOldPriceInput = editPackageModal.querySelector('.modal-body #opprice')
                const pOfferInput = editPackageModal.querySelector('.modal-body #offer')
                const pSMsgInput = editPackageModal.querySelector('.modal-body #seller_msg')


                pNameInput.value = pName;
                pPriceInput.value = button.getAttribute('data-bs-price');
                pOldPriceInput.value = button.getAttribute('data-bs-oldPrice');
                pOfferInput.value = button.getAttribute('data-bs-offer');
                pSMsgInput.value = button.getAttribute('data-bs-sellerMessage');
                pInput.action = `${pInput.action}/${button.getAttribute('data-bs-package')}`;
            })
        }
    </script>
    @endpush

</x-admin-app-layout>