<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class MikroTikController extends Controller
{
	public function generateUpgradeXml($version, $arch, $extrapackage = NULL) {
		if ($arch == "powerpc") {
			$shortarch = "ppc";
		} else {
			$shortarch = $arch;
		}
		return response()->view('generate-upgrade-xml', [ 'version' => $version, 'arch' => $arch, 'shortarch' => $shortarch, 'extrapackage' => $extrapackage ])->header('Content-type', 'text/xml');
	}

	public function generateRsc(Request $request, $serial) {
		$device = \App\Device::where('serial', $serial)->first();
	        return response()->view('generate-rsc', [ 'device' => $device ])->header('Content-type', 'text/plain');
	}

        public function alterRsc($serial) {
                $device = \App\Device::where('serial', $serial)->first();
                return response()->view('alter-rsc', [ 'device' => $device ])->header('Content-type', 'text/plain');
        }
}

