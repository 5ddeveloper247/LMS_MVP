@if (session('success') || session('error'))
    <div style="margin-bottom:20px;padding:14px 18px;border-radius:12px;font-size:14px;{{ session('error') ? 'background:#fdecea;color:#9b2c2c;border:1px solid #f5c6c6;' : 'background:#e8f5ef;color:#0a4d3c;border:1px solid #b8dfc8;' }}">
        {{ session('success') ?? session('error') }}
    </div>
@endif
