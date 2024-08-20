<x-admin-app-layout>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success {{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
    </nav>
    <hr /> -->

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link {{!$errors->any() ? 'active' : ''}}" id="nav-home-tab" data-bs-toggle="tab"
                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All
                Delivery Options</button>
            <button class="nav-link {{$errors->any() ? 'active' : ''}}" id="nav-profile-tab" data-bs-toggle="tab"
                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                aria-selected="false">Add New Delivery Option</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade p-2 {{!$errors->any() ? 'active show' : ''}}" id="nav-home" role="tabpanel"
            aria-labelledby="nav-home-tab" tabindex="0">
            <x-all-records :records="$records" :columns="$columns" enableActionColumn="{{true}}"
                model="delivery-options" id="delivery-options" />
            <!-- {{ $records->links() }} -->

            <div class="d-flex justify-content-between">
                <!-- Dropdown for page selection -->
                <div class="pagination">
                    <form id="page-select-form" method="GET" action="{{ url()->current() }}">
                        <label for="page-select">Go to page:</label>
                        <select id="page-select" name="page" onchange="this.form.submit()">
                            @foreach ($pages as $page)
                            <option value="{{ $page }}" {{ $page==$records->currentPage() ? 'selected' : '' }}>
                                {{ $page }}
                            </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <!-- Custom Pagination Links -->
                <div class="pagination">
                    <a href="{{ $records->url(1)}}"
                        class="page-link {{ $records->currentPage() == 1 ? 'disabled' : '' }}">First</a>
                    @if ($records->currentPage() > 1)
                    <a href="{{ $records->previousPageUrl() }}" class="page-link">Previous</a>
                    @else
                    <span class="page-link disabled">Previous</span>
                    @endif

                    @if ($records->currentPage() < $records->lastPage())
                        <a href="{{ $records->nextPageUrl() }}" class="page-link">Next</a>
                        @else
                        <span class="page-link disabled">Next</span>
                        @endif
                        <a href="{{ $records->url($records->lastPage()) }}"
                            class="page-link {{ $records->currentPage() == $records->lastPage() ? 'disabled' : '' }}">Last</a>
                </div>
            </div>

        </div>

        <div class="tab-pane fade p-2 {{$errors->any() ? ' active show' : '' }}" id="nav-profile" role="tabpanel"
            aria-labelledby="nav-profile-tab" tabindex="0">
            @include('admin.delivery-option.create')
        </div>
    </div>
</x-admin-app-layout>