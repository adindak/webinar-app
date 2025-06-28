{{-- resources/views/events/register.blade.php --}}
<x-nolayout>
    @push('css')
        <style>
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                font-family: 'Inter', sans-serif;
                margin: 0;
                padding: 0;
            }

            /* Glass effect */
            .glass-effect {
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }

            .payment-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem 1rem;
                position: relative;
            }

            .payment-card {
                background: rgba(255, 255, 255, 0.95);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 24px;
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
                overflow: hidden;
                max-width: 600px;
                width: 100%;
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }

            .payment-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 2.5rem 2rem;
                text-align: center;
                position: relative;
                overflow: hidden;
            }

            .payment-header::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="50" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
                opacity: 0.1;
            }

            .payment-header h3 {
                margin: 0;
                font-size: 2rem;
                font-weight: 700;
                position: relative;
                z-index: 1;
                text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }

            .payment-header .icon {
                font-size: 4rem;
                margin-bottom: 1rem;
                opacity: 0.9;
                position: relative;
                z-index: 1;
            }

            .payment-body {
                padding: 2.5rem;
                background: white;
            }

            .webinar-detail {
                background: linear-gradient(135deg, #f8f9ff 0%, #f1f3ff 100%);
                border: 1px solid #e3e8ff;
                border-radius: 16px;
                padding: 2rem;
                margin-bottom: 2.5rem;
                position: relative;
                overflow: hidden;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            }

            .webinar-detail::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 4px;
                height: 100%;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            .webinar-detail h4 {
                margin: 0;
                color: #1a202c;
                font-weight: 700;
                font-size: 1.5rem;
                line-height: 1.4;
            }

            .section-title {
                color: #4a5568;
                font-weight: 700;
                font-size: 1rem;
                margin-bottom: 1.5rem;
                text-transform: uppercase;
                letter-spacing: 1px;
                display: flex;
                align-items: center;
            }

            .section-title i {
                margin-right: 0.5rem;
                font-size: 1.2rem;
                color: #667eea;
            }

            .payment-option {
                border: 2px solid #e2e8f0;
                border-radius: 16px;
                padding: 1.5rem;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                cursor: pointer;
                transition: all 0.3s ease;
                background: white;
                position: relative;
                overflow: hidden;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            }

            .payment-option::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
                transition: left 0.5s ease;
            }

            .payment-option:hover {
                border-color: #667eea;
                transform: translateY(-4px);
                box-shadow: 0 12px 30px rgba(102, 126, 234, 0.2);
            }

            .payment-option:hover::before {
                left: 100%;
            }

            .payment-option input[type="radio"] {
                width: 24px;
                height: 24px;
                margin-right: 1.5rem;
                accent-color: #667eea;
                cursor: pointer;
            }

            .payment-option.selected {
                border-color: #667eea;
                background: linear-gradient(135deg, #f8f9ff 0%, #f1f3ff 100%);
                box-shadow: 0 8px 25px rgba(102, 126, 234, 0.25);
                transform: translateY(-2px);
            }

            .payment-logo {
                max-height: 40px;
                margin-right: 1.5rem;
                filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
            }

            .payment-method-text {
                font-weight: 600;
                color: #1a202c;
                font-size: 1.1rem;
                margin-bottom: 0.25rem;
            }

            .payment-method-desc {
                color: #718096;
                font-size: 0.9rem;
            }

            .total-section {
                background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
                border: 2px solid #e2e8f0;
                border-radius: 16px;
                padding: 2rem;
                margin-top: 2.5rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            }

            .total-info h5 {
                margin: 0 0 0.5rem 0;
                color: #4a5568;
                font-weight: 600;
                font-size: 1rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .total-amount {
                font-size: 1.5rem;
                font-weight: 800;
                color: #1a202c;
                margin: 0;
            }

            .btn-pay {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border: none;
                border-radius: 12px;
                padding: 1rem 2.5rem;
                font-weight: 700;
                font-size: 1.1rem;
                color: white;
                transition: all 0.3s ease;
                box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
                position: relative;
                overflow: hidden;
                cursor: pointer;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .btn-pay::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                transition: left 0.5s ease;
            }

            .btn-pay:hover:not(:disabled) {
                transform: translateY(-3px);
                box-shadow: 0 12px 30px rgba(102, 126, 234, 0.5);
            }

            .btn-pay:hover:not(:disabled)::before {
                left: 100%;
            }

            .btn-pay:disabled {
                opacity: 0.6;
                cursor: not-allowed;
                transform: none;
            }

            .btn-pay:active:not(:disabled) {
                transform: translateY(-1px);
            }

            .back-link {
                position: absolute;
                top: 2rem;
                left: 2rem;
                color: rgba(255,255,255,0.9);
                text-decoration: none;
                font-size: 1.1rem;
                font-weight: 600;
                transition: all 0.3s ease;
                z-index: 10;
                background: rgba(255,255,255,0.1);
                padding: 0.75rem 1.5rem;
                border-radius: 50px;
                border: 1px solid rgba(255,255,255,0.2);
                backdrop-filter: blur(10px);
            }

            .back-link:hover {
                color: white;
                background: rgba(255,255,255,0.2);
                transform: translateY(-2px);
            }

            .security-badge {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 2rem;
                padding: 1rem;
                background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
                border: 1px solid rgba(102, 126, 234, 0.2);
                border-radius: 12px;
                color: #667eea;
                font-size: 0.9rem;
                font-weight: 600;
            }

            .security-badge i {
                margin-right: 0.75rem;
                font-size: 1.2rem;
            }

            @media (max-width: 768px) {
                .payment-container {
                    padding: 1rem;
                }
                
                .payment-header {
                    padding: 2rem 1.5rem;
                }
                
                .payment-header h3 {
                    font-size: 1.5rem;
                }
                
                .payment-header .icon {
                    font-size: 3rem;
                }
                
                .payment-body {
                    padding: 1.5rem;
                }
                
                .webinar-detail {
                    padding: 1.5rem;
                }
                
                .total-section {
                    flex-direction: column;
                    text-align: center;
                    gap: 1.5rem;
                    padding: 1.5rem;
                }

                .total-amount {
                    font-size: 1.5rem;
                }

                .btn-pay {
                    width: 100%;
                    padding: 1rem;
                }

                .back-link {
                    position: static;
                    display: inline-block;
                    margin-bottom: 1rem;
                    font-size: 1rem;
                }
                
                .payment-option {
                    padding: 1rem;
                }
                
                .payment-method-text {
                    font-size: 1rem;
                }
            }

            /* Enhanced animations */
            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .payment-card {
                animation: slideInUp 0.6s ease-out;
            }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }

            ::-webkit-scrollbar-track {
                background: rgba(255,255,255,0.1);
            }

            ::-webkit-scrollbar-thumb {
                background: rgba(255,255,255,0.3);
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: rgba(255,255,255,0.5);
            }
        </style>
    @endpush

    <div class="payment-container">
        <a href="{{ url()->previous() }}" class="back-link">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
        
        <div class="payment-card">
            <!-- Header -->
            <div class="payment-header">
                <div class="icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h3>Pembayaran Event</h3>
            </div>

            <!-- Body -->
            <div class="payment-body">
                <form action="{{ route('events.payment', $webinar->id) }}" method="POST" id="paymentForm">
                    @csrf
                    
                    <!-- Webinar Detail -->
                    <div class="webinar-detail">
                        <h4>{{ $webinar->name }}</h4>
                    </div>

                    <!-- Payment Method Section -->
                    <div class="section-title">
                        <i class="fas fa-credit-card"></i>
                        Pilih Metode Pembayaran
                    </div>

                    <div class="payment-methods">
                        <div class="payment-option" onclick="selectPayment(this)">
                            <input class="form-check-input" type="radio" name="payment" id="manual_payment" value="manual_payment" required>
                            <label class="form-check-label d-flex align-items-center w-100" for="manual_payment">
                                <img src="{{ asset('') }}assets/images/manual-payment.svg" alt="Manual Payment" class="payment-logo">
                                <div>
                                    <div class="payment-method-text">Manual Payment</div>
                                    <div class="payment-method-desc">Transfer bank manual dengan konfirmasi</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Total Section -->
                    <div class="total-section">
                        <div class="total-info">
                            <h5>Total Pembayaran</h5>
                            <p class="total-amount">Rp {{ number_format($webinar->price, 0, ',', '.') }}</p>
                        </div>
                        
                        <button type="submit" class="btn-pay" id="payButton" disabled>
                            <i class="fas fa-lock mr-2"></i>
                            Bayar Sekarang
                        </button>
                    </div>

                    <!-- Security Badge -->
                    <div class="security-badge">
                        <i class="fas fa-shield-alt"></i>
                        Pembayaran aman dan terenkripsi SSL
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function selectPayment(element) {
                // Remove selected class from all options
                document.querySelectorAll('.payment-option').forEach(option => {
                    option.classList.remove('selected');
                });
                
                // Add selected class to clicked option
                element.classList.add('selected');
                
                // Check the radio button
                const radio = element.querySelector('input[type="radio"]');
                radio.checked = true;
                
                // Enable pay button with animation
                const payButton = document.getElementById('payButton');
                payButton.disabled = false;
                payButton.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    payButton.style.transform = '';
                }, 200);
            }

            // Add click event to radio buttons
            document.addEventListener('DOMContentLoaded', function() {
                const radios = document.querySelectorAll('input[type="radio"][name="payment"]');
                radios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.checked) {
                            document.getElementById('payButton').disabled = false;
                        }
                    });
                });

                // Form validation
                document.getElementById('paymentForm').addEventListener('submit', function(e) {
                    const selectedPayment = document.querySelector('input[name="payment"]:checked');
                    if (!selectedPayment) {
                        e.preventDefault();
                        alert('Silakan pilih metode pembayaran terlebih dahulu.');
                        return false;
                    }
                    
                    // Add loading state
                    const payButton = document.getElementById('payButton');
                    payButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                    payButton.disabled = true;
                });

                // Add smooth scroll and focus management
                document.querySelectorAll('.payment-option').forEach(option => {
                    option.addEventListener('click', function() {
                        this.querySelector('input[type="radio"]').focus();
                    });
                });
            });
        </script>
    @endpush
</x-nolayout>