<div class="row">
    <div class="col-md-5">
        <x-preview-images :images="!empty($model->images) ? $model->images : null" />
    </div>
    <div class="col-md-7">
        <x-form-component :fields="$fields" :isEditing="$edit" actionRoute="{{route('admin.products.store')}}"
            editRoute="{{ $edit ? route('admin.products.update', $model->id) : ''}}" isSEOEnabled="{{true}}"
            :model="$model" updateBtnText="Update Information" submitBtnText="Create New Product" />
    </div>
</div>