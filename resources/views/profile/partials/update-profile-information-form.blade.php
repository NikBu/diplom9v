<div class="profile-section">
    <h2>Информация профиля</h2>
    <p>Обновите информацию профиля, телефонный номер и адрес электронной почты вашего аккаунта.</p>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="profile-form">
        @csrf
        @method('patch')
        <div>
            <label for="name">Имя</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @if ($errors->has('name'))
                <span class="error-message">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @if ($errors->has('email'))
                <span class="error-message">{{ $errors->first('email') }}</span>
            @endif
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! $user->hasVerifiedEmail())
                <div>
                    <p class="text-info">Ваш адрес электронной почты не подтвержден.
                        <button form="send-verification">Нажмите здесь, чтобы отправить письмо с подтверждением повторно.</button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="success-message">На ваш адрес электронной почты был отправлен новый ссылочный код подтверждения.</p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <label for="phone_number">Телефонный номер</label>
            <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number', $user->phone_number) }}" autocomplete="tel" />
            @if ($errors->has('phone_number'))
                <span class="error-message">{{ $errors->first('phone_number') }}</span>
            @endif
        </div>
        <div>
            <button type="submit" class="btn-simple">Сохранить</button>
            @if (session('status') === 'profile-updated')
                <p class="success-message">Сохранено.</p>
            @endif
        </div>
    </form>
</div>