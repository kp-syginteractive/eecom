@include('customer.layouts.header')
@include('customer.layouts.nav')

@includeWhen( Request::is('/'), 'customer.layouts.carousel' )

<div class=" mx-auto my-4">
	@yield('content')
</div>
@include('customer.layouts.footer')