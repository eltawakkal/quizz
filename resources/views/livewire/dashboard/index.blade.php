<div>
    <div wire:ignore>
        @include('components.navbar')
    </div>
    <div class="rbt-page-banner-wrapper">
    <!-- Start Banner BG Image  -->
    <div class="rbt-banner-image"></div>
    <!-- End Banner BG Image  -->
    </div>
    <!-- Start Card Style -->
    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Start Dashboard Top  -->
                    <div class="rbt-dashboard-content-wrapper">
                        <div class="tutor-bg-photo bg_image bg_image--23 height-350">
                            <img src="{{ asset('assets/images/custom/bg_user.png') }}" alt="">
                        </div>
                        <!-- Start Tutor Information  -->
                        <div class="rbt-tutor-information">
                            <div class="rbt-tutor-information-left">
                                <div class="thumbnail rbt-avatars size-lg">
                                    <img src="http://127.0.0.1:8001/assets/images/team/avatar-2.jpg" alt="Instructor">
                                </div>
                                <div class="tutor-content">
                                    <h5 class="title">{{ Str::upper($user->name) }}</h5>
                                    <ul class="rbt-meta rbt-meta-white mt--5">
                                        <li><i class="feather-mail"></i>{{ $user->email }}</li>
                                        <li><i class="feather-phone"></i>{{ $user->phone_number }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Tutor Information  -->
                    </div>
                    <!-- End Dashboard Top  -->

                    <div class="row g-5">
                        <div class="col-lg-3">
                            <!-- Start Dashboard Sidebar  -->
                            <div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                                <div class="inner">
                                    <div class="content-item-content">

                                        <div class="rbt-default-sidebar-wrapper">
                                            <div class="section-title mb--20">
                                                <h6 class="rbt-title-style-2">Selamat Datang, {{ explode(' ', $user->name)[0] }}!</h6>
                                            </div>
                                            <nav class="mainmenu-nav">
                                                <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                                    {{-- <li><a wire:click="setMenu(0)" href="#"><i class="feather-home"></i><span>Dashboard</span></a></li> --}}
                                                    <li><a wire:click="setMenu(0)" href="#"><i class="feather-book-open"></i><span>Hasil Tes</span></a></li>
                                                    <li><a wire:click="setMenu(1)" href="#"><i class="feather-user"></i><span>Profilku</span></a></li>
                                                </ul>
                                            </nav>

                                            <div class="section-title mt--40 mb--20">
                                                <h6 class="rbt-title-style-2">Menu</h6>
                                            </div>

                                            <nav class="mainmenu-nav">
                                                <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                                    {{-- <li><a href="http://127.0.0.1:8001/dashboard/student-dashboard/student-settings"><i class="feather-settings"></i><span>Settings</span></a></li> --}}
                                                    <li><a wire:click="logout" href="#"><i class="feather-log-out"></i><span>Logout</span></a></li>
                                                </ul>
                                            </nav>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End Dashboard Sidebar  -->
                        </div>

                        @if ($menu == 0)
                            <div wire:ignore class="col-lg-9">
                                <!-- Start Enrole Course  -->
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                                    <div class="content">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">Hasil Tes</h4>
                                        </div>

                                        <div class="rbt-dashboard-table table-responsive mobile-table-750 mt--30">
                                            <table class="rbt-table table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>Personality Test</th>
                                                        <th>tangal</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($testResult as $item)
                                                        <tr>
                                                            <th>
                                                                <span class="h6 mb--5">{{ $item->quiz->title ?? '' }}</span>
                                                            </th>
                                                            <td>
                                                                <p class="b3">{{ $item->created_at->format('d M Y') }}</p>
                                                            </td>
                                                            {{-- <td>
                                                                <span
                                                                    class="rbt-badge-5 bg-color-success-opacity color-success">Pass</span>
                                                            </td> --}}
                                                            <td>
                                                                <div class="rbt-button-group justify-content-end">
                                                                    <a class="rbt-btn btn-xs bg-primary-opacity radius-round" target="_blank" href="{{ route('course.final-result', Crypt::encryptString($item->id)) }}" title="Edit"><i
                                                                            class="feather-book pl--0"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Enrole Course  -->
                            </div>
                        @endif

                        @if ($menu == 1)
                            <div wire:ignore.self class="col-lg-9">
                                <!-- Start Enrole Course  -->
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                                    <div class="content">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">Profil
                                            </h4>
                                            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'editButton' }}" class="max-width-auto">
                                                <div class="rbt-card-body row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Nama Lengkap</label>
                                                        <input wire:model="name" class="{{ $isEdit ? '' : 'disabled' }}" type="text" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Instansi</label>
                                                        <input wire:model="instantion" class="{{ $isEdit ? '' : 'disabled' }}" type="text" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Jabatan</label>
                                                        <select wire:model="position" class="{{ $isEdit ? '' : 'disabled' }}" name="" id="" required>
                                                            <option value="Guru">Guru</option>
                                                            <option value="Dosen">Dosen</option>
                                                            <option value="Dosen">Pendidik Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Jenis Kelamin</label>
                                                        <select wire:model="genderId" wire:model="position" class="w-100 {{ $isEdit ? '' : 'disabled' }}" id="field-4" required>
                                                            <option value="1">Laki-laki</option>
                                                            <option value="2">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="rbt-card-footer mt-5">
                                                <button type="submit" class="rbt-btn">{{ $isEdit ? 'Simpan' : 'Ubah' }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Enrole Course  -->
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->

    @include('components.footer')
</div>
