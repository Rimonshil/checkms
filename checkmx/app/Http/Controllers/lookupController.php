<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lookupController extends Controller
{

public function welcome() 
{
    return view('welcome');

}
public function alllookup(Request $request)
{
    $query = $request->input('query');
    $prefix = $request->input('prefix');

    $validated = $request->validate([
        'query' => 'required',
        'prefix' => 'required',

    ]);

    if($prefix == 'DNS_ANY') {
        $lookup = dns_get_record($query,DNS_ANY);

      $result = json_decode(json_encode($lookup));
      print_r($result);
       return view('allrecordresult',compact('result'));

    }






    
    if($prefix == 'DNS_TXT') {
        $lookup = dns_get_record($query,DNS_TXT);

      $result = json_decode(json_encode($lookup));
    return view('allresult',compact('result'));

    }

    if($prefix == 'DNS_MX') {
        $lookup = dns_get_record($query,DNS_MX);

      $result = json_decode(json_encode($lookup));
    return view('mxresult',compact('result'));

    }

    if($prefix == 'DNS_NS') {
        $lookup = dns_get_record($query,DNS_NS);

      $result = json_decode(json_encode($lookup));
    return view('allresult',compact('result'));

    }

    if($prefix == 'DNS_A') {
        $lookup = dns_get_record($query,DNS_ANY);

      $result = json_decode(json_encode($lookup));
      print_r($result);
    // return view('aresult',compact('result'));

    }

    if($prefix == 'DNS_AAAA') {
        $lookup = dns_get_record($query,DNS_AAAA);

      $result = json_decode(json_encode($lookup));
    return view('allresult',compact('result'));

    }

    if($prefix == 'DNS_PTR') {
        $lookup = dns_get_record($query,DNS_ANY);

      $result = json_decode(json_encode($lookup));
     print_r($result);
    return view('allresult',compact('result'));

    }

    if($prefix == 'DNS_SPF') {
        
    $records = dns_get_record($query, DNS_TXT | DNS_SOA);
     
    $spfRecords = array();
    foreach ($records as $record) {
        if ($record['type'] == 'TXT') {
            $txt = strtolower($record['txt']);
            if ($txt == 'v=spf1' || stripos($txt, 'v=spf1 ') === 0) {
                $spfRecords[] = $txt;
            }
        }
    }

    return view('spfresult',compact('spfRecords'));

    }


    if($prefix == 'DNS_DKIM') {
        
        $records = dns_get_record($query, DNS_TXT | DNS_SOA);
     
        $dkimRecords = array();
        foreach ($records as $record) {
            if ($record['type'] == 'TXT') {
                $txt = strtolower($record['txt']);
                if ($txt == 'v=dkim' || stripos($txt, 'v=dkim ') === 0) {
                    $dkimRecords[] = $txt;
                }
            }
        }
         return view('dkimresult',compact('dkimRecords'));
    
        }


        if($prefix == 'DNS_DMARC') {
        
            $lookup = dns_get_record("_dmarc.$query",DNS_TXT);
              return view('dmarcresult',compact('lookup'));
        
            }















   






    



   
 
    //  $lookup = dns_get_record($query, $prefix);
    // $result = json_decode(json_encode($lookup));
    // print_r($result);
    // // return view('allresult',compact('result'));
     
}




    public function txtlookup(Request $request)
     {
         $query = $request->input('query');
       
         $validated = $request->validate([
            'query' => 'required',
        ]);
       

         $lookup = dns_get_record($query,DNS_TXT);
         //  print_r($lookup);
         $result = json_decode(json_encode($lookup));
        return view('result',compact('result'));
        
     }
     public function ptrlookup(Request $request)
     {
         
         $query = $request->input('query');
         $validated = $request->validate([
            'query' => 'required',
        ]);
         $lookup = dns_get_record($query,DNS_PTR);
        //  print_r($lookup);
          $result = json_decode(json_encode($lookup));
          return view('ptrresult',compact('result'));
        
     }
     public function nslookup(Request $request)
     {
         $query = $request->input('query');
         $validated = $request->validate([
            'query' => 'required',
        ]);
         $lookup = dns_get_record($query,DNS_NS);
      //  print_r($lookup);
       $result = json_decode(json_encode($lookup));
       return view('nsresult',compact('result'));        
     }
     public function alookup(Request $request)
     {
         $query = $request->input('query');
         $validated = $request->validate([
            'query' => 'required',
        ]);
         $lookup = dns_get_record($query,DNS_A);
         
         $result = json_decode(json_encode($lookup));
         return view('aresult',compact('result'));        
     }
     public function aaaalookup(Request $request)
     {
         $query = $request->input('query');
         $validated = $request->validate([
            'query' => 'required',
        ]);
         $lookup = dns_get_record($query,DNS_AAAA);
         $result = json_decode(json_encode($lookup));

         return view('aaaaresult',compact('result'));
        
     }
     public function spamlookup(Request $request)
     {
         $query = $request->input('query');
         $validated = $request->validate([
            'query' => 'required',
        ]);
         $lookup = dns_get_record($query,DNS_ANY);
         $result = json_decode(json_encode($lookup));

         return view('spamresult',compact('result'));
        
     }
     public function mxlookup(Request $request)
     {
         $query = $request->input('query');
         $validated = $request->validate([
            'query' => 'required',
        ]);
         $lookup = dns_get_record($query,DNS_MX);
         $result = json_decode(json_encode($lookup));
         return view('mxresult',compact('result'));
        
     }
     public function spflookup(Request $request)
     {
        
        $query = $request->input('query');
        $validated = $request->validate([
        'query' => 'required',
        ]);

        $records = dns_get_record($query, DNS_TXT | DNS_SOA);
     
        $spfRecords = array();
        foreach ($records as $record) {
            if ($record['type'] == 'TXT') {
                $txt = strtolower($record['txt']);
                if ($txt == 'v=spf1' || stripos($txt, 'v=spf1 ') === 0) {
                    $spfRecords[] = $txt;
                }
            }
        }

        return view('spfresult',compact('spfRecords'));
        
        
     }
     public function dkimlookup(Request $request)
     {
        $query = $request->input('query');
        $validated = $request->validate([
        'query' => 'required',
        ]);

        $records = dns_get_record($query, DNS_TXT | DNS_SOA);
     
        $dkimRecords = array();
        foreach ($records as $record) {
            if ($record['type'] == 'TXT') {
                $txt = strtolower($record['txt']);
                if ($txt == 'v=dkim' || stripos($txt, 'v=dkim ') === 0) {
                    $dkimRecords[] = $txt;
                }
            }
        }
         return view('dkimresult',compact('dkimRecords'));
        
     }
     public function dmarclookup(Request $request)
     {
        $query = $request->input('query');
        $validated = $request->validate([
        'query' => 'required',
        ]);

     $lookup = dns_get_record("_dmarc.$query",DNS_TXT);
       // print_r($lookup);
         return view('dmarcresult',compact('lookup'));
        
     }

















 public function txt () 
 {
     return view('txt');
 }  
 public function ptr () 
 {
     return view('ptr');
 }  
 public function ns () 
 {
     return view('ns');
 }  
 public function a () 
 {
     return view('a');
 }  
 public function aaaa () 
 {
     return view('aaaa');
 }  
 public function mx () 
 {
     return view('mx');
 }  
 public function spf () 
 {
     return view('spf');
 }  
 public function dkim () 
 {
     return view('dkim');
 }  
 public function dmarc () 
 {
     return view('dmarc');
 }  
 public function spam () 
 {
     return view('spam');
 }       
}


