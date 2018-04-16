<!-- sidebar: style can be found in sidebar.less -->
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left info" style="margin-left: -45px">
      <h4>{{ Auth::user()->nama}}</h4>
      <a href="#"><i class="fa fa-circle text-success"></i> Online - {{ Auth::user()->hak_akses }} </a>
    </div>
    <br><br><br>
  </div>
  <!-- search form -->

  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-edit"></i> <span>Kelola Data Item</span>
        <span class="label label-primary pull-right">5</span>
        <span class="pull-right-container" style="margin-left: 10px; position:relative">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('index.pengarang')}}"><i class="fa fa-circle-o text-blue"></i> Pengarang</a></li>
        <li><a href="{{ route('index.penerbit')}}"><i class="fa fa-circle-o text-blue"></i> Penerbit</a></li>

        <!-- //item -->
        <li class="treeview">
              <a href="#"><i class="fa fa-share text-green"></i> Item
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>

              <ul class="treeview-menu">
                <li><a href="{{ route('jenis.index')}}"><i class="fa fa-circle-o text-green"></i> Jenis Item</a></li>
                <li><a href="{{ route('klasifikasi.index')}}"><i class="fa fa-circle-o text-green"></i> Klasifikasi</a></li>
                <!-- <li><a href="{{ route('kategori.index')}}"><i class="fa fa-circle-o text-green"></i> Kategori</a></li> -->
                <li><a href="{{ route('label_rak.index')}}"><i class="fa fa-circle-o text-green"></i> Label Rak</a></li>
                <li><a href="{{ route('item.index')}}"><i class="fa fa-circle-o text-green"></i> item</a></li>
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li> -->
                <!-- <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li> -->
              </ul>
        </li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-user"></i> <span>Kelola Anggota</span>
        <span class="label label-primary pull-right">2</span>
        <span class="pull-right-container" style="margin-left: 10px; position:relative">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="treeview">
              <a href="#"><i class="fa fa-share"></i> More
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('rayon.index')}}"><i class="fa fa-circle-o"></i> Rayon</a></li>
                <li><a href="{{ route('rombel.index')}}"><i class="fa fa-circle-o"></i> Rombel</a></li>
                <li><a href="{{ route('status.index')}}"><i class="fa fa-circle-o"></i> Status</a></li>
              </ul>
        </li>
        <li><a href="{{ route('anggota.index')}}"><i class="fa fa-circle-o"></i> Anggota</a></li>
      </ul>
    </li>

    <!-- <li class="header">LABELS</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
  </ul>
</section>
        <!-- /.sidebar -->
