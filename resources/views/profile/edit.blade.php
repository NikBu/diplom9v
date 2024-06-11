@extends('layouts.base')
@section('page.title', 'Личный кабинет')
@section('content')
<div class="main-container">
    @include('profile.partials.update-profile-information-form')
    @include('profile.partials.update-password-form')
    @include('profile.partials.delete-user-form')
</div>

@endsection