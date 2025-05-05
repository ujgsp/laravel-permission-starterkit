<div class="mb-3">
    <div class="form-group">
        <label class="form-label " for="name">Nama <span class="text-danger">*</span></label>
        {!! Form::text('name', null, [
            'placeholder' => 'Enter  Nama',
            'class' => 'form-control',
            'required' => false,
        ]) !!}
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <label class="form-label " for="email">Email <span class="text-danger">*</span></label>
        {!! Form::text('email', null, [
            'placeholder' => 'Enter  Email',
            'class' => 'form-control',
            'required' => false,
        ]) !!}
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <label class="form-label" for="password">Password Baru <span class="text-danger">*</span></label>
        {!! Form::password('password', [
            'class' => 'form-control',
            'placeholder' => 'Enter Password',
            'required' => 'required'
        ]) !!}
        <div class="form-text">
            Jumlah password minimal 8 karakter.
        </div>
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <label class="form-label" for="password_confirmation">Konfirmasi Password Baru <span class="text-danger">*</span></label>
        {!! Form::password('password_confirmation', [
            'class' => 'form-control',
            'placeholder' => 'Enter Password Confirmation',
            'required' => 'required'
        ]) !!}
    </div>
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
</div>

@include('partials.asset_jqueryvalidation')

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\EditProfileRequest', '#form-user') !!}
@endpush
