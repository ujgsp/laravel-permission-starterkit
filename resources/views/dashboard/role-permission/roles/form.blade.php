<div class="mb-3">
    <label class="form-label" for="name">Role Name <span class="text-danger">*</span></label>
    {!! Form::text('name', null, ['placeholder' => 'Enter role name', 'class' => 'form-control']) !!}
</div>
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

@include('partials.asset_jqueryvalidation')

@push('script')
    @if (Request::route()->named('roles.create'))
        {!! JsValidator::formRequest('App\Http\Requests\RoleStoreRequest', '#form-role') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\RoleUpdateRequest', '#form-role') !!}
    @endif
@endpush
