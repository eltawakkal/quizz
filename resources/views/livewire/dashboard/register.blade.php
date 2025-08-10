<div>
    @include('components.navbar')
    <div class="rbt-elements-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row gy-5 row--30 justify-content-center">
                {{-- <div class="col-lg-6">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <h3 class="title">Login</h3>
                        <form class="max-width-auto">
                            <div class="form-group">
                                <input name="con_name" type="text" />
                                <label>Username or email *</label>
                                <span class="focus-border"></span>
                            </div>
                            <div class="form-group">
                                <input name="con_email" type="email">
                                <label>Password *</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="row mb--30">
                                <div class="col-lg-6">
                                    <div class="rbt-checkbox">
                                        <input type="checkbox" id="rememberme" name="rememberme">
                                        <label for="rememberme">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="rbt-lost-password text-end">
                                        <a class="rbt-btn-link" href="#">Lost your password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-submit-group">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Log In</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <div class="col-lg-6">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <h3 class="title">Registrasi Pengguna</h3>
                        <form wire:submit.prevent="store" class="max-width-auto">
                            <div wire:ignore class="form-group">
                                <input wire:model="name" name="register-email" type="text" required />
                                <label>Nama Lengkap</label>
                                <span class="focus-border"></span>
                            </div>

                            <div wire:ignore class="rbt-modern-select bg-transparent height-45 mb--10">
                                <select wire:model="genderId" class="w-100" id="field-4">
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>

                            <div wire:ignore class="rbt-modern-select bg-transparent height-45 mb--10">
                                <select wire:model="position" class="w-100" id="field-4">
                                    <option value="Guru">Guru</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="Dosen">Pendidik Lainnya</option>
                                </select>
                            </div>

                            <div wire:ignore class="form-group">
                                <input wire:model="instantion" name="register_user" type="text" required>
                                <label>Instansi</label>
                                <span class="focus-border"></span>
                            </div>

                            <div wire:ignore class="form-group">
                                <input wire:model="email" name="register_user" type="email" required>
                                <label>Email</label>
                                <span class="focus-border"></span>
                            </div>

                            <div wire:ignore class="form-group">
                                <input wire:model="password" name="register_password" type="password" required>
                                <label>Password</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="text-danger mb-5 text-sm">@error('password') {{ $message }} @enderror</div>

                            <div wire:ignore class="form-group">
                                <input wire:model="phone" name="register_conpassword" type="number" required>
                                <label>No. HP</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="row mb--30">
                                <div class="col-lg-6">
                                    <div class="rbt-checkbox">
                                        <input type="checkbox" id="rememberme" name="rememberme">
                                        {{-- <label for="rememberme">Remember me</label> --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="rbt-lost-password text-end">
                                        <a class="rbt-btn-link" href="{{ route('auth.login') }}">Sudah punya akun? Login disini</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <input id="cat-list" type="checkbox" name="cat-list" required>
                                <label for="cat-list">Saya Setuju Dengan <a class="text-primary" target="_blank" href="{{ route('landing-page.term-and-condition') }}">Syarat & Ketentuan</a></label>
                            </div>

                            <div class="form-submit-group">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Register</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
