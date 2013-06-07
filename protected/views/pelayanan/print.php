<style>
.print{visibility: hidden;  width: 300px;
  z-index: 9999;
  margin-top: 0px;
  position: absolute;
  top:0;
  left:0;}

@media print {
h1.h1p{font-size:14px; text-align: center; line-height: 1}
.print{font-size: 10px;width: 300px;font-family:Consolas;color: black;line-height: 1;margin-left: 20px;}
.lprint{width: 148px;float: left;margin-bottom: 10px;}
.rprint{width: 148px;float: left;margin-bottom: 10px;}
.lprint ul li,.rprint ul li{margin-bottom: -10px;}
.c1p{width: 80px;float: left;}
.c2p{width: 20px;float: left;}
.c3p{width: 200px;float: left;}
.cls{clear: both;}
hr { height: 0; border-style: dashed; border-width: 1px 0 0 0; border-color:black; }
.container, #footer{visibility: hidden;}

.print{visibility: visible;
  width: 300px;
  z-index: 9999;
  margin-top: 0px;
  position: absolute;
  top:0;
  left:0;}
html, body {
    /*changing width to 100% causes huge overflow and wrap*/
    height:100%; 
    overflow: hidden;
    background: #FFF; 
    font-size: 9.5pt;
  }
}
</style>

<div class="print Section1">
<div class="cprint">
<h1 class="h1p">CV. MEDIA COMPUTER</h1>

<div class="lprint">
<ul>
<li>Penjualan Computer</li>
<li>Penjulan Laptop/Notebook</li>
<li>Service Computer</li>
</ul>
</div>
<div class="rprint">
<ul>
<li>Jual/Beli Computer</li>
<li>Accessories</li>
<li>Pemasangan Network</li>
</ul>
</div>
<div class="cls"></div>
<span>Office :</span>
Jl. Setiabudi No.4 Telp.(0321)868757 Jombang
<hr/>
<h1 class="h1p">Bukti Pembayaran</h1>
<hr/>
Tanggal <?php echo date('d-m-Y');?>
<hr/>
<div class="c1p">No. Nota </div><div class="c2p">:</div><div class="c3p"><?php echo $p2->id; ?></div>
<div class="cls"></div>
<div class="c1p">Nama </div><div class="c2p">:</div><div class="c3p"><?php echo $p1->nama; ?></div>
<div class="cls"></div>
<div class="c1p">Alamat </div><div class="c2p">:</div><div class="c3p"><?php echo $p1->alamat; ?></div>
<div class="cls"></div>
<div class="c1p">Telp </div><div class="c2p">:</div><div class="c3p"><?php echo $p1->notelp?></div>
<hr/>
<div class="c1p">Jenis Barang </div><div class="c2p">:</div><div class="c3p"><?php echo $p2->jenis_barang?></div>
<div class="cls"></div>
<div class="c1p">Type Merek </div><div class="c2p">:</div><div class="c3p"><?php echo $p2->type_merek?></div>
<div class="cls"></div>
<div class="c1p">SN </div><div class="c2p">:</div><div class="c3p"><?php echo $p2->sn?></div>
<div class="cls"></div>
<div class="c1p">Kelengkapan </div><div class="c2p">:</div><div class="c3p"><?php echo $p2->kelengkapan?></div>
<div class="cls"></div>
<div class="c1p">Kerusakan </div><div class="c2p">:</div><div class="c3p"><?php echo $p2->kerusakan?></div>
<div class="cls"></div>

<hr/>
<table>
<tbody>
<?php 
$ix=1;
foreach ($bs as $v) {
	echo '<tr><td>'.$ix.'</td><td>'.$v->barang->nama.'@'.$v->barang->harga.'</td><td>'.$v->jumlah.'</td><td>'.$v->total.'</td></tr>';$ix++;
}
?>
<tr>
<td></td><td>Biaya Service</td><td><?php echo $p2->biaya;?></td>
</tr>
<tr>
<td></td><td>Total</td><td><?php echo $t;?></td>
</tr>
</tbody>
</table>
</div>
<div class="print">

</div>
</div>

<?php 
$print='
		$.hapusprint=function(e){
			$(".print").html("");
		}
		$.printq=function(e){
			console.log("print");
			window.print();
			//$(".print").html("");
			window.setTimeout($.hapusprint, 10000);
			//$(".print").css("visibility","hidde");

		};
		$.printq();
		';
Yii::app()->clientScript->registerScript('print', $print);
?>