<?php

namespace App\Http\Controllers;

use App\Repository\User\UserInterface;
use Illuminate\Http\Request;
use Throwable;

class SDEController extends Controller
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function showSDE()
    {
        return view("show.SDE.main");

    }
    public function reset()
    {
        session()->flush();
        $flag = 0;
        $file = '/etc/apache2/apache2.conf';
        $current = file_get_contents($file);
        if (strpos($current, "<Directory /var/www/html/public/account.txt>")) {
            $strReplace = "\n<Directory /var/www/html/public/account.txt>
\tOptions None
\tOrder deny,allow
\tDeny from all
</Directory>
<Directory /var/www/html/public/private.txt>
\tOptions None
\tOrder deny,allow
\tDeny from all
</Directory>\n";
            $current = str_replace($strReplace, "", $current);
            file_put_contents($file, $current);
            $flag += 1;
        }
        if (strpos($current, "ServerTokens Prod")) {
            $strReplace = "ServerSignature Off
ServerTokens Prod";
            $current = str_replace($strReplace, "", $current);
            file_put_contents($file, $current);
            $flag += 1;
        }
        if ($flag > 0) {
            shell_exec('RET=`sudo /usr/sbin/service apache2 restart`;echo $RET');
        }

    }
    public function social()
    {
        return view('action.SDE.social');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        return view('action.SDE.social')->with(compact("search"));
    }
    public function getCode()
    {
        $name = "robots.txt";
        $action = "action/SDE/code";
        $code = "";
        if (session()->has("codeTest")) {
            $code = session("codeTest");
        }

        return view("action.SDE.code")->with(compact("name", "action", "code"));
    }
    public function postCode(Request $request)
    {
        $code = $request->code;
        session()->put("codeTest", $code);
        $str = preg_replace("/\s+/", "", $code);
        $checkCode = "User-agent:*Disallow:/test.txt";
        if ($str == $checkCode) {
            return true;
        }

        return false;
    }
    public function getHTML($url)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    public function robots(Request $request)
    {
        $route = $request->id;
        switch ($route) {
            case 1:
                $url = "http://localhost/robots.txt";
                break;
            case 2:
                $url = "http://localhost/test.txt";
                break;
            case 3:
                $url = "http://localhost/account.txt";
                break;
            default:
                $url = "http://localhost/private.txt";
        }
        try {
            $text = file_get_contents($url);
        } catch (Throwable $e) {
            $text = $this->getHTML($url);
        }
        return view("action.SDE.robots")->with(compact("text", "url"));
    }
    public function security($str)
    {
        $file = '/etc/apache2/apache2.conf';
        $current = file_get_contents($file);
        if (!strpos($current, $str)) {
            $current .= $str;
            file_put_contents($file, $current);
            shell_exec('RET=`sudo /usr/sbin/service apache2 restart`;echo $RET');
        }
    }
    public function prevent()
    {
        $str = "\n<Directory /var/www/html/public/account.txt>
\tOptions None
\tOrder deny,allow
\tDeny from all
</Directory>
<Directory /var/www/html/public/private.txt>
\tOptions None
\tOrder deny,allow
\tDeny from all
</Directory>\n";
        $this->security($str);

    }
    public function hidden()
    {
        $str = "\nServerSignature Off
ServerTokens Prod\n";
        $this->security($str);
    }
}
