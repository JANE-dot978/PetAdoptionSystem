<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn-outline focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
