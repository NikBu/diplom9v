<section class="profile-section">
    <div>
        <h2>Удалить аккаунт</h2>
        <p>После удаления вашего аккаунта все его ресурсы и данные будут удалены навсегда. Перед удалением аккаунта, пожалуйста, скачайте любые данные или информацию, которые вы хотите сохранить.</p>
    </div>
    <button onclick="openModal('confirm-user-deletion')" class=" btn-red">Удалить аккаунт</button>
    <div id="confirm-user-deletion" class="modal" style="display: none;">
        <form method="post" action="{{ route('profile.destroy') }}" class="form-container">
            @csrf
            @method('delete')
            <h2>Вы уверены, что хотите удалить ваш аккаунт?</h2>
            <p>После удаления вашего аккаунта все его ресурсы и данные будут удалены навсегда. Пожалуйста, введите свой пароль, чтобы подтвердить, что вы хотите удалить ваш аккаунт навсегда.</p>
            <div class="form-group">
                <label for="password" class="sr-only">Пароль</label>
                <input id="password" name="password" type="password" placeholder="Пароль" />
                @if($errors->userDeletion->has('password'))
                    <span class="error-message">{{ $errors->userDeletion->first('password') }}</span>
                @endif
            </div>
            <div class="form-actions">
                <button onclick="closeModal()" class="btn-red" type="button">Отмена</button>
                <button type="submit" class="btn-red">Удалить аккаунт</button>
            </div>
        </form>
    </div>
</section>

<script>
    // Функция открытия модального окна
    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
    }

    // Функция закрытия модального окна
    function closeModal() {
        document.getElementById("confirm-user-deletion").style.display = "none";
    }

</script>