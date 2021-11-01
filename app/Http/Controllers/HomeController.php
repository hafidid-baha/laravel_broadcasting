<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class HomeController extends Controller
{
    public function index()
    {
        $hash = $this->createHashCode();
        $code = QrCode::size(100)->generate($hash);
        Subscriber::create([
            'hash' => $hash,
            'available' => 0
        ]);
        return View("home", compact('hash', 'code'));
    }

    private function createHashCode()
    {
        return time() . '-' . uniqid();
    }
}
