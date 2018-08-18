<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\carts;
use Illuminate\Support\Facades\Log;
use App\orders;
use App\OrderProducts;

class Edi extends Controller
{
    public static function generateEdiFile($orderNumber){
$host     = env('EDI_HOST', 'null');
$port     = env('EDI_PORT', 22);
$path     = env('EDI_UPLOAD_PATH', '/');
$username = env('EDI_USERNAME', 'admin');
$password = env('EDI_PASSWORD', 'admin');
$i = 0;
$order = orders::where('orderNumber',$orderNumber)->get()->first();
$products = OrderProducts::where('orderNumber',$orderNumber)->get();
$name = $order->name;
$tax = "TXI*CG*".$order->tax."~";
$where  = "*";
if($order->address_2 != null || $order->address_2 != "null"){
$where  = "*".$order->address_2;
}
$shipping = "N3*".$order->address.$where."~N4*".$order->city."*".$order->state."*".$order->zip."*US~PER*BD**TE*".$order->phoneNumber."~";

$filename = 'JASEMP_'.$orderNumber.'.txt';
$textOutput = "ISA*00*          *00*          *ZZ*JASCOEMP       *01*082567025      *".date("ymd")."*".date("hi")."*U*00501*000000001*0*P*>~GS*PO*JASCOEMP*082567025*".date("ymd")."*".date("his")."*00001*X*005010~ST*850*".$orderNumber."~BEG*00*SA*".$orderNumber."**".date("Ymd")."~TD5*****P/U~N1*ST*".$name."~".$shipping;
foreach($products as $cp){
$i++;
$textOutput = $textOutput."PO1*".$i."*".$cp->quantity."*EA*".$cp->price."**VN*".$cp->product_Id."~";
}
$textOutput = $textOutput.$tax;
$c= $i+10;
$textOutput = $textOutput."CTT*".$i."~SE*".$c."*".$orderNumber."~ GE*1*00001~IEA*1*000000001~";

try {
    if (!ssh2_connect($host, $port)) {
    	Log::info("Failed to open connection to $host.\n");
       return 0;
    }
    $sshConnection = ssh2_connect($host, $port);
    ssh2_auth_password($sshConnection, $username, $password);
    $sftp = ssh2_sftp($sshConnection);
    $sftpStream = @fopen("ssh2.sftp://".intval($sftp) . $path . $filename, 'w');
} catch(Exception $e) {
	Log::info("Failed to open SFTP connection to $host: " . $e->getMessage() . "\n");
    return 0;
}
if (!$sftpStream) {Log::info("Failed to open stream to $host\n"); die(0); }
try {
    $writeResult = @fwrite($sftpStream, $textOutput);
} catch(Exception $e) {
	Log::info("Failed to write $path/$filename to $host: " . $e->getMessage() . "\n");
	return 0;
}
if ($writeResult === false) {
Log::info("Failed to write $path/$filename to $host\n");
return 0;
}
fclose($sftpStream);
orders::where('orderNumber',$orderNumber)->update(['ediStatus' => 1]); 
}

}
