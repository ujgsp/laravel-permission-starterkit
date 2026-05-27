<div class="mb-3">
    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
    {!! Form::text('name', null, ['placeholder' => 'Enter name', 'class' => 'form-control']) !!}
</div>
<div class="mb-3">
    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
    {!! Form::text('email', null, ['placeholder' => 'Enter email', 'class' => 'form-control']) !!}
</div>
<div class="mb-3">
    <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
    {!! Form::password('password', [
        'placeholder' => 'Enter password',
        'class' => 'form-control',
    ]) !!}
    @if (isset($user))
        <div class="form-hint">Leave blank if you do not want to change the password.</div>
    @endif
</div>
<div class="mb-3">
    <label class="form-label" for="roles">Roles <span class="text-danger">*</span></label>
    {!! Form::select(
        'roles[]',
        $roles,
        old('roles', isset($userRoles) ? $userRoles : []),
        [
            'class' => 'form-select',
            'id' => 'roles',
            'multiple' => true,
        ],
    ) !!}
</div>
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

@include('partials.asset_jqueryvalidation')

@push('script')
    @if(Request::route()->named('users.create'))
        {!! JsValidator::formRequest('App\Http\Requests\UserStoreRequest', '#form-user') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\UserUpdateRequest', '#form-user') !!}
    @endif
@endpush
