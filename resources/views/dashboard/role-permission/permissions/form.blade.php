<div class="mb-3">
    <label class="form-label" for="name">Permission Name <span class="text-danger">*</span></label>
    {!! Form::text('name', null, ['placeholder' => 'Enter permission name', 'class' => 'form-control']) !!}
</div>
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

@include('partials.asset_jqueryvalidation')

@push('script')
    @if(Request::route()->named('permissions.create'))
        {!! JsValidator::formRequest('App\Http\Requests\PermissionStoreRequest', '#form-permission') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\PermissionUpdateRequest', '#form-permission') !!}
    @endif
@endpush