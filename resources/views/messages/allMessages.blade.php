@if (session()->has('success_message'))
    <div class="p-2 rounded-md m-3 bg-green-300 text-green-700 w-full">
        <strong>{{ session()->get('success_message') }}</strong>
    </div>
@endif
@if (session()->has('warning_message'))
    <div class="p-2 rounded-md m-3 bg-orange-300 text-orange-700 w-full">
        <strong>{{ session()->get('warning_message') }}</strong>
    </div>
@endif
@if (session()->has('error_message'))
    <div class="p-2 rounded-md m-3 bg-red-300 text-red-700 w-full">
        <strong>{{ session()->get('error_message') }}</strong>
    </div>
@endif
