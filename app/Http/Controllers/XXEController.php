<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\Repository\User\UserInterface;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class XXEController extends Controller
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function showXXE()
    {
        return view("show.xxe.main");
    }
    public function reset()
    {
        session()->flush();
    }
    public function getLogin()
    {
        return view("action.xxe.login");
    }
    public function getLoginSocial(Request $request)
    {
        $extendXML = $request->op_endpoint;
        session()->put("enableDownload", "");
        if (isset($extendXML) && is_string($extendXML)) {
            if ($extendXML === "localhost/action/xxe/file-xml") {
                session()->put("enableDownload", "true");
                return "download";
            } else {
                return "not download";
            }

        }
        return view("action.xxe.loginSocial");
    }
    public function postLoginSocial(Request $request)
    {
        $data = $request->all();
        if ($data) {
            $user = $this->userRepository->login($data);
            if ($user) {
                return true;
            }
        }
        return "Email or Password is not correct";
    }
    public function getRegisterSocial()
    {
        return view("action.xxe.registerSocial");
    }
    public function postRegisterSocial(Register $request)
    {
        $data = $request->all();
        if ($data) {
            $user = $this->userRepository->create($data);
            if ($user) {
                return redirect("action/xxe/login-social")->with("success", "Sign Up Successfully. Proceed To Login");
            }

        }
        return redirect()->back();
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('action/xxe/shop');
    }

    public function getDDT()
    {
        $name = 'DDT.xml';
        $action = 'action/xxe/DDT';
        $code = "
<?xml version = '1.0' encoding = 'UTF-8'?>
<!DOCTYPE note
[
<!ELEMENT note (to,from,?1,?2)>
<!ELEMENT to (#PCDATA)> <!-- (#PCDATA) chỉ cho phép string -->
<!ELEMENT from (#PCDATA)>
?3
?4
]>
<!-- Có thể dựa vào đây để hoàn thành nhiệm vụ này -->
<note>
<to>Love</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>
";
        if (session()->has("DDT")) {
            $code = session("DDT");
        }
        return view('action.xxe.code')->with(compact(['name', 'action', 'code']));
    }
    public function getDDTInternalDDTEntity()
    {
        $name = 'External_Entity.xml';
        $action = 'action/xxe/DDT-InternalDDTEntity';
        $code = "
<?xml version = '1.0' encoding = 'UTF-8'?>
<!DOCTYPE ?1
[
?2 <!-- Syntax ELEMENT -->
?3 <!-- Syntax Internal DDT Entity -->
]>
<!-- Có thể dựa vào đây để hoàn thành nhiệm vụ này -->
<foo>
    <foo1>Hello &bar;</foo1>
</foo>
";
        if (session()->has("DDT-InternalDDTEntity")) {
            $code = session("DDT-InternalDDTEntity");
        }
        return view('action.xxe.code')->with(compact(['name', 'action', 'code']));
    }
    public function getDDTExternalDDTEntity()
    {
        $name = 'attack.xml';
        $action = 'action/xxe/DDT-ExternalDDTEntity';
        $code = "
<?xml version = '1.0' encoding = 'UTF-8'?>
<!DOCTYPE ?1
[
?2 <!-- Syntax ELEMENT -->
?3 <!-- Syntax External DDT Entity -->
]>
<!-- Có thể dựa vào đây để hoàn thành nhiệm vụ này -->
<foo>
    <foo1>&xxe;</foo1>
</foo>
";
        if (session()->has("attack")) {
            $code = session("attack");
        }
        return view('action.xxe.code')->with(compact(['name', 'action', 'code']));
    }

    public function getPrevent()
    {
        $name = 'prevent.php';
        $action = 'action/xxe/prevent';
        $code = "
try {
    // Paste hàm disable External Entity vào đây để ngăn chặn
    &dollar;dom = new DOMDocument();
    &dollar;dom->loadXML(&dollar;code, LIBXML_NOENT | LIBXML_DTDLOAD);
    &dollar;xml = simplexml_import_dom(&dollar;dom);
} catch (\Throwable &dollar;th) {
    return &dollar;th->getMessage();
}
&dollar;result = '';
foreach (&dollar;xml->children() as &dollar;child) {
    &dollar;result .= &dollar;child->getName() . ': ' . &dollar;child.'&sol;r&sol;n';
}
return &dollar;result;
    ";
        if (session()->has("prevent")) {
            $code = session("prevent");
        }
        return view('action.xxe.code')->with(compact(['name', 'action', 'code']));
    }
    public function postXML(Request $request)
    {
        $code = $request->code;
        $currentRoute = $request->route;
        if ($currentRoute === "action/xxe/DDT") {
            session()->put("DDT", $code);
        } else if ($currentRoute === "action/xxe/DDT-InternalDDTEntity") {
            session()->put("DDT-InternalDDTEntity", $code);
        } else if ($currentRoute === "action/xxe/DDT-ExternalDDTEntity") {
            session()->put("attack", $code);
        } else if ($currentRoute === "action/xxe/prevent") {
            session()->put("prevent", $code);
            $code = session("attack");
        }
        if (session()->has("prevent")) {
            try {
                $result = eval(session("prevent"));
                session()->put("result",$result);
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        } 
            try {
                $dom = new DOMDocument();
                $dom->loadXML($code, LIBXML_NOENT | LIBXML_DTDLOAD);
                $xml = simplexml_import_dom($dom);
            } catch (\Throwable $th) {
                return false;
            }
            $result = $xml->getName() . "\r\n";
            foreach ($xml->children() as $child) {
                $result .=   $child->getName().": ".$child."\n";
            }
            session()->put("result",$result);
            return $result;
    }
    public function shop()
    {
        return view('action.xxe.shop');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        return view('action.xxe.shop')->with(compact("search"));
    }
    public function fileXML()
    {
        $name = "attack.xml";
        $file = "";
        if (session()->has("attack")) {
            $file = session("attack");
        }
        return view("action.xxe.file")->with(compact("name", "file"));
    }
    public function downloadErrorXML()
    {
        $result = "";
        if (session("result")) {
            $result = session("result");
        }
        return response()->streamDownload(function () use ($result) {
            echo $result;
        }, "error.xml");
    }
    public function error()
    {
        return view("action.xxe.error");
    }
}
