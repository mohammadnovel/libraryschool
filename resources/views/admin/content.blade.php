<!-- Main content -->
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-aqua" >
        <span class="info-box-icon"><i class="fa fa-bookmark-o" style="margin-top: 20px"></i></span>
  
        <div class="info-box-content">
          <span class="info-box-text">Item</span>
          <span class="info-box-number">{{ count($item) }}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                Jenis Item Barang
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-cart-plus" style="margin-top: 20px"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Masuk</span>
          <span class="info-box-number">{{ $x }}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                Data Jumlah Barang 
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>


    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa  fa-arrow-circle-up" style="margin-top: 20px"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Keluar</span>
          <span class="info-box-number">{{ count($pinjam) }}</span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                Data Barang Dipinjam
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-cart-arrow-down" style="margin-top:20px"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Tersedia </span>
          <span class="info-box-number">{{  $x - count($pinjam) }}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                Jumlah Barang Tersedia
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
