<div>
    <script>
        $(document).ready(function() {


            var element = $("#certfile"); // global variable
            var getCanvas; // global variable
            var newData;

            $("#printCerti").on('click', function() {
                html2canvas(element, {
                    allowTaint: true,
                    onrendered: function(canvas) {
                        getCanvas = canvas;
                        var imgageData = getCanvas.toDataURL("image/png");
                        var a = document.createElement("a");
                        a.href = imgageData; //Image Base64 Goes here
                        a.download = "{{ $testResult->user->name . '-' . $testResult->quiz->title . '.jpeg' }}"; //File name Here
                        a.click(); //Downloaded file
                    }
                });
            });


        });
    </script>

    <button class="btn" id="printCerti">
        <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
            <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
        </svg>

        <span class="text">Download hasil</span>
    </button>

    <div class="ktp-card" id="certfile">
        <img width="100%" src="{{ asset('assets/images/cerificate/cert_bg_atas.png') }}" alt="">
        <img width="100%" src="{{ asset('assets/images/cerificate/cert_bg_atas_dotted.png') }}" alt="">
        <img width="100%" src="{{ asset('assets/images/cerificate/cert_bg_icon_atas_kanan.png') }}" alt=""
            style="top: -75px; right: -93px;">
        <img class="tree-hr" src="{{ asset('assets/images/cerificate/pohon_treehr.png') }}" alt="">
        <img width="100%" src="{{ asset('assets/images/cerificate/cert_bg_pohon.png') }}" alt="">
        <img width="100%" src="{{ asset('assets/images/cerificate/cert_type.png') }}" alt="">
        <img width="100%" src="{{ asset('assets/images/cerificate/cert_nama.png') }}" alt="">
        <img width="100%" src="{{ asset('assets/images/cerificate/cert_bg_bawah_kiri.png') }}" alt="">
        {{-- <img width="100%" src="{{ asset('assets/images/cerificate/' . $testResult->type . '.png') }}" alt=""> --}}
        <div class="type-text">
            <p>TREE HR PERSONALITY<br>YOUR TYPE : {{ $testResult->type ?? '-' }}</p>
        </div>
        <div class="name-text">
            <table>
              <tr>
                <td>Nama</td>
                <td>: {{ Str::title($testResult->user->name ?? '-') }}</td>
              </tr>
              <tr>
                <td>No</td>
                <td>: {{ $testResult->no ?? '-' }}</td>
              </tr>
            </table>
        </div>
        <div class="result-text">
          <table>
            <tr>
              <td style="width: 9em">Energi</td>
              <td>:</td>
              <td>{{ $certDetail->energi ?? '-' }} KAJSDFJSDKF ASDFLKJASD;JSD; ALUDHFUSAHDHF ALUSDHFUSADFU AKSDJSD</td>
            </tr>
            <tr>
              <td>Tempramen</td>
              <td>:</td>
              <td>{{ $certDetail->tempramen ?? '-' }}</td>
            </tr>
            <tr>
              <td>Pola Pikir</td>
              <td>:</td>
              <td>{{ $certDetail->pola_pikir ?? '-' }}</td>
            </tr>
            <tr>
              <td>Gaya Mengajar</td>
              @php
                  $anu = $testResult->teaching_type;
                  $initials = implode('', array_map(function($word) {
                      return strtoupper($word[0]);
                  }, explode(' ', $anu)));
              @endphp
              <td>:</td>
              <td>{{ $testResult->teaching_type ?? '-' }}  ({{ $initials }})</td>
            </tr>
          </table>
        </div>
        <div class="left-side">

          <div class="section-title gaya-kerja">
            PROFIL DIRI
          </div>

          <div class="energi-kepribadian">
            {!! $certDetail->description ?? '-' !!}
            <span class="bold-text">Gaya Mengajar</span>
            <ul>
              {!! $testResult->teaching_type_desc !!}
            </ul>
          </div>

          <div class="karakteristik section-title">
            KARAKTERISTIK UMUM {{ $testResult->type }}
          </div>

          <div class="table-aspek">
            <table class="tb">
              <thead>
                  <tr>
                      <th>Aspek</th>
                      <th>Deskripsi</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Gaya Komunikasi</td>
                    <td>{{ $certDetail->gaya_komunikasi ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pendekatan Mengajar</td>
                    <td>{{ $certDetail->gaya_pendekatan_mengajar ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Interaksi Sosial</td>
                    <td>{{ $certDetail->intruksi_sosial ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pengambilan Keputusan</td>
                    <td>{{ $certDetail->pengambilan_keputusan ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Manajemen Konflik</td>
                    <td>{{ $certDetail->manajemen_konflik ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kelebihan</td>
                    <td>{{ $certDetail->kelebihan ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Potensi Tantangan</td>
                    <td>{{ $certDetail->potensi_tantangn ?? '-' }}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="potensi-kekuatan section-title">
            POTENSI KEKUATAN & AREA PERLU PENGEMBANGAN
          </div>

          <div class="table-potensi">
            <table class="tb">
              <thead>
                  <tr>
                      <th>Potensi Kekuatan</th>
                      <th>Area Perlu Diwaspadai</th>
                  </tr>
              </thead>
              <tbody>
                @if (isset($certDetail->potensi))
                  @foreach ($certDetail->potensi as $item)
                    <tr>
                      <td>{{ $item['potensi_kekuatan'] }}</td>
                      <td>{{ $item['perlu_diwaspadai'] }}</td>
                    </tr>    
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>

        </div>

        <div class="right-side">
          
          <div class="section-title gaya-kerja">
            GAYA KERJA & GAYA MENGAJAR {{ $testResult->type }}
          </div>

          <div class="table-dimensi">
            <table class="tb">
              <thead>
                  <tr>
                      <th>Dimensi</th>
                      <th colspan="2">Gaya {{ $testResult->type }}</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Membuka Kelas</td>
                      <td colspan="2">{{ $certDetail->membuka_kelas ?? '-' }}</td>
                  </tr>
                  <tr>
                      <td>Penyampaian Materi</td>
                      <td colspan="2">{{ $certDetail->penyampaian_materi ?? '-' }}</td>
                  </tr>
                  <tr>
                      <td>Pengelolaan Kelas</td>
                      <td colspan="2">{{ $certDetail->pengelolaan_kelas ?? '-' }}</td>
                  </tr>
                  <tr>
                      <td>Kerja Tim/Kampus/Sekolah</td>
                      <td colspan="2">{{ $certDetail->kerja_tim ?? '-' }}</td>
                  </tr>
                  <tr>
                      <td>Menghadapi Siswa Pasif</td>
                      <td colspan="2">{{ $certDetail->penghadapi_siswa ?? '-' }}</td>
                  </tr>
                  <tr>
                      <td>Gaya Mengajar {{ $testResult->teaching_type ?? '-' }}</td>
                      <td colspan="2">
                          {!! $testResult->teaching_type_dimension !!}
                      </td>
                  </tr>
              </tbody>
            </table>
          </div>

          <div class="ttd-container">
            <p>
            Penelitian Hibah Bima 2025<br>
            <strong>Dr. Amir Tengku Ramly, M.Si. CIPA</strong>
            <br>
            Ketua/Perancang Tree HR Personality
            </p>
            <img class="signature" src="{{ asset('assets/images/cerificate/cert_ttd.jpeg') }}" alt="">
          </div>

        </div>

        <div class="domain-text">
          treehr-research.org
        </div>
    </div>
</div>
