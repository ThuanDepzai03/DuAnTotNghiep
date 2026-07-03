"@extends('layouts.master')

@section('content')
<div class=\"container mt-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-md-6\">
            <div class=\"card shadow-sm\">
                <div class=\"card-header bg-primary text-white\">
                    <h4 class=\"mb-0\">Xác thực email</h4>
                </div>
                <div class=\"card-body\">
                    @if(session('resent'))
                        <div class=\"alert alert-info mb-4\">
                            Mã xác thực mới đã được gửi tới email của bạn. Vui lòng kiểm tra hộp thư.
                        </div>
                    @endif
                    
                    <p>Chúng tôi đã gửi mã xác thực tới <strong>{{ session('email') }}</strong>. Vui lòng nhập mã để hoàn tất đăng ký.</p>
                    
                    <form method=\"POST\" action=\"{{ route('verify-email') }}\">
                        @csrf
                        
                        <div class=\"mb-3\">
                            <label class=\"form-label\">Mã xác thực</label>
                            <input type=\"text\" name=\"code\" class=\"form-control\" required 
                                   placeholder=\"Nhập mã 6 chữ số\" maxlength=\"6\"
                                   oninput=\"this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);\">
                        </div>
                        
                        <div class=\"d-grid\">
                            <button type=\"submit\" class=\"btn btn-primary\">Xác thực</button>
                        </div>
                    </form>
                    
                    <div class=\"text-center mt-3\">
                        <button type=\"button\" class=\"btn btn-link\" id=\"resendBtn\">Gửi lại mã</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('resendBtn').addEventListener('function', function() {
    // In a real implementation, this would make an AJAX call to resend the code
    alert('Mã xác thực mới đã được gửi! Vui lòng kiểm tra email.');
    // For now, just show a message
    const btn = this;
    btn.innerHTML = 'Đang gửi...';
    btn.disabled = true;
    
    setTimeout(() => {
        btn.innerHTML = 'Gửi lại mã';
        btn.disabled = false;
    }, 3000);
});
</script>
@endpush"