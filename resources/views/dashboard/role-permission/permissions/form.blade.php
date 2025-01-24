<div class="mb-3">
    <div class="form-group">
        <label class="form-label " for="name">Permission Name <span class="text-danger">*</span></label>
        {!! Form::text('name', null, ['placeholder' => 'Enter  permission name', 'class' => 'form-control', 'required' => false]) !!}
    </div>
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    <a href="{{ route('permissions.index') }}" class="btn btn-danger btn-lg">Back</a>
</div>

@include('partials.asset_jqueryvalidation')

@push('script')
    @if(Request::route()->named('permissions.create'))
        {!! JsValidator::formRequest('App\Http\Requests\PermissionStoreRequest', '#form-permission') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\PermissionUpdateRequest', '#form-permission') !!}
    @endif
@endpush