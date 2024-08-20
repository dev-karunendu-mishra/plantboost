<x-form-component
    :fields="$fields"
    :isEditing="$edit"
    actionRoute="{{route('admin.delivery-options.store')}}"
    editRoute="{{ $edit ? route('admin.delivery-options.update', $model->id) : ''}}"
    isSEOEnabled="{{false}}"
    :model="$model"
    updateBtnText="Update Information"
    submitBtnText="Create New Delivery Option" />

    