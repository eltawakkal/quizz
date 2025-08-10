<div>
    @include('components.navbar')


    <div class="rbt-elements-area bg-color-white rbt-section-gap">
        <div class="container">
            <form wire:submit.prevent="sendOtp">
                <div class="row gy-5 row--30 justify-content-center">
                    <div class="col-lg-6">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                            <h3 class="title">Lupa Sandi</h3>
                            @if (env('APP_DEBUG') == true)
                                {{ $randomNumber }}
                                {{ $email }}
                            @endif
                            <div wire:ignore.self class="form-group">
                                <input wire:model="email" type="text" class="{{ $isSuccess ? 'disabled' : '' }}" required />
                                <label>Masukkan Email *</label>
                                <span class="focus-border"></span>
                            </div>
                            @if ($isSuccess)
                                <div wire:ignore.self class="form-group">
                                    <input wire:model.live="otp" type="number" required />
                                    <label>Masukkan OTP *</label>
                                    <span class="focus-border"></span>
                                </div>
                                <div wire:ignore.self class="form-group">
                                    <input wire:model="password" type="{{ $showPass ? 'text' : 'password' }}" required />
                                    <label>Masukkan Password Baru *</label>
                                    <span class="focus-border"></span>
                                </div>
                                <div wire:ignore.self class="form-group">
                                    <input wire:model="re_password" type="{{ $showPass ? 'text' : 'password' }}" required />
                                    <label>Konfirmasi Password Baru *</label>
                                    <span class="focus-border"></span>
                                </div>
                                <div class="form-check text-end">
                                    <input wire:model.live="showPass" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Tampilkan sandi
                                    </label>
                                </div>
                            {{-- @else --}}
                            @endif
                            <span wire:loading.remove wire:target="sendOtp" class="text-danger mb-5">{{ $errMessage }}</span>
                            {{-- <div class="form-group">
                                <input wire:model="password" name="" type="password">
                                <label>Password *</label>
                                <span class="focus-border"></span>
                            </div> --}}

                            <div wire:loading.remove wire:target="sendOtp" class="text-center mt-5">
                                <button class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100 mb-3">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">{{ $isSuccess ? 'Perbarui Sandi' : 'Kirim OTP' }}</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                                <a href="{{ route('auth.login') }}" class="rbt-btn btn-md btn-border hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Login</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                            <div wire:loading wire:target="sendOtp" class="text-center w-100">
                                <div class="spinner-border text-primary my-3" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @include('components.footer')
</div>
