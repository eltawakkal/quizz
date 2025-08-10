<div>
    @include('components.navbar')
    <div class="rbt-elements-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row gy-5 row--30 justify-content-center">
                <div class="col-lg-6">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <h3 class="title">Login</h3>
                        <form wire:submit.prevent="login" class="max-width-auto">
                            <div wire:ignore class="form-group">
                                <input wire:model="email" name="con_name" type="email" required />
                                <label>email *</label>
                                <span class="focus-border"></span>
                            </div>
                            <div wire:ignore class="form-group">
                                <input wire:model="password" name="" type="password" required />
                                <label>Password *</label>
                                <span class="focus-border"></span>
                            </div>

                            @if ($isWrong)
                                <span wire:loading.remove class="text-danger">*Upss. Email atau sandi salah</span>
                            @endif

                            <div class="row mb--30">
                                <div class="col-lg-6">
                                    <div class="rbt-checkbox">
                                        <input type="checkbox" id="rememberme" name="rememberme">
                                        {{-- <label for="rememberme">Remember me</label> --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="rbt-lost-password text-end">
                                        <a class="rbt-btn-link" href="{{ route('auth.forgot') }}">Lupa sandi?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-submit-group">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100 mb-3">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Log In</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                                <a href="{{ route('auth.register') }}" class="rbt-btn btn-md btn-border hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Register</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
