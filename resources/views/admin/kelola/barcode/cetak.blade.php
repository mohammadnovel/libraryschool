@include('layouts.temp')

<html>
	<head>
		<meta charset="UTF-8">
		<title>Barcode</title>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	</head>
	<style>

	</style>
	<body onload="window.print()">
	{{-- <body> --}}

		<article class="item">

		<?php
		$column_count = 0;
		foreach($tampil as $r) {
		    $column_count++;
		  ?>
		    <div class="instagram_item" style="border: 1px solid black; padding: 6; width:160px; height:105px; text-align:center; display:inline-block; margin:0 10px 10px 0;">
			<img src="data:image/png;base64,{{DNS1D::getBarcodePNG($r->barcode_kode, "CODE11", 1.3,65, true)}}" alt="barcode" />
					<h6>{{ $r->barcode_kode . ' - ' . $r->judul }}</h6>
		    </div>
			<?php
		    if ($column_count == 8) {
		        $column_count = 0;
		        echo '<br>';
		    }
		}
		?>

		</article>
	</body>

@include('sweet::alert')
</html>