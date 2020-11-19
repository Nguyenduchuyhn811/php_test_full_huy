<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        $uri = service('uri');
        if ($uri->getSegment(1) == 'user') {
            if ($uri->getSegment(2) == '') {
                $segment = '/quantri';
            }else{
                $segment = '/quantri/'. $uri->getSegment(3);
            }     


            return redirect()->to($segment);
        }
        
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}