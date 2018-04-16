    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Anggota</h3>
              <div class="box-tools pull-left">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->

            <div class="box-body table-responsive">

              <a href="{{ route('anggota.input')}}"> <button style="margin-bottom: 10px" type="button" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Data
              </button></a>
              <br>


              <table id="table" class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kecamatan</th>
                    <th>No Telepon</th>
                    <th>Rayon</th>
                    <th>Rombel</th>
                    {{-- <th>Kelas</th> --}}
                    <th>foto</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($anggota as $r)
                  <tr>
                    <td>{{ $r->kd_anggota}}</td>
                    <td>{{ $r->nama}}</td>
                    <td>{{ $r->kec}}</td>
                    <td>{{ $r->no_telepon}}</td>
                    <td>{{ $r->rayon }}</td>
                    <td>{{ $r->rombel . ' - ' . $r->kelas}}</td>
                    {{-- <td>{{ $r->kelas}}</td> --}}
                    <td><img src="{{ asset('storage/' . $r->foto)}}" alt="" style="width: 100px;overflow: hidden"></td>
                    <td colspan="2">

                      <form action="{{ route('anggota.hapus', $r->kd_anggota)}}" method="post">
                        {{ csrf_field()}}
                        {{ method_field('DELETE')}}


                        <a href="{{ route('anggota.edit', $r->kd_anggota)}}"><button type="button" class="btn btn-flat btn-primary" name="button"><i class="fa fa-edit"></i> </button></a>
                        <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                      </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->

          </div><!-- /.box -->

          {{-- <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"></h3>
              </div>
              <div class="panel-body">
                <div class="container text-center" style="border: 1px solid #a1a1a1;padding: 15px;width: 70%;">
                  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('11', 'C128A')}}" alt="barcode" />

                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('11', 'C39')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('12', 'C39+')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('13', 'C39E')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('14', 'C39E+')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('15', 'C93')}}" alt="barcode" />
                	<br/>
                	<br/>
                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('19', 'S25')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('20', 'S25+')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('21', 'I25')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('22', 'MSI+')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('23', 'POSTNET')}}" alt="barcode" />
                	<br/>
                	<br/>
                	<img src="data:image/png;base64,{{DNS2D::getBarcodePNG('16', 'QRCODE')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS2D::getBarcodePNG('17', 'PDF417')}}" alt="barcode" />
                	<img src="data:image/png;base64,{{DNS2D::getBarcodePNG('18', 'DATAMATRIX')}}" alt="barcode" />
                </div>
              </div>
              <div class="panel-footer">

              </div>
            </div>
          </div> --}}
