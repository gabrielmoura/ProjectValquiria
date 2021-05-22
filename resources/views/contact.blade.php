@extends('layouts.front')
@push('metadata')
    <meta name="grecaptcha-key" content="{{config('services.recaptcha.public_key')}}">
    <script src="https://www.google.com/recaptcha/api.js?render={{config('services.recaptcha.public_key')}}"></script>
@endpush
