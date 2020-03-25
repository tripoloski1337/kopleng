@extends('/layouts.kasir')
@section('title')
Print
@stop
@section('content')
<?php
function buatrp($angka)
{
	$jadi = "Rp " . number_format($angka,2,',','.');
	return $jadi;
}
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Kopleng printing system
                            </h2>
                        </div>
                        <div class="body">
                        	<div class="col-md-12">
                        		<div class="col-md-6">
                        			<button class="btn btn-block btn-primary" onclick="printDiv('printAble')">Print</button>
                        		</div>
                        		<div class="col-md-6">
                        			<a href="/" class="btn btn-block btn-danger">back</a>
                        		</div>
                        	</div>
							<div style="width: 300px;margin: 0 auto;">
								<div id="printAble">
									<div style="width: 300px;">
										<h1 style="text-align: center;">Kopleng cafe</h1>
										<hr>
										<table>
											<tr>
												<td>Pembelian:</td>
											</tr>
											<tr>
												<td></td>
												<td>nama item</td>
												<td>Qty</td>
												<td>Price</td>
											</tr>
											@foreach($data as $data)
											<tr>
												<td></td>
												<td>{{ $data->nama_item }}</td>
												<td>{{ $data->banyak_beli }}</td>
												<td>{{ buatrp($data->harga_item) }}</td>
											</tr>
											@endforeach
										</table>
										<hr>
										<?php if(!empty($pembayaran['kembalian'])){ ?>
										<table>
											<tr>
												<td>Uang bayar</td>
												<td>:&nbsp;{{ buatrp($pembayaran['uang_bayar']) }}</td>
											</tr>
											<tr>
												<td>Total bayar</td>
												<td>:&nbsp;{{ buatrp($pembayaran['total_pembayaran']) }}</td>
											</tr>
											<tr>
												<td>Kembalian</td>
												<td>:&nbsp;{{ buatrp($pembayaran['kembalian']) }}</td>
											</tr>
										</table>
										<?php }else{ ?>
										<table>
											<tr>
												<td>Uang bayar</td>
												<td>:&nbsp;{{ buatrp($pembayaran['uang_bayar']) }}</td>
											</tr>
											<tr>
												<td>Total bayar</td>
												<td>:&nbsp;{{ buatrp($pembayaran['total_pembayaran']) }}</td>
											</tr>
										</table>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
@stop