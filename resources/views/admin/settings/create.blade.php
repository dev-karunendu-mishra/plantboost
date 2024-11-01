<x-admin-app-layout>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form class="" method="POST"
        action="{{ !empty($settings) ? route('admin.settings.update', $settings->id) : route('admin.settings.store') }}"
        enctype="multipart/form-data">
        @csrf
        @if($settings)
        @method('put')
        @endif

        <div class="row mb-3">
            <div class="col">
                <div>
                    <label for="logo" class="form-label text-capitalize">Website Logo</label>
                    <input name="logo" class="form-control @error('logo') is-invalid @enderror" type="file"
                        id="formFileMultiple" />
                    @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="icon" class="form-label text-capitalize">Website Icon</label>
                    <input name="icon" class="form-control @error('icon') is-invalid @enderror" type="file"
                        id="formFileMultiple" />
                    @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div>
                    <label for="title" class="form-label text-capitalize">Website Title</label>
                    <input name="title" type="text" value="{{old('title', !empty($settings) ? $settings->title : '')}}"
                        class="form-control @error('title') is-invalid @enderror" id="title"
                        placeholder="Website Title">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="description" class="form-label text-capitalize">Website Description</label>
                    <input name="description" type="text"
                        value="{{old('description', !empty($settings) ? $settings->description : '')}}"
                        class="form-control @error('description') is-invalid @enderror" id="description"
                        placeholder="Website Description">
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div>
                    <label for="domain" class="form-label text-capitalize">Website Domain</label>
                    <input name="domain" type="text"
                        value="{{old('domain', !empty($settings) ? $settings->domain : '')}}"
                        class="form-control @error('domain') is-invalid @enderror" id="domain" placeholder="Domain">
                    @error('domain')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="address" class="form-label text-capitalize">Address</label>
                    <input name="address" type="text"
                        value="{{old('address', !empty($settings) ? $settings->address : '')}}"
                        class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div>
                    <label for="mobile" class="form-label text-capitalize">Mobile</label>
                    <input name="mobile" type="text"
                        value="{{old('mobile', !empty($settings) ? $settings->mobile : '')}}"
                        class="form-control @error('mobile') is-invalid @enderror" id="mobile" placeholder="Mobile">
                    @error('mobile')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="email" class="form-label text-capitalize">Email</label>
                    <input name="email" type="text" value="{{old('email', !empty($settings) ? $settings->email : '')}}"
                        class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div class="row mb-3">
            <div class="col">
                <div>
                    <label for="notification" class="form-label text-capitalize">Notification</label>
                    <input name="notification" type="text"
                        value="{{old('notification', !empty($settings) ? $settings->notification : '')}}"
                        class="form-control @error('notification') is-invalid @enderror" id="notification" placeholder="Notification">
                    @error('notification')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="notification_2nd" class="form-label text-capitalize">Second Notification</label>
                    <input name="notification_2nd" type="text" value="{{old('notification_2nd', !empty($settings) ? $settings->notification_2nd : '')}}"
                        class="form-control @error('notification_2nd') is-invalid @enderror" id="notification_2nd" placeholder="Second Notification">
                    @error('notification_2nd')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Order Track -->
        <div class="row mb-3">
            <div class="col">
                <div>
                    <label for="estimate_order_ready" class="form-label">Order will be ready in days</label>
                    <input name="estimate_order_ready" type="text"
                        value="{{old('estimate_order_ready', !empty($settings) ? $settings->estimate_order_ready : '')}}"
                        class="form-control @error('estimate_order_ready') is-invalid @enderror" id="estimate_order_ready" placeholder="Order will be ready in days">
                    @error('estimate_order_ready')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="estimate_order_delivery" class="form-label">Order will be delivered in days</label>
                    <input name="estimate_order_delivery" type="text" value="{{old('estimate_order_delivery', !empty($settings) ? $settings->estimate_order_delivery : '')}}"
                        class="form-control @error('estimate_order_delivery') is-invalid @enderror" id="estimate_order_delivery" placeholder="Order will be delivered in days">
                    @error('estimate_order_delivery')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div>
                    <label for="theme_color" class="form-label">Theme Color</label>
                    <input name="theme_color" type="text"
                        value="{{old('theme_color', !empty($settings) ? $settings->theme_color : '')}}"
                        class="form-control @error('theme_color') is-invalid @enderror" id="theme_color" placeholder="Theme Color">
                        @error('theme_color')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="cod_button_bg" class="form-label">COD Button Color</label>
                    <input name="cod_button_bg" type="text"
                        value="{{old('cod_button_bg', !empty($settings) ? $settings->cod_button_bg : '')}}"
                        class="form-control @error('cod_button_bg') is-invalid @enderror" id="cod_button_bg" placeholder="COD Button Color">
                        @error('cod_button_bg')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>



        <div class="row mb-3">
            <div class="col">
                <div>
                    <label for="facebook" class="form-label text-capitalize">Facebook</label>
                    <input name="facebook" type="text"
                        value="{{old('facebook', !empty($settings) ? $settings->facebook : '')}}"
                        class="form-control @error('facebook') is-invalid @enderror" id="facebook"
                        placeholder="Facebook">
                    @error('facebook')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="twitter" class="form-label text-capitalize">Twitter</label>
                    <input name="twitter" type="text"
                        value="{{old('twitter', !empty($settings) ? $settings->twitter : '')}}"
                        class="form-control @error('twitter') is-invalid @enderror" id="twitter" placeholder="Twitter">
                    @error('twitter')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div>
                    <label for="linkedin" class="form-label text-capitalize">LinkedIn</label>
                    <input name="linkedin" type="text"
                        value="{{old('linkedin', !empty($settings) ? $settings->linkedin : '')}}"
                        class="form-control @error('linkedin') is-invalid @enderror" id="linkedin"
                        placeholder="LinkedIn">
                    @error('linkedin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div>
                    <label for="instagram" class="form-label text-capitalize">Instagram</label>
                    <input name="instagram" type="text"
                        value="{{old('instagram', !empty($settings) ? $settings->instagram : '')}}"
                        class="form-control @error('instagram') is-invalid @enderror" id="instagram"
                        placeholder="Instagram">
                    @error('instagram')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <div>
                    <label for="youtube" class="form-label text-capitalize">Youtube</label>
                    <input name="youtube" type="text"
                        value="{{old('youtube', !empty($settings) ? $settings->youtube : '')}}"
                        class="form-control @error('youtube') is-invalid @enderror" id="youtube" placeholder="Youtube">
                    @error('youtube')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="mb-3 d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-success">{{$edit ? 'Update Setting' :
                'Create Setting'}}</button>
        </div>
    </form>
</x-admin-app-layout>