<section class="profile-section">
    <div>
        <h2>Обновить пароль</h2>
        <p>Обеспечьте безопасность своего аккаунта, используя длинный, случайный пароль.</p>
    </div>
    <form method="post" action="{{ route('password.update') }}" class="form-container">
        @csrf
        @method('put')
        <div class="profile-form">
            <label for="current_password">Текущий пароль</label>
            <input id="current_password" name="current_password" type="password" autocomplete="current-password" />
            @if($errors->updatePassword->has('current_password'))
                <span class="error-message">{{ $errors->updatePassword->first('current_password') }}</span>
            @endif
        </div>
        <div class="profile-form">
            <label for="new_password">Новый пароль</label>
            <input id="new_password" name="password" type="password" autocomplete="new-password" />
            @if($errors->updatePassword->has('password'))
                <span class="error-message">{{ $errors->updatePassword->first('password') }}</span>
            @endif
        </div>
        <div class="profile-form">
            <label for="password_confirmation">Подтвердите пароль</label>
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            @if($errors->updatePassword->has('password_confirmation'))
                <span class="error-message">{{ $errors->updatePassword->first('password_confirmation') }}</span>
            @endif
        </div>
        <div>
            <button type="submit" class="btn-simple">Сохранить</button>
            @if (session('status') === 'password-updated')
                <p class="success-message">Сохранено.</p>
            @endif
        </div>
    </form>
</section>