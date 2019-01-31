@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Liên hệ điện tự động bách khoa
        @endcomponent
    @endslot
    {{-- Body --}}
    Khách hàng có tên {{ $data['hoten'] }} vừa mới thực hiện một liên hệ từ phía website {{ route('homepage') }}
    <br />
    Thông tin của khách hàng:<br />
    Họ tên : {{ $data['hoten'] }}<br />
    SĐT: {{ $data['sdt'] }}<br />
    Email: {{ $data['email'] }}<br />
    Địa chỉ: {{ $data['diachi'] }}<br />
    Nội dung: {{ $data['noidung'] }}<br />

    {{-- Subcopy --}}
    {{--@isset($subcopy)--}}
        {{--@slot('subcopy')--}}
            {{--@component('mail::subcopy')--}}
                {{--{{ $subcopy }}--}}
            {{--@endcomponent--}}
        {{--@endslot--}}
    {{--@endisset--}}
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} Dientudonghoabachkhoa. superAdmin!
        @endcomponent
    @endslot
@endcomponent
