@extends('layout.app')

@section('content')
<div class="alumni">
    <div class="alumni-title">
        <h1>Tracer Study Universitas Tarumanagara</h1>
    </div>
    <div class="alumni-left">
        <form action="/tracer-study/pekerjaan/store/{id}" method="post">
            @csrf
            <input type="text" class="form-control" name="id_alumni" value="{{ request()->route('id')}}" hidden>

            <div class="form-group">
                <label for="">Pekerjaan</label>
                <select class="form-control" name="id_jabatan" id="id_jabatan">
                <option>Pekerjaan</option>
                @foreach ($jabatan as $item)
                <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                @endforeach
                </select>
                <small id="helpId"> <button type="button" class="btn"
                    data-toggle="modal" data-target="#pekerjaaninput">Tidak menemukan Pekerjaan?</button>
                </small>
            </div>

            <div class="form-group">
                <label for="">Perusahaan</label>
                <select class="form-control" name="id_perusahaan" id="id_perusahaan">
                    <option>Perusahaan</option>
                    @foreach ($perusahaan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_perusahaan }}</option>
                    @endforeach
                </select>
                <small id="helpId"> <button type="button" class="btn"
                    data-toggle="modal" data-target="#perusahaaninput">Tidak menemukan Perusahaan?</button>
                </small>
            </div>

            <div class="form-group">
                <button type="submit" class="button-red">Selanjutnya</button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="pekerjaaninput" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('jabatan.storealumni')}}" method="post">
                      @csrf
                      <div class="form-group">
                          <label for="nama_jabatan">Nama Pekerjaan</label>
                          <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" aria-describedby="helpId">
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="button-red">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="perusahaaninput" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('perusahaan.storealumni')}}" method="post">
                      @csrf

                      <div class="form-group">
                          <label for="nama">Nama Perusahaan</label>
                          <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" aria-describedby="helpId" required>
                      </div>

                        <div class="form-group">
                            <label for="alamat">Alamat Perusahaan</label>
                            <input type="text" id="address-input" name="alamat_perusahaan" class="form-control map-input" required>
                            <input type="hidden" name="latitude" id="address-latitude" value="-6.2295712" />
                            <input type="hidden" name="longitude" id="address-longitude" value="106.7594779" />
                        </div>

                        <div id="address-map-container" style="width:100%;height:200px; ">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        </div>

                      <div class="form-group">
                          <label for="kontak_perusahaan">Kontak Perusahaan</label>
                          <input type="text" class="form-control" name="kontak_perusahaan" id="kontak_perusahaan" aria-describedby="helpId" required>
                      </div>

                      <div class="form-group">
                          <label for="id_sektor">Sektor Perusahaan</label>
                          <select class="form-control" name="id_sektor" id="id_sektor">
                              @foreach ($sektor as $item)
                              <option value="{{ $item->id }}">{{ $item->nama_sektor }}</option>
                              @endforeach
                          </select>

                          <small id="helpId"> <button type="button" class="btn" data-toggle="modal" data-target="#sektorInput">
                            Tidak menemukan sektor perusahaan?
                          </button></button>
                        </small>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="button-red">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="sektorInput" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Masukkan Data Sektor Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sektor.storeAlumni') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Sektor Perusahaan</label>
                            <input type="text" class="form-control" name="nama_sektor" id="nama_sektor">
                        </div>

                        <button type="submit" class="button-red">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="alumni-right">
        <h4>Selamat Datang di Laman Tracer Study Universitas Tarumanagara</h3>
        <p>Tracer Study adalah Fasilitas untuk menjaring informasi atau masukkan dari Alumni Universitas Tarumanagara sebagai salah satu dasar yang sangat penting bagi evaluasi dan pengembangan Universitas Tarumanagara. Adapun data yang Anda berikan bersifat rahasia dan hanya akan dipergunakan untuk pengembangan Universitas Tarumanagara.</p>
    </div>
</div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $(document).on('show.bs.modal', '.modal', function () {
                var zIndex = 1040 + (10 * $('.modal:visible').length);
                $(this).css('z-index', zIndex);
                setTimeout(function() {
                    $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                }, 0);
            });
        });
    </script>

    @parent
    <script src="/js/mapInput.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo9D3Po2G2-v6glNuomZixg_TOnkaBT4U&libraries=places&callback=initialize" async defer></script>


@stop

