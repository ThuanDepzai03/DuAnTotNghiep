@extends('layouts.master')

@section('content')
<div class="container my-5 text-center" style="padding: 100px 0;">
    <h2 class="text-success" style="color: #28a745; margin-bottom: 20px;">🎉 Thanh Toán Thành Công!</h2>
    <p style="font-size: 16px; margin-bottom: 30px;">Cảm ơn bạn đã mua sắm. Đơn hàng của bạn đã được xử lý thành công.</p>
    <a href="{{ route('home') }}" class="primary-btn" style="padding: 10px 30px; text-decoration: none;">Về trang chủ</a>
</div>

<script>
    function playSuccessCompletionTone() {
        try {
            const AudioCtor = window.AudioContext || window.webkitAudioContext;
            if (!AudioCtor) return;

            const audioContext = new AudioCtor();
            const notes = [
                { freq: 523.25, duration: 0.18 },
                { freq: 659.25, duration: 0.18 },
                { freq: 783.99, duration: 0.22 },
                { freq: 1046.5, duration: 0.34 }
            ];

            notes.forEach(function (note, index) {
                const oscillator = audioContext.createOscillator();
                const gain = audioContext.createGain();
                const startTime = audioContext.currentTime + index * 0.15;

                oscillator.type = 'triangle';
                oscillator.frequency.setValueAtTime(note.freq, startTime);

                gain.gain.setValueAtTime(0.0001, startTime);
                gain.gain.exponentialRampToValueAtTime(0.07, startTime + 0.02);
                gain.gain.exponentialRampToValueAtTime(0.0001, startTime + note.duration);

                oscillator.connect(gain);
                gain.connect(audioContext.destination);
                oscillator.start(startTime);
                oscillator.stop(startTime + note.duration);
            });
        } catch (error) {
            console.log('Không phát âm thanh hoàn thành:', error);
        }
    }

    window.addEventListener('DOMContentLoaded', function () {
        setTimeout(playSuccessCompletionTone, 350);
    });
</script>
@endsection
