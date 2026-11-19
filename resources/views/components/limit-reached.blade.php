<div class="flex flex-col items-center justify-center h-32">
    <span class="text-xl font-bold dark:text-white">{{ __('You have reached the limit of :value you can create.', ['value' => $name]) }}</span>
    <span>{{ __('Please') }} <a class="dark:text-white underline" {{ wireNavigate() }} href="{{ route('subscription.show') }}">{{ __('upgrade your subscription') }}</a> {{ __('to increase the limit.') }}</span>
</div>
