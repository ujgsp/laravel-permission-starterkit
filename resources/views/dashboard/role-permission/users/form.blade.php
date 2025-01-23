<div class="mb-3">
    <div class="form-group">
        <label class="form-label " for="name">Name <span class="text-danger">*</span></label>
        {!! Form::text('name', null, ['placeholder' => 'Enter name', 'class' => 'form-control', 'required' => false]) !!}
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <label class="form-label " for="email">Email <span class="text-danger">*</span></label>
        {!! Form::text('email', null, ['placeholder' => 'Enter email', 'class' => 'form-control', 'required' => false]) !!}
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <label class="form-label " for="password">Password <span class="text-danger">*</span></label>
        {!! Form::password('password', [
            'placeholder' => 'Enter password',
            'class' => 'form-control',
            'required' => false,
        ]) !!}
        @if (isset($user))
            <small class="form-text text-muted">Leave blank if you do not want to change the password.</small>
        @endif
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <label class="form-label " for="password">Roles <span class="text-danger">*</span></label>
        {!! Form::select(
            'roles[]',
            $roles,
            old('roles', isset($userRoles) ? $userRoles : []),
            [
                'class' => 'form-select',
                'id' => 'roles',
                'multiple' => true
            ],
        ) !!}
    </div>
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    <a href="{{ route('users.index') }}" class="btn btn-danger btn-lg">Back</a>
</div>

@include('partials.asset_jqueryvalidation')

@push('script')
    @if(Request::route()->named('users.create'))
        {!! JsValidator::formRequest('App\Http\Requests\UserStoreRequest', '#form-user') !!}
    @else
        {!! JsValidator::formRequest('App\Http\Requests\UserUpdateRequest', '#form-user') !!}
    @endif
@endpush
