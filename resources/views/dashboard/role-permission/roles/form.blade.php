<div class="mb-3">
    <div class="form-group">
        <label class="form-label " for="name">Role Name <span class="text-danger">*</span></label>

        {!! Form::text('name', null, ['placeholder' => 'Enter role name', 'class' => 'form-control', 'required' => false]) !!}
    </div>
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    <a href="{{ route('roles.index') }}" class="btn btn-danger btn-lg">Back</a>
</div>

@include('partials.asset_jqueryvalidation')

@push('script')
    @if (Request::route()->named('roles.create'))
        {!! JsValidator::formRequest('App\Http\Requests\RoleStoreRequest', '#form-role') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\RoleUpdateRequest', '#form-role') !!}
    @endif
@endpush
