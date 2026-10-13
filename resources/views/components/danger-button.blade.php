<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-danger focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
