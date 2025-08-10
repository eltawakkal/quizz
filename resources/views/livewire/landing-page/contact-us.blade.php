<div>
    <div wire:ignore>
        @include('components.navbar')
    </div>
    <div class="rbt-conatct-area bg-gradient-11 rbt-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb--60">
                        <span class="subtitle bg-secondary-opacity">Kerja Sama</span>
                        <h2 class="title">Hubungi Kami Untuk Seputar Informasi Detail Kerja Sama</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-contact-address">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <div class="section-title text-start">
                            <span class="subtitle bg-primary-opacity">Form Kontak</span>
                        </div>
                        <h3 class="title">Isi Pesan Anda</h3>
                        <form id="contact-form" method="POST" action="mail.php" class="rainbow-dynamic-form max-width-auto">
                            <div wire:ignore.self class="form-group">
                                <input wire:model.live="name" name="contact-name" id="contact-name" type="text">
                                <label>Nama</label>
                                <span class="focus-border"></span>
                            </div>
                            <div wire:ignore.self class="form-group">
                                <input wire:model.live="position" name="contact-phone" type="email">
                                <label>Jabatan</label>
                                <span class="focus-border"></span>
                            </div>
                            <div wire:ignore.self class="form-group">
                                <input wire:model.live="instantion" type="text" id="subject" name="subject">
                                <label>Instansi</label>
                                <span class="focus-border"></span>
                            </div>
                            <div wire:ignore.self class="form-group">
                                <textarea wire:model.live="message" name="contact-message" id="contact-message"></textarea>
                                <label>Isi Pesan</label>
                                <span class="focus-border"></span>
                            </div>
                            <div class="form-submit-group">
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=6281316005530&text=Nama: *{{ $name }}*%20%0AJabatan: *{{ $position }}*%20%0AInstansi: *{{ $instantion }}*%20%0A%20%0A*{{ $message }}*%20%0A%20%0A%20%0A%20%0A> via treehr-research.org" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Kirim Pesan Sekarang</span>
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

    @include('components.footer')
</div>
