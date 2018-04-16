@extends('admin.dashboard')


@section('content')

<section class="content-header">
  <h1>
    <h>Transaksi</h>
    <small>Pengembalian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Transaksi</a></li>
    <li class="active">Pengembalian</li>
  </ol>
</section>

<div class="content">
	<div class="row">
    
    <div class="col-md-5">
      
      <div class="box box-bordered box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Pengembalian</h3>
          <div class="box-tools pull-left">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->

        <div class="box-body">
              <form action="" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                  <label class="control-label col-md-3">NIS:</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="input_nis">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" style="margin-top: -10px">Barcode Kode:</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="input_barcode">
                  </div>
                </div>
                
              </form>
        </div><!-- /.box-body -->

      </div><!-- /.box -->
    </div>
    
    <div class="col-md-7">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data</h3>
          <div class="box-tools pull-left">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->

        <div class="box-body">
          <table class="table table-condensed" id="table">
            <thead>
              <th>Judul</th>
              <th>Barcode ID</th>
              <th>Peminjam</th>
              <th>Tanggal Pinjam</th>
              <th>Aksi</th>
            </thead>
            <tbody id="load"></tbody>
          </table>
        </div><!-- /.box-body -->

      </div><!-- /.box -->
    </div>

  </div>
</div>

@endsection
