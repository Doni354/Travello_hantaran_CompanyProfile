<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Http\RequestInterface;
use CodeIgniter\Http\ResponseInterface;

class LocaleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek jika session bahasa sudah diset
        $session = session();
        $uri = service('uri');

        // Ambil segmen pertama dari URL (misalnya 'id' atau 'en')
        $lang = $uri->getSegment(1);

        // Jika tidak ada segment bahasa di URL, arahkan ke session bahasa yang sudah ada
        if (!$lang) {
            if ($session->has('lang')) {
                $lang = $session->get('lang');
            } else {
                // Jika session bahasa tidak ada, set default ke 'en'
                $session->set('lang', 'id');
                $lang = 'id';
            }

            // Redirect ke URL dengan bahasa yang diset
            $currentPath = uri_string(); // Mendapatkan path saat ini
            return redirect()->to(base_url($lang . '/' . $currentPath));
        }

        // Jika segmen bahasa berbeda dari session, set session sesuai URL
        if ($lang === 'id' || $lang === 'en') {
            $session->set('lang', $lang);
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Perform any actions after the request if necessary
    }
}
