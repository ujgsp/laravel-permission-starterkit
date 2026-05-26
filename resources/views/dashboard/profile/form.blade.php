<div class="mb-3">
    <label class="form-label" for="name">Nama <span class="text-danger">*</span></label>
    {!! Form::text('name', null, [
        'placeholder' => 'Enter nama',
        'class' => 'form-control',
        'required' => false,
    ]) !!}
</div>
<div class="mb-3">
    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
    {!! Form::text('email', null, [
        'placeholder' => 'Enter email',
        'class' => 'form-control',
        'required' => false,
    ]) !!}
</div>
<div class="mb-3">
    <label class="form-label" for="password">Password Baru <span class="text-danger">*</span></label>
    {!! Form::password('password', [
        'class' => 'form-control',
        'placeholder' => 'Enter password',
        'required' => 'required',
    ]) !!}
    <div class="form-hint">Jumlah password minimal 8 karakter.</div>
</div>
<div class="mb-3">
    <label class="form-label" for="password_confirmation">Konfirmasi Password Baru <span class="text-danger">*</span></label>
    {!! Form::password('password_confirmation', [
        'class' => 'form-control',
        'placeholder' => 'Enter password confirmation',
        'required' => 'required',
    ]) !!}
</div>
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

@include('partials.asset_jqueryvalidation')

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\EditProfileRequest', '#form-user') !!}
@endpush
