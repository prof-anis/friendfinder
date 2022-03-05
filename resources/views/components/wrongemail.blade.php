
@if (session()->has('wrongemail'))
    <p class="text-danger"> {{ session('wrongemail')}} </p>
@endif