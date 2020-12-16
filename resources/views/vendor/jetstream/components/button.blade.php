<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-orange-light border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-dark active:bg-orange-dark focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
