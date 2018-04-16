    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Item</h3>
              <div class="box-tools pull-left">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->

            <div class="box-body">

              <a href="{{ route('item.input')}}"> <button style="margin-bottom: 10px" type="button" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Data
              </button></a>
              <br>

              <table id="table" class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Jenis Item</th>
                    <th>Klasifikasi</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>view</th>
                    <th>aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($item as $r)
                  <tr>
                    <td>{{ $r->kd_item}}</td>
                    <td>{{ $r->jenis_item->jenis_item}}</td>
                    <td>{{ $r->klasifikasi->klasifikasi}}</td>
                    <td>{{ $r->judul_item}}</td>
                    <td>{{ $r->pengarang}}</td>
                    <td>{{ $r->penerbit}}</td>
                    <td><img src="{{ asset('storage/' . $r->foto)}}" alt="" style="width: 100px;overflow: hidden"></td>
                    <td colspan="2">

                      <form action="{{ route('item.hapus', $r->kd_item)}}" method="post">
                        {{ csrf_field()}}
                        {{ method_field('DELETE')}}

                        <a href="{{ route('item.edit', $r->kd_item)}}"><button type="button" class="btn btn-flat btn-primary" name="button"><i class="fa fa-edit"></i> </button></a>
                        <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                      </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->

          </div><!-- /.box -->
